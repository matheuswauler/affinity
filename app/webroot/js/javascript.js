$(function(){

	setTimeout(function(){
		$('.error_msg').fadeOut(300);
	}, 5000);


	$('#show_personality').click(function(){
		if($('.personalidade_texto').hasClass('hidden_text')){
			$('.personalidade_texto').removeClass('hidden_text');
			$('.personalidade_texto').addClass('shown_text');
		} else {
			$('.personalidade_texto').addClass('hidden_text');
			$('.personalidade_texto').removeClass('shown_text');
		}
		e.preventDefault();
	});

});