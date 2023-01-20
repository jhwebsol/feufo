<?php include("includes/css.php"); 
if (isset($_POST['submit'])) {
extract($_POST);
$name = mysqli_real_escape_string($conn,$name);
$desp = mysqli_real_escape_string($conn,$details);
$get_hired = mysqli_real_escape_string($conn,$get_hired);
$hire_top_talent = mysqli_real_escape_string($conn,$hire_top_talent);
$sql="INSERT into slider(name,desp,get_hired,hire_top_talent) values ('$name','$desp','$get_hired','$hire_top_talent')";
$res=mysqli_query($conn,$sql) or die(mysqli_error());
if($res)
{   if(count($_FILES['ban_img']['name']) > 0)  {
        for($i = 0; $i < count($_FILES['ban_img']['name']); $i++){
        $tmp_file = $_FILES['ban_img']['tmp_name'][$i];
        $ext = pathinfo($_FILES["ban_img"]["name"][$i], PATHINFO_EXTENSION);
        $rand = md5(uniqid().rand());
        $upd_image = $rand.".".$ext;
        move_uploaded_file($tmp_file,"img/banner/".$upd_image);
        $sql_prd="INSERT into slider_img(image) values ('$upd_image')";
        $prd_res=mysqli_query($conn, $sql_prd) or die(mysqli_error());
          }
        }
 echo "<script>window.location.href='slider.php'</script>";
} }
if(isset($_POST['update']))
{
extract($_POST);
$id=$_POST["ban_id"];
$name = mysqli_real_escape_string($conn,$name);
$desp = mysqli_real_escape_string($conn,$details);
$get_hired = mysqli_real_escape_string($conn,$get_hired);
$hire_top_talent = mysqli_real_escape_string($conn,$hire_top_talent);
$sql1 ="UPDATE  slider SET name='$name',desp='$desp',get_hired='$get_hired',hire_top_talent='$hire_top_talent' WHERE id='$id'";
$res=mysqli_query($conn,$sql1) or die(mysqli_error());
if($res){
// $sqlg = "SELECT * from slider where id = $id";
//   $resultg = mysqli_query($conn,$sqlg) or die(mysqli_error());
//   $resg = mysqli_fetch_object($resultg);
//   if($_FILES["ban_img"]["name"] != ""){
// 	$oname=$_FILES["ban_img"]["name"];
// 	$pos = strrpos($oname, ".");
// 	$extension=substr($oname,$pos+1);
// 	$tn = $_FILES["ban_img"]["tmp_name"];
// 	$path = "banner/".$resg->id.'.'.$extension;
// 	$upath = "banner/".$resg->image;
// 	unlink($upath);
// 	 move_uploaded_file($tn,$path);
// 	  $image = $resg->id.'.'.$extension;
// 	} else {
// 	  $image = $resg->image;
// 	}
// $sqlup = "UPDATE slider SET  image =  '$image' WHERE  id = $resg->id";
// $resultup = mysqli_query($conn,$sqlup) or die(mysqli_error());
}
}
// if(isset($_POST['update']))
// { extract($_POST);
// $id=$_POST["s_id"];
// $sql1 ="UPDATE  city  SET country_id='$country',state_id='$state',city_name='$city_name',status='$status' WHERE id='$id'"; 
// $res=mysqli_query($conn,$sql1) or die(mysqli_error());
// if($res){
//  }
// }
?>

<body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">
        <?php include("includes/header.php")?>
        <?php include("includes/sidebar.php")?>
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <section class="content-header">
              <!--   <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal"><i class="fa fa-plus fa-lg" aria-hidden="true"></i> Create</button> -->
            </section>
            <section class="content">
                <div class="row">
                    <div class="col-md-12">
                        <div class="box box-danger">
                            <div class="box-header with-border">
                                <h3 class="box-title">Slider</h3>
                            </div>
                            <!-- /.box-header -->
                            <div class="box-body table-responsive">
                                <table class="table table-bordered example2">
                                    <thead>
                                        <tr>
                                            <th>S. No</th>
                                            <th>Title</th>
                                            <th>Details</th>
                                            <th>Get Hired Link</th>
                                            <th>Hire Top Talent Link</th>
                                            <!-- <th>Status</th> -->
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $j=1;
								            $sql2="SELECT * from slider";
								            $exe2=mysqli_query($conn,$sql2);
								            while ($res=mysqli_fetch_array($exe2))
								            { ?>
                                        <tr>
                                            <td><?php echo $j; $j++; ?></td>
                                            <td><?php echo $res['name']; ?></td>
                                            <td><?php echo $res['desp']; ?></td>
                                            <td><?php echo $res['get_hired']; ?></td>
                                            <td><?php echo $res['hire_top_talent']; ?></td>
                                            <!-- <td><form method="post" action="" id="FORM_ID">
                                        <select class="toggle btn btn-success nstatus" id="nstatus" data-toggle="toggle" role="button" style="width: 96.65px; height: 37.6px;">
                                            <option value="<?= $res['status']; ?>"><?= $res['status']; ?></option>
                                            <option value="Active" data-nid="<?= $res['id'];?>" for="" class="btn btn-success toggle-on">Active</option>
                                            <option value="Inactive" data-nid="<?= $res['id'];?>" for="" class="btn btn-success toggle-on">InActive</option>
                                        </select></form>
                                            </td> -->
                                            <td>
                                                <a href="view-slider.php?id=<?= $res['id']; ?>" class="edit_data"><button type="button" class="btn btn-eye"><i class="fa fa-eye fa-lg"></i></button></a>
                                                <input type="button" name="edit" value="Edit" id="<?php echo $res["id"]; ?>" class="btn btn-md btn-primary edit_data" />
                                                <a href="javascript:delete_us_by_ID('<?php echo $res['id'] ?>');" class="btn btn-danger btn-sm"><i class="fa fa-trash fa-lg"></i></a>
                                            </td>
                                        </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                            
                        </div>
                    </div>

                </div>
                <!-- Modal Banner -->
                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h4 class="modal-title">Create Slider Form</h4>
                            </div>
                            <form method="post" action="" enctype="multipart/form-data">
                                <div class="modal-body">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Title</label>
                                            <input type="text" name="name" class="form-control" placeholder="Title">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Details</label>
                                            <textarea name="details" class="form-control" placeholder="Title"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Get Hired Link</label>
                                            <input type="text" name="get_hired" class="form-control" placeholder="Title">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Hire Top Talent Link</label>
                                            <input type="text" name="hire_top_talent" class="form-control" placeholder="Title">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Banner Image (Size: 1900 X 465px)</label>
                                            <input type="file" name="ban_img[]" class="form-control" placeholder=" Photo" multiple>
                                        </div>
                                    </div>
                                    <!-- <div class="col-md-12" style="margin-bottom:10px;">
                                        <div class="form-group" >
                                            <label>Status</label>
                                            <select class="form-control" name="status">
                                                <option >Active</option>
                                                <option >InActive</option>
                                            </select>
                                        </div>
                                    </div> -->
                                </div>
                                <div class="modal-footer">

                                    <input type="submit" name="submit" value="Insert" class="btn btn-success" />
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="modal fade" id="add_data_Modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h4 class="modal-title">Update Slider</h4>
                            </div>
                            <form method="post" action="" enctype="multipart/form-data">
                                <div class="modal-body">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Title</label>
                                            <input type="text" name="name" id="name" class="form-control" placeholder="Title">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Details</label>
                                            <input type="text" name="details" id="desp" class="form-control" placeholder="Title">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Get Hired Link</label>
                                            <input type="text" name="get_hired" id="get_hired" class="form-control" placeholder="Title">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Hire Top Talent Link</label>
                                            <input type="text" name="hire_top_talent" id="hire_top_talent" class="form-control" placeholder="Title">
                                        </div>
                                    </div>
                                    
                                   <!--  <div class="col-md-12" style="margin-bottom:10px;">
                                        <div class="form-group">
                                            <label>Status</label>
                                            <select class="form-control" name="status">
                                                <option for="">Active</option>
                                                <option for="">Inactive</option>
                                            </select>
                                        </div>
                                    </div> -->
                                    <input type="hidden" name="ban_id" id="ban_id" />
                                </div>
                                <div class="modal-footer">
                                    <input type="submit" name="update" id="insert" value="Update" class="btn btn-success" />
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <!-- ./Modal Banner -->
            </section>
        </div>
        <?php include("includes/footer.php")?>
    </div>
    <?php include("includes/js.php")?>
    <script>
        $(function() {
            $('#example1').DataTable()
            $('#example2').DataTable({
                'paging': true,
                'lengthChange': false,
                'searching': false,
                'ordering': true,
                'info': true,
                'autoWidth': false
            })
        })

        function delete_us_by_ID(id) {
            if (confirm('Do You Want to Deleting This \nContinue anyway?')) {
                window.location.href = 'delete_banner.php?id=' + id;
            }
        }

        $(document).ready(function() {
            $(document).on('click', '.edit_data', function() {
                var ban_id = $(this).attr("id");
                $.ajax({
                    url: "edit_slider_details.php",
                    method: "POST",
                    data: {
                        ban_id: ban_id
                    },
                    dataType: "json",
                    success: function(data) {
                        $('#name').val(data.name);
                        $('#desp').val(data.desp);
                        $('#get_hired').val(data.get_hired);
                        $('#hire_top_talent').val(data.hire_top_talent);
                        $('#ban_id').val(data.id);
                        $('#insert').val("Update");
                        $('#add_data_Modal').modal('show');
                    }
                });
            });

        });

        $(document).ready(function(){
$('.nstatus').on('change', function(){
    var nstatus = $(this).val();
    var nid = $(this).find(':selected').data('nid');
    var dbdetails="slider";
    if(nstatus){
        $.ajax({
            type:'POST',
            url:'update-status.php',
            data:'nstatus='+nstatus+ "&id=" + nid+ "&db=" + dbdetails,
            success:function(data){
                alert("successfully Updated");
               window.location.href=window.location.href;
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