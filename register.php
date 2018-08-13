<?php include"./includes/db_connect.php"; ?>
<?php include"./includes/head.php"; ?>

<div class="register-box">
  <h1 class="text-center" style="font-weight:bolder;">
    <span class="text-danger">Social</span> 
    <span class="text-info">Network</span>
  </h1>

  <div class="login-panel panel panel-default">
    <div class="panel-heading">
      <h3 class="card-title text-center">Register</h3>
    </div>
    <div class="panel-body">
      <form id="formRegister" action="" method="POST" enctype="multipart/form-data">
        <div class="form-group has-feedback">
          <input type="text" class="form-control" name="fullname" placeholder="Full name">
          <span class="glyphicon glyphicon-user form-control-feedback"></span>
        </div>
          <p id="nameErrors" class="text-danger"></p>
        <div class="form-group has-feedback">
          <input type="file" class="form-control" name="image">
          <span class="glyphicon glyphicon-profile form-control-feedback"></span>
        </div>
        <p id="imageErrors" class="text-danger"></p>
        <div class="form-group has-feedback">
          <input type="email" class="form-control" name="email" placeholder="Email">
          <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
        </div>
        <p id="emailErrors" class="text-danger" ></p>
        <div class="form-group has-feedback">
          <input type="password" class="form-control" name="password" placeholder="Password">
          <span class="glyphicon glyphicon-lock form-control-feedback"></span>
        </div>
        <p id="passwordErrors" class="text-danger"></p>
        <div class="row">
          <div class="col-xs-8">
            <div class="form-group">
              <label>
                <input type="checkbox"> I agree to the <a href="#">terms</a>
              </label>
            </div>
          </div>
          <?php
  if (isset($_POST['signup'])) {
    $fullname=mysqli_real_escape_string($connection,$_POST['fullname']);
    $email=mysqli_real_escape_string($connection,$_POST['email']);
    $password=mysqli_real_escape_string($connection,$_POST['password']);
    $status="on";
    $veri_code=mt_rand();
    $posts="no";

    $image=$_FILES['image']['name'];
    $tmp_name=$_FILES['image']['tmp_name'];
    $file_path="admin_area/users/".$image;

        $check_email="SELECT * FROM users WHERE email='$email'";
        $run_check_email=mysqli_query($connection,$check_email);
        $result=mysqli_num_rows($run_check_email);
      if ($result==1) {
        echo "Email has already been taken";
      }

      $sql="INSERT INTO users(fullname,description,relationship,password,email,country,birthday,  image,register_date,status,veri_code,posts) VALUES('$fullname','Lorem ipsum sit dolor sit amet den go ma lod polutse','','$password','$email','','','$image',NOW(),'$status',$veri_code,'$posts')";
      $run_sql=mysqli_query($connection,$sql);
    if ($run_sql) {
      move_uploaded_file($tmp_name,$file_path);
      $_SESSION['user_id']=$user_id;
      header("Location:home.php");
      exit();
    }else{
      echo "Sorry try again later";
    }
  }
?>
          <!-- /.col -->
          <div class="col-xs-4">
            <button type="submit" name="signup" class="btn btn-primary btn-block btn-flat">Register</button>
          </div>
          <!-- /.col -->
        </div>
      </form>
      <a href="login.php" class="text-center">I already have a account</a>
    </div>

    
  </div>
  <!-- /.form-box -->
</div>
<!-- /.register-box -->

<!-- jQuery 3 -->
<?php include"includes/footer.php"; ?>
 <script>
     $("#formRegister").submit(function(){

      var name=$('input[name=fullname]').val();
      var image=$('input[name=image]').val();
      var email=$('input[name=email]').val();
      var password=$('input[name=password]').val();
    

      var emailReg=/^([A-Z0-9a-z_.+-])+\@(([A-Za-z0-9-])+\.)+([A-Za-z]{2,4})?$/;

      var errors=false;


      //full name validation
      if (name.length < 7) {
        $('#nameErrors').text('Name should be more than 7 characters');
        $('#nameErrors').show();
        errors= true ;
      }else {
        $('#nameErrors').hide();
      }

      if (image=='') {
        $('#imageErrors').text('Please Upload Your Picture');
        $('#imageErrors').show();
        errors= true ;
      }else {
        $('#nameErrors').hide();
      }

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