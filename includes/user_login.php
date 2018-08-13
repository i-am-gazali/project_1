<?php 
session_start();
require_once("db_connect.php");

if (isset($_POST['login'])) {
    $email=mysqli_real_escape_string($connection,$_POST['email']);
    $password=mysqli_real_escape_string($connection,$_POST['password']);

    $sql="SELECT * FROM users WHERE email='$email' AND password='$password'";

    $run_sql=mysqli_query($connection,$sql);

    if (mysqli_num_rows($run_sql) > 0) {
       $row=mysqli_fetch_assoc($run_sql);
       $_SESSION['user_id']=$row['user_id'];
      header("Location:index.php");
      exit();
  
     
    }else{
       echo "Email or Password is incorrect!";
    }
}
?>









?>