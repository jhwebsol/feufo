	<?php
	include("includes/db_config.php");

	if(isset($_GET['id']))
	{
	$id = $_GET['id'];
	if(file_exists("../blog/".strtolower(str_replace(" ", "-", $_GET["blog_url"])).".php")) {
		unlink("../blog/".strtolower(str_replace(" ", "-", $_GET["blog_url"])).".php");
		// exit;
	$sql="
	DELETE FROM blog
	WHERE id={$_GET['id']}";
	$res=mysqli_query($conn,$sql) or die(mysqli_error());
	}


	}
	echo "<script>window.location.href='blog-details.php'</script>";
	?>