

$(function(){
	function checkEmail(email){
		var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
		if(email == '' || !emailReg.test(email)) return false;
		return true;
	}
	
	$('#action-btn').click(function(){
		if (checkEmail($('#appendedInputButton').val())) {
			$('#appendedInputButton').css('background-color', '#dfd')
			$.post(
				'signup.php',
				{
					'email' : $('#appendedInputButton').val(),
					'cid' : $('#action-cid').val()
				},
				function(response) {
					try {
						var json = $.parseJSON(response);
						if (json.status == 'OK') {
							$('#appendedInputButton').css('display', 'none');
							$('#action-btn').css('display', 'none');
							$('#action-status')
								.addClass('alert-success')
								.append(json.message)
								.fadeIn();
							$('.to-hide')
								.hide();
						} else {
							$('#action-status')
								.addClass('alert-error')
								.append(json.message)
								.fadeIn();
							console.log(response);
						}
					} catch (e) {
						$('#action-status')
							.addClass('alert-error')
							.append('Houve um problema inesperado. Tente mais tarde.')
							.fadeIn();
						console.log(response);
					}
				}
			);
		} else {
			$('#action').effect("shake", { times:3 }, 500);
			$('#appendedInputButton').css('background-color', '#fdd');
		}
	})
});