<?php include("includes/css.php");
if (isset($_POST['submit'])) {
extract($_POST);
date_default_timezone_set('Asia/Kolkata');
$date = date('Y-m-d H:i:s');
$tmp_file = $_FILES['icons']['tmp_name'];
$ext = pathinfo($_FILES["icons"]["name"], PATHINFO_EXTENSION);
$rand = md5(uniqid().rand());
$gimg = $rand.".".$ext;
move_uploaded_file($tmp_file,"img/".$gimg);
$sql="INSERT into aboutus_box(title,number,icon,status,created_date) values ('$title','$number','$gimg','$status','$date')";
$res=mysqli_query($conn,$sql) or die(mysqli_error());
if($res){
     echo "<script>window.location.href='about-box-section.php'</script>";
}
}
if (isset($_POST['update'])) {
extract($_POST);
  //var_dump($_POST);exit();
   date_default_timezone_set('Asia/Kolkata');
$name = htmlentities( $_POST['name']);
$id=$_POST["id"];
$sql1 ="UPDATE aboutus_box SET title='$name',number='$num',status='$status'  WHERE id='$id'"; 
$res=mysqli_query($conn,$sql1) or die(mysqli_error());
if($res){
$sqlg = "SELECT * from aboutus_box where id = '$id'";
$resultg = mysqli_query($conn,$sqlg) or die(mysqli_error());
$resg = mysqli_fetch_object($resultg);
if($_FILES["icons"]["name"] != ""){
$oname=$_FILES["icons"]["name"];
$pos = strrpos($oname, ".");
$extension=substr($oname,$pos+1);
$tn = $_FILES["icons"]["tmp_name"];
$path = "img/".$resg->id.'ins'.'.'.$extension;
$upath = "img/".$resg->icon;
unlink($upath);
 move_uploaded_file($tn,$path);
  $image = $resg->id.'ins'.'.'.$extension;
} else {
  $image = $resg->icon;
}
$sqlup="UPDATE aboutus_box SET icon ='$image' WHERE  id = $resg->id";
$resultup = mysqli_query($conn,$sqlup) or die(mysqli_error());
}
} ?>
 
<body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">
        <?php include("includes/header.php")?>
        <?php include("includes/sidebar.php")?>
         <div class="content-wrapper">
            <section class="content-header">
                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModal"><i class="fa fa-plus fa-lg" aria-hidden="true"></i> Create</button>
            </section>
            <section class="content">
                <div class="row">
                    <div class="col-md-12">
                        <div class="box box-danger">
                            <div class="box-header with-border">
                                <h3 class="box-title">About Section</h3>
                            </div> 
                            <div class="box-body table-responsive">
                                <div class="card card-primary card-outline card-tabs">
                                    <div class="card-header p-0 pt-1 border-bottom-0">
                                        <ul class="nav nav-tabs">
                                            <li class="active"><a href="#tab1default" data-toggle="tab">About Section</a></li>
                                            <li><a href="#tab2default" data-toggle="tab">Home Section</a></li> 
                                        </ul>                                     
                                    </div>
                                    <div class="card-body">
                                        <div class="tab-content">
                                            <div class="tab-pane fade in active" id="tab1default">
                                                <table class="table table-bordered example2">
                                                    <thead>
                                                        <tr>
                                                            <th width="">Serial</th>
                                                            <th width="">Title</th>
                                                            <th width="">Number</th>
                                                            <th width="">Image</th>
                                                            <th width="">Status</th>
                                                            <th width="">Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                         <?php $sql_tsm=mysqli_query($conn,"select * from aboutus_box order by id DESC "); $i=1;
                                                         while($restsm= mysqli_fetch_array($sql_tsm)){ ?>
                                                        <tr>
                                                            <td><?php echo $j; $j++; ?></td>
                                                            <td><?= $restsm['title']; ?></td>
                                                            <td><?= $restsm['number']; ?></td>
                                                            <td><img src="admin/img/<?= $restsm['icon']; ?>"></td> 
                                                            <td><form method="post" action="" id="FORM_ID">
                                                                <select class="toggle btn btn-success nstatus"  id="nstatus" data-toggle="toggle" role="button" style="width:96.65px; height: 37.6px;">
                                                                <option for="" value="Active" data-nid="<?= $restsm['id'];?>" class="btn btn-success toggle-on">Active</option>
                                                                <option for="" value="Inactive" data-nid="<?= $restsm['id'];?>" class="btn btn-success toggle-on">InActive</option>
                                                                </select></form>
                                                            </td>
                                                            <td><button type="button" class="btn btn-primary edit_data" id="<?php echo $restsm["id"]; ?>"><i class="fa fa-pencil fa-lg"></i></button>
                                                            <a href="javascript:delete_box_by_ID('<?php echo $restsm['id']; ?>');">
                                                            <button type="button" class="btn btn-danger"><i class="fa fa-trash fa-lg"></i></button></a>
                                                            </td>
                                                        </tr> <?php } ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                            <div class="tab-pane fade" id="tab2default">
                                                <form action="" method="post" enctype="multipart/form-data">
                                                   <div class="col-md-12">
                                                      <div class="form-group">
                                                          <label> Show Homepage </label>
                                                          <select class="form-control">
                                                              <option>Yes</option>
                                                              <option>No</option>
                                                          </select>
                                                      </div>
                                                  </div>  
                                                  <div class="col-md-4">
                                                      <div class="form-actions">
                                                          <button type="submit" name="submit" id="submit" class="btn btn-success btn-lg"> Update</button>
                                                      </div>
                                                  </div>
                                              </form>
                                          </div>
                                        </div>
                                </div>
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
                                <h4 class="modal-title">About Home Box</h4>
                            </div>
                            <form method="post" id="insert_form" enctype="multipart/form-data">
                                <div class="modal-body">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Title</label>
                                            <input type="text" name="title" class="form-control" placeholder="Title">
                                        </div>
                                    </div>
                                     <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Number</label>
                                           <input type="number" name="number" class="form-control" placeholder="Enter Number">
                                        </div>
                                    </div> 
                                     <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Image/Icon(Size: 80px X 60px)</label>
                                           <input type="file" name="icons" class="form-control" placeholder="Choose Image">
                                        </div>
                                    </div> 
                                    <div class="col-md-12" style="margin-bottom:10px;">
                                        <div class="form-group">
                                            <label>Status</label>
                                            <select class="form-control" name="status">
                                                <option value="Active">Active</option>
                                                <option value="Inactive">Inactive</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <input type="submit" name="submit" id="submit" value="Save" class="btn btn-success" />
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
                                <h4 class="modal-title">Edit About Home Box</h4>
                            </div>
                            <form method="post" id="insert_form" enctype="multipart/form-data">
                                <div class="modal-body">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Title</label>
                                            <input type="text" name="name" id="title" class="form-control" placeholder="Title">
                                        </div>
                                    </div>
                                     <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Number</label>
                                           <input type="number" name="num" id="num" class="form-control" placeholder="Enter Number">
                                        </div>
                                    </div> 
                                     <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Image/Icon(Size: 80px X 60px)</label>
                                           <input type="file" name="icons" id="icons" class="form-control" placeholder="Choose Image">
                                        </div>
                                    </div> 
                                    <div class="col-md-12" style="margin-bottom:10px;">
                                        <div class="form-group">
                                            <label>Status</label>
                                            <select class="form-control" name="status" id="status">
                                                <option value="Active">Active</option>
                                                <option value="Inactive">Inactive</option>
                                            </select>
                                        </div>
                                    </div>
                                    <input type="hidden" name="id" id="ban_id" />
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

function delete_box_by_ID(id) {
    if (confirm('Do You Want to Deleting This \nContinue anyway?')) {
        window.location.href = 'delete_box.php?id=' + id;
    }
}
$(document).ready(function() {
    $(document).on('click', '.edit_data', function() {
        var bid = $(this).attr("id");
        $.ajax({
            url: "edit_aboutbox.php",
            method: "POST",
            data: {
                bid: bid
            },
            dataType: "json",
            success: function(data) {
                $('#title').val(data.title);
                $('#num').val(data.number);
                $('#status').val(data.status);
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
    var dbdetails="aboutus_box";
    if(nstatus){
        $.ajax({
            type:'POST',
            url:'update-status.php',
            data:'nstatus='+nstatus+ "&id=" + nid+ "&db=" + dbdetails,
            success:function(data){
                alert("successfully Updated");
               window.location.href=window.location.href;
            }
        }); 
    }
});
});
    </script>
</body>

</html>