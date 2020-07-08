<!DOCTYPE html>
<html lang="en">
    
<head>
        <title>Brahmastra</title><meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<link rel="stylesheet" href="<?php echo e(asset('css/backend_css/bootstrap.min.css')); ?>" />
		<link rel="stylesheet" href="<?php echo e(asset('css/backend_css/bootstrap-responsive.min.css')); ?>" />
        <link rel="stylesheet" href="<?php echo e(asset('css/backend_css/matrix-login.css')); ?>" />
        <link href="<?php echo e(asset('fonts/backend_fonts/css/font-awesome.css')); ?>" rel="stylesheet" />
		<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,800' rel='stylesheet' type='text/css'>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-sweetalert/1.0.1/sweetalert.js"></script>
       <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-sweetalert/1.0.1/sweetalert.css">
       
       

    </head>
    <body>
        <div id="loginbox">    
      <script>
            <?php if(session('error')): ?>
              swal('Oh no…', 'Invalid Username or Password!', 'error')
            <?php endif; ?>
      </script>

         <script>
            <?php if(session('success')): ?>
              swal("Good job!", "Logged out successfully!", "success")
            <?php endif; ?>
      </script>    
            <form class="form-vertical" role="form" method="POST" action="<?php echo e(url('admin')); ?>"><?php echo e(csrf_field()); ?>

				 <div class="control-group normal_text"> <h3>Brahmastra Admin Panel</h3></div>
                <div class="control-group">
                    <div class="controls">
                        <div class="main_input_box">
                            <span class="add-on bg_lg"><i class="icon-user"> </i></span><input id="username" type="text" name="username" placeholder="Username" required="" />
                        </div>
                    </div>
                </div>
                <div class="control-group">
                    <div class="controls">
                        <div class="main_input_box">
                            <span class="add-on bg_ly"><i class="icon-lock"></i></span><input id="password" type="password" name="password" placeholder="Password" required="" />
                        </div>
                    </div>
                </div>
                <div class="form-actions">
                    <span class="pull-left"><a href="#" class="flip-link btn btn-info" id="to-recover">Lost password?</a></span>
                    <span class="pull-right"><input type="submit" class="btn btn-success" value="Login" /></span>
                </div>
            </form>
            <form id="recoverform" action="#" class="form-vertical">
				<p class="normal_text">Enter your e-mail address below and we will send you instructions how to recover a password.</p>
				
                    <div class="controls">
                        <div class="main_input_box">
                            <span class="add-on bg_lo"><i class="icon-envelope"></i></span><input type="text" placeholder="E-mail address" />
                        </div>
                    </div>
               
                <div class="form-actions">
                    <span class="pull-left"><a href="#" class="flip-link btn btn-success" id="to-login">&laquo; Back to login</a></span>
                    <span class="pull-right"><a class="btn btn-info"/>Recover</a></span>
                </div>
            </form>
        </div>
        
        <script src="<?php echo e(asset('js/backend_js/jquery.min.js')); ?>"></script>  
        <script src="<?php echo e(asset('js/backend_js/matrix.login.js')); ?>"></script> 
        <script src="<?php echo e(asset('js/backend_js/bootstrap.min.js')); ?> "></script> 
    </body>

</html>
<?php /**PATH C:\wamp\www\Brahmastra live work\trunk\resources\views/admin/admin_login.blade.php ENDPATH**/ ?>