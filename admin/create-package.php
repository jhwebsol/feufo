<?php include("includes/css.php");?>
<?php if (isset($_POST['submit'])) {
extract($_POST);
$sql="INSERT into plan_pricing(package_type,plan_name,plan_price,duration,no_of_property,no_of_aminities,no_of_nearest_place,no_of_photo,feature,no_of_feature_property,top_property,no_of_top_property,urgent,no_of_urgent_property,package_order,status) values ('$package_type','$plan_name','$price','$number_of_days','$number_of_property','$number_of_aminities','$number_of_nearest_place','$number_of_photo','$feature','$number_of_feature_property','$top_property','$number_of_top_property','$urgent','$number_of_urgent_property','$package_order','$status')";
$res=mysqli_query($conn,$sql) or die(mysqli_error());
if($res){
     echo "<script>window.location.href='package.php'</script>";
}
}
if(isset($_POST['update']))
{
extract($_POST);
$id=$_POST["v_id"];
$sql1 ="UPDATE  es_property_type  SET types='$type',status='$status' WHERE id='$id'"; 
$res=mysqli_query($conn,$sql1) or die(mysqli_error());
if($res){
$sqlg = "SELECT * from es_property_type where id = '$id'";
$resultg = mysqli_query($conn,$sqlg) or die(mysqli_error());
$resg = mysqli_fetch_object($resultg);
 if($_FILES["icon"]["name"] != ""){
$oname=$_FILES["icon"]["name"];
$pos = strrpos($oname, ".");
$extension=substr($oname,$pos+1);
$tn = $_FILES["icon"]["tmp_name"];
$path = "product/image/".$resg->id.'908'.'.'.$extension;
$upath = "product/image/".$resg->icon;
unlink($upath);
move_uploaded_file($tn,$path);
 $image = $resg->id.'908'.'.'.$extension;
} else {
  $image = $resg->icon;
}
$sqlup = "UPDATE es_property_type SET  icon='$image' WHERE  id = $resg->id";
$resultup = mysqli_query($conn,$sqlup) or die(mysqli_error());	
}
}
?>

<body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">
        <?php include("includes/header.php");?>
        <?php include("includes/sidebar.php");?>
        <div class="content-wrapper">
            <section class="content-header">
                <a href="package.php" class="btn btn-primary" name="add" value="add" id="<?php echo $res["id"]; ?>" class="btn btn-md btn-success"><i class="fa fa-list fa-lg" aria-hidden="true"></i> All Package</a>
            </section>
            <section class="content">
                <form method="post" action="" enctype="multipart/form-data">
                <div class="box box-danger gurnew">
                    <div class="box-header with-border">
                        <h3 class="box-title">Package Form </h3>
                    </div>
                    <div class="box-body table-responsive">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="package_type">Package Type <span class="text-danger">*</span></label>
                                    <select name="package_type" id="package_type" class="form-control">
                                        <option value="Premium">Premium</option>
                                        <option value="Free">Free</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="package_name">Package Name <span class="text-danger">*</span></label>
                                    <input type="text" name="plan_name" class="form-control" id="package_name" >
                                </div>
                            </div>
                            <div class="col-md-4" id="price-row">
                                <div class="form-group">
                                    <label for="price">Price <span class="text-danger">*</span></label>
                                    <input type="text" name="price" class="form-control" id="price" >
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="number_of_days">Number Of Days <span class="text-danger">*</span></label>
                                    <input type="number" name="number_of_days" class="form-control" id="number_of_days" >
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="number_of_property">Number Of Property <span class="text-danger">*</span></label>
                                    <input type="number" name="number_of_property" class="form-control" id="number_of_property" >
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="number_of_aminities">Number of Aminities <span class="text-danger">*</span></label>
                                    <input type="number" name="number_of_aminities" class="form-control" id="number_of_aminities" >
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="number_of_nearest_place">Number of Nearest Place <span class="text-danger">*</span></label>
                                    <input type="number" name="number_of_nearest_place" class="form-control" id="number_of_nearest_place" >
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="number_of_photo">Number Of Photo <span class="text-danger">*</span></label>
                                    <input type="number" name="number_of_photo" class="form-control" id="number_of_photo" >
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="feature">Allow Feature <span class="text-danger">*</span></label>
                                    <select name="feature" id="feature" class="form-control">
                                        <option value="1">Yes</option>
                                        <option value="0">No</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4" id="feature-row">
                                <div class="form-group">
                                    <label for="number_of_feature_property">Number Of Featured Property <span class="text-danger">*</span></label>
                                    <input type="number" name="number_of_feature_property" id="number_of_feature_property" class="form-control" >
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="top_property">Allow Top Property <span class="text-danger">*</span></label>
                                    <select name="top_property" id="top_property" class="form-control">
                                        <option value="1">Yes</option>
                                        <option value="0">No</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4" id="top-row">
                                <div class="form-group">
                                    <label for="number_of_top_property">Number Of Top Property <span class="text-danger">*</span></label>
                                    <input type="number" name="number_of_top_property" id="number_of_top_property" class="form-control" >
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="urgent">Allow Urgent Property<span class="text-danger">*</span></label>
                                    <select name="urgent" id="urgent" class="form-control">
                                        <option value="1">Yes</option>
                                        <option value="0">No</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4" id="urgent-row">
                                <div class="form-group">
                                    <label for="number_of_urgent_property">Number Of Urgent Property <span class="text-danger">*</span></label>
                                    <input type="number" name="number_of_urgent_property" id="number_of_urgent_property" class="form-control" >
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="status">Package Order <span class="text-danger">*</span></label>
                                    <input type="text" id="package_order" name="package_order" class="form-control">
                                    <span class="text-danger d-none" id="order-error"></span>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="status">Status <span class="text-danger">*</span></label>
                                    <select name="status" id="status" class="form-control">
                                        <option value="1">Yes</option>
                                        <option value="0">No</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-actions">
                                    <button type="submit" name="submit" id="submit" class="btn btn-success btn-lg"> Save</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div></form>
            </section>
        </div>
        <?php include("includes/footer.php")?>
    </div>
    <?php include("includes/js.php")?>
</body>

</html>