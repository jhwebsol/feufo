<?php include("includes/css.php");
if(isset($_POST['submit']))
{ extract($_POST);
$id=$_SESSION['aid'];
if(!empty($_POST["password"])){
  $password = md5($_POST["password"]); 
}else{
  $password = ($_POST["lpassword"]); 
}
$sql1 ="UPDATE  es_admin_user SET email_id='$email_id',name='$name',contact_no='$contact_no',about_us='$about_us',address='$address',facebook='$facebook',twitter='$twitter',linkdin='$linkedin',whatsapp='$whatsapp',website='$website',password='$password' WHERE id='$id'"; 
$res=mysqli_query($conn,$sql1) or die(mysqli_error());
if ($res) {
$sqlg = "SELECT * from es_admin_user where id = '$id'";
$resultg = mysqli_query($conn,$sqlg) or die(mysqli_error($conn));
$resg = mysqli_fetch_object($resultg);
if($_FILES["banner"]["name"] != ""){
$oname=$_FILES["banner"]["name"];
$pos = strrpos($oname, ".");
$extension=substr($oname,$pos+1);
$tn = $_FILES["banner"]["tmp_name"];
$rand = md5(uniqid().rand());
$path = "img/".$resg->id.$rand.'.'.$extension;
$upath = "img/".$resg->banner;
unlink($upath);
 move_uploaded_file($tn,$path);
 $banner = $resg->id.$rand.'.'.$extension;
} else {
  $banner = $resg->banner;
} 
if($_FILES["image"]["name"] != ""){
$oname=$_FILES["image"]["name"];
$pos = strrpos($oname, ".");
$extension=substr($oname,$pos+1);
$rands = md5(uniqid().rand());
$tn = $_FILES["image"]["tmp_name"];
$path = "img/".$resg->id.$rands.'.'.$extension;
$upath = "img/".$resg->image;
unlink($upath);
 move_uploaded_file($tn,$path);
 $bimage = $resg->id.$rands.'.'.$extension;
} else {
  $bimage = $resg->image;
} 
$sqlup = "UPDATE es_admin_user SET image = '$bimage',banner = '$banner' WHERE id = $resg->id";
$resultup = mysqli_query($conn,$sqlup) or die(mysqli_error()); 
 }
}
 ?> 

<body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">
        <?php include("includes/header.php");?>
        <?php include("includes/sidebar.php");?>
        <div class="content-wrapper">
            
            <section class="content">
                <div class="row">
                <div class="col-md-12">
                    <div class="box box-danger gurnew">
                        <div class="box-header with-border">
                            <h3 class="box-title">My Profile</h3>
                        </div>
                        <?php $aid=$_SESSION['aid'];
                        $res=mysqli_fetch_array(mysqli_query($conn,"SELECT * from es_admin_user where id='".$aid."'")); ?>
                        <div class="box-body table-responsive">
                            <form method="post" action=" " enctype="multipart/form-data">
                                
                                   <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Existing Banner Image </label><br/>
                                        <img src="https://www.feufo.com/admin/img/<?= $res['banner']; ?>" style="width:150px;height:100px"><br/>
                                        <input type="file" name="banner" class="form-control" placeholder="Existing Banner Image">
                                    </div>
                                </div>
                                  <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Existing Image </label><br/>
                                        <img src="https://www.feufo.com/admin/img/<?= $res['image']; ?>" style="width:100px;height:100px"><br/>
                                        <input type="file" name="image" class="form-control" placeholder="Existing Image">
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Name </label>
                                        <input type="text" name="name" value="<?= $res['name']; ?>" class="form-control" placeholder="Name">
                                    </div>
                                </div>
                                  <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Email </label>
                                        <input type="email" name="email_id" value="<?= $res['email_id']; ?>" class="form-control" placeholder="Email">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Phone </label>
                                        <input type="text" name="phone" class="form-control" value="<?= $res['contact_no']; ?>" placeholder="Phone">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Facebook </label>
                                        <input type="text" name="facebook" value="<?= $res['facebook']; ?>" class="form-control" placeholder="Facebook">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Twitter </label>
                                        <input type="text" name="twiiter" value="<?= $res['twiiter']; ?>" class="form-control" placeholder="Twitter">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Linkedin </label>
                                        <input type="text" name="linkedin" value="<?= $res['linkdin']; ?>" class="form-control" placeholder="Linkedin">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Whatsapp </label>
                                        <input type="text" name="whatsapp" value="<?= $res['whatsapp']; ?>" class="form-control" placeholder="Whatsapp">
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Website </label>
                                        <input type="text" name="website" value="<?= $res['website']; ?>" class="form-control" placeholder="Website">
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Address </label>
                                        <textarea type="text" rows="1" name="address" class="form-control" placeholder=""><?= $res['address']; ?></textarea>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>About Us </label>
                                        <textarea type="text" rows="2" name="about_us" class="form-control" placeholder=""><?= $res['about_us']; ?></textarea>
                                    </div>
                                </div>
                                 <div class="col-md-6">
                                    <div class="form-group">
                                        <label>New Password </label>
                                        <input type="password" name="password" onkeyup="checkPass()" id="chpassword" class="form-control" placeholder="New Password">
                                        <input type="hidden" name="lpassword" value="<?= $res['password'];?>" class="form-control" placeholder="New Password">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Confirm Password </label>
                                        <input type="password" name="cpassword" onkeyup="checkPass()" id="cchpassword"  class="form-control" placeholder="Confirm Password">
                                        <span id="error-nwl"></span>
                                    </div>
                                </div> 

                                <div class="col-md-12">
                                    <input type="submit" name="submit" class="btn btn-success btn-md" value="Update">
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
<script language="javascript">
    $(document).ready(function() {
        $(document).on('click', '.edit_data', function() {
            var p_id = $(this).attr("id");
            $.ajax({
                url: "edit_ptype.php",
                method: "POST",
                data: {
                    p_id: p_id
                },
                dataType: "json",
                success: function(data) {
                    $('#type').val(data.types);
                    $('#v_id').val(data.id);
                    $('#insert').val("Update");
                    $('#add_data_Modal').modal('show');
                }
            });
        });

    });


    function delete_video_by_ID(id) {
        if (confirm('Do You Want to Deleting This \nContinue anyway?')) {
            window.location.href = 'delete_ptype.php?id=' + id;
        }
    }
function checkPass() {
var pass1 = document.getElementById('chpassword');
var pass2 = document.getElementById('cchpassword');
var message = document.getElementById('error-nwl');
var goodColor = "#66cc66";
var badColor = "#ff6666";

if (pass1.value.length > 5) {
pass1.style.backgroundColor = goodColor;
message.style.color = goodColor;
message.innerHTML = "character number ok!"
} else {
pass1.style.backgroundColor = badColor;
message.style.color = badColor;
message.innerHTML = " you have to enter at least 6 digit!"
return;
}

if (pass1.value == pass2.value) {
pass2.style.backgroundColor = goodColor;
message.style.color = goodColor;
message.innerHTML = "Password Match!"
} else {
pass2.style.backgroundColor = badColor;
message.style.color = badColor;
message.innerHTML = " These passwords don't match"
}
}
</script>

</html>
