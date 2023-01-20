<?php include("includes/css.php"); 
if (isset($_POST['submitlk'])) {
  extract($_POST);
  //var_dump($_POST);exit();
   date_default_timezone_set('Asia/Kolkata');
$desp = htmlentities( $_POST['hdesp']);
$id=$_POST["id"];
$sql1 ="UPDATE  looking_for  SET title='$hname',desp='$desp'  WHERE id='$id'"; 
$res=mysqli_query($conn,$sql1) or die(mysqli_error());
}
if (isset($_POST['submitlkd'])) {
  extract($_POST);
  //var_dump($_POST);exit();
   date_default_timezone_set('Asia/Kolkata');
$id=$_POST["cid"];
$sql1 ="UPDATE  looking_for_detail  SET icon='$iconcode',desp='$desps'  WHERE id='$id'"; 
$res=mysqli_query($conn,$sql1) or die(mysqli_error());
}
if(isset($_POST['top_submit'])) {
    extract($_POST);
   date_default_timezone_set('Asia/Kolkata');
$desp = htmlentities( $_POST['desps']);
$id=$_POST["cid"];
$sql1 ="UPDATE  home_section SET title='$hname',desp='$desp',status='$status'  WHERE id='$id'"; 
$res=mysqli_query($conn,$sql1) or die(mysqli_error());
}
if(isset($_POST['fct_submit'])) {
      extract($_POST);
 date_default_timezone_set('Asia/Kolkata');
$desp = htmlentities( $_POST['desps']);
$id=$_POST["cid"];
$sql1 ="UPDATE  home_section SET title='$hname',desp='$desp',status='$status'  WHERE id='$id'"; 
$res=mysqli_query($conn,$sql1) or die(mysqli_error());
}
if(isset($_POST['clsubmit'])) {
      extract($_POST);
 date_default_timezone_set('Asia/Kolkata');
$desp = htmlentities( $_POST['desps']);
$id=$_POST["cid"];
$sql1 ="UPDATE  home_section SET title='$hname',desp='$desp',status='$status',url='$url'  WHERE id='$id'"; 
$res=mysqli_query($conn,$sql1) or die(mysqli_error());
}

?>
 
<body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">
        <?php include("includes/header.php")?>
        <?php include("includes/sidebar.php")?>
         <div class="content-wrapper">             
            <section class="content">
                <div class="row">
                    <div class="col-md-12">
                        <div class="box box-danger">
                            <div class="box-header with-border">
                                <h3 class="box-title">Home Section</h3>
                            </div> 
                            <div class="box-body table-responsive">
                                <div class="card card-primary card-outline card-tabs">
                                    <div class="card-header p-0 pt-1 border-bottom-0">
                                        <ul class="nav nav-tabs">
                                            <li class="active"><a href="#tab1default" data-toggle="tab">Top Property</a></li>
                                            <li><a href="#tab2default" data-toggle="tab">Featured Property</a></li> 
                                            <li><a href="#tab3default" data-toggle="tab">Urgent Property</a></li> 
                                            <li><a href="#tab4default" data-toggle="tab">Looking For</a></li> 
                                            <li><a href="#tab5default" data-toggle="tab">Agent</a></li> 
                                            <li><a href="#tab6default" data-toggle="tab">Blog</a></li> 
                                            <li><a href="#tab7default" data-toggle="tab">Client</a></li> 
                                        </ul>                                     
                                    </div>
                                    <div class="card-body">
                                        <div class="tab-content">
                                            <div class="tab-pane fade in active" id="tab1default">
                                                 <?php $idd="1";
                                                 $restp=mysqli_fetch_array(mysqli_query($conn,"SELECT * from home_section where id='".$idd."'")); ?>
                                                 <form action="" method="post" enctype="multipart/form-data">
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label>Header</label>
                                                            <input type="text" name="hname" id="hname" class="form-control" placeholder="Enter Header" value="<?= $restp['title'];?>">
                                                            <input type="hidden" value="<?= $restp['id']; ?>" name="cid">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label>Description</label>
                                                           <textarea type="text" rows="2" name="desps" class="form-control" placeholder="Enter Description"><?= $restp['desp'];?></textarea>
                                                        </div>
                                                    </div> 
                                                    <div class="col-md-12">
                                                      <div class="form-group">
                                                          <label> Show Homepage </label>
                                                          <select class="form-control" name="status">
                                                              <option><?= $restp['status'];?></option>
                                                              <option>Yes</option>
                                                              <option>No</option>
                                                          </select>
                                                      </div>
                                                  </div>  
                                                  <div class="col-md-4">
                                                      <div class="form-actions">
                                                          <button type="submit" name="top_submit" id="submit" class="btn btn-success btn-lg"> Update</button>
                                                      </div>
                                                  </div>
                                              </form>
                                            </div>
                                            <div class="tab-pane fade" id="tab2default">
                                               <?php $fid="2";
                                                 $resfct=mysqli_fetch_array(mysqli_query($conn,"SELECT * from home_section where id='".$fid."'")); ?>
                                                 <form action="" method="post" enctype="multipart/form-data">
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label>Header</label>
                                                            <input type="text" name="hname" id="hname" class="form-control" placeholder="Enter Header" value="<?= $resfct['title'];?>">
                                                            <input type="hidden" value="<?= $resfct['id']; ?>" name="cid">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label>Description</label>
                                                           <textarea type="text" rows="2" name="desps" class="form-control" placeholder="Enter Description"><?= $resfct['desp'];?></textarea>
                                                        </div>
                                                    </div> 
                                                    <div class="col-md-12">
                                                      <div class="form-group">
                                                          <label> Show Homepage </label>
                                                          <select class="form-control" name="status">
                                                              <option><?= $resfct['status'];?></option>
                                                              <option>Yes</option>
                                                              <option>No</option>
                                                          </select>
                                                      </div>
                                                  </div>  
                                                    <div class="col-md-4">
                                                      <div class="form-actions">
                                                          <button type="submit" name="fct_submit" class="btn btn-success btn-lg"> Update</button>
                                                      </div>
                                                  </div>
                                              </form>
                                          </div>  
                                            <div class="tab-pane fade" id="tab3default">
                                               <?php $fid="3";
                                                 $resurg=mysqli_fetch_array(mysqli_query($conn,"SELECT * from home_section where id='".$fid."'")); ?>
                                                 <form action="" method="post" enctype="multipart/form-data">
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label>Header</label>
                                                            <input type="text" name="hname" id="hname" class="form-control" placeholder="Enter Header" value="<?= $resurg['title'];?>">
                                                            <input type="hidden" value="<?= $resurg['id']; ?>" name="cid">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label>Description</label>
                                                           <textarea type="text" rows="2" name="desps" class="form-control" placeholder="Enter Description"><?= $resurg['desp'];?></textarea>
                                                        </div>
                                                    </div> 
                                                    <div class="col-md-12">
                                                      <div class="form-group">
                                                          <label> Show Homepage </label>
                                                          <select class="form-control" name="status">
                                                              <option><?= $resurg['status'];?></option>
                                                              <option>Yes</option>
                                                              <option>No</option>
                                                          </select>
                                                      </div>
                                                  </div>  
                                                  <div class="col-md-4">
                                                      <div class="form-actions">
                                                          <button type="submit" name="fct_submit" id="submit" class="btn btn-success btn-lg"> Update</button>
                                                      </div>
                                                  </div>
                                              </form>
                                          </div>

                                            <div class="tab-pane fade" id="tab4default">
                                                <form action="" method="post" enctype="multipart/form-data">
                                                     <?php $reslk=mysqli_fetch_array(mysqli_query($conn,"SELECT * from looking_for")); ?>
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label>Title Name:</label>
                                                            <input type="text" name="hname" id="hname" class="form-control" placeholder="Enter Title" value="<?= $reslk['title'];?>">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label>Description</label>
                                                           <textarea type="text" name="hdesp" rows="2" class="form-control" placeholder="Enter Description"><?= $reslk['desp'];?></textarea>
                                                        </div>
                                                    </div> 
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
                                                        <input type="hidden" class="form-control" value="<?php echo $reslk['id']; ?>" name="id" >
                                                          <button type="submit" name="submitlk" id="submit" class="btn btn-success btn-lg"> Update</button>
                                                      </div>
                                                  </div>
                                              </form>
                                                    <div class="col-md-12">
                                                        <table class="table table-bordered">
                                                           <thead>
                                                               <tr>
                                                                   <th>Serial</th>
                                                                   <th>Icon Code</th> 
                                                                   <th>Description</th>
                                                                   <th>Action</th>
                                                               </tr>
                                                           </thead>
                                                            <tbody> 
                                                                <?php $sqlds=mysqli_query($conn,"SELECT * from looking_for_detail"); $k=1;
                                                                while ($resds=mysqli_fetch_array($sqlds))
                                                                { ?>
                                                                <tr>
                                                                    <form action="#" method="POST">
                                                                        <td><?= $k; $k++;?></td> 
                                                                        <td><input type="text" class="form-control" name="iconcode" placeholder="Enter Icon Code" value="<?= $resds['icon'];?>"></td>
                                                                        <td><textarea name="desps" rows="2" class="form-control"><?= $resds['desp'];?></textarea></td>
                                                                        <td> <input type="hidden" class="form-control" value="<?php echo $resds['id']; ?>" name="cid">
                                                                            <button type="submit" name="submitlkd" class="btn btn-success">Update</button> </td>
                                                                    </form> 
                                                                </tr> <?php } ?>
                                                                                       
                                                            </tbody>
                                                        </table>
                                                    </div> 
                                                    
                                          </div>
                                             <div class="tab-pane fade" id="tab5default">
                                                 <?php $gid="4";
                                                 $resagt=mysqli_fetch_array(mysqli_query($conn,"SELECT * from home_section where id='".$gid."'")); ?>
                                                 <form action="" method="post" enctype="multipart/form-data">
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label>Header</label>
                                                            <input type="text" name="hname" id="hname" class="form-control" placeholder="Enter Header" value="<?= $resagt['title'];?>">
                                                            <input type="hidden" value="<?= $resagt['id']; ?>" name="cid">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label>Description</label>
                                                           <textarea type="text" rows="2" name="desps" class="form-control" placeholder="Enter Description"><?= $resagt['desp'];?></textarea>
                                                        </div>
                                                    </div> 
                                                    <div class="col-md-12">
                                                      <div class="form-group">
                                                          <label> Show Homepage </label>
                                                          <select class="form-control" name="status">
                                                              <option><?= $resagt['status'];?></option>
                                                              <option>Yes</option>
                                                              <option>No</option>
                                                          </select>
                                                      </div>
                                                  </div>  
                                                  <div class="col-md-4">
                                                      <div class="form-actions">
                                                          <button type="submit" name="fct_submit" id="submit" class="btn btn-success btn-lg"> Update</button>
                                                      </div>
                                                  </div>
                                              </form>
                                          </div>
                                           <div class="tab-pane fade" id="tab6default">
                                                 <?php $bid="5";
                                                 $resbg=mysqli_fetch_array(mysqli_query($conn,"SELECT * from home_section where id='".$bid."'")); ?>
                                                 <form action="" method="post" enctype="multipart/form-data">
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label>Header</label>
                                                            <input type="text" name="hname" id="hname" class="form-control" placeholder="Enter Header" value="<?= $resbg['title'];?>">
                                                            <input type="hidden" value="<?= $resbg['id']; ?>" name="cid">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label>Description</label>
                                                           <textarea type="text" rows="2" name="desps" class="form-control" placeholder="Enter Description"><?= $resbg['desp'];?></textarea>
                                                        </div>
                                                    </div> 
                                                    <div class="col-md-12">
                                                      <div class="form-group">
                                                          <label> Show Homepage </label>
                                                          <select class="form-control" name="status">
                                                              <option><?= $resbg['status'];?></option>
                                                              <option>Yes</option>
                                                              <option>No</option>
                                                          </select>
                                                      </div>
                                                  </div>  
                                                  <div class="col-md-4">
                                                      <div class="form-actions">
                                                          <button type="submit" name="fct_submit" id="submit" class="btn btn-success btn-lg"> Update</button>
                                                      </div>
                                                  </div>
                                              </form>
                                          </div>
                                           <div class="tab-pane fade" id="tab7default">
                                               <?php $cid="6";
                                                 $resclt=mysqli_fetch_array(mysqli_query($conn,"SELECT * from home_section where id='".$cid."'")); ?>
                                                 <form action="" method="post" enctype="multipart/form-data">
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label>Header</label>
                                                            <input type="text" name="hname" id="hname" class="form-control" placeholder="Enter Header" value="<?= $resclt['title'];?>">
                                                            <input type="hidden" value="<?= $resclt['id']; ?>" name="cid">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label>Description</label>
                                                           <textarea type="text" rows="2" name="desps" class="form-control" placeholder="Enter Description"><?= $resclt['desp'];?></textarea>
                                                        </div>
                                                    </div> 
                                                    <div class="col-md-12">
                                                      <div class="form-group">
                                                          <label> Show Homepage </label>
                                                          <select class="form-control" name="status">
                                                              <option><?= $resclt['status'];?></option>
                                                              <option>Yes</option>
                                                              <option>No</option>
                                                          </select>
                                                      </div>
                                                  </div>
                                                     <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label>Url:</label>
                                                            <input type="text" name="url" class="form-control" placeholder="Enter url" value="<?= $resclt['url'];?>">
                                                        </div>
                                                    </div>
                                                      
                                                  <div class="col-md-4">
                                                      <div class="form-actions">
                                                          <button type="submit" name="clsubmit" id="submit" class="btn btn-success btn-lg"> Update</button>
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

        function delete_ban_by_ID(id) {
            if (confirm('Do You Want to Deleting This \nContinue anyway?')) {
                window.location.href = 'delete_banner.php?id=' + id;
            }
        }

        $(document).ready(function() {

            $(document).on('click', '.edit_data', function() {
                var ban_id = $(this).attr("id");
                $.ajax({
                    url: "edit_banner.php",
                    method: "POST",
                    data: {
                        ban_id: ban_id
                    },
                    dataType: "json",
                    success: function(data) {
                        $('#name').val(data.name);
                        $('#ban_id').val(data.id);
                        $('#insert').val("Update");
                        $('#add_data_Modal').modal('show');
                    }
                });
            });

        });
    </script>
</body>

</html>