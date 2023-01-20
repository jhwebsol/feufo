<?php include("includes/css.php");
if (isset($_POST['submitpt'])) {
extract($_POST);
date_default_timezone_set('Asia/Kolkata');
$datetime = date('Y-m-d H:i:s');
$ip=$_SERVER['REMOTE_ADDR']; 
$tmp_file = $_FILES['pdf_file']['tmp_name'];
$ext = pathinfo($_FILES["pdf_file"]["name"], PATHINFO_EXTENSION);
$rand = md5(uniqid().rand());
$pdf_file = $rand.".".$ext;
move_uploaded_file($tmp_file,"product/".$pdf_file);
$tmp_file = $_FILES['banner_image']['tmp_name'];
$ext = pathinfo($_FILES["banner_image"]["name"], PATHINFO_EXTENSION);
$rand = md5(uniqid().rand());
$banner_image = $rand.".".$ext;
move_uploaded_file($tmp_file,"product/".$banner_image);
$tmp_file = $_FILES['thumbnail']['tmp_name'];
$ext = pathinfo($_FILES["thumbnail"]["name"], PATHINFO_EXTENSION);
$rand = md5(uniqid().rand());
$thumbnail = $rand.".".$ext;
move_uploaded_file($tmp_file,"product/".$thumbnail);
$property_desp = htmlentities( $_POST['description']);
$uid="Admin"; 
$rndno=rand(1000, 9999);
$property_id="EST".$rndno;
$property_name = strtolower(str_replace(" ", "-", $slug));
$added_from="Admin";
if(file_exists('../property-services')){
  if(!file_exists('../property-services/'.$property_name)){
    if(copy('../property-detail.php', '../property-services/'.$property_name.'.php')) {
      $sql="INSERT into es_property(property_added,property_type,property_for,nearest_location,distances,country,state,city,address,property_name,slug,desp,pdf_file,banner_image,thumbnail,period,price,room,bathrooms,bedroom,property_status,kitchen,parking_place,floor_no,area,area_unit,map_link,video,con_name,con_phone,con_email,added_from,seo_title,seo_description,ip_address,urgent_property,top_property,featured,created_now) values ('$uid','$property_type','$purpose','$nearest_location','$distances','$country','$state','$city','$address','$title','$property_name','$property_desp','$pdf_file','$banner_image','$period','$thumbnail','$price','$room','$bathrooms','$bedroom','$status','$kitchen','$parking','$floor','$area','$unit','$map_link','$video_link','$con_name','$con_phone','$con_email','$added_from','$seo_title','$seo_description','$ip','$urgent_property','$top_property','$featured','$datetime')"; 
            if(mysqli_query($conn, $sql)) {
            $last_id= mysqli_insert_id($conn);
              if(count($_FILES['slider_images']['name']) > 0)  {
                    for($i = 0; $i < count($_FILES['slider_images']['name']); $i++){
                        $tmp_file = $_FILES['slider_images']['tmp_name'][$i];
                        $ext = pathinfo($_FILES["slider_images"]["name"][$i], PATHINFO_EXTENSION);
                        $rand = md5(uniqid().rand());
                        $upd_image = $rand.".".$ext;
                        move_uploaded_file($tmp_file,"product/image/".$upd_image);
            $sql_prd="INSERT into es_property_image(property_id,images) values ('$last_id','$upd_image')";
            $prd_res=mysqli_query($conn, $sql_prd) or die(mysqli_error());
              }
            }  if(count($_POST["aminities"]) > 0)  {
                    for($i = 0; $i < count($_POST["aminities"]); $i++){
                     $aminities = mysqli_real_escape_string($conn,$_POST['aminities'][$i]);
                    $sql_prds="INSERT into property_aminities(property_id,aminity) values ('$last_id','$aminities')";
                    $prd_ress=mysqli_query($conn, $sql_prds);
                  }
                }
            $sql1=mysqli_query($conn, "select * from es_property where id=".$last_id);
               $row1=mysqli_fetch_array($sql1);
               $prty=$row1['property_id']+$last_id;
             $sql_paytmss ="UPDATE  es_property SET property_id='$prty' WHERE id='".$last_id."'"; 
            $result_ptmss=mysqli_query($conn,$sql_paytmss) or die(mysqli_error());
            echo "<script> alert('Your property have added successfully!!!');
             location.replace('property.php'); </script>";
            }
             }
            else {
                    echo "<script> alert('There are some problem please try again!!!'); 
                                location.replace('add-property.php');
                            </script>";
                }
            } 
            else { 
                echo "  <script> 
                            alert('There are some problem please try again!!!'); 
                            location.replace('add-property.php');
                        </script>";
            }
        }
        else{  echo "<script> alert('Property detail Name aleady exists, please change the and try again!!!'); 
                        location.replace('add-property.php');
                    </script>";
        }
 }

?>
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
                <form method="post" action="" enctype="multipart/form-data">
                <div class="box box-danger gurnew">
                    <div class="box-body">
                        <h4 class="basicinform">Basic Information</h4>
                        <hr>
                        <div class="form-group">
                            <label for="title">Title<span class="text-danger">*</span></label>
                            <input type="text" name="title" class="form-control" id="title" value="">
                        </div>
                        <div class="form-group">
                            <label for="slug">Slug<span class="text-danger">(Page URL) *</span></label>
                            <input type="text" name="slug" class="form-control" id="slug"  required>
                        </div>

                        <div class="row">

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="category">Property Types <span class="text-danger">*</span></label>
                                    <select name="property_type" id="property_type" class="form-control select2 select2-hidden-accessible" data-select2-id="select2-data-property_type" tabindex="-1" aria-hidden="true">
                                        <option value="" >Select Property Type</option>
                                         <?php $sqltp=mysqli_query($conn,"SELECT * from es_property_type");
                                          while($restp=mysqli_fetch_array($sqltp)) { ?>
                                          <option value="<?php echo $restp['id']; ?>"><?php echo $restp['types'];?></option><?php } ?>
                                       </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="city">Country <span class="text-danger">*</span></label>
                                    <select name="country" id="country" class="form-control select2 select2-hidden-accessible" data-select2-id="select2-data-city" tabindex="-1" aria-hidden="true">
                                        <option value="" data-select2-id="select2-data-4-wqgo">Select City</option>
                                         <?php $status="Active";
                                         $sqltp=mysqli_query($conn,"SELECT * from country where status='".$status."'");
                                          while($restp=mysqli_fetch_array($sqltp)) { ?>
                                          <option value="<?php echo $restp['id']; ?>"><?php echo $restp['country_name'];?></option><?php } ?>
                                       </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="city">State <span class="text-danger">*</span></label>
                                    <select name="state" id="state" class="form-control select2 select2-hidden-accessible" data-select2-id="select2-data-city" tabindex="-1" aria-hidden="true">
                                        <option value="" data-select2-id="select2-data-4-wqgo">Select City</option>
                                        
                                        <option value="">Option</option>
                                       </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="city">City <span class="text-danger">*</span></label>
                                    <select name="city" id="city" class="form-control select2 select2-hidden-accessible" data-select2-id="select2-data-city" tabindex="-1" aria-hidden="true">
                                        <option value="" data-select2-id="select2-data-4-wqgo">Select City</option>
                                        </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="address">Address <span class="text-danger">*</span></label>
                                    <input type="text" name="address" value="" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="phone">Phone</label>
                                    <input type="text" name="con_phone" value="" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="email">Email <span class="text-danger">*</span></label>
                                    <input type="email" name="con_email" value="" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="website">Website</label>
                                    <input type="url" name="website" value="" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="purpose">Purpose <span class="text-danger">*</span></label>
                                    <select name="purpose" id="purpose" class="form-control">
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
                                    <input type="text" name="price" class="form-control" value="">
                                </div>
                            </div>

                            <div class="col-md-6 d-none" id="period_box">
                                <div class="form-group">
                                    <label for="period">Period <span class="text-danger">*</span></label>
                                    <select name="period" id="period" class="form-control">
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
                                    <input type="text" name="area" value="" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Total Unit <span class="text-danger">*</span></label>
                                    <input type="number" name="unit" value="" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Total Room <span class="text-danger">*</span></label>
                                    <input type="number" name="room" value="" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Total Bedroom <span class="text-danger">*</span></label>
                                    <input type="number" name="bedroom" value="" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Total Bathroom <span class="text-danger">*</span></label>
                                    <input type="number" name="bathrooms" value="" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Total Floor <span class="text-danger">*</span></label>
                                    <input type="number" name="floor" value="" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Total Kitchen </label>
                                    <input type="number" name="kitchen" value="" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Total Parking Place</label>
                                    <input type="number" name="parking" value="" class="form-control">
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
                                    <input type="file" name="banner_image" class="form-control-file">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="">Thumbnail Image <span class="text-danger">(1600 x 690px)*</span></label>
                                    <input type="file" name="thumbnail_image" class="form-control-file">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Slider Images (Multiple) <span class="text-danger">*</span></label>
                                    <input type="file" class="form-control-file" name="slider_images[]" multiple="">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Youtube Video Link</label>
                                    <input type="text" class="form-control" name="video_link" value="">
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
                            <div><?php $status="Active";
                            $sqltpr=mysqli_query($conn,"SELECT * from aminities where status='".$status."'");
                                     while($restpr=mysqli_fetch_array($sqltpr)) { ?>
                                <input value="<?php echo $restpr['id']; ?>" type="checkbox" name="aminities[]" id="<?php echo $restpr['id']; ?>">
                                <label class="mx-1" for="<?php echo $restpr['id']; ?>"><?php echo $restpr['aminity']; ?></label><?php } ?>
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
                                    <select name="nearest_location" id="" class="form-control">
                                        <option value="">Select Nearest Location</option>
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
                                    <input type="text" class="form-control" name="distances">
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
                            <textarea class="form-control" rows="5" name="map"></textarea>
                        </div>

                        <div class="form-group mt-3">
                            <label for="description">Description <span class="text-danger">*</span></label>
                            <textarea class="summernote" id="summernote" name="description" style="visibility: hidden; display: none;"></textarea>
                        </div>
                    </div>
                </div>

                <div class="box box-danger gurnew">
                    <div class="box-body">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="status">Status <span class="text-danger">*</span></label>
                                <select name="status" id="status" class="form-control">
                                    <option value="1">Active</option>
                                    <option value="0">InActive</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="featured">Featured <span class="text-danger">*</span></label>
                                <select name="featured" id="featured" class="form-control">
                                    <option selected="" value="0">No</option>
                                    <option value="1">Yes</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="top_property">Top Property <span class="text-danger">*</span></label>
                                <select name="top_property" id="top_property" class="form-control">
                                    <option value="1">Yes</option>
                                    <option value="0">No</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="urgent_property">Urgent Property <span class="text-danger">*</span></label>
                                <select name="urgent_property" id="urgent_property" class="form-control">
                                    <option value="1">Yes</option>
                                    <option value="0">No</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="seo_title">SEO Title</label>
                                <input type="text" name="seo_title" class="form-control" id="seo_title" value="">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="seo_description">SEO Description</label>
                                <textarea name="seo_description" id="seo_description" cols="30" rows="3" class="form-control"></textarea>
                            </div>
                        </div>
                    </div>
                </div>
                <button name="submitpt" type="submit" class="btn btn-success btn-lg">Save</button>
            </form>
            </section>
        </div>
        
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
</script>
</body>
</html>