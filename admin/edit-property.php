<?php include("includes/css.php");
if(isset($_POST['update']))
{ extract($_POST);
$id=$_GET["id"];
date_default_timezone_set('Asia/Kolkata');
$datetime = date('Y-m-d H:i:s');
$ip=$_SERVER['REMOTE_ADDR'];
$uid=$_SESSION['uid']; 
$map_link = mysqli_real_escape_string($conn,$map_link);
$video = mysqli_real_escape_string($conn,$video);
$prod_name = $slug;
$old_prod_name = $slug_old;
$uid="Admin"; 
if(file_exists('../property-services')){
  if(strtolower(str_replace(" ", "-", $prod_name)) == strtolower(str_replace(" ", "-", $old_prod_name))) {
    if(file_exists('../property-services/'.strtolower(str_replace(" ", "-", $old_prod_name)).'.php')){
      $property_desp = htmlentities( $_POST['desp']);
      $sqls ="UPDATE  es_property  SET property_added='$uid',property_type='$property_type',property_for='$ptype', nearest_location='$nearest_location',distances='$distances',country='$country',state='$state',city='$city',room='$rooms',address='$address',property_name='$title',slug='$prod_name',desp='$property_desp',price='$price',property_status='$status',status='$status',period='$period',room='$room',bathrooms='$bathrooms',bedroom='$bedroom',kitchen='$kitchen',parking_place='$parking',created_now='$datetime',floor_no='$floor',website='$website',area='$area',area_unit='$unit',map_link='$map_link',video='$video_link',con_phone='$phone',con_email='$email',con_address='$address',con_address='$address',ip_address='$ip',urgent_property='$urgent_property',top_property='$top_property',featured='$featured' WHERE id='$id'"; echo $sqls; 
            $ress=mysqli_query($conn,$sqls);
            if($ress)
            {  $sqlg = "SELECT * from es_property where id = '$id'";
               $resultg = mysqli_query($conn,$sqlg) or die(mysqli_error($conn));
               $resg = mysqli_fetch_object($resultg);
               if($_FILES["pdf_file"]["name"] != ""){
                $oname=$_FILES["pdf_file"]["name"];
                $pos = strrpos($oname, ".");
                $extension=substr($oname,$pos+1);
                $tn = $_FILES["pdf_file"]["tmp_name"];
                $path = "product/".$resg->id.'map'.'.'.$extension;
                $upath = "product/".$resg->pdf_file;
                unlink($upath);
                 move_uploaded_file($tn,$path);
                 $pdf_file = $resg->id.'map'.'.'.$pdf_file;
                } else {
                  $pdf_file = $resg->pdf_file;
                } 
               if($_FILES["banner_image"]["name"] != ""){
                $oname=$_FILES["banner_image"]["name"];
                $pos = strrpos($oname, ".");
                $extension=substr($oname,$pos+1);
                $tn = $_FILES["banner_image"]["tmp_name"];
                $path = "product/".$resg->id.'bn'.'.'.$extension;
                $upath = "product/".$resg->banner_image;
                unlink($upath);
                 move_uploaded_file($tn,$path);
                 $bimage = $resg->id.'bn'.'.'.$banner_image;
                } else {
                  $bimage = $resg->banner_image;
                } 
               if($_FILES["thumbnail"]["name"] != ""){
                $oname=$_FILES["thumbnail"]["name"];
                $pos = strrpos($oname, ".");
                $extension=substr($oname,$pos+1);
                $tn = $_FILES["thumbnail"]["tmp_name"];
                $path = "product/".$resg->id.'map'.'.'.$extension;
                $upath = "product/".$resg->thumbnail;
                unlink($upath);
                 move_uploaded_file($tn,$path);
                 $thumbnail = $resg->id.'map'.'.'.$thumbnail;
                } else {
                  $thumbnail = $resg->thumbnail;
                } 
               $sqlup = "UPDATE es_property SET pdf_file = '$pdf_file',banner_image = '$bimage',thumbnail = '$thumbnail' WHERE id = $resg->id";
                $resultup = mysqli_query($conn,$sqlup) or die(mysqli_error());  
             echo "<script>document.location.href='property.php'</script>";     
            }
      }  else{
        if(copy('../property-detail.php', '../property-services/'.strtolower(str_replace(" ", "-", $old_prod_name)).'.php')) {
             $property_desp = htmlentities( $_POST['desp']);
      $sqls ="UPDATE  es_property  SET property_added='$uid',property_type='$property_type',property_for='$ptype', nearest_location='$nearest_location',distances='$distances',country='$country',state='$state',city='$city',room='$rooms',address='$address',property_name='$title',slug='$prod_name',desp='$property_desp',price='$price',property_status='$status',status='$status',period='$period',room='$room',bathrooms='$bathrooms',bedroom='$bedroom',kitchen='$kitchen',parking_place='$parking',created_now='$datetime',floor_no='$floor',website='$website',area='$area',area_unit='$unit',map_link='$map_link',video='$video_link',con_phone='$phone',con_email='$email',con_address='$address',ip_address='$ip',urgent_property='$urgent_property',top_property='$top_property',featured='$featured' WHERE id='$id'";            $ress=mysqli_query($conn,$sqls);
            if($ress)
          { $sqlg = "SELECT * from es_property where id = '$id'";
               $resultg = mysqli_query($conn,$sqlg) or die(mysqli_error($conn));
               $resg = mysqli_fetch_object($resultg);
                 $sqlg = "SELECT * from es_property where id = '$id'";
               $resultg = mysqli_query($conn,$sqlg) or die(mysqli_error($conn));
               $resg = mysqli_fetch_object($resultg);
               if($_FILES["pdf_file"]["name"] != ""){
                $oname=$_FILES["pdf_file"]["name"];
                $pos = strrpos($oname, ".");
                $extension=substr($oname,$pos+1);
                $tn = $_FILES["pdf_file"]["tmp_name"];
                $path = "product/".$resg->id.'map'.'.'.$extension;
                $upath = "product/".$resg->pdf_file;
                unlink($upath);
                 move_uploaded_file($tn,$path);
                 $pdf_file = $resg->id.'map'.'.'.$pdf_file;
                } else {
                  $pdf_file = $resg->pdf_file;
                } 
               if($_FILES["banner_image"]["name"] != ""){
                $oname=$_FILES["banner_image"]["name"];
                $pos = strrpos($oname, ".");
                $extension=substr($oname,$pos+1);
                $tn = $_FILES["banner_image"]["tmp_name"];
                $path = "product/".$resg->id.'bn'.'.'.$extension;
                $upath = "product/".$resg->banner_image;
                unlink($upath);
                 move_uploaded_file($tn,$path);
                 $bimage = $resg->id.'bn'.'.'.$banner_image;
                } else {
                  $bimage = $resg->banner_image;
                } 
               if($_FILES["thumbnail"]["name"] != ""){
                $oname=$_FILES["thumbnail"]["name"];
                $pos = strrpos($oname, ".");
                $extension=substr($oname,$pos+1);
                $tn = $_FILES["thumbnail"]["tmp_name"];
                $path = "product/".$resg->id.'map'.'.'.$extension;
                $upath = "product/".$resg->thumbnail;
                unlink($upath);
                 move_uploaded_file($tn,$path);
                 $thumbnail = $resg->id.'map'.'.'.$thumbnail;
                } else {
                  $thumbnail = $resg->thumbnail;
                } 
               $sqlup = "UPDATE es_property SET pdf_file = '$pdf_file',banner_image = '$bimage',thumbnail = '$thumbnail' WHERE id = $resg->id";
               $resultup = mysqli_query($conn,$sqlup) or die(mysqli_error());   
            echo "<script>document.location.href='property.php'</script>";
                }

                }
            }
          }
        }else{
            if(file_exists('../property-services/'.$strtolower(str_replace(" ", "-", $old_prod_name)).'.php')){
        if(rename("../property-services/".strtolower(str_replace(" ", "-", $old_prod_name)).".php", "../property-services/".strtolower(str_replace(" ", "-", $prod_name)).".php")){
        $property_desp = htmlentities( $_POST['desp']);
            $sqls ="UPDATE  es_property  SET property_added='$uid',property_type='$property_type',property_for='$ptype', nearest_location='$nearest_location',distances='$distances',country='$country',state='$state',city='$city',room='$rooms',address='$address',property_name='$title',slug='$prod_name',desp='$property_desp',price='$price',property_status='$status',status='$status',period='$period',room='$room',bathrooms='$bathrooms',bedroom='$bedroom',kitchen='$kitchen',parking_place='$parking',created_now='$datetime',floor_no='$floor',website='$website',area='$area',area_unit='$unit',map_link='$map_link',video='$video_link',con_phone='$phone',con_email='$email',con_address='$address',ip_address='$ip',urgent_property='$urgent_property',top_property='$top_property',featured='$featured' WHERE id='$id'";
            $ress=mysqli_query($conn,$sqls);
            if($ress)
            {  $sqlg = "SELECT * from es_property where id = '$id'";
               $resultg = mysqli_query($conn,$sqlg) or die(mysqli_error($conn));
               $resg = mysqli_fetch_object($resultg);
               if($_FILES["pdf_file"]["name"] != ""){
                $oname=$_FILES["pdf_file"]["name"];
                $pos = strrpos($oname, ".");
                $extension=substr($oname,$pos+1);
                $tn = $_FILES["pdf_file"]["tmp_name"];
                $path = "product/".$resg->id.'map'.'.'.$extension;
                $upath = "product/".$resg->pdf_file;
                unlink($upath);
                 move_uploaded_file($tn,$path);
                 $pdf_file = $resg->id.'map'.'.'.$pdf_file;
                } else {
                  $pdf_file = $resg->pdf_file;
                } 
               if($_FILES["banner_image"]["name"] != ""){
                $oname=$_FILES["banner_image"]["name"];
                $pos = strrpos($oname, ".");
                $extension=substr($oname,$pos+1);
                $tn = $_FILES["banner_image"]["tmp_name"];
                $path = "product/".$resg->id.'bn'.'.'.$extension;
                $upath = "product/".$resg->banner_image;
                unlink($upath);
                 move_uploaded_file($tn,$path);
                 $bimage = $resg->id.'bn'.'.'.$banner_image;
                } else {
                  $bimage = $resg->banner_image;
                } 
               if($_FILES["thumbnail"]["name"] != ""){
                $oname=$_FILES["thumbnail"]["name"];
                $pos = strrpos($oname, ".");
                $extension=substr($oname,$pos+1);
                $tn = $_FILES["thumbnail"]["tmp_name"];
                $path = "product/".$resg->id.'map'.'.'.$extension;
                $upath = "product/".$resg->thumbnail;
                unlink($upath);
                 move_uploaded_file($tn,$path);
                 $thumbnail = $resg->id.'map'.'.'.$thumbnail;
                } else {
                  $thumbnail = $resg->thumbnail;
                } 
               $sqlup = "UPDATE es_property SET pdf_file = '$pdf_file',banner_image = '$bimage',thumbnail = '$thumbnail' WHERE id = $resg->id";
                $resultup = mysqli_query($conn,$sqlup) or die(mysqli_error());  
               echo "<script>document.location.href='property.php'</script>";
        }
      }
     } else{   
        if(copy('../property-detail.php', '../property-services/'.strtolower(str_replace(" ", "-", $prod_name)).'.php')) {
           $property_desp = htmlentities( $_POST['desp']);
      $sqls ="UPDATE  es_property  SET property_added='$uid',property_type='$property_type',property_for='$ptype', nearest_location='$nearest_location',distances='$distances',country='$country',state='$state',city='$city',room='$rooms',address='$address',property_name='$title',slug='$prod_name',desp='$property_desp',price='$price',property_status='$status',status='$status',period='$period',room='$room',bathrooms='$bathrooms',bedroom='$bedroom',kitchen='$kitchen',parking_place='$parking',created_now='$datetime',floor_no='$floor',website='$website',area='$area',area_unit='$unit',map_link='$map_link',video='$video_link',con_phone='$phone',con_email='$email',con_address='$address',ip_address='$ip',urgent_property='$urgent_property',top_property='$top_property',featured='$featured' WHERE id='$id'";
                  $ress=mysqli_query($conn,$sqls);
            if($ress)
           {  $sqlg = "SELECT * from es_property where id = '$id'";
               $resultg = mysqli_query($conn,$sqlg) or die(mysqli_error($conn));
               $resg = mysqli_fetch_object($resultg);
               if($_FILES["pdf_file"]["name"] != ""){
                $oname=$_FILES["pdf_file"]["name"];
                $pos = strrpos($oname, ".");
                $extension=substr($oname,$pos+1);
                $tn = $_FILES["pdf_file"]["tmp_name"];
                $path = "product/".$resg->id.'map'.'.'.$extension;
                $upath = "product/".$resg->pdf_file;
                unlink($upath);
                 move_uploaded_file($tn,$path);
                 $pdf_file = $resg->id.'map'.'.'.$pdf_file;
                } else {
                  $pdf_file = $resg->pdf_file;
                } 
               if($_FILES["banner_image"]["name"] != ""){
                $oname=$_FILES["banner_image"]["name"];
                $pos = strrpos($oname, ".");
                $extension=substr($oname,$pos+1);
                $tn = $_FILES["banner_image"]["tmp_name"];
                $path = "product/".$resg->id.'bn'.'.'.$extension;
                $upath = "product/".$resg->banner_image;
                unlink($upath);
                 move_uploaded_file($tn,$path);
                 $bimage = $resg->id.'bn'.'.'.$banner_image;
                } else {
                  $bimage = $resg->banner_image;
                } 
               if($_FILES["thumbnail"]["name"] != ""){
                $oname=$_FILES["thumbnail"]["name"];
                $pos = strrpos($oname, ".");
                $extension=substr($oname,$pos+1);
                $tn = $_FILES["thumbnail"]["tmp_name"];
                $path = "product/".$resg->id.'map'.'.'.$extension;
                $upath = "product/".$resg->thumbnail;
                unlink($upath);
                 move_uploaded_file($tn,$path);
                 $thumbnail = $resg->id.'map'.'.'.$thumbnail;
                } else {
                  $thumbnail = $resg->thumbnail;
                } 
                $sqlup = "UPDATE es_property SET pdf_file = '$pdf_file',banner_image = '$bimage',thumbnail = '$thumbnail' WHERE id = $resg->id";
                $resultup = mysqli_query($conn,$sqlup) or die(mysqli_error());  
                echo "<script>document.location.href='property.php'</script>";
            }
          }

        }
      }
  }

if(isset($_POST['update_img']))
{ extract($_POST);
$id=$_POST["prd_id"];
$sqlg = "SELECT * from es_property_image where id = '$id'";
$resultg = mysqli_query($conn,$sqlg) or die(mysqli_error());
$resg = mysqli_fetch_object($resultg);
if($_FILES["image"]["name"] != ""){
$oname=$_FILES["image"]["name"];
$pos = strrpos($oname, ".");
$extension=substr($oname,$pos+1);
$tn = $_FILES["image"]["tmp_name"];
$path = "product/image/".$resg->id.'09'.'.'.$extension;
$upath = "product/image/".$resg->images;
unlink($upath);
 move_uploaded_file($tn,$path);
 $image_ban = $resg->id.'09'.'.'.$extension;
} else {
  $image_ban = $resg->images;
}
$sqlup = "UPDATE es_property_image SET images='$image_ban' WHERE  id = $resg->id";
$resultup = mysqli_query($conn,$sqlup) or die(mysqli_error());
} ?> 
<style type="">
  label{color: #858796;font-size: 17px;font-weight: 400;}
.form-control{border-radius:8px;height:40px;}
.box-header h6{font-size: 18px!important;}
.box-header .table tr th{  color: #858796;
  font-size: 16px;
}
.box-body .table tr th, .box-body .table tr td{color: #858796!important;font-size:17px!important;}
 .basicinform{color: #858796;font-size: 26px;font-weight: 500;}
</style>
<body class="hold-transition skin-blue sidebar-mini">
  <div class="wrapper">
    <?php include("includes/header.php");?>
    <?php include("includes/sidebar.php");?>
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <a href="property.php" class="btn btn-primary"><i class="fa fa-list fa-lg" aria-hidden="true"></i> All Property</a>
      </section>
      <!-- Main content -->
      <section class="content">
     <div class="box box-danger gurnew">       
                  <div class="box-body"> 
                        <h4 class="basicinform">Edit Basic Information</h4>
                        <hr> 
                         <?php $idd=$_GET['id'];
                         $sql=mysqli_query($conn,"select es_property.*,es_property_type.types from es_property join es_property_type on es_property.property_type=es_property_type.id where es_property.id='".$idd."'");
                          $res= mysqli_fetch_array($sql);
                         $ptid=$res['property_for'];
                         $sqlpt=mysqli_fetch_array(mysqli_query($conn,"select * from property_purpose where id=".$ptid));
                         $cid=$res['country'];
                         $sid=$res['state'];
                         $ctid=$res['city'];
                         $sqlct=mysqli_fetch_array(mysqli_query($conn,"select * from country where id=".$cid));
                         $sqlst=mysqli_fetch_array(mysqli_query($conn,"select * from state where id=".$sid));
                         $sqlcy=mysqli_fetch_array(mysqli_query($conn,"select * from city where id=".$ctid));
                         $nrid=$res['nearest_location'];
                          $sqllc=mysqli_fetch_array(mysqli_query($conn,"select * from nearest_location where id=".$nrid));
                          ?>
                    
                        <form method="post" action="" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="title">Title<span class="text-danger">*</span></label>
                            <input type="text" value="<?= $res['property_name'];?>" name="title" class="form-control" id="title">
                        </div>
                        <div class="form-group">
                            <label for="slug">Slug <span class="text-danger">*</span></label>
                            <input type="text" value="<?= $res['slug'];?>" name="slug" class="form-control" id="slug" >
                            <input type="hidden" value="<?= $res['slug'];?>" name="slug_old" class="form-control" >
                        </div>

                        <div class="row">

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="category">Property Types <span class="text-danger">*</span></label>
                                    <select name="property_type" id="property_type" class="form-control select2 select2-hidden-accessible" data-select2-id="select2-data-property_type" tabindex="-1" aria-hidden="true">
                                        <option value="<?php echo $res['property_type']; ?>"><?php echo $res['types']; ?></option>
                                    <?php $status="Active";
                                    $sqltp=mysqli_query($conn,"SELECT * from es_property_type where status='".$status."'");
                                          while($restp=mysqli_fetch_array($sqltp)) { ?>
                                          <option value="<?php echo $restp['id']; ?>"><?php echo $restp['types'];?></option><?php } ?>
                                </select>
                              </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="city">Country <span class="text-danger">*</span></label>
                                    <select name="country" id="country" class="form-control select2 select2-hidden-accessible" data-select2-id="select2-data-city" tabindex="-1" aria-hidden="true">
                                         <option value="<?php echo $sqlct['country_id']; ?>" data-select2-id="select2-data-2-5zhf"><?php echo $sqlct['country_name']; ?></option>
                                    <?php $status="Active";
                                         $sqltp=mysqli_query($conn,"SELECT * from country where status='".$status."'");
                                          while($restp=mysqli_fetch_array($sqltp)) { ?>
                                          <option value="<?php echo $restp['id']; ?>"><?php echo $restp['country_name'];?></option><?php } ?>
                                       
                                        </select> 
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="state">State <span class="text-danger">*</span></label>
                                    <select name="state" id="state" class="form-control select2 select2-hidden-accessible" data-select2-id="select2-data-city" tabindex="-1" aria-hidden="true">
                                        <option value="<?php echo $sqlst['state_id']; ?>" data-select2-id="select2-data-2-5zhf"><?php echo $sqlst['state_name']; ?></option>
                                    </select> 
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="city">City <span class="text-danger">*</span></label>
                                    <select name="city" id="city" class="form-control select2 select2-hidden-accessible" data-select2-id="select2-data-city" tabindex="-1" aria-hidden="true">
                                       <option value="<?php echo $sqlcy['city_id']; ?>" data-select2-id="select2-data-2-5zhf"><?php echo $sqlcy['city_name']; ?></option>
                                    </select> 
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="address">Address <span class="text-danger">*</span></label>
                                    <input type="text" name="address" value="<?php echo $res['address']; ?>" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="phone">Phone</label>
                                    <input type="text" name="phone" value="<?php echo $res['con_phone']; ?>" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="email">Email <span class="text-danger">*</span></label>
                                    <input type="email" name="email" value="<?php echo $res['con_email']; ?>" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="website">Website</label>
                                    <input type="url" name="website" value="<?php echo $res['website']; ?>" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="purpose">Purpose <span class="text-danger">*</span></label>
                                    <select name="purpose" id="purpose" class="form-control">
                                        <option value="<?php echo $res['property_for']; ?>" data-select2-id="select2-data-2-5zhf"><?php echo $sqlpt['purpose']; ?></option>
                                        <?php $status="Active";
                                        $sqltp=mysqli_query($conn,"SELECT * from property_purpose where status='".$status."'");
                                          while($restp=mysqli_fetch_array($sqltp)) { ?>
                                          <option value="<?php echo $restp['id']; ?>"><?php echo $restp['purpose'];?></option><?php } ?>
                                     </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="price">Price <span class="text-danger">*</span></label>
                                    <input type="text" name="price" class="form-control" value="<?php echo $res['price'];?>">
                                </div>
                            </div>

                            <div class="col-md-6 d-none" id="period_box">
                                <div class="form-group">
                                    <label for="period">Period <span class="text-danger">*</span></label>
                                    <select name="period" id="period" class="form-control">
                                        <option value="<?php echo $res['period'];?>"><?php echo $res['period'];?></option>
                                        <option value="Daily">Daily</option>
                                        <option value="Monthly">Monthly</option>
                                        <option value="Yearly">Yearly</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>  
        </div>  
         <div class="box box-danger gurnew">     
         <div class="box-body"> 
                        <h4 class="basicinform">Others Information</h4>
                        <hr>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Total Area(Square Feet) <span class="text-danger">*</span></label>
                                    <input type="text" name="area" value="<?php echo $res['area']; ?>" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Total Unit <span class="text-danger">*</span></label>
                                    <input type="number" name="unit" value="<?php echo $res['area_unit']; ?>" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Total Room <span class="text-danger">*</span></label>
                                    <input type="number" name="room" value="<?php echo $res['room']; ?>" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Total Bedroom <span class="text-danger">*</span></label>
                                    <input type="number" name="bedroom" value="<?php echo $res['bedroom']; ?>" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Total Bathroom <span class="text-danger">*</span></label>
                                    <input type="number" name="bathrooms" value="<?php echo $res['bathroom']; ?>" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Total Floor <span class="text-danger">*</span></label>
                                    <input type="number" name="floor" value="<?php echo $res['floor_no']; ?>" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Total Kitchen </label>
                                    <input type="number" name="kitchen" value="<?php echo $res['kitchen']; ?>" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Total Parking Place</label>
                                    <input type="number" name="parking" value="<?php echo $res['parking_place']; ?>" class="form-control">
                                </div>
                            </div>
                        </div>
                        </div>
                        </div>
                         <div class="box box-danger gurnew">     
         <div class="box-body"> 
                        <h4 class="basicinform">Image, PDF and Video</h4>
                        <hr>
                       <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="">PDF File</label>
                                    <input type="file" name="pdf_file" class="form-control-file">
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="">Banner Image <span class="text-danger">*</span></label>
                                     <img src="product/<?= $res['banner_image']; ?>" style="width:30px;">  <br/> <input type="file" name="banner_image" class="form-control-file">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="">Thumbnail Image <span class="text-danger">*</span></label>
                                     <img src="product/<?= $res['thumbnail']; ?>" style="width:30px;"> <br/> <input type="file" name="thumbnail_image" class="form-control-file">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Slider Images (Multiple) <span class="text-danger">feturepropgur*</span></label>
                                    <?php $sid=$res['id'];
                                     $sqls=mysqli_query($conn,"select * from es_property_image where property_id=".$sid);
                                     while($resus= mysqli_fetch_array($sqls)){ ?>
                                    <img src="product/image/<?= $resus['images'];?>" style="width:30px;"> <input type="button" name="edit" value="Edit" id="<?php echo $resus["id"]; ?>" class="btn btn-md btn-success edit_data" />
                                    <a href="javascript:delete_prdm_by_ID('<?php echo $resus['id'] ?>');" class="ask"><i class="fa fa-trash-o"></i></a> <br/> <input type="file" name="thumbnail_image" class="form-control-file"><?php } ?>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Youtube Video Link</label>
                                    <input type="text" class="form-control" name="video_link" value="<?= $res['video'];?>">
                                </div>
                            </div>
                        </div>
                      </div>
                    </div>
                     <div class="box box-danger gurnew">     
         <div class="box-body"> 
                        <h4 class="basicinform">Aminities</h4>
                        <hr> 
                        <div class="form-group">
                            <div>
                         <?php $id=$res['id'];
                         $sqlss=mysqli_query($conn,"select * from aminities where property_id=".$id);
                         while($resuss= mysqli_fetch_array($sqlss)){ ?>       
                         <label class="mx-1" for="good-for-kids"><?= $resuss['aminity'];?></label><?php } ?>
                        </div>

                        </div> 
                        </div> 
        </div> 
  <div class="box box-danger gurnew">     
         <div class="box-body"> 
                        <h4 class="basicinform">Nearest Locations</h4>
                        <hr>
                       <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Nearest Locations</label>
                                            <select name="nearest_location"  id="" class="form-control">
                                                <option value="<?= $sqllc['id']; ?>"><?= $sqllc['location']; ?></option>
                                                 <?php $status="Active";
                                        $sqltpr=mysqli_query($conn,"SELECT * from nearest_location where status='".$status."'");
                                       while($restpr=mysqli_fetch_array($sqltpr)) { ?>
                                        <option value="<?= $restpr['id'];?>"><?= $restpr['location'];?></option><?php } ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="">Distance(km)</label>
                                            <input type="text" class="form-control" value="<?= $res['distances']; ?>" name="distances">
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <button id="addNearestPlaceRow" type="button" class="btn btn-success btn-sm nearest-row-btn"><i class="fa fa-plus fa-lg" aria-hidden="true"></i></button>
                                    </div>
                                </div>
                                </div>
                                </div>
                                <div class="box box-danger gurnew">     
         <div class="box-body"> 
                        <h4 class="basicinform">Property Details and Google Map</h4>
                        <hr>  
                                <div class="form-group">
                                    <label>Google Map Code</label>
                                    <textarea class="form-control" rows="5" value="<?= $res['map_link']; ?>" name="map"></textarea>
                                </div>

                                <div class="form-group mt-3">
                                    <label for="description">Description <span class="text-danger">*</span></label>
                                    <textarea class="summernote" id="summernote" name="desp" style="visibility: hidden; display: none;"><?= $res['desp']; ?></textarea> 
                            </div>
                        </div> 
                                </div> 

                                      <div class="box box-danger gurnew">     
         <div class="box-body">       
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="status">Status <span class="text-danger">*</span></label>
                                    <select name="status" id="status" class="form-control">
                                        <option value="<?= $res['property_status']; ?>"><?= $res['property_status']; ?></option>
                                        <option value="Active">Active</option>
                                        <option value="Inactive">Inactive</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="featured">Featured <span class="text-danger">*</span></label>
                                    <select name="featured" id="featured" class="form-control">
                                        <option value="<?= $res['featured']; ?>"><?= $res['featured']; ?></option>
                                        <option value="0">No</option>
                                        <option value="1">Yes</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="top_property">Top Property <span class="text-danger">*</span></label>
                                    <select name="top_property" id="top_property" class="form-control">
                                        <option value="<?= $res['top_property']; ?>"><?= $res['top_property']; ?></option>
                                        <option value="1">Yes</option>
                                        <option value="0">No</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="urgent_property">Urgent Property <span class="text-danger">*</span></label>
                                    <select name="urgent_property" id="urgent_property" class="form-control">
                                        <option value="<?= $res['urgent_property']; ?>"><?= $res['urgent_property']; ?></option>
                                        <option value="1">Yes</option>
                                        <option value="0">No</option>
                                    </select>
                                </div>
                            </div>


                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="seo_title">SEO Title</label>
                                    <input type="text" name="seo_title" class="form-control" id="seo_title" value="<?= $res['seo_title']; ?>">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="seo_description">SEO Description</label>
                                    <textarea name="seo_description" id="seo_description" cols="30" rows="3" class="form-control"><?= $res['seo_description']; ?></textarea>
                                </div>
                            </div>
                        </div>
                                </div>
                                <button name="update" type="submit" class="btn btn-success btn-lg">Update</button>
                                </div> </form>
          </section> 
    </div>

    <!-- Modal Category --> 
            <div id="add_data_Modal" class="modal fade">  
              <div class="modal-dialog">  
                   <div class="modal-content">  
                        <div class="modal-header">  
                             <button type="button" class="close" data-dismiss="modal">&times;</button>  
                             <h4 class="modal-title">Update Images</h4>  
                        </div>  
                        <div class="modal-body">  
                             <form method="post" name="frm" id="insert_form" enctype="multipart/form-data">  
                                  
                                  <label>Image</label>  
                                 <input type="file" name="image"  class="form-control" >
                                  </br>
                                  <input type="hidden" name="prd_id" id="prd_id" />  
                                  <input type="submit" name="update_img" id="insert" value="Insert" class="btn btn-success" />  
                             </form>  
                        </div>  
                        <div class="modal-footer">  
                             <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>  
                        </div>  
                   </div>  
              </div>  
         </div>  
            <!-- ./Modal Category -->
    <!-- /.content-wrapper -->
    <?php include("includes/footer.php");?>
    <div class="control-sidebar-bg"></div>
  </div>
  <?php include("includes/js.php");?>
  <script type="text/javascript">
 $(document).ready(function(){
$('#country').on('change', function(){
    var ct_id = $(this).val();
    if(ct_id){
        $.ajax({
            type:'POST',
            url:'get_state.php',
            data:'ct_id='+ct_id,
            success:function(html){
                $('#state').html(html);
               // console.log(html);
               // $('#city').html('<option value="">Select Division</option>'); 
            }
        }); 
    }
});
$('#state').on('change', function(){
    var st_id = $(this).val();
    if(st_id){
        $.ajax({
            type:'POST',
            url:'get_state.php',
            data:'st_id='+st_id,
            success:function(html){
                $('#city').html(html);
               // console.log(html);
               // $('#city').html('<option value="">Select Division</option>'); 
            }
        }); 
    }
});
});

 $(document).ready(function(){  
      $(document).on('click', '.edit_data', function(){  
           var prd_id = $(this).attr("id");  
           $.ajax({  
                url:"get_img_details.php",  
                method:"POST",  
                data:{prd_id:prd_id},  
                dataType:"json",  
                success:function(data){  
                     $('#prd_id').val(data.id);  
                     $('#insert').val("Update");  
                     $('#add_data_Modal').modal('show');  
                }  
           });  
      });  
 });  

 function delete_prdm_by_ID(id)
{
    if (confirm('Do You Want to Deleting This \nContinue anyway?')) {
        window.location.href = 'delete_imgsr.php?id=' + id;
    }
}

</script>
</body>
 

</html>
