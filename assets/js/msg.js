$(document).ready(function(){
	$(document).on('keyup', '#client_first_name', function(){
	//$(document).on('change', '#client_first_name', function(){
		$('#msg_header').text("Dear "+this.value);
	});
	$(document).on('keyup', '#sender_name', function(){
	//$(document).on('change', '#sender_name', function(){
		$('#msg_footer').text(this.value);
	});	
	$(document).on('keyup', '#message', function(){
	//$(document).on('change', '#message', function(){
		$('#msg_content').text(this.value);
	});
	
});