<?php include('verify.php'); 
if(!$sent): ?>

<form action="index_new.php?page=contact" method="post" id="sendEmail">
	<div style="float: left; padding-right: 20px;" >
		<label>Name</label><input type="text" name="name" id="name" value="<?= $_POST['name']; ?>" <?php if(isset($nameError)) echo "style='border:1px solid red'"; ?> />
		<label>Email</label><input type="text" name="email" id="email" value="<?= $_POST['email']; ?>" <?php if(isset($emailError)) echo "style='border:1px solid red'"; ?> />
		<label>Subject</label><input type="text" name="subject" id="subject" value="<?= $_POST['subject']; ?>" <?php if(isset($subjectError)) echo "style='border:1px solid red'"; ?> />
	</div>
	<div>
		<label>Message</label>			
		<textarea  style="height: 115px; width: 600px; <?php if(isset($messageError)) echo "border:1px solid red"; ?>" name="message" id="message" ><?= $_POST['message']; ?></textarea>
	</div>
	<div style="clear: both; padding-top: 5px;" class="button">
		<button type="submit" id="submit">Send</button><input type="hidden" name="submitted" id="submitted" value="true" />
	</div>
</form>

<?php endif; ?>
