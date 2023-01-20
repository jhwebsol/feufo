<?php include("includes/db_config.php");
$id=$_GET["id"];
$sql="select sub_category.sub_category_name,category.cat_name,sub_sub_category.sub_sub_cat_name,product.* from product join category on product.category_id=category.id join sub_category on product.sub_category_id=sub_category.id join sub_sub_category on product.sub_sub_cat_id=sub_sub_category.id where product.id='$id'";
$result = mysqli_query($conn, $sql); 

if(isset($_POST['update']))
{
extract($_POST);
$id=$_GET["id"];
date_default_timezone_set('Asia/Kolkata');
$datetime = date('Y-m-d H:i:s');
$ip=$_SERVER['REMOTE_ADDR']; 
$cat_id=$_POST["category"];
$subcat_id=$_POST["sub_category"];
$product_name=$_POST["prod_name"];
$sql_cat="SELECT * from category where id='$cat_id'";
$exe_cat=mysqli_query($conn,$sql_cat);
$res_cat=mysqli_fetch_array($exe_cat);
$category = strtolower(str_replace(" ", "-", $res_cat['cat_name']));
$sql_scat="SELECT * from sub_category where id='$subcat_id'";
$exe_scat=mysqli_query($conn,$sql_scat);
$res_scat=mysqli_fetch_array($exe_scat);
$sql_sscat=mysqli_query($conn,"SELECT * from sub_sub_category where id='$sub_sub_cat_id'");
$res_sscat=mysqli_fetch_array($sql_sscat);
$subcategory = strtolower(str_replace(" ", "-", $res_scat['sub_category_name']));
$subsubcat = strtolower(str_replace(" ", "-", $res_sscat['sub_sub_cat_name']));
if(file_exists('../$category/$subcategory/$subsubcat')){
  if(strtolower(str_replace(" ", "-", $prod_name)) == strtolower(str_replace(" ", "-", $old_prod_name))) {
    if(file_exists('../'.$category.'/'.$subcategory.'/'.$subsubcat.'/'.strtolower(str_replace(" ", "-", $old_prod_name)).'.php')){
    	$amenities = htmlentities( $_POST['amenities']);
		  $property_desp = htmlentities( $_POST['property_desp']);
      $sql ="UPDATE  product  SET category_id='$cat_id',sub_category_id='$subcat_id',sub_sub_cat_id='$sub_sub_cat_id', property_id='$property_id',prod_name='$product_name',prod_desp='$property_desp',rooms='$rooms',title='$title',meta_keyword='$meta_keyword',price='$price',bedrooms='$bedrooms',bathrooms='$bathrooms',prd_status='$prd_status',year_built='$year_built',garages='$garages',amenities='$amenities',created_date='$datetime',ip_address='$ip' WHERE id='$id'"; 
			$res=mysqli_query($conn,$sql) or die(mysqli_error());
			if($res)
			{
			$sqlg = "SELECT * from product where id = '$id'";
			  $resultg = mysqli_query($conn,$sqlg) or die(mysqli_error());
			  $resg = mysqli_fetch_object($resultg);
			  
			  if($_FILES["prod_img1"]["name"] != ""){
				$oname=$_FILES["prod_img1"]["name"];
				$pos = strrpos($oname, ".");
				$extension=substr($oname,$pos+1);
				$tn = $_FILES["prod_img1"]["tmp_name"];
				$path = "product/".$resg->id.'1'.'.'.$extension;
				$upath = "product/".$resg->prod_img1;
				unlink($upath);
				 move_uploaded_file($tn,$path);
				 $image1 = $resg->id.'1'.'.'.$extension;
				} else {
				  $image1 = $resg->prod_img1;
				}

			if($_FILES["prod_img2"]["name"] != ""){
				$oname=$_FILES["prod_img2"]["name"];
				$pos = strrpos($oname, ".");
				$extension=substr($oname,$pos+1);
				$tn = $_FILES["prod_img2"]["tmp_name"];
				$path = "product/".$resg->id.'2'.'.'.$extension;
				$upath = "product/".$resg->prod_img2;
				unlink($upath);
				 move_uploaded_file($tn,$path);
				 $image2 = $resg->id.'2'.'.'.$extension;
				} else {
				  $image2 = $resg->prod_img2;
				}

			if($_FILES["prod_img3"]["name"] != ""){
				$oname=$_FILES["prod_img3"]["name"];
				$pos = strrpos($oname, ".");
				$extension=substr($oname,$pos+1);
				$tn = $_FILES["prod_img3"]["tmp_name"];
				$path = "product/".$resg->id.'3'.'.'.$extension;
				$upath = "product/".$resg->prod_img3;
				unlink($upath);
				 move_uploaded_file($tn,$path);
				 $image3 = $resg->id.'3'.'.'.$extension;
				} else {
				  $image3 = $resg->prod_img3;
				}

			if($_FILES["prod_img4"]["name"] != ""){
				$oname=$_FILES["prod_img4"]["name"];
				$pos = strrpos($oname, ".");
				$extension=substr($oname,$pos+1);
				$tn = $_FILES["prod_img4"]["tmp_name"];
				$path = "product/".$resg->id.'4'.'.'.$extension;
				$upath = "product/".$resg->prod_img4;
				unlink($upath);
				 move_uploaded_file($tn,$path);
				 $image4 = $resg->id.'4'.'.'.$extension;
				} else {
				  $image4 = $resg->prod_img4;
				}

			if($_FILES["prod_img5"]["name"] != ""){
				$oname=$_FILES["prod_img5"]["name"];
				$pos = strrpos($oname, ".");
				$extension=substr($oname,$pos+1);
				$tn = $_FILES["prod_img5"]["tmp_name"];
				$path = "product/".$resg->id.'5'.'.'.$extension;
				$upath = "product/".$resg->prod_img5;
				unlink($upath);
				 move_uploaded_file($tn,$path);
				 $image5 = $resg->id.'5'.'.'.$extension;
				} else {
				  $image5 = $resg->prod_img5;
				} 
               if($_FILES["route_map"]["name"] != ""){
				$oname=$_FILES["route_map"]["name"];
				$pos = strrpos($oname, ".");
				$extension=substr($oname,$pos+1);
				$tn = $_FILES["route_map"]["tmp_name"];
				$path = "product/".$resg->id.'map'.'.'.$extension;
				$upath = "product/".$resg->routemap;
				unlink($upath);
				 move_uploaded_file($tn,$path);
				 $route_map = $resg->id.'map'.'.'.$extension;
				} else {
				  $route_map = $resg->routemap;
				} 
				if($_FILES["layout"]["name"] != ""){
				$oname=$_FILES["layout"]["name"];
				$pos = strrpos($oname, ".");
				$extension=substr($oname,$pos+1);
				$tn = $_FILES["layout"]["tmp_name"];
				$path = "product/".$resg->id.'lay'.'.'.$extension;
				$upath = "product/".$resg->layout;
				unlink($upath);
				 move_uploaded_file($tn,$path);
				 $layout = $resg->id.'lay'.'.'.$extension;
				} else {
				  $layout = $resg->layout;
				} 
		$vdfile_name = $_FILES['video_file']['name'];
    $vdext = pathinfo($_FILES["video_file"]["name"], PATHINFO_EXTENSION);
    $rands = md5(uniqid().rand());
     $video_files = $rands.".".$vdext;
     $vdfile_size = $_FILES['video_file']['size'];
    $allowed_extensions = array("webm", "mp4", "ogv");
    $file_size_max = 2147483648;
    $pattern = implode ($allowed_extensions, "|");
    $vdfile_type = end(explode(".", $vdfile_name));
    if (!empty($vdfile_name))
    { 
        if (preg_match("/({$pattern})$/i", $vdfile_name) )
        {
            if (($vdfile_type == "webm") || ($vdfile_type == "mp4") || ($vdfile_type == "ogv"))
            {
                if ($_FILES['video_file']['error'] > 0)
                {
                    echo "Unexpected error occured, please try again later.";
                } else {
                    if (file_exists("product/video/".$vdfile_name))
                    {
                        echo $vdfile_name." already exists.";
                    } else {
                        move_uploaded_file($_FILES["video_file"]["tmp_name"], "product/video/".$video_files);
                        echo "Stored in: " . "product/video/".$video_files;
                    }
                }
            } else { echo "<script>alert('Invalid video format!!!'); 
	                        </script>";
            }
        }else{ echo "<script>alert('Video size is more please upload another video!!!'); 
	                        </script>";
        }
    } 
			$sqlup = "UPDATE product SET  prod_img1 =  '$image1',prod_img2 =  '$image2',prod_img3 =  '$image3',prod_img4 =  '$image4',prod_img5 =  '$image5' ,routemap =  '$route_map',layout ='$layout',video ='$video_files' WHERE id = $resg->id";
				$resultup = mysqli_query($conn,$sqlup) or die(mysqli_error());
				if($resultup)
				{ 
			   echo "<script>document.location.href='property.php'</script>";
			   }		
			}
      }  else{
		if(copy('../property-detail.php', '../'.$category.'/'.$subcategory.'/'.$subsubcat.'/'.strtolower(str_replace(" ", "-", $old_prod_name)).'.php')) {
			  $amenities = htmlentities( $_POST['amenities']);
		    $property_desp = htmlentities( $_POST['property_desp']);
				$sql ="UPDATE  product  SET category_id='$cat_id',sub_category_id='$subcat_id',sub_sub_cat_id='$sub_sub_cat_id', property_id='$property_id',prod_name='$product_name',prod_desp='$property_desp',rooms='$rooms',title='$title',meta_keyword='$meta_keyword',price='$price',bedrooms='$bedrooms',bathrooms='$bathrooms',prd_status='$prd_status',year_built='$year_built',garages='$garages',amenities='$amenities',created_date='$datetime',ip_address='$ip' WHERE id='$id'"; 
			$res=mysqli_query($conn,$sql) or die(mysqli_error());
			if($res)
			{
			$sqlg = "SELECT * from product where id = $id";
			  $resultg = mysqli_query($conn,$sqlg) or die(mysqli_error());
			  $resg = mysqli_fetch_object($resultg);
			  
			  if($_FILES["prod_img1"]["name"] != ""){
				$oname=$_FILES["prod_img1"]["name"];
				$pos = strrpos($oname, ".");
				$extension=substr($oname,$pos+1);
				$tn = $_FILES["prod_img1"]["tmp_name"];
				$path = "product/".$resg->id.'1'.'.'.$extension;
				$upath = "product/".$resg->prod_img1;
				unlink($upath);
				 move_uploaded_file($tn,$path);
				 $image1 = $resg->id.'1'.'.'.$extension;
				} else {
				  $image1 = $resg->prod_img1;
				}

			if($_FILES["prod_img2"]["name"] != ""){
				$oname=$_FILES["prod_img2"]["name"];
				$pos = strrpos($oname, ".");
				$extension=substr($oname,$pos+1);
				$tn = $_FILES["prod_img2"]["tmp_name"];
				$path = "product/".$resg->id.'2'.'.'.$extension;
				$upath = "product/".$resg->prod_img2;
				unlink($upath);
				 move_uploaded_file($tn,$path);
				 $image2 = $resg->id.'2'.'.'.$extension;
				} else {
				  $image2 = $resg->prod_img2;
				}

			if($_FILES["prod_img3"]["name"] != ""){
				$oname=$_FILES["prod_img3"]["name"];
				$pos = strrpos($oname, ".");
				$extension=substr($oname,$pos+1);
				$tn = $_FILES["prod_img3"]["tmp_name"];
				$path = "product/".$resg->id.'3'.'.'.$extension;
				$upath = "product/".$resg->prod_img3;
				unlink($upath);
				 move_uploaded_file($tn,$path);
				 $image3 = $resg->id.'3'.'.'.$extension;
				} else {
				  $image3 = $resg->prod_img3;
				}

			if($_FILES["prod_img4"]["name"] != ""){
				$oname=$_FILES["prod_img4"]["name"];
				$pos = strrpos($oname, ".");
				$extension=substr($oname,$pos+1);
				$tn = $_FILES["prod_img4"]["tmp_name"];
				$path = "product/".$resg->id.'4'.'.'.$extension;
				$upath = "product/".$resg->prod_img4;
				unlink($upath);
				 move_uploaded_file($tn,$path);
				 $image4 = $resg->id.'4'.'.'.$extension;
				} else {
				  $image4 = $resg->prod_img4;
				}

			if($_FILES["prod_img5"]["name"] != ""){
				$oname=$_FILES["prod_img5"]["name"];
				$pos = strrpos($oname, ".");
				$extension=substr($oname,$pos+1);
				$tn = $_FILES["prod_img5"]["tmp_name"];
				$path = "product/".$resg->id.'5'.'.'.$extension;
				$upath = "product/".$resg->prod_img5;
				unlink($upath);
				 move_uploaded_file($tn,$path);
				 $image5 = $resg->id.'5'.'.'.$extension;
				} else {
				  $image5 = $resg->prod_img5;
				} 
                 if($_FILES["route_map"]["name"] != ""){
				$oname=$_FILES["route_map"]["name"];
				$pos = strrpos($oname, ".");
				$extension=substr($oname,$pos+1);
				$tn = $_FILES["route_map"]["tmp_name"];
				$path = "product/".$resg->id.'map'.'.'.$extension;
				$upath = "product/".$resg->routemap;
				unlink($upath);
				 move_uploaded_file($tn,$path);
				 $route_map = $resg->id.'map'.'.'.$extension;
				} else {
				  $route_map = $resg->routemap;
				} 
		       if($_FILES["layout"]["name"] != ""){
				$oname=$_FILES["layout"]["name"];
				$pos = strrpos($oname, ".");
				$extension=substr($oname,$pos+1);
				$tn = $_FILES["layout"]["tmp_name"];
				$path = "product/".$resg->id.'lay'.'.'.$extension;
				$upath = "product/".$resg->layout;
				unlink($upath);
				 move_uploaded_file($tn,$path);
				 $layout = $resg->id.'lay'.'.'.$extension;
				} else {
				  $layout = $resg->layout;
				} 
				$vdfile_name = $_FILES['video_file']['name'];
    $vdext = pathinfo($_FILES["video_file"]["name"], PATHINFO_EXTENSION);
    $rands = md5(uniqid().rand());
     $video_files = $rands.".".$vdext;
     $vdfile_size = $_FILES['video_file']['size'];
    $allowed_extensions = array("webm", "mp4", "ogv");
    $file_size_max = 2147483648;
    $pattern = implode ($allowed_extensions, "|");
    $vdfile_type = end(explode(".", $vdfile_name));
    if (!empty($vdfile_name))
    { 
        if (preg_match("/({$pattern})$/i", $vdfile_name) )
        {
            if (($vdfile_type == "webm") || ($vdfile_type == "mp4") || ($vdfile_type == "ogv"))
            {
                if ($_FILES['video_file']['error'] > 0)
                {
                    echo "Unexpected error occured, please try again later.";
                } else {
                    if (file_exists("product/video/".$vdfile_name))
                    {
                        echo $vdfile_name." already exists.";
                    } else {
                        move_uploaded_file($_FILES["video_file"]["tmp_name"], "product/video/".$video_files);
                        echo "Stored in: " . "product/video/".$video_files;
                    }
                }
            } else { echo "<script>alert('Invalid video format!!!'); 
	                        </script>";
            }
        }else{ echo "<script>alert('Video size is more please upload another video!!!'); 
	                        </script>";
        }
    } 
			$sqlup = "UPDATE product SET  prod_img1 =  '$image1',prod_img2 =  '$image2',prod_img3 =  '$image3',prod_img4 =  '$image4',prod_img5 =  '$image5' ,routemap =  '$route_map',layout =  '$layout',video ='$video_files' WHERE id = $resg->id";
				$resultup = mysqli_query($conn,$sqlup) or die(mysqli_error());
				if($resultup)
				{ 
			   echo "<script>document.location.href='property.php'</script>";
			   }		
			}

				}
			}
		  }
		}else{
			if(file_exists('../'.$category.'/'.$subcategory.'/'.$subsubcat.'/'.$strtolower(str_replace(" ", "-", $old_prod_name)).'.php')){
     	if(rename("../$category/$subcategory/$subsubcat/".strtolower(str_replace(" ", "-", $old_prod_name)).".php", "../$category/$subcategory/$subsubcat/".strtolower(str_replace(" ", "-", $prod_name)).".php")){
         $amenities = htmlentities( $_POST['amenities']);
		     $property_desp = htmlentities( $_POST['property_desp']);
   $sql ="UPDATE  product  SET category_id='$cat_id',sub_category_id='$subcat_id',sub_sub_cat_id='$sub_sub_cat_id', property_id='$property_id',prod_name='$product_name',prod_desp='$property_desp',rooms='$rooms',title='$title',meta_keyword='$meta_keyword',price='$price',bedrooms='$bedrooms',bathrooms='$bathrooms',prd_status='$prd_status',year_built='$year_built',garages='$garages',amenities='$amenities',created_date='$datetime',ip_address='$ip' WHERE id='$id'"; 
			$res=mysqli_query($conn,$sql) or die(mysqli_error());
			if($res)
			{
			$sqlg = "SELECT * from product where id = $id";
			  $resultg = mysqli_query($conn,$sqlg) or die(mysqli_error());
			  $resg = mysqli_fetch_object($resultg);
			  
			  if($_FILES["prod_img1"]["name"] != ""){
				$oname=$_FILES["prod_img1"]["name"];
				$pos = strrpos($oname, ".");
				$extension=substr($oname,$pos+1);
				$tn = $_FILES["prod_img1"]["tmp_name"];
				$path = "product/".$resg->id.'1'.'.'.$extension;
				$upath = "product/".$resg->prod_img1;
				unlink($upath);
				 move_uploaded_file($tn,$path);
				 $image1 = $resg->id.'1'.'.'.$extension;
				} else {
				  $image1 = $resg->prod_img1;
				}

			if($_FILES["prod_img2"]["name"] != ""){
				$oname=$_FILES["prod_img2"]["name"];
				$pos = strrpos($oname, ".");
				$extension=substr($oname,$pos+1);
				$tn = $_FILES["prod_img2"]["tmp_name"];
				$path = "product/".$resg->id.'2'.'.'.$extension;
				$upath = "product/".$resg->prod_img2;
				unlink($upath);
				 move_uploaded_file($tn,$path);
				 $image2 = $resg->id.'2'.'.'.$extension;
				} else {
				  $image2 = $resg->prod_img2;
				}

			if($_FILES["prod_img3"]["name"] != ""){
				$oname=$_FILES["prod_img3"]["name"];
				$pos = strrpos($oname, ".");
				$extension=substr($oname,$pos+1);
				$tn = $_FILES["prod_img3"]["tmp_name"];
				$path = "product/".$resg->id.'3'.'.'.$extension;
				$upath = "product/".$resg->prod_img3;
				unlink($upath);
				 move_uploaded_file($tn,$path);
				 $image3 = $resg->id.'3'.'.'.$extension;
				} else {
				  $image3 = $resg->prod_img3;
				}

			if($_FILES["prod_img4"]["name"] != ""){
				$oname=$_FILES["prod_img4"]["name"];
				$pos = strrpos($oname, ".");
				$extension=substr($oname,$pos+1);
				$tn = $_FILES["prod_img4"]["tmp_name"];
				$path = "product/".$resg->id.'4'.'.'.$extension;
				$upath = "product/".$resg->prod_img4;
				unlink($upath);
				 move_uploaded_file($tn,$path);
				 $image4 = $resg->id.'4'.'.'.$extension;
				} else {
				  $image4 = $resg->prod_img4;
				}

			if($_FILES["prod_img5"]["name"] != ""){
				$oname=$_FILES["prod_img5"]["name"];
				$pos = strrpos($oname, ".");
				$extension=substr($oname,$pos+1);
				$tn = $_FILES["prod_img5"]["tmp_name"];
				$path = "product/".$resg->id.'5'.'.'.$extension;
				$upath = "product/".$resg->prod_img5;
				unlink($upath);
				 move_uploaded_file($tn,$path);
				 $image5 = $resg->id.'5'.'.'.$extension;
				} else {
				  $image5 = $resg->prod_img5;
				} 

               if($_FILES["route_map"]["name"] != ""){
				$oname=$_FILES["route_map"]["name"];
				$pos = strrpos($oname, ".");
				$extension=substr($oname,$pos+1);
				$tn = $_FILES["route_map"]["tmp_name"];
				$path = "product/".$resg->id.'map'.'.'.$extension;
				$upath = "product/".$resg->routemap;
				unlink($upath);
				 move_uploaded_file($tn,$path);
				 $route_map = $resg->id.'map'.'.'.$extension;
				} else {
				  $route_map = $resg->routemap;
				} 
			   if($_FILES["layout"]["name"] != ""){
				$oname=$_FILES["layout"]["name"];
				$pos = strrpos($oname, ".");
				$extension=substr($oname,$pos+1);
				$tn = $_FILES["layout"]["tmp_name"];
				$path = "product/".$resg->id.'lay'.'.'.$extension;
				$upath = "product/".$resg->layout;
				unlink($upath);
				 move_uploaded_file($tn,$path);
				 $layout = $resg->id.'lay'.'.'.$extension;
				} else {
				  $layout = $resg->layout;
				} 
				$vdfile_name = $_FILES['video_file']['name'];
    $vdext = pathinfo($_FILES["video_file"]["name"], PATHINFO_EXTENSION);
    $rands = md5(uniqid().rand());
     $video_files = $rands.".".$vdext;
     $vdfile_size = $_FILES['video_file']['size'];
    $allowed_extensions = array("webm", "mp4", "ogv");
    $file_size_max = 2147483648;
    $pattern = implode ($allowed_extensions, "|");
    $vdfile_type = end(explode(".", $vdfile_name));
    if (!empty($vdfile_name))
    { 
        if (preg_match("/({$pattern})$/i", $vdfile_name) )
        {
            if (($vdfile_type == "webm") || ($vdfile_type == "mp4") || ($vdfile_type == "ogv"))
            {
                if ($_FILES['video_file']['error'] > 0)
                {
                    echo "Unexpected error occured, please try again later.";
                } else {
                    if (file_exists("product/video/".$vdfile_name))
                    {
                        echo $vdfile_name." already exists.";
                    } else {
                        move_uploaded_file($_FILES["video_file"]["tmp_name"], "product/video/".$video_files);
                        echo "Stored in: " . "product/video/".$video_files;
                    }
                }
            } else { echo "<script>alert('Invalid video format!!!'); 
	                        </script>";
            }
        }else{ echo "<script>alert('Video size is more please upload another video!!!'); 
	                        </script>";
        }
    } 
			  $sqlup = "UPDATE product SET  prod_img1 =  '$image1',prod_img2 =  '$image2',prod_img3 =  '$image3',prod_img4 =  '$image4',prod_img5 =  '$image5' ,routemap =  '$route_map',layout =  '$layout',video ='$video_files' WHERE id = $resg->id";
				$resultup = mysqli_query($conn,$sqlup) or die(mysqli_error());
				if($resultup)
				{ 
			   echo "<script>document.location.href='property.php'</script>";
			   }		
			 }
      }
     } else{   if(copy('../property-detail.php', '../'.$category.'/'.$subcategory.'/'.$subsubcat.'/'.strtolower(str_replace(" ", "-", $prod_name)).'.php')) {
			$prod_name=mysqli_real_escape_string($conn,$_POST['prod_name']);
			$amenities = htmlentities( $_POST['amenities']);
		  $property_desp = htmlentities( $_POST['property_desp']);
      $sql ="UPDATE  product  SET category_id='$cat_id',sub_category_id='$subcat_id',sub_sub_cat_id='$sub_sub_cat_id', property_id='$property_id',prod_name='$product_name',prod_desp='$property_desp',rooms='$rooms',title='$title',meta_keyword='$meta_keyword',price='$price',bedrooms='$bedrooms',bathrooms='$bathrooms',prd_status='$prd_status',year_built='$year_built',garages='$garages',amenities='$amenities',created_date='$datetime',ip_address='$ip' WHERE id='$id'"; 
			$res=mysqli_query($conn,$sql) or die(mysqli_error());
			if($res)
			{
			$sqlg = "SELECT * from product where id = '$id'";
			  $resultg = mysqli_query($conn,$sqlg) or die(mysqli_error());
			  $resg = mysqli_fetch_object($resultg);
			  
			  if($_FILES["prod_img1"]["name"] != ""){
				$oname=$_FILES["prod_img1"]["name"];
				$pos = strrpos($oname, ".");
				$extension=substr($oname,$pos+1);
				$tn = $_FILES["prod_img1"]["tmp_name"];
				$path = "product/".$resg->id.'1'.'.'.$extension;
				$upath = "product/".$resg->prod_img1;
				unlink($upath);
				 move_uploaded_file($tn,$path);
				 $image1 = $resg->id.'1'.'.'.$extension;
				} else {
				  $image1 = $resg->prod_img1;
				}

			if($_FILES["prod_img2"]["name"] != ""){
				$oname=$_FILES["prod_img2"]["name"];
				$pos = strrpos($oname, ".");
				$extension=substr($oname,$pos+1);
				$tn = $_FILES["prod_img2"]["tmp_name"];
				$path = "product/".$resg->id.'2'.'.'.$extension;
				$upath = "product/".$resg->prod_img2;
				unlink($upath);
				 move_uploaded_file($tn,$path);
				 $image2 = $resg->id.'2'.'.'.$extension;
				} else {
				  $image2 = $resg->prod_img2;
				}

			if($_FILES["prod_img3"]["name"] != ""){
				$oname=$_FILES["prod_img3"]["name"];
				$pos = strrpos($oname, ".");
				$extension=substr($oname,$pos+1);
				$tn = $_FILES["prod_img3"]["tmp_name"];
				$path = "product/".$resg->id.'3'.'.'.$extension;
				$upath = "product/".$resg->prod_img3;
				unlink($upath);
				 move_uploaded_file($tn,$path);
				 $image3 = $resg->id.'3'.'.'.$extension;
				} else {
				  $image3 = $resg->prod_img3;
				}

			if($_FILES["prod_img4"]["name"] != ""){
				$oname=$_FILES["prod_img4"]["name"];
				$pos = strrpos($oname, ".");
				$extension=substr($oname,$pos+1);
				$tn = $_FILES["prod_img4"]["tmp_name"];
				$path = "product/".$resg->id.'4'.'.'.$extension;
				$upath = "product/".$resg->prod_img4;
				unlink($upath);
				 move_uploaded_file($tn,$path);
				 $image4 = $resg->id.'4'.'.'.$extension;
				} else {
				  $image4 = $resg->prod_img4;
				}

			if($_FILES["prod_img5"]["name"] != ""){
				$oname=$_FILES["prod_img5"]["name"];
				$pos = strrpos($oname, ".");
				$extension=substr($oname,$pos+1);
				$tn = $_FILES["prod_img5"]["tmp_name"];
				$path = "product/".$resg->id.'5'.'.'.$extension;
				$upath = "product/".$resg->prod_img5;
				unlink($upath);
				 move_uploaded_file($tn,$path);
				 $image5 = $resg->id.'5'.'.'.$extension;
				} else {
				  $image5 = $resg->prod_img5;
				} 
		       if($_FILES["route_map"]["name"] != ""){
				$oname=$_FILES["route_map"]["name"];
				$pos = strrpos($oname, ".");
				$extension=substr($oname,$pos+1);
				$tn = $_FILES["route_map"]["tmp_name"];
				$path = "product/".$resg->id.'map'.'.'.$extension;
				$upath = "product/".$resg->routemap;
				unlink($upath);
				 move_uploaded_file($tn,$path);
				 $route_map = $resg->id.'map'.'.'.$extension;
				} else {
				  $route_map = $resg->routemap;
				} 
			    if($_FILES["layout"]["name"] != ""){
				$oname=$_FILES["layout"]["name"];
				$pos = strrpos($oname, ".");
				$extension=substr($oname,$pos+1);
				$tn = $_FILES["layout"]["tmp_name"];
				$path = "product/".$resg->id.'lay'.'.'.$extension;
				$upath = "product/".$resg->layout;
				unlink($upath);
				 move_uploaded_file($tn,$path);
				 $layout = $resg->id.'lay'.'.'.$extension;
				} else {
				  $layout = $resg->layout;
				} 
				$vdfile_name = $_FILES['video_file']['name'];
    $vdext = pathinfo($_FILES["video_file"]["name"], PATHINFO_EXTENSION);
    $rands = md5(uniqid().rand());
     $video_files = $rands.".".$vdext;
     $vdfile_size = $_FILES['video_file']['size'];
    $allowed_extensions = array("webm", "mp4", "ogv");
    $file_size_max = 2147483648;
    $pattern = implode ($allowed_extensions, "|");
    $vdfile_type = end(explode(".", $vdfile_name));
    if (!empty($vdfile_name))
    { 
        if (preg_match("/({$pattern})$/i", $vdfile_name) )
        {
            if (($vdfile_type == "webm") || ($vdfile_type == "mp4") || ($vdfile_type == "ogv"))
            {
                if ($_FILES['video_file']['error'] > 0)
                {
                    echo "Unexpected error occured, please try again later.";
                } else {
                    if (file_exists("product/video/".$vdfile_name))
                    {
                        echo $vdfile_name." already exists.";
                    } else {
                        move_uploaded_file($_FILES["video_file"]["tmp_name"], "product/video/".$video_files);
                        echo "Stored in: " . "product/video/".$video_files;
                    }
                }
            } else { echo "<script>alert('Invalid video format!!!'); 
	                        </script>";
            }
        }else{ echo "<script>alert('Video size is more please upload another video!!!'); 
	                        </script>";
        }
    } 
			$sqlup = "UPDATE product SET  prod_img1 =  '$image1',prod_img2 =  '$image2',prod_img3 =  '$image3',prod_img4 =  '$image4',prod_img5 =  '$image5' ,routemap =  '$route_map',layout =  '$layout',video ='$video_files' WHERE id = $resg->id";
				$resultup = mysqli_query($conn,$sqlup) or die(mysqli_error());
				if($resultup)
				{ 
			    echo "<script>document.location.href='property.php'</script>";
			   }		
			}
	      }

        }
      }
  }

?>

<!DOCTYPE html>
<html lang="en-IN">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">	
	<title>Feufo</title>
	<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
	<?php include("includes/css.php")?>
</head>

<body class="hold-transition skin-blue sidebar-mini">
	<div class="wrapper">
		<?php include("includes/header.php")?>
		<?php include("includes/sidebar.php")?>
		<!-- Content Wrapper. Contains page content -->
		<div class="content-wrapper">
			<!-- Content Header (Page header) -->
			<!-- Main content -->
			<section class="content">
				<div class="row">
					<div class="col-md-12">
						<div class="box box-danger">
							<div class="box-header">
								<h3 class="box-title">Edit Property Details</h3>
							</div>
							<div class="box-body">
								<form method="post" action="" enctype="multipart/form-data">
									<div class="form-group">
										<?php $res= mysqli_fetch_array($result); ?>
										<div class="col-md-4">
											<label>Category:</label>
											<div class="input-group">
												<div class="input-group-addon">
													<i class="fa fa-suitcase"></i>
												</div>
													<select name="category" id="cat_id" class="form-control">
												<option value="<?php echo $res['category_id'];?>"><?php echo $res['cat_name'];?></option>
												 <?php
										            $sql2="SELECT * from category";
										            $exe2=mysqli_query($conn,$sql2);
										            while ($res2=mysqli_fetch_array($exe2))
										            {
										            ?>
										            <option value="<?php echo $res2['id']; ?>"><?php echo $res2['cat_name'];?></option>
										            <?php
										            }
										            ?>
											</select>
											</div>
										</div>
										<div class="col-md-4">
											<label>Sub-Category:</label>
											<div class="input-group">
												<div class="input-group-addon">
													<i class="fa fa-suitcase"></i>
												</div>
												<select name="sub_category" id="sub_cat" class="form-control">
												<option value="<?php echo $res['sub_category_id'];?>"><?php echo $res['sub_category_name'];?></option>
												</select>
											</div>
										</div>
										 <div class="col-md-4">
											<label>Sub-Sub-Category:</label>
											<div class="input-group">
												<div class="input-group-addon">
													<i class="fa fa-suitcase"></i>
												</div>
												<select name="sub_sub_category_id" id="subsub_cat" class="form-control">
												<option>Select</option>
												</select>
											</div>
										</div> 
										
										<div class="col-md-4">
											<label> Property Name:</label>
											<div class="input-group">
												<div class="input-group-addon">
													<i class="fa fa-suitcase"></i>
												</div>
												<input type="text" name="prod_name" class="form-control" value="<?php echo $res['prod_name'];?>" placeholder="Enter Property Name ">
												<input type="hidden" name="old_prod_name" value="<?php echo $res['prod_name']; ?>">
											</div>
										</div>
										
										<div class="col-md-12">
											<label>Title:</label>
											<div class="input-group">
												<div class="input-group-addon">
													<i class="fa fa-suitcase"></i>
												</div>
												<input type="text" name="title" value="<?php echo $res['title'];?>" class="form-control" placeholder="Enter Title ">
											</div>
										</div>
										
										<div class="col-md-12">
											<label> Meta Keyword:</label>
											<div class="input-group">
												<div class="input-group-addon">
													<i class="fa fa-suitcase"></i>
												</div>
												<textarea class="form-control" rows="5" name="meta_keyword" placeholder="Meta Keyword "><?php echo $res['meta_keyword'];?></textarea>
											</div>
										</div>
										<div class="col-md-4">
											<label> Property Id:</label>
											<div class="input-group">
												<div class="input-group-addon">
													<i class="fa fa-suitcase"></i>
												</div>
												<input type="text" name="property_id" class="form-control" value="<?php echo $res['property_id'];?>" placeholder="Enter Property Id ">
											</div>
										</div>
										
										<div class="col-md-4">
											<label> Property Price:</label>
											<div class="input-group">
												<div class="input-group-addon">
													<i class="fa fa-suitcase"></i>
												</div>
												<input type="text" name="price" value="<?php echo $res['price'];?>" class="form-control" placeholder="Enter Property price ">
											</div>
										</div>
										 <div class="col-md-4">
											<label> Bedrooms:</label>
											<div class="input-group">
												<div class="input-group-addon">
													<i class="fa fa-suitcase"></i>
												</div>
												<input type="text" name="bedrooms" class="form-control" value="<?php echo $res['bedrooms'];?>" placeholder="Enter Bedrooms">
											</div>
										</div>
										
										<div class="col-md-4">
											<label> Bathrooms:</label>
											<div class="input-group">
												<div class="input-group-addon">
													<i class="fa fa-suitcase"></i>
												</div>
												<textarea class="form-control" name="bathrooms" rows="1" placeholder="Enter Bathrooms"><?php echo $res['bathrooms'];?></textarea>
											</div>
										</div> 
										<div class="col-md-4">
											<label>Rooms:</label>
											<div class="input-group">
												<div class="input-group-addon">
													<i class="fa fa-suitcase"></i>
												</div>
												<input type="text" name="rooms" class="form-control" value="<?php echo $res['rooms'];?>" placeholder="Enter Property size ">
											</div>
										</div>
										<div class="col-md-4">
											<label>Garages :</label>
											<div class="input-group">
												<div class="input-group-addon">
													<i class="fa fa-suitcase"></i>
												</div>
												<input type="text" name="garages"  value="<?php echo $res['garages'];?>" class="form-control" placeholder="Enter Property Size ">
											</div>
										</div>
										<div class="col-md-12">
											<label> Property Description:</label>
											<div class="input-group">
												<div class="input-group-addon">
													<i class="fa fa-suitcase"></i>
												</div>
												<textarea class="ckeditor" name="property_desp" rows="5" placeholder="Enter Property Description"><?php echo $res['prod_desp'];?></textarea>
											</div>
										</div>
										<!-- <div class="col-md-12">
											<label> Available From:</label>
											<div class="input-group">
												<div class="input-group-addon">
													<i class="fa fa-suitcase"></i>
												</div>
												<input type="date" value="<?php echo $res['available_from'];?>" name="available_from" class="form-control">
											</div>
										</div> -->
										<div class="col-md-12">
											<label> Property Status:</label>
											<div class="input-group">
												<div class="input-group-addon">
													<i class="fa fa-suitcase"></i>
												</div>
												<input type="text" value="<?php echo $res['prd_status'];?>" name="prd_status" class="form-control">
											</div>
										</div>
										<div class="col-md-12">
											<label>Year:</label>
											<div class="input-group">
												<div class="input-group-addon">
													<i class="fa fa-suitcase"></i>
												</div>
												<input type="text" value="<?php echo $res['year_built'];?>" name="year_built" class="form-control">
											</div>
										</div>
										<!-- <div class="col-md-12">
											<label>Garages:</label>
											<div class="input-group">
												<div class="input-group-addon">
													<i class="fa fa-suitcase"></i>
												</div>
												<input type="text" value="<?php echo $res['garages'];?>" name="garages" class="form-control">
											</div>
										</div>
										<div class="col-md-12">
											<label>Cross Streets:</label>
											<div class="input-group">
												<div class="input-group-addon">
													<i class="fa fa-suitcase"></i>
												</div>
												<input type="text" value="<?php echo $res['cross_streets'];?>" name="cross_streets" class="form-control">
											</div>
										</div>
										<div class="col-md-12">
											<label>Floors:</label>
											<div class="input-group">
												<div class="input-group-addon">
													<i class="fa fa-suitcase"></i>
												</div>
												<input type="text" value="<?php echo $res['floors'];?>" name="floors" class="form-control">
											</div>
										</div>
										<div class="col-md-12">
											<label>Plumbing:</label>
											<div class="input-group">
												<div class="input-group-addon">
													<i class="fa fa-suitcase"></i>
												</div>
												<input type="text" value="<?php echo $res['plumbing'];?>" name="plumbing" class="form-control">
											</div>
										</div> -->
										<div class="col-md-12">
											<label>Amenities:</label>
											<div class="input-group">
												<div class="input-group-addon">
													<i class="fa fa-suitcase"></i>
												</div>
												<textarea class="ckeditor" rows="5" name="amenities" placeholder="Amenities"><?php echo $res['amenities'];?></textarea>
											</div>
										</div>
										
										<div class="col-md-4">
											<label> Product Images 1:</label>
											<div class="input-group">
												<div class="input-group-addon">
													<i class="fa fa-suitcase"></i>
												</div>
												<input type="File"  name="prod_img1" class="form-control">
												 <br/><img src="product/<?php echo $res['prod_img1'];?>" width="60px">
											</div>
										</div>
										<div class="col-md-4">
											<label> Product Images 2:</label>
											<div class="input-group">
												<div class="input-group-addon">
													<i class="fa fa-suitcase"></i>
												</div>
												<input type="File" name="prod_img2" class="form-control">
												 <br/><img src="product/<?php echo $res['prod_img2'];?>" width="60px">
											</div>
										</div>
										<div class="col-md-4">
											<label> Product Images 3:</label>
											<div class="input-group">
												<div class="input-group-addon">
													<i class="fa fa-suitcase"></i>
												</div>
												<input type="File" name="prod_img3" class="form-control">
												 <br/><img src="product/<?php echo $res['prod_img3'];?>" width="60px">
											</div>
										</div>
										<div class="col-md-4">
											<label> Product Images 4:</label>
											<div class="input-group">
												<div class="input-group-addon">
													<i class="fa fa-suitcase"></i>
												</div>
												<input type="File" name="prod_img4" class="form-control">
												 <br/><img src="product/<?php echo $res['prod_img4'];?>" width="60px">
											</div>
										</div>
										<div class="col-md-4">
											<label> Product Images 5:</label>
											<div class="input-group">
												<div class="input-group-addon">
													<i class="fa fa-suitcase"></i>
												</div>
												<input type="File" name="prod_img5" class="form-control">
												 <br/><img src="product/<?php echo $res['prod_img5'];?>" width="60px">
											</div>
										</div>
										<div class="col-md-4">
											<label> Video:</label>
											<div class="input-group">
												<div class="input-group-addon">
													<i class="fa fa-suitcase"></i>
												</div>
												<input type="File" name="video_file" class="form-control">
											</div>
										</div>
										<div class="col-md-4">
											<label>Route Map:</label>
											<div class="input-group">
												<div class="input-group-addon">
													<i class="fa fa-suitcase"></i>
												</div>
												<input type="File" name="route_map" class="form-control">
												 <br/><img src="product/<?php echo $res['routemap'];?>" width="60px">
											</div>
										</div>
										<div class="col-md-4">
											<label>Floor Plans:</label>
											<div class="input-group">
												<div class="input-group-addon">
													<i class="fa fa-suitcase"></i>
												</div>
												<input type="File" name="layout" class="form-control">
												 <br/><img src="product/<?php echo $res['layout'];?>" width="60px">
											</div>
										</div>
									</div>
									<div class="clearfix"></div>
									
									<div class="col-md-4 mt-20">
										<div class="form-group">
											<input type="submit" name="update" class="btn btn-success btn-md" value="Submit">
										</div>
									</div>
								</form>
							</div>
							
						</div>
					</div>
				</div>
			</section>
		</div>
		<?php include("includes/footer.php")?>
	</div>
	<?php include("includes/js.php")?>
</body>
<script type="text/javascript">
	$(document).ready(function(){
		    $('#cat_id').on('change', function(){
		        var cat_id = $(this).val();
		        if(cat_id){
		            $.ajax({
		                type:'POST',
		                url:'ajax_get_subsub_cat.php',
		                data:'cat_id='+cat_id,
		                success:function(html){
		                    $('#sub_cat').html(html);
		                   // console.log(html);
		                   // $('#city').html('<option value="">Select Division</option>'); 
		                }
		            }); 
		        }
		    });

		    	$('#sub_cat').on('change', function(){
		        var scat_id = $(this).val();
		        if(scat_id){
		            $.ajax({
		                type:'POST',
		                url:'ajax_get_subsub_cat.php',
		                data:'scat_id='+scat_id,
		                success:function(html){
		                    $('#subsub_cat').html(html);
		                }
		            }); 
		        }
		    });
        });
</script>

</html>
