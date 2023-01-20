<?php
include("includes/db_config.php");

if(isset($_GET['id']))
{
	//var_dump($_GET);exit();
	 $id = $_GET['id'];
	 $name = strtolower(str_replace(" ", "-", $_GET['cat_name']));
	if(file_exists('../'.$name)) {
        $dir = "../$name";
        $dir = new RecursiveDirectoryIterator($dir, FilesystemIterator::SKIP_DOTS); 
        $dir = new RecursiveIteratorIterator($dir,RecursiveIteratorIterator::CHILD_FIRST); 
        foreach ( $dir as $file ) {  
            $file->isDir() ?  rmdir($file) : unlink($file); 
        } 
        $dir = "../$name";
        if(rmdir($dir)){
            $sql="
				DELETE FROM category
				WHERE id={$_GET['id']}";
            if (mysqli_query($conn,$sql)) {
                echo "  <script> 
                            alert('Your Category have successfully Deleted!!!'); 
                            location.replace('category.php');
                        </script>";
            } else {
                echo "  <script> 
                            alert('Something went wrong, please try again!!!'); 
                            location.replace('category.php');
                        </script>";
            }
        }
    } else{
    	$sql="
			DELETE FROM category
			WHERE id={$_GET['id']}";
        if (mysqli_query($conn,$sql)) {
            echo "  <script> 
                        alert('Your Category have successfully Deleted!!!'); 
                        location.replace('category.php');
                    </script>";
        } else {
            echo "  <script> 
                        alert('Something went wrong, please try again!!!'); 
                        location.replace('category.php');
                    </script>";
        }
    }
}
?>