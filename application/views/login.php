<?php
defined('BASEPATH') OR exit('No direct script access allowed');?>
<!DOCTYPE html>
<html lang="en">
   <!-- Mirrored from portal.tamprivateaviation.com/ by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 27 Aug 2018 06:39:47 GMT -->
   <!-- Added by HTTrack -->
   <meta http-equiv="content-type" content="text/html;charset=UTF-8" />
   <!-- /Added by HTTrack -->
   <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <meta name="description" content="">
      <meta name="author" content="">
      <title>TAM</title>
      <!-- Bootstrap core CSS -->
      <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
      <!-- Custom fonts for this template -->
      <link rel="stylesheet" type="text/css" href="<?php echo css_url();?>main.css">
   </head>
   <body>
   	<input type="hidden" class="url" value="<?php echo base_url();?>">
      <div class="container">
         <!--Login Form  -->
         <div class="container">
            <div class="col-md-6 col-md-offset-1 main" >
               <div class="col-md-10 left-side" >
                  <h3>TAM PRIVATE AVIATION</h3>
                  <p>Team Force</p>
                  <br>
               </div>
               <div class="col-md-11 right-side">
                  <h3>Login</h3>
                  <form method="post" action="" class="login-form">
                     <div class="form">
                        <div class="form-group">
                           <label for="form2">Your usersname / e-mail</label>
                           <input type="text" id="form2" class="form-control input-lg" name="Username" required>
                        </div>
                        <div class="form-group">
                           <label for="form4">Your password</label>
                           <input type="password" id="form4" class="form-control input-lg" name="Password" required>
                           <input type="checkbox" name="remember_me" value="1">Remember Me?
                        </div>
                        <div class="text-xs-center">
                           <input type="submit" name="submit" class="btn btn-deep-purple" value="Login">
                        </div>
                        <div class="text-xs-center pass">
                           <a href="#" class="pass">Forgot Password?</a>
                        </div>
                     </div>
                  </form>
                  <div class="login-ajax" style="display: none;"><img src="<?php echo img_url();?>30.gif" alt="loader"></div>
               </div>
            </div>
         </div>
         <div class="footer"><strong>Copyright &copy 2018 TAM Aviations</strong>.</div>
      </div>
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
      <script src="<?php echo js_url();?>main.js"></script>
      <script>
         $(".login-form").submit(function(e) {
    e.preventDefault();
    var data = $(".login-form").serialize();
   
    var url = $(".url").val();
    $(".login-ajax").show();
    $.ajax({
        url: url + 'index.php/login/login_action',
        type: 'POST',
        data: {
            data: data
        },
        success: function(data) {
          
            if (data == "admin") {
                window.location.href = url + "index.php/dashboard";
            } 
            else if(data == "employee")
            {
                window.location.href = url + "index.php/dashboard";
            }
            else {
                $(".login-ajax").html(data);
            }

        }
    });

});
      </script>
   </body>
</html>
