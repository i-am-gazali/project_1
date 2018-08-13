<?php include"db_connect.php"; ?>
<?php
function addpost(){
if (isset($_POST['post'])) {
	global $connection;
	global $user_id;
	$post=mysqli_real_escape_string($connection,$_POST['user_post']);
	$post_image=$_FILES['post_image'];
	$post_image_tmp=$_FILES['post_image']['tmp_name'];

	
if ($post == '') {
	echo "<div class='alert alert-danger fade in'>
				<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
				Please post something!
			  </div>
		";
	}else{
		$sql="INSERT INTO posts(user_id,post,post_date) VALUES('$_SESSION[user_id]','$post',NOW())";
		$run_sql=mysqli_query($connection,$sql);
	if ($run_sql) {
		$update="update users set posts='yes' where user_id='$_SESSION[user_id]'";
		$run_update=mysqli_query($connection,$update);
	}else{
			echo "<div class='alert alert-danger fade in'>
				<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
				Sorry try again later
			  </div>";
		
	}
}
}
}
 function getpost(){
	 global $connection;
	//  $get_posts="SELECT * FROM posts ORDER BY post_date";
	//  $run_getpost=mysqli_query($connection,$get_posts);

 	$show_post="SELECT * FROM posts INNER JOIN users WHERE posts.user_id=users.user_id ORDER BY post_id DESC";
	 $run_show_post=mysqli_query($connection,$show_post);
	 if(mysqli_num_rows($run_show_post) > 0){
 	while($row_posts=mysqli_fetch_assoc($run_show_post)){
		 $post_id=$row_posts['post_id'];
		 $post_content=$row_posts['post'];
		 $post_date=date('H:i:s D-m-d ',strtotime($row_posts['post_date']));

 		 $user_id=$row_posts['user_id'];
	   $user_fullname=$row_posts['fullname'];
	   $user_image=$row_posts['image'];
 	// $get_user="SELECT * FROM users WHERE user_id='$_SESSION[user_id]' AND posts='yes'";
 	// $run_get_user=mysqli_query($connection,$get_user);
 	// $row_user=mysqli_fetch_assoc($run_get_user);
 	// $fullname=$row_user['fullname'];
 	// $image=$row_user['image'];

 	echo "
 		<div class='active tab-pane' id='activity'>
                <!-- Post -->
                <div class='post' style='margin:10px;'>
                  <div class='user-block'>
                    <img class='img-circle img-bordered-sm' src='./admin_area/users/$user_image' alt='user image'>
                        <span class='username'>
                          <a href='#'>$user_fullname</a>
                          <a href='#' class='pull-right btn-box-tool'><i class='fa fa-times'></i></a>
                        </span>
                    <span class='description'>Shared publicly - $post_date</span>
                  </div>
                  <!-- /.user-block -->
                  <p>
                    $post_content
                  </p>
                  <ul class='list-inline'>
                    <li><a href='#' class='link-black text-sm'><i class='fa fa-share margin-r-5'></i> Share</a></li>
                    <li><a href='#' class='link-black text-sm'><i class='fa fa-thumbs-o-up margin-r-5'></i> Like</a>
                    </li>
                    <li class='pull-right'>
                      <a href='#' class='link-black text-sm'><i class='fa fa-comments-o margin-r-5'></i> Comments
                        (5)</a></li>
                  </ul>

                  <input class='form-control input-sm' type='text' placeholder='Type a comment'>
                </div>
             
           
							</div>
							<hr>

 	";
}
	 }

	 }

 	

?>