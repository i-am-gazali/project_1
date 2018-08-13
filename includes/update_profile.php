<?php

require_once("db_connect.php");

if (isset($_POST['submit'])) {
	$fullname=mysqli_real_escape_string($connection,$_POST['user_name']);
	$about=mysqli_real_escape_string($connection,$_POST['user_desc']);
	$relationship=mysqli_real_escape_string($connection,$_POST['user_status']);
    $email=mysqli_real_escape_string($connection,$_POST['user_email']);
 	$country=mysqli_real_escape_string($connection,$_POST['user_cty']);
    $birthday=mysqli_real_escape_string($connection,$_POST['user_bd']);
   
	// $imgName=$_FILES['image']['name'];
    // $fileTmpName=$_FILES['image']['tmp_name'];
    // $fileSize=$_FILES['image']['size'];
    // $fileError=$_FILES['image']['error'];
    // $fileType=$_FILES['image']['type'];
    
    // $fileExt=explode('.', $imgName);
    // $fileActualExt=strtolower(end($fileExt));

    // $fileAllowed=array('jpeg','jpg','png');

    // if (in_array($fileActualExt, $fileAllowed)) {
    // 	if ($fileError===0) {
    // 		if ($fileSize<10000) {
    // 			$fileNewName=uniqid('',true).".".$fileActualExt;
    // 			$fileDestination="./admin_area/users".$fileNewName;
    // 			move_uploaded_file($fileTmpName, $fileDestination);
    // 			header("Location:index.php?uploadsuccess");

    // 		}else{
    // 			echo "<div class='alert alert-danger'>
    // 	Your image is too big
    // 	</div>";
    // 		}
    // 	}else{
    // 		echo "<div class='alert alert-danger'>
    // 	Sorry there was an error
    // 	</div>";
    // 	}
    // }else{
    // 	echo "<div class='alert alert-danger'>
    // 	You cannot upload file of this type
    // 	</div>";
    // }


    // $file_path="admin_area/users/".$image;
    $sql="UPDATE users 
    SET fullname='$fullname',about='$about',relationship='$relationship',email='$email',country='$country',birthday='$birthday' 
    WHERE user_id='$_SESSION[user_id]'";
    $run_sql=mysqli_query($connection,$sql);

    if($run_sql){
        echo "<div class='alert alert-success fade in'>
        <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
        updated
        	</div>";
    }else{
        echo "<div class='alert alert-success fade in'>
        <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
        Sorry try again later
        	</div>";
    }
   $connection->close();
}