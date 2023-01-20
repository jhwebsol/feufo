<?php include("includes/db_config.php");
if(isset($_GET['id']))
{ $id = $_GET['id'];
$name = strtolower(str_replace(" ", "-", $_GET['cat_name']));
$sub_name = strtolower(str_replace(" ", "-", $_GET['sub_category_name']));
if(file_exists('../'.$name.'/'.$sub_name)) {
  $dir = "../$name/$sub_name";
  $dir = new RecursiveDirectoryIterator($dir, FilesystemIterator::SKIP_DOTS); 
  $dir = new RecursiveIteratorIterator($dir,RecursiveIteratorIterator::CHILD_FIRST); 
  foreach ( $dir as $file ) {  
      $file->isDir() ?  rmdir($file) : unlink($file); 
  } 
  $dir = "../$name/$sub_name";
  if(rmdir($dir)){
      $sql="
                  DELETE FROM sub_category
                  WHERE id={$_GET['id']}";
      if (mysqli_query($conn,$sql)) {
          echo "  <script> 
                      alert('Your Sub Category have successfully Deleted!!!'); 
                      location.replace('sub-category.php');
                  </script>";
      } else {
          echo "  <script> 
                      alert('Something went wrong, please try again!!!'); 
                      location.replace('sub-category.php');
                  </script>";
      }
  }
}else{
$sql="DELETE FROM sub_category WHERE id={$_GET['id']}";
  if (mysqli_query($conn,$sql)) {
      echo "  <script> 
                  alert('Your Sub Category have successfully Deleted!!!'); 
                  location.replace('sub-category.php');
              </script>";
  } else {
      echo "  <script> 
                  alert('Something went wrong, please try again!!!'); 
                  location.replace('sub-category.php');
              </script>";
  }
}
}
?>