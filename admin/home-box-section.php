<?php include("includes/css.php"); 
if(isset($_POST['top_submit'])) {
    extract($_POST);
   date_default_timezone_set('Asia/Kolkata');
$desp = htmlentities( $_POST['desps']);
$id=1;
$desp=mysqli_real_escape_string($conn,$desp);
$sql1 ="UPDATE  home_section SET desp='$desp',status='$status'  WHERE id='$id'"; 
$res=mysqli_query($conn,$sql1) or die(mysqli_error());
}
if(isset($_POST['fct_submit'])) {
extract($_POST);
date_default_timezone_set('Asia/Kolkata');
$id=1;
$title=mysqli_real_escape_string($conn,$title);
$title1=mysqli_real_escape_string($conn,$title1);
$title3=mysqli_real_escape_string($conn,$title3);
$title4=mysqli_real_escape_string($conn,$title4);
$title5=mysqli_real_escape_string($conn,$title5);
$sql1 ="UPDATE  home_section SET title1='$title',title2='$title1',title3='$title3',title4='$title4',title5='$title5'  WHERE id='$id'"; 
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
                                            <li class="active"><a href="#tab1default" data-toggle="tab">Why Feufo</a></li>
                                            <li><a href="#tab2default" data-toggle="tab">Feature Details</a></li> 
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
                                                 <form action="" method="post" enctype="multipart/form-data">
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label>Title1</label>
                                                            <input type="text" name="title" class="form-control" placeholder="Enter Header" value="<?= $restp['title1'];?>">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label>Title2</label>
                                                            <input type="text" name="title1" class="form-control" placeholder="Enter Header" value="<?= $restp['title2'];?>">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label>Title3</label>
                                                            <input type="text" name="title3" class="form-control" placeholder="Enter Header" value="<?= $restp['title3'];?>">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label>Title4</label>
                                                            <input type="text" name="title4" class="form-control" placeholder="Enter Header" value="<?= $restp['title4'];?>">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label>Title5</label>
                                                            <input type="text" name="title5" class="form-control" placeholder="Enter Header" value="<?= $restp['title5'];?>">
                                                        </div>
                                                    </div>
                                                   <!--  <div class="col-md-12">
                                                      <div class="form-group">
                                                          <label> Show Homepage </label>
                                                          <select class="form-control" name="status">
                                                              <option><?= $resfct['status'];?></option>
                                                              <option>Yes</option>
                                                              <option>No</option>
                                                          </select>
                                                      </div>
                                                  </div> -->  
                                                    <div class="col-md-4">
                                                      <div class="form-actions">
                                                          <button type="submit" name="fct_submit" class="btn btn-success btn-lg"> Update</button>
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