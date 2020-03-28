<html>
	<head>
		<title>Register Email</title>
	</head>
	<body>
		<table>
			<tr><td>Dear <?php echo e($name); ?>!</td></tr>
			<tr><td>&nbsp;</td></tr>
			<tr><td>Please click on below link to activate your account:</td></tr>
			<tr><td>&nbsp;</td></tr>
			<tr><td><a href="<?php echo e(url('confirm/'.$code)); ?>">Confirm Account</a></td></tr>
			<tr><td>&nbsp;</td></tr>
			<tr><td>Thanks & Regards,</td></tr>
			<tr><td>Brahmastra</td></tr>
	</body>
</html><?php /**PATH C:\wamp\www\Brahmastra\trunk\resources\views/emails/confirmation.blade.php ENDPATH**/ ?>