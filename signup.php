<?php

ini_set('display_errors', 'On');
error_reporting(E_ALL);

$constants = array();
require_once 'config.php';
foreach ($constants as $k => $v) {

	define($k, $v);

}
date_default_timezone_set('America/Sao_Paulo');

class ConnectionFactory {

	public static function getConnection() {

		try {

			$con = new PDO('mysql:host='.SERVER.';dbname='.DATABASE, USER, PASSWORD);

			$con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

		} catch (Exception $e) {

			throw new ConnectionFailedException($e->getMessage(), $e->getCode());

		}

		return $con;

	}

}

class SimpleMail {

	private

		$headers,

		$fromName,

		$fromEmail,

		$toName,

		$toEmail,

		$subject,

		$message;

	public function __construct() {

		$headers = array();

	}

	/**

	 *

	 * @param string $header

	 */

	public function addHeader($header) {

		$this->headers[] = $header;

		return $this;

	}

	/**

	 *

	 * @param string $fromName

	 */

	public function setFromName($fromName) {

		$this->fromName = $fromName;

		return $this;

	}

	/**

	 *

	 * @param string $fromEmail

	 */

	public function setFromEmail($fromEmail) {

		$this->fromEmail = $fromEmail;

		return $this;

	}

	/**

	 *

	 * @param string $toName

	 */

	public function setToName($toName) {

		$this->toName = $toName;

		return $this;

	}

	/**

	 *

	 * @param string $toEmail

	 */

	public function setToEmail($toEmail) {

		$this->toEmail = $toEmail;

		return $this;

	}

	/**

	 *

	 * @param string $subject

	 */

	public function setSubject($subject) {

		$this->subject = $subject;

		return $this;

	}

	/**

	 *

	 * @param string $message

	 */

	public function setMessage($message) {

		$this->message = $message;

		return $this;

	}

	/**

	 *

	 * @throws EmailNotSentException

	 */

	public function send() {

		$headers[] = "From: " . $this->fromName . ' <' . $this->fromEmail . '>'; //CAREFUL! ONLY LINUX!

		$headers[] = "Reply-To: " . $this->fromEmail;



		if(PATH_SEPARATOR == ";") $linebreak = "\r\n";

		else $linebreak = "\n";



		$headersString = "MIME-Version: 1.1" .$linebreak;

		$headersString .= "Content-type: text/html; charset=iso-8859-1" .$linebreak;

		foreach ($headers as $header) {

			$headersString .= $header . $linebreak;

		}



		$status = mail($this->toEmail, $this->subject, $this->message, $headersString, "-r" . $this->fromEmail);

		if (!$status) {

			$headersString .= "Return-Path: " . $this->fromEmail . $linebreak;

			$status = mail($this->toEmail, $this->subject, $this->message, $headersString);

			if (!$status) {

				throw new EmailNotSentException('Email not sent.');

			}

		}

		return $this;

	}

}

$con = ConnectionFactory::getConnection();
$sql =

	'INSERT INTO pre_cadastro (email, data_cadastro, cid) ' .

	'VALUES (:Email, :DataCadastro, :Cid)';

$statement = $con->prepare($sql);

try {
	$data = date('Y-m-d H:i:s');

	$statement->execute(array(

		':Email' 		 => $_REQUEST['email'],

		':DataCadastro'  => $data,

		':Cid' 			 => $_REQUEST['cid']

	));
	$mail = new SimpleMail();
	$mail
		->setFromName(NOME_SITE)
		->setFromEmail(EMAIL_SITE)
		->setToName(NOME_ADMIN)
		->setToEmail(EMAIL_ADMIN)
		->setSubject('+1 Cadastro')
		->setMessage(
			'<h1>Parabéns</h1><h2>Mais um cadastrado no site</h2>' .
			'<ul><li><b>E-mail: </b>' . $_REQUEST['email'] . '</li>' .
			'<li><b>Data: </b>' . $data . '</li>' .
			'<li><b>CID: </b>' . $_REQUEST['cid'] . '</li></ul>'
		)
		->send();
	$json = array(
		'status' => 'OK',
		'message' => 'O seu e-mail foi cadastrado com sucesso. Você será avisado sobre o lançamento em breve!'
	);
} catch (Exception $e) {
echo $e;
	$json = array(
		'status' => 'NOK',
		'message' => 'Houve um problema no cadastro. Tente mais tarde.'
	);

}
echo json_encode($json);
?>