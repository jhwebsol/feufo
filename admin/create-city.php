<?php include("includes/css.php");
if (isset($_POST['submit'])) {
extract($_POST);
$sql="INSERT into city(country_id,state_id,city_name,status) values ('$country','$state','$city','$status')";
$res=mysqli_query($conn,$sql) or die(mysqli_error());
if($res){
     echo "<script>window.location.href='city.php'</script>";
}
} ?>
<body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">
        <?php include("includes/header.php");?>
        <?php include("includes/sidebar.php");?>
        <div class="content-wrapper">
            <section class="content-header">
                <a href="city.php" class="btn btn-primary"><i class="fa fa-list fa-lg" aria-hidden="true"></i> All City</a>
            </section>
            <!-- Main content -->
            <section class="content">
                <div class="col-md-6">
                    <div class="box box-danger gurnew">
                        <div class="box-header with-border">
                            <h3 class="box-title">Create City Table</h3>
                        </div>
                        <div class="box-body table-responsive">
                            <form method="post" action="" enctype="multipart/form-data">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Country</label>
                                         <select type="text" name="country" id="ct_id" class="form-control">
                                             <?php $sql="select * from country ";
                                    $result = mysqli_query($conn, $sql);
                                    while($res= mysqli_fetch_array($result)){ ?>\
                                    <option value="">Select</option>
                                            <option value="<?php echo $res['id']; ?>"><?php echo $res['country_name']; ?></option><?php } ?>
                                        </select>
                                    </div>
                                </div>
                                  <div class="col-md-12">
                                    <div class="form-group">
                                        <label>State</label>
                                        <select type="text" name="state" id="state_id" class="form-control">
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>City </label>
                                        <input type="text" name="city" class="form-control" placeholder="City Name">
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Status</label>
                                        <select type="text" name="status" class="form-control">
                                            <option>Active</option>
                                            <option>InActive</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <input type="submit" name="submit" class="btn btn-success btn-md" value="Submit">
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

$(document).ready(function(){
            $('#ct_id').on('change', function(){
                var ct_id = $(this).val();
                if(ct_id){
                    $.ajax({
                        type:'POST',
                        url:'get_state.php',
                        data:'ct_id='+ct_id,
                        success:function(html){
                            $('#state_id').html(html);
                           // console.log(html);
                           // $('#city').html('<option value="">Select Division</option>'); 
                        }
                    }); 
                }
            });
        });

    function delete_video_by_ID(id) {
        if (confirm('Do You Want to Deleting This \nContinue anyway?')) {
            window.location.href = 'delete_ptype.php?id=' + id;
        }
    }

</script>

</html>
