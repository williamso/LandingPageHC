<?php 
	$cid = isset($_REQUEST['cid']) ? $_REQUEST['cid'] : 0; 
?>

<!DOCTYPE html>
<html lang="pt-br">
  <head>
    
    <title>HunterCo :: Ligando Consultores e Empresas </title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="HunterCo Ligando Consultores e Empresas, Consultoria, Grandes empresas procuram grandes profissionais. Faça parte dessa rede.Conecte-se agora e receba o convite.">
    <meta name="author" content="HunterCo"> 
    <meta name="charset" CONTENT="ISO-8859-1">
	
    
	<!-- JS -->
	<script type="text/javascript" src="assets/js/jquery.js"></script>
    <script type="text/javascript" src="assets/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="assets/js/script.js"></script>
    
    <!-- CSS -->
    <link href="assets/css/bootstrap.css" rel="stylesheet">
    <style type="text/css">

      /* Sticky footer styles
      -------------------------------------------------- */

      html,
      body {
        height: 100%;
        background-image:url('assets/img/bg-landing-page2.jpg')
        
        /* The html and body elements cannot have any padding or margin. */
      }

      /* Wrapper for page content to push down footer */
      #wrap {
        min-height: 100%;
        height: auto !important;
        height: 100%;
        /* Negative indent footer by it's height */
        /*margin: 0 auto -60px;*/
      }

      /* Set the fixed height of the footer here */
      #push,
      #footer {
        height: 60px;
      }
      #footer {
        background-color: #f5f5f5;
      }

      /* Lastly, apply responsive CSS fixes as necessary */
      @media (max-width: 767px) {
        #footer {
          margin-left: -20px;
          margin-right: -20px;
          padding-left: 20px;
          padding-right: 20px;
          margin-bottom: 0px;
        }
      }
	


      /* Custom page CSS
      -------------------------------------------------- */
      /* Not required for template or sticky footer method. */
	  
	  .container{
	  	width: 100%;
	  	height:100%;
	  	margin-left: 20px;
        color: white;
	  	
	  }
	  
	  .btn-e-mail {
		color: #ffffff;
		text-shadow: 0 -1px 0 rgba(0, 0, 0, 0.25);
		background-color: #a5366d;
		background-image: -moz-linear-gradient(top, #a5366d, #993366);
		background-image: -webkit-gradient(linear, 0 0, 0 100%, from(#a5366d), to(#993366));
		background-image: -webkit-linear-gradient(top, #a5366d, #993366);
		background-image: -o-linear-gradient(top, #a5366d, #993366);
		background-image: linear-gradient(to bottom, #a5366d, #993366);
		background-repeat: repeat-x;
		filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#ffee5f5b', endColorstr='#ffbd362f', GradientType=0);
		border-color: #993366 #993366 #802420;
		border-color: rgba(0, 0, 0, 0.1) rgba(0, 0, 0, 0.1) rgba(0, 0, 0, 0.25);
		filter: progid:DXImageTransform.Microsoft.gradient(enabled = false);
	}

	.btn-e-mail:hover,
	.btn-e-mail:focus,
	.btn-e-mail:active,
	.btn-e-mail.active,
	.btn-e-mail.disabled,
	.btn-e-mail[disabled] {
  		 color: #ffffff;
 		 background-color: #a5366d;
 		 *background-color: #a5366d;
	}
		
	#action-status {
		display: none;
		margin-top: 470px;
		margin-left: 210px;
		position: absolute;
		width: 380px;
	}
	
    </style>
    <link href="assets/css/bootstrap-responsive.css" rel="stylesheet">

    <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="assets/js/html5shiv.js"></script>
    <![endif]-->

    <!-- Fav and touch icons -->
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="assets/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="assets/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="assets/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="assets/ico/apple-touch-icon-57-precomposed.png">
    <link rel="shortcut icon" href="assets/ico/favicon.png">
  </head>

  <body>
  <header></header>
  
  <div id="action" class="container">

	<aside id="action-status" class="alert alert-information fade in span8 offset2">
	  	<a href="#" class="close" data-dismiss="alert">x</a>
	</aside>
	<form>
    	<div class="input-append" style="margin-top: 470px;margin-left: 210px;">    		
      		<input class="span2" id="appendedInputButton" type="text" placeholder="deixe seu e-mail aqui" style="width: 300px;font-size: 20px;height: 30px;">
      		<input type="hidden" id="action-cid" value="<?php echo $cid ?>"/>
	  		<a href="javascript:void(0)" id="action-btn" class="btn btn-e-mail" style="height: 30px;font-size: 20px;">Avise-me!</a>     		
      	</div>
	</form>
  </div>
  
  <footer class="footer">
  		<div class="container">
        	<p>© 2013 HunterCo - Ligando Consultores e Empresas. Todos os direitos reservados</p>
      	</div>
  </footer>

  </body>
  <script>
  	(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
 	 (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
 	 m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
 	 })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

 	 ga('create', 'UA-41043445-1', 'hunterco.com.br');
 	 ga('send', 'pageview');

</script>
  
</html>
