<?php include("includes/css.php");
if (isset($_POST['submit'])) {
extract($_POST);
date_default_timezone_set('Asia/Kolkata');
$date = date('Y-m-d H:i:s');
$ip=$_SERVER['REMOTE_ADDR'];
$sql="INSERT into designation(dname) values ('$dname')";
$result = mysqli_query($conn, $sql);
if($result){
   echo '<script>alert("Time Zone Successfully Added .")</script>'; 
}
}
if(isset($_POST['update']))
{
extract($_POST);
date_default_timezone_set('Asia/Kolkata');
$date = date('Y-m-d H:i:s');
$id=$_POST["id"];
$sql1 ="UPDATE designation SET dname='$dname' WHERE id='$id'"; 
$res=mysqli_query($conn,$sql1) or die(mysqli_error());
if($res){
   echo '<script>alert("Time Zone Successfully Updated .")</script>'; 
}
}
if(isset($_GET['status']))
{
    if($_GET['status']=='deactive')
    {
        $sid=$_GET['id'];
        $sql=mysqli_query($conn, "UPDATE `designation` SET `status` = '1' WHERE id='$sid'");
        if($sql)
        {
            header("location:designation.php");
        }
    }
}

?>
<body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">
        <?php include("includes/header.php");?>
        <?php include("includes/sidebar.php");?>
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <!-- Main content -->
            <section class="content">
                <div class="row"> 
                    <div class="col-md-8">
                        <div class="box box-primary">
                            <div class="box-header with-border">
                                <h3 class="box-title">Time Zone:</h3>
                            </div>
                            <!-- /.box-header -->
                            <div class="box-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered example3">
                                        <thead>
                                            <tr>
                                                <th>S. No</th>
                                                <th>Time Zone</th>
                                                <th>Edit</th>
                                                <th>Delete</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                    $sql=mysqli_query($conn,"select * from designation");
                                     $j=1;
                                    while($res= mysqli_fetch_array($sql)){  ?>
                                        <tr>
                                            <td><?php echo $j; $j++; ?></td>
                                            <td><?php echo $res['dname']; ?></td>       
                                            <td><input type="button" name="edit" value="Edit" id="<?php echo $res["id"]; ?>" class="btn btn-md btn-primary edit_data" /></td> 
                                             <td><a href="javascript:delete_course_by_ID('<?php echo $res['id'] ?>');" class="ask"><i class="fa fa-trash-o"></i></a></td>
                                        </tr> 
                                        <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <!-- /.box-body -->
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="box box-danger">
                            <div class="box-header">
                                <h3 class="box-title">Add New Time Zone</h3>
                            </div>
                            <div class="box-body">
                                <form method="post" action="">
                                    <div class="form-group">
                                        <label>Add Time Zone :</label>
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                <i class="fa fa-suitcase"></i>
                                            </div>
                                            <input type="text" name="dname" class="form-control" placeholder="Role">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="input-group">
                                            <input type="submit" name="submit" class="btn btn-success btn-md" value="Add">
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <!-- /.box-body -->
                        </div>
                    </div>
                </div>
                <div id="myModal" class="modal fade" role="dialog">
                      <div class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">Edit Time Zone</h4>
                          </div>
                          <div class="modal-body">
                             <form method="post" action="">
                                <div class="form-group">
                                    <label>Time Zone:</label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-suitcase"></i>
                                        </div> 
                                        <input type="text" name="dname" id="d_name" class="form-control" value="Admin">
                                    </div>
                                </div>
                                 <input type="hidden" name="id" id="id" />
                                <div class="form-group">
                                    <div class="input-group"> 
                                        <input type="submit" name="update" id="insert" class="btn btn-success btn-md" value="Update">
                                    </div>
                                </div>
                            </form>
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                          </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
        <?php include("includes/footer.php");?>
    </div>
    <?php include("includes/js.php");?>
<script language="javascript">
 $(document).ready(function(){ 
      $(document).on('click', '.edit_data', function(){  
           var c_id = $(this).attr("id");  
           $.ajax({  
                url:"edit_designation.php",  
                method:"POST",  
                data:{c_id:c_id},  
                dataType:"json",  
                success:function(data){  
                     console.log(data);
                     $('#d_name').val(data.dname); 
                     $('#id').val(data.id);  
                     $('#insert').val("Update");  
                     $('#myModal').modal('show');  
                }  
           });  
      });  
 });  

function delete_course_by_ID(id)
{
    if (confirm('Do You Want to Deleting This \nContinue anyway?')) {
        window.location.href = 'delete_designation.php?id=' + id;
    }
}
</script>

</body>
</html>
