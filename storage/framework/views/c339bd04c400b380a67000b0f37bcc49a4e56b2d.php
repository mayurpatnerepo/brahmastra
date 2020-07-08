<html>
	<head>
		<title>Forgot Password Email</title>
	</head>
	<body>
		<table>
			<tr><td>Dear <?php echo e($name); ?>!</td></tr>
			<tr><td>&nbsp;</td></tr>
			<tr><td>Your account has been successfully updated.<br>
			Your account information is as below with new password:</td></tr>
			<tr><td>&nbsp;</td></tr>
			<tr><td>Email: <?php echo e($email); ?></td></tr>
			<tr><td>&nbsp;</td></tr>
			<tr><td>New Password: <?php echo e($password); ?></td></tr>
			<tr><td>&nbsp;</td></tr>
			<tr><td>Thanks & Regards,</td></tr>
			<tr><td>Brahmastra</td></tr>
	</body>
</html><?php /**PATH C:\wamp\www\Brahmastra\trunk\resources\views/emails/forgotpassword.blade.php ENDPATH**/ ?>