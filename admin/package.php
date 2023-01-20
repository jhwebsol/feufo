<?php include("includes/css.php"); ?>

<body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">
        <?php include("includes/header.php");?>
        <?php include("includes/sidebar.php");?>
        <div class="content-wrapper">
            <section class="content-header">
                <a href="create-package.php" class="btn btn-primary" name="add" value="add" id="<?php echo $res["id"]; ?>" class="btn btn-md btn-success"><i class="fa fa-plus fa-lg" aria-hidden="true"></i> Create</a>
            </section>
            <section class="content">
                <div class="box box-danger gurnew">
                     <div class="box-header with-border">
                            <h3 class="box-title">Packages</h3>
                        </div>
                    <div class="box-body table-responsive">
                        <table class="table table-bordered example2">
                            <thead>
                                <tr>
                                    <th>Serial</th>
                                    <th>Package Type</th>
                                    <th>Package Name</th>
                                    <th>Price</th>
                                    <th>Number Of Days</th>
                                    <th>Number Of Property</th>
                                    <th>Number of Aminities</th>
                                    <th>Number of Nearest Place</th>
                                    <th>Number of Photo</th>
                                    <th>Allow Feature</th>
                                    <th>Number of Featured Property</th>
                                    <th>Allow Top Property</th>
                                    <th>Number of Top Property</th>
                                    <th>Allow Urgent Property</th>
                                    <th>Number Of Urgent Property </th>
                                    <th>Package Order</th>
                                    <th>Status</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $j=1; $sql2="SELECT * from plan_pricing";
							            $exe2=mysqli_query($conn,$sql2);
							            while ($res=mysqli_fetch_array($exe2)){ ?>
                                <tr>
                                    <td><?php echo $j; $j++; ?></td>
                                    <td><?php echo $res['package_type']; ?></td>
                                    <td><?php echo $res['plan_name']; ?></td>
                                    <td><?php echo $res['plan_price']; ?></td>
                                    <td><?php echo $res['duration']; ?></td>
                                    <td><?php echo $res['no_of_property']; ?></td>
                                    <td><?php echo $res['no_of_aminities']; ?></td>
                                    <td><?php echo $res['no_of_nearest_place']; ?></td>
                                    <td><?php echo $res['no_of_photo']; ?></td>
                                    <td><?php echo $res['feature']; ?></td>
                                    <td><?php echo $res['no_of_feature_property']; ?></td>
                                    <td><?php echo $res['top_property']; ?></td>
                                    <td><?php echo $res['no_of_top_property']; ?></td>
                                    <td><?php echo $res['urgent']; ?></td>
                                    <td><?php echo $res['no_of_urgent_property']; ?></td>
                                    <td><?php echo $res['package_order']; ?></td>
                                    <td><?php if($res['status']=='1'){ echo "Active"; }else{ echo "Inactive"; }; ?></td>
                                     <td><form method="post" action="" id="FORM_ID">
                                        <select class="toggle btn btn-success nstatus" id="nstatus" data-toggle="toggle" role="button" style="width: 96.65px; height: 37.6px;">
                                            <option value="<?= $res['status']; ?>"><?php if($res['status']=='1'){ echo "Active"; }else{ echo "Inactive"; }; ?></option>
                                            <option value="Active" data-nid="<?= $res['id'];?>" for="" class="btn btn-success toggle-on">Active</option>
                                            <option value="Inactive" data-nid="<?= $res['id'];?>" for="" class="btn btn-success toggle-on">InActive</option>
                                        </select></form>
                                    </td>
                                    <td><a href="edit-package-plan.php?id=<?= $res['id']; ?>" class="btn btn-md btn-success edit_data"><i class="fa fa-pencil fa-lg"></i></a>
                                        <a href="javascript:delete_test_by_ID('<?php echo $res['id'] ?>');" class="ask btn btn-danger btn-md"><i class="fa fa-trash-o"></i></a>
                                    </td>
                                </tr>
                                <?php } ?>
                            </tbody>
                        </table>
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
$(document).ready(function(){
$('.nstatus').on('change', function(){
    var nstatus = $(this).val();
    var nid = $(this).find(':selected').data('nid');
    var dbdetails="plan_pricing";
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
        function delete_test_by_ID(id) {
            if (confirm('Do You Want to Deleting This \nContinue anyway?')) {
                window.location.href = 'delete_prplan.php?id=' + id;
            }
        }
    </script>
</body>

</html>