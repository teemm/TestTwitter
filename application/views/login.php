<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
   
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="http://getbootstrap.com/favicon.ico">

    <title>Signin Template for Bootstrap</title>

    <link rel="stylesheet" href="<?php echo base_url('/assets/css/bootstrap.min.css'); ?>">
    <link rel="stylesheet" href="<?php echo base_url('/assets/css/signin.css'); ?>">
  </head>

  <body cz-shortcut-listen="true">

    <div class="container">

      <form id="login" class="form-signin <?php if(isset($_POST['reg'])) echo 'hidden';?>" action=" <?php echo base_url('Main/enter/'); ?> " method="POST">
        <h2 class="form-signin-heading">Please sign in</h2>
        <label for="inputEmail" class="sr-only">Email address</label>
        <input type="email" name="email" class="form-control" placeholder="Email address">
        <input type="hidden" name="hiddenEmail" value=" <?php echo uniqid().rand(1, 10000000000000);?> ">
        <label for="inputPassword" class="sr-only">Password</label>
        <input type="password" name="password" class="form-control" placeholder="Password" >
        <div class="checkbox">
          <label>
            <input type="checkbox" value="remember-me"> Remember me
          </label>
        </div>
        <button id="Signin" class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
        <button id="Signup" class="btn btn-lg btn-primary btn-block">Sign up</button>
          
      </form>
         <!-- inclure reg age -->
              <?php ($this->session->flashdata('msg_error')) ? $error='1' : $error='';?>
               <form id="reg" class="form-signin" action=" <?php echo base_url('Main/Reg/'); ?> " method="POST">
                <h2 class="form-signin-heading">Please sign up</h2>

                <label for="inputEmail" class="sr-only">Email address</label>
                <input type="email" name="email" class="form-control" placeholder="Email address">
                <?php if($error) echo form_error('email'); ?>
                </br>
                <label for="phone" class="sr-only">Phone</label>
                <input type="text" name="phone" class="form-control" placeholder="Phone">
                <?php if($error) echo form_error('phone'); ?>
                </br>
                <label for="fname" class="sr-only">Firstname</label>
                <input type="text" name="fname" class="form-control" placeholder="Firstname">
                <?php if($error) echo form_error('fname'); ?> 
                </br>
                <label for="lname" class="sr-only">Lastname</label>
                <input type="text" name="lname" class="form-control" placeholder="Lastname">
                <?php if($error) echo form_error('lname'); ?>
                </br>

                <input type="hidden" name="hiddenEmail" value=" <?php echo uniqid().rand(1, 10000000000000);?> ">

                <label for="inputPassword" class="sr-only">Password</label>
                <input type="password" name="password" class="form-control" placeholder="Password" >
                <?php if($error) echo form_error('password'); ?>

                <label for="inputConfirmPassword" class="sr-only">Confirm Password</label>
                <input type="password" name="ConfirmPassword" class="form-control" placeholder="Confirm Password">
                <?php if($error) echo form_error('password'); ?>
                <div class="radio">
                  <label>
                    <input type="radio" name="gender" value="Male">Male
                  </label>
                  <label>
                    <input type="radio" name="gender" value="Famale">Famale
                  </label>
                  <?php if($error) echo form_error('gender'); ?>
                </div>
                <button class="btn btn-primary btn-lg" id="backMain" name="backMain" type="submit"><i class="fa fa-arrow-left"></i></button>
                
                <button class="btn btn-primary btn-lg regg" name="reg" type="submit">Registration</button>
              </form>

         <!-- inclure reg age -->
    </div> <!-- /container -->

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="assets/js/ie10-viewport-bug-workaround.js"></script>
    <script type="text/javascript">

    </script>

</body></html>