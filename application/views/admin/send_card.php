<div class="container" style="margin-top: 50px">

	<div style="color: red"><?php echo validation_errors(); ?></div>
	<div class="row text-center">
		<div class="col-md-5">
			
			<img src="<?php echo(img)?>card.jpg" height="600px" width="400px">
			<div id="msg" class="msg">
				<div id="msg_header"></div>
				<div id="msg_content"></div>
				<div id="msg_footer"></div>
			</div>
			
		</div>
		<form role="form" action="<?php echo site_url('/');?>" method="post">
		<div class="col-md-4">
			<span>Client email info</span>
			<div class="form-group">
				<label for="client_email">Email Address</label>
				<input type="text" class="form-control" id="client_email" name="client_email" value="<?php echo set_value('client_email'); ?>">
				<label for="client_first_name">First Name</label>
				<input type="text" class="form-control" id="client_first_name" name="client_first_name" value="<?php echo set_value('client_first_name'); ?>">
				<label for="client_last_name">Last Name</label>
				<input type="text" class="form-control" id="client_last_name" name="client_last_name" value="<?php echo set_value('client_last_name'); ?>">
			</div>
			<span>Sender email info</span>

			<div class="form-group">
				<label for="sender_email">Email Address</label>
				<input type="text" class="form-control" id="sender_email" name="sender_email" value="<?php echo set_value('sender_email'); ?>">
				<label for="sender_first_name">Name (First name/ Last name)</label>
				<input type="text" class="form-control" id="sender_name" name="sender_name" value="<?php echo set_value('sender_name'); ?>">
			</div>
		</div>
		
		<div class="col-md-3">
			<span>Message</span><br><br>
			<div class="form-group">
				<textarea rows="4" cols="50" autofocus maxlength="150" id="message" name="message" value="<?php echo set_value('message'); ?>"></textarea>
			</div>
			<input type="submit" id="submit" class="btn btn-primary pull-right" value="Send">
		</div>
		</form>
	</div>	
</div>

