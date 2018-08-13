<?php
include"db_connect.php";

if (isset($_POST['post'])) {
	$post=mysqli_real_escape_string($connection,$_POST['post']);

	$sql="INSERT INTO posts(user_id,post_comment) VALUES('$_SESSION[user_id]','$post')";
	$run_sql=mysqli_query($connection,$sql);
	if ($run_sql===false) {
		echo "<div class='alert alert-danger fade in'>
				<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
				Sorry try again later
			  </div>";
		
	}
}

?>