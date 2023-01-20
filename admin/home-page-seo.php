<?php include("includes/css.php");
if(isset($_POST['submit'])) {
extract($_POST);
date_default_timezone_set('Asia/Kolkata');
$date=date("Y-m-d, H:i:s");
$id="1";
$sql1 ="UPDATE  seo_setup SET title='$title',desp='$desp',created_date='$date' WHERE id='$id'"; 
$res=mysqli_query($conn,$sql1) or die(mysqli_error());
}
?> 

<body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">
        <?php include("includes/header.php");?>
        <?php include("includes/sidebar.php");?>
        <div class="content-wrapper">
           
            <section class="content">
                <div class="col-md-6">
                    <div class="box box-danger gurnew">
                        <div class="box-header with-border">
                            <h3 class="box-title">Home Page</h3>
                        </div>
                        <div class="box-body table-responsive">
                            <form method="post" action="" enctype="multipart/form-data">
                                <?php $idd="1";
                                $restp=mysqli_fetch_array(mysqli_query($conn,"SELECT * from seo_setup where id='".$idd."'")); ?>
                                                 
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Title </label>
                                        <input type="text" value="<?= $restp['title'];?>" name="title" class="form-control" placeholder="Name">
                                    </div>
                                </div>
                                  <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Meta Description </label>
                                        <textarea name="desp" rows="4" class="form-control" placeholder=""><?= $restp['desp'];?></textarea>
                                    </div>
                                </div> 
                                <div class="col-md-12">
                                    <input type="submit" name="submit" class="btn btn-success btn-lg" value="Update">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </section>
        </div>
        <?php include("includes/footer.php")?>
    </div>
    <?php include("includes/js.php")?>
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
</script>
</body>
</html>