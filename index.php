<?php 
session_start();
include"./includes/db_connect.php"; 
include"./includes/head.php"; 
include"./includes/functions.php"; 

if (empty($_SESSION['user_id'])) {
  header("Location:login.php");
  exit();
}
?>
<div class="wrapper">
  <?php $user=$_SESSION['user_id']; ?>
  <?php include"./includes/header.php"; ?>
  <!-- Left side column. contains the logo and sidebar -->
  <?php include"./includes/sidebar.php"; ?>

  <!-- Content Wrapper. Contains page content -->
  <?php include"./includes/newsfeed.php"; ?>
  <!-- /.content-wrapper -->
  <?php include"./includes/main_footer.php"; ?>

  <!-- Control Sidebar -->
  <?php include"./includes/control_sidebar.php"; ?>
  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->
<?php include"./includes/footer.php"; ?>
