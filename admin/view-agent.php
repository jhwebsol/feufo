<?php include("includes/css.php"); ?>

<body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">
        <?php include("includes/header.php");?>
        <?php include("includes/sidebar.php");?>
        <div class="content-wrapper">
            <section class="content-header">
                <a href="agent.php" class="btn btn-success"><i class="fa fa-backward fa-lg" aria-hidden="true"></i> Go Back</a>
            </section>
            <section class="content">
                <div class="box box-danger gurnew">
                    <div class="box-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">View Agent Information</h6>
                    </div>
                    <div class="box-body table-responsive">
                        <table class="table table-bordered" id="example1">
                            <thead>

                            </thead>
                            <tbody>
                                 <?php  $id=$_GET['id'];
                                  $sql2="SELECT es_property_user.*,es_property_type.types from es_property_user join es_property_type on es_property_user.personal_type=es_property_type.id where es_property_user.id='".$id."'";
                                        $exe2=mysqli_query($conn,$sql2);
                                        $res=mysqli_fetch_array($exe2); ?>
                                
                                <tr>
                                    <th>Photo</th>
                                    <td><img src="img/<?= $res['image']; ?>" width="60px" class="author__img"></td>
                                </tr>
                                <tr>
                                    <th>Agent</th>
                                    <td><?= $res['name']; ?></td>
                                </tr>
                                <tr>
                                    <th>Property Type</th>
                                    <td><?= $res['types']; ?></td>
                                </tr>
                                <tr>
                                    <th>Email</th>
                                    <td><?= $res['email_id']; ?></td>
                                </tr>
                                <tr>
                                    <th>Gender</th>
                                    <td><?= $res['gender']; ?></td>
                                </tr>
                                <tr>
                                    <th>Mobile No</th>
                                    <td><?= $res['mobile_no']; ?></td>
                                </tr>
                                <tr>
                                    <th>Alertnate Mobile No</th>
                                    <td><?= $res['alt_contact_no']; ?></td>
                                </tr>
                                <tr>
                                    <th>Status</th>
                                    <td><button class="btn btn-sm btn-success"><?= $res['status']; ?></button> </td>
                                </tr>

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
                window.location.href = 'delete_user.php?id=' + id;
            }
        }

    </script>
</body>

</html>
