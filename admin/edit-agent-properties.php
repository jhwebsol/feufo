<?php include("includes/css.php");
if(isset($_POST['update']))
{ extract($_POST);
$id=$_SESSION['employer_id'];
$skill = implode(",",$skill);
$sql1 ="UPDATE employer SET company_name='$cname',emp_name='$name',contact_no='$contact_no',alt_contact_no='$alt_contact_no',website='$website',est_since='$est_since',team_size='$team_size',skill='$skill',listing='$listing',about_data='$about_data' WHERE id='".$id."'"; 
$res=mysqli_query($conn,$sql1) or die(mysqli_error());
if($res){
$sqlg = "SELECT * from employer where id = $id";
$resultg = mysqli_query($conn,$sqlg) or die(mysqli_error());
$resg = mysqli_fetch_object($resultg);
if($_FILES["logo"]["name"] != ""){
$oname=$_FILES["logo"]["name"];
$pos = strrpos($oname, ".");
$extension=substr($oname,$pos+1);
$tn = $_FILES["logo"]["tmp_name"];
$path = "image/".$resg->id.'32'.'.'.$extension;
$upath = "image/".$resg->logo;
unlink($upath);
 move_uploaded_file($tn,$path);
  $image = $resg->id.'32'.'.'.$extension;
} else {
  $image = $resg->logo;
}
 if($_FILES["banner"]["name"] != ""){
  $oname=$_FILES["banner"]["name"];
  $pos = strrpos($oname, ".");
  $extension=substr($oname,$pos+1);
  $tn = $_FILES["cat_banner_imag"]["tmp_name"];
  $path = "image/".$resg->id.'66'.'.'.$extension;
  $upath = "image/".$resg->banner;
  unlink($upath);
   move_uploaded_file($tn,$path);
   $image_bn = $resg->id.'66'.'.'.$extension;
  } else {
    $image_bn = $resg->banner;
  } 
$sqlup = "UPDATE employer SET logo ='$image',banner =  '$image_bn'
     WHERE  id = $resg->id";
$resultup = mysqli_query($conn,$sqlup) or die(mysqli_error());  
} }
if(isset($_POST['social_submit']))
{ extract($_POST);
date_default_timezone_set('Asia/Kolkata');
$date = date('Y-m-d H:i:s');
$id=$_SESSION['employer_id'];
$sql1 ="UPDATE employer_social_md SET facebook='$facebook',twitter='$twitter',linkedin='$linkedin',email_id='$email_id' WHERE empr_id='".$id."'"; 
$res=mysqli_query($conn,$sql1) or die(mysqli_error());
}
if(isset($_POST['search_addr']))
{ extract($_POST);
date_default_timezone_set('Asia/Kolkata');
$date = date('Y-m-d H:i:s');
$id=$_SESSION['employer_id'];
$sql1 ="UPDATE employer_contact SET country='$country',city='$city',address='$address',map_link='$map_link',latitude='$latitude',longitude='$longitude' WHERE empr_id='".$id."'"; 
$res=mysqli_query($conn,$sql1) or die(mysqli_error());
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
        <a href="agent_properties.php" class="btn btn-primary"><i class="fa fa-list fa-lg" aria-hidden="true"></i> All Property</a>
      </section>
      <!-- Main content -->
      <section class="content">
     <div class="box box-danger gurnew">       
                  <div class="box-body"> 
                        <h4 class="basicinform">Edit Basic Information</h4>
                        <hr>
                        <div class="form-group">
                            <label for="title">Title<span class="text-danger">*</span></label>
                            <input type="text" name="title" class="form-control" id="title" value="" readonly>
                        </div>
                        <div class="form-group">
                            <label for="slug">Post By <span class="text-danger">*</span></label>
                            <input type="text" name="postby" class="form-control" id="postby" value="" readonly>
                        </div>

                        <div class="row">

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="category">Property Types <span class="text-danger">*</span></label>
                                    <input type="text" name="" class="form-control" id="" value="House" readonly>
                              </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="city">City <span class="text-danger">*</span></label>
                                     <input type="text" name="city" class="form-control" id="city" value="" readonly>
								</div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="address">Address <span class="text-danger">*</span></label>
                                    <input type="text" name="address" value="" class="form-control" readonly>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="phone">Phone</label>
                                    <input type="text" name="phone" value="" class="form-control" readonly>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="email">Email <span class="text-danger">*</span></label>
                                    <input type="email" name="email" value="" class="form-control" readonly>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="website">Website</label>
                                    <input type="url" name="website" value="" class="form-control" readonly>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="purpose">Purpose <span class="text-danger">*</span></label>
                                    <input type="" name="website" value="" class="form-control" readonly>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="price">Price <span class="text-danger">*</span></label>
                                    <input type="text" name="price" class="form-control" value="" readonly>
                                </div>
                            </div>

                            <div class="col-md-6 d-none" id="period_box">
                                <div class="form-group">
                                    <label for="period">Period <span class="text-danger">*</span></label>
                                   <input type="text" name="" class="form-control" value="" readonly>
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
                                    <input type="text" name="area" value="" class="form-control" readonly>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Total Unit <span class="text-danger">*</span></label>
                                    <input type="number" name="unit" value="" class="form-control" readonly>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Total Room <span class="text-danger">*</span></label>
                                    <input type="number" name="room" value="" class="form-control" readonly>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Total Bedroom <span class="text-danger">*</span></label>
                                    <input type="number" name="bedroom" value="" class="form-control" readonly>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Total Bathroom <span class="text-danger">*</span></label>
                                    <input type="number" name="bathroom" value="" class="form-control" readonly>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Total Floor <span class="text-danger">*</span></label>
                                    <input type="number" name="floor" value="" class="form-control" readonly>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Total Kitchen </label>
                                    <input type="number" name="kitchen" value="" class="form-control" readonly>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Total Parking Place</label>
                                    <input type="number" name="parking" value="" class="form-control" readonly>
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
                                   <img src="img/4.png" style="width:30px;">
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="">Banner Image <span class="text-danger">*</span></label>
                                     <img src="img/4.png" style="width:30px;"> 
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="">Thumbnail Image <span class="text-danger">*</span></label>
                                     <img src="img/4.png" style="width:30px;">  
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Slider Images (Multiple) <span class="text-danger">*</span></label>
                                    <img src="img/4.png" style="width:30px;"> 
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Youtube Video Link</label>
                                    <input type="text" class="form-control" name="video_link" value="" readonly>
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
                                                                                                                                    <input value="1" type="checkbox" name="aminities[]" id="good-for-kids">
                                                <label class="mx-1" for="good-for-kids">Good for kids</label>
                                                                                                                                                                                <input value="2" type="checkbox" name="aminities[]" id="elevator-in-building">
                                                <label class="mx-1" for="elevator-in-building">Elevator in building</label>
                                                                                                                                                                                <input value="3" type="checkbox" name="aminities[]" id="bike-parking">
                                                <label class="mx-1" for="bike-parking">Bike Parking</label>
                                                                                                                                                                                <input value="4" type="checkbox" name="aminities[]" id="alcohol">
                                                <label class="mx-1" for="alcohol">Alcohol</label>
                                                                                                                                                                                <input value="5" type="checkbox" name="aminities[]" id="reservations">
                                                <label class="mx-1" for="reservations">Reservations</label>
                                                                                                                                                                                <input value="6" type="checkbox" name="aminities[]" id="free-coffee-and-tea">
                                                <label class="mx-1" for="free-coffee-and-tea">Free coffee and tea</label>
                                                                                                                                                                                <input value="7" type="checkbox" name="aminities[]" id="accepts-credit-cards">
                                                <label class="mx-1" for="accepts-credit-cards">Accepts Credit Cards</label>
                                                                                                                                                                                <input value="14" type="checkbox" name="aminities[]" id="air-condition">
                                                <label class="mx-1" for="air-condition">Air Condition</label>
                                                                                                                                                                                <input value="15" type="checkbox" name="aminities[]" id="cable-tv">
                                                <label class="mx-1" for="cable-tv">Cable Tv</label>
                                                                                                                                                                                <input value="16" type="checkbox" name="aminities[]" id="balcony">
                                                <label class="mx-1" for="balcony">Balcony</label>
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
                                            <select name="nearest_locations[]" id="" class="form-control">
                                                <option value="">Select Nearest Location</option>
                                                                                                <option value="1">Rail Station</option>
                                                                                                <option value="2">Bus Station</option>
                                                                                                <option value="3">Airport</option>
                                                                                                <option value="4">Beach</option>
                                                                                                <option value="5">Metro</option>
                                                                                                <option value="6">Bank</option>
                                                                                                <option value="7">School</option>
                                                                                                <option value="8">Hospital</option>
                                                                                                <option value="10">Super Market</option>
                                                                                                <option value="11">Pharmacy</option>
                                                                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="">Distance(km)</label>
                                            <input type="text" class="form-control" name="distances[]" readonly>
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
                                    <textarea class="form-control" rows="5" name="" readonly></textarea>
                                </div>

                                <div class="form-group mt-3">
                                    <label for="description">Description <span class="text-danger">*</span></label>
                                    <textarea class="summernote" id="summernote" name="description" readonly></textarea> 
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
                                <button class="btn btn-success btn-lg">Update</button>
                                </div> 
          </section> 
    </div>
    
    <?php include("includes/footer.php");?>
    <div class="control-sidebar-bg"></div>
  </div>
  <?php include("includes/js.php");?>
</body>
</html>