<?php include("includes/css.php"); ?>

<body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">
        <?php include("includes/header.php");?>
        <?php include("includes/sidebar.php");?>
        <div class="content-wrapper">

            <section class="content">
                <div class="box box-danger gurnew">
                    <div class="box-header with-border">
                        <h3 class="box-title">Agent Table</h3>
                    </div>
                    <div class="box-body table-responsive">
                        <table class="table table-bordered" id="example1">
                            <thead>
                                <tr>
                                    <th>Serial</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Photo</th>
                                    <th>Property</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
											 $j=1;
										            $sql2="SELECT * from es_property_user";
										            $exe2=mysqli_query($conn,$sql2);
										            while ($res=mysqli_fetch_array($exe2))
										            { ?>
                                <tr>
                                    <td><?php echo $j; $j++; ?></td>
                                    <td><?php echo $res['name']; ?></td>
                                    <td><?php echo $res['email_id']; ?></td>
                                    <td><?php echo $res['code']."".$res['mobile_no']; ?></td>
                                    <td><img src="img/<?= $res['profile_img']; ?>" width="60px" class="author__img"></td>
                                    <td> <form method="post" action="" id="FORM_ID">
                                        <select class="toggle btn btn-success nstatus" id="nstatus" data-toggle="toggle" role="button" style="width: 96.65px; height: 37.6px;">
                                            <option value="<?= $res['status']; ?>"><?= $res['status']; ?></option>
                                            <option value="Active" data-nid="<?= $res['id'];?>" for="" class="btn btn-success toggle-on">Active</option>
                                            <option value="Inactive" data-nid="<?= $res['id'];?>" for="" class="btn btn-success toggle-on">InActive</option>
                                        </select></form>
                                    </td>
                                    <td></td>
                                    <td> <a href="view-agent.php?id=<?php echo $res['id']; ?>" class="btn btn-success btn-sm"><i class="fa fa-eye fa-lg"></i></a>
<!--                                         <a href="edit-agent.php?id=<?= $res['id']; ?>" class="btn btn-md btn-success edit_data"><i class="fa fa-pencil fa-lg"></i></a>
 -->                                        <a href="javascript:delete_us_by_ID('<?php echo $res['id'] ?>');" class="ask btn btn-danger btn-md"><i class="fa fa-trash-o"></i></a>
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

        function delete_us_by_ID(id) {
            if (confirm('Do You Want to Deleting This \nContinue anyway?')) {
                window.location.href = 'delete_agent.php?id=' + id;
            }
        }
$(document).ready(function(){
$('.nstatus').on('change', function(){
    var nstatus = $(this).val();
    var nid = $(this).find(':selected').data('nid');
    var dbdetails="es_property_user";
    if(nstatus){
        $.ajax({
            type:'POST',
            url:'pupdate-status.php',
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
