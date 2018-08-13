<?php
include"db_connect.php";
     
?>
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <?php
          $user_id=$_SESSION['user_id'];
          $sql="SELECT * FROM users WHERE user_id='$_SESSION[user_id]'";
          $run_sql=mysqli_query($connection,$sql);
          $row=mysqli_fetch_array($run_sql);

          $user_id=$row['user_id'];
          $fullname=$row['fullname'];
          $user_image=$row['image'];

          echo "<img src='./admin_area/users/$user_image' class='img-circle' alt='User Image'>
         
        </div>
        <div class='pull-left info'>
          <p>$fullname</p>
          <a href='#'><i class='fa fa-circle text-success'></i> Online</a>
        </div> 
        ";
          ?>
          
        
      </div>
      <!-- search form -->
      <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
          <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form>
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
       
        <li class="active treeview">
          <a href="index.php">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
          </a>
        </li>
        <li class="treeview">
          <a href="home.php">
            <i class="fa fa-files-o"></i>
            <span>Profile</span>

          </a>
        </li>
        <li>
          <a href="#">
            <i class="fa fa-th"></i> <span>Friends</span>
            <span class="pull-right-container">
              <small class="label pull-right bg-green">957</small>
            </span>
          </a>
        </li>
        <li>
          <a href="#">
            <i class="fa fa-calendar"></i> <span>Events</span>
            <span class="pull-right-container">
              <small class="label pull-right bg-red">3</small>
              <small class="label pull-right bg-blue">17</small>
            </span>
          </a>
        </li>
        <li>
          <a href="pages/mailbox/mailbox.html">
            <i class="fa fa-envelope"></i> <span>Messages</span>
            <span class="pull-right-container">
              <small class="label pull-right bg-green">16</small>
            </span>
          </a>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-share"></i> <span>Messages</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="#"><i class="fa fa-circle-o"></i> Read</a></li>
            <li><a href="#"><i class="fa fa-circle-o"></i> Unread</a></li>
          </ul>
        </li>
        <li><a href="https://adminlte.io/docs"><i class="fa fa-book"></i> <span>Documentation</span></a></li>
        <li class="header">STATUS</li>
        <li><a href="#"><i class="fa fa-circle-o text-green"></i> <span>Online</span></a></li>
        <li><a href="#"><i class="fa fa-circle-o text-red"></i> <span>Offline</span></a></li>
      </ul>
    </section>
    <!-- /.sidebar -->
</aside>