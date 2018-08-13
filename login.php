<?php 
include"./includes/user_login.php";
include"./includes/head.php";

?>
<div class="container">
      <div class="row" style="margin-top:130px;">
            <div class="col-md-4 col-md-offset-4">
                <div class="login-panel panel panel-default">
                	<h1 class="text-center" style="font-weight:bolder;">
                    <span class="text-danger">Social</span> 
                    <span class="text-info">Network</span>
                  </h1>
                    <div class="panel-heading">
                        <h3 class="card-title text-center">Login</h3>
                    </div>
                    <div class="panel-body">
                        <form id="formRegister" action="" role="form" method="POST">
                            <fieldset>
                                <div class="form-group">
                                    <input class="form-control" placeholder="E-mail" name="email" type="email">
                                    <p id="emailErrors" class="text-danger"></p>
                                </div>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Password" name="password" type="password" value="">
                                    <p id="passwordErrors" class="text-danger"></p>
                                </div>
                                <div class="checkbox">
                                    <label>
                                        <input name="remember" type="checkbox" value="Remember Me">Remember Me
                                    </label>
                                </div>
                                <!-- Change this to a button or input when using this as a form -->
                                <button name="login" type="submit" class="btn btn-lg btn-primary btn-block">
                                  Login
                                </button>
                            </fieldset>
                        </form>
                    </div>
                </div>
                <!-- <div class="social-auth-links text-center">
                  <p>- OR -</p>
                  <a href="#" class="btn btn-primary pull-left">
                  Log in using Facebook</a>
                  <a href="#" class="btn btn-social btn-google btn-flat">
                  Log in using Google+</a>
                </div>   -->
            </div>
      </div>
</div>

</div>

  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->
<?php include"./includes/footer.php"; ?>
<script>
     $("#formRegister").submit(function(){

      var name=$('input[name=fullname]').val();
      var email=$('input[name=email]').val();
      var password=$('input[name=password]').val();
    

      var emailReg=/^([A-Z0-9a-z_.+-])+\@(([A-Za-z0-9-])+\.)+([A-Za-z]{2,4})?$/;

      var errors=false;

      //email validation
      if (emailReg.test(email)) {
          $('#emailErrors').hide();
      }else {
         $('#emailErrors').text('Email should be like example@example.com');
         $('#emailErrors').show();
          errors= true ;
      }

      //password validation
      if (password.length < 8) {
         $('#passwordErrors').text('Password must be more than 7 characters');
         $('#passwordErrors').show();
          errors= true ;
      }else {
        
          $('#passwordErrors').hide();
      }

      if (errors == true) {
        return false;
      }
          
     });
</script>