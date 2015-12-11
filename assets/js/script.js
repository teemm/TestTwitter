$(document).ready(function(){
	$('#Signup').on('click', function(e){
		e.preventDefault();

		$('#login').hide('slow');
		$('#reg').show('slow');
	});
	$('#backMain').on('click', function(e){
		e.preventDefault();

		$('#reg').hide('slow');
		$('#login').show('slow');
	});
});
