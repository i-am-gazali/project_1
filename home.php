<?php
session_start();
include"./includes/head.php";

if (empty($_SESSION['user_id'])) {
  header("Location:login.php");
  exit();
}
?>    <!-- Logo -->
 
<?php include"./includes/header.php"; ?>

<?php include"./includes/sidebar.php"; ?>


<?php include"./includes/profile.php"; ?>
<?php 
include"./includes/footer.php"; 


?>