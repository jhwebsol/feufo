<?php include("includes/css.php");
if(isset($_POST['update']))
{ extract($_POST);
$id=$_GET['id'];
$sql1 ="UPDATE  plan_pricing SET plan_name='$package_name',duration='$duration',plan_price='$plan_price',package_type='$package_type',no_of_property='$no_of_property',no_of_aminities='$no_of_aminities',no_of_nearest_place='$no_of_nearest_place',no_of_photo='$no_of_photo',feature='$feature',no_of_feature_property='$no_of_feature_property',top_property='$top_property',no_of_top_property='$no_of_top_property',urgent='$urgent',no_of_urgent_property='$no_of_urgent_property',package_order='$package_order',status='$status' WHERE id='$id'"; 
$res=mysqli_query($conn,$sql1) or die(mysqli_error());
if($res){
 echo "<script>window.location.href='package.php'</script>";
} }
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
                <div class="box box-danger gurnew">
                    <div class="box-header with-border">
                        <h3 class="box-title">Edit Package Form </h3>
                    </div>
                    <div class="box-body table-responsive">
                         <?php  $idd=$_GET['id'];
                          $sql2="SELECT * from plan_pricing where id='".$idd."'";
                                $exe2=mysqli_query($conn,$sql2);
                               $res=mysqli_fetch_array($exe2); ?>
                       <form method="post" action="">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="package_type">Package Type <span class="text-danger">*</span></label>
                                    <select name="package_type" id="package_type" class="form-control">
                                        <option value="<?php echo $res['package_type']; ?>"><?php echo $res['package_type']; ?></option>
                                        <option value="Premium">Premium</option>
                                        <option value="Free">Free</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="package_name">Package Name <span class="text-danger">*</span></label>
                                    <input type="text" name="package_name" class="form-control" id="package_name" value="<?php echo $res['plan_name']; ?>">
                                </div>
                            </div>
                            <div class="col-md-4" id="price-row">
                                <div class="form-group">
                                    <label for="price">Price <span class="text-danger">*</span></label>
                                    <input type="text" name="plan_price" class="form-control" id="price" value="<?php echo $res['plan_price']; ?>">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="no_of_days">no Of Days <span class="text-danger">*</span></label>
                                    <input type="number" name="duration" class="form-control" id="no_of_days" value="<?php echo $res['duration']; ?>">
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="no_of_property">Number Of Property <span class="text-danger">*</span></label>
                                    <input type="number" name="no_of_property" class="form-control" id="no_of_property" value="<?php echo $res['no_of_property']; ?>">
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="no_of_aminities">Number of Aminities <span class="text-danger">*</span></label>
                                    <input type="number" name="no_of_aminities" class="form-control" id="no_of_aminities" value="<?php echo $res['no_of_aminities']; ?>">
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="no_of_nearest_place">Number of Nearest Place <span class="text-danger">*</span></label>
                                    <input type="number" name="no_of_nearest_place" class="form-control" id="no_of_nearest_place" value="<?php echo $res['no_of_nearest_place']; ?>">
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="no_of_photo">Number Of Photo <span class="text-danger">*</span></label>
                                    <input type="number" name="no_of_photo" class="form-control" id="no_of_photo" value="<?php echo $res['no_of_photo']; ?>">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="feature">Allow Feature <span class="text-danger">*</span></label>
                                    <select name="feature" id="feature" class="form-control">
                                        <option value="<?php echo $res['feature']; ?>"><?php echo $res['feature']; ?></option>
                                        <option value="1">Yes</option>
                                        <option value="0">No</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4" id="feature-row">
                                <div class="form-group">
                                    <label for="no_of_feature_property">Number Of Featured Property <span class="text-danger">*</span></label>
                                    <input type="number" name="no_of_feature_property" id="no_of_feature_property" class="form-control" value="<?php echo $res['no_of_feature_property']; ?>">
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="top_property">Allow Top Property <span class="text-danger">*</span></label>
                                    <select name="top_property" id="top_property" class="form-control">
                                        <option value="<?php echo $res['top_property']; ?>"><?php echo $res['top_property']; ?></option>
                                        <option value="1">Yes</option>
                                        <option value="0">No</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4" id="top-row">
                                <div class="form-group">
                                    <label for="no_of_top_property">Number Of Top Property <span class="text-danger">*</span></label>
                                    <input type="number" name="no_of_top_property" id="no_of_top_property" class="form-control" value="<?php echo $res['no_of_top_property']; ?>">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="urgent">Allow Urgent Property<span class="text-danger">*</span></label>
                                    <select name="urgent" id="urgent" class="form-control">
                                        <option value="<?php echo $res['urgent']; ?>"><?php echo $res['urgent']; ?></option>
                                        <option value="1">Yes</option>
                                        <option value="0">No</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4" id="urgent-row">
                                <div class="form-group">
                                    <label for="no_of_urgent_property">Number Of Urgent Property <span class="text-danger">*</span></label>
                                    <input type="number" name="no_of_urgent_property" id="no_of_urgent_property" class="form-control" value="<?php echo $res['no_of_urgent_property']; ?>">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="status">Package Order <span class="text-danger">*</span></label>
                                    <input type="text" id="package_order" name="package_order" class="form-control" value="<?php echo $res['package_order']; ?>">
                                    <span class="text-danger d-none" id="order-error"></span>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="status">Status <span class="text-danger">*</span></label>
                                    <select name="status" id="status" class="form-control">
                                        <option value="<?php echo $res['status']; ?>"><?php echo $res['status']; ?></option>
                                        <option value="1">Yes</option>
                                        <option value="0">No</option>
                                    </select>
                                </div>
                            </div>
                            <div class="clearfix"></div>
                            <div class="col-md-4">
                                <div class="form-actions">
                                    <button type="submit" name="update" id="submit" class="btn btn-success btn-lg"> Update</button>
                                </div>
                            </div>
                        </div>
                        </form>
                    </div>
                </div>
            </section>
        </div>
        <?php include("includes/footer.php")?>
    </div>
    <?php include("includes/js.php")?>
</body>

</html>