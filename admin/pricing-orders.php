<?php include("includes/css.php"); ?>

<body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">
        <?php include("includes/header.php");?>
        <?php include("includes/sidebar.php");?>
        <div class="content-wrapper">
            <section class="content">
                <div class="box box-danger gurnew">
                    <div class="box-header with-border">
                        <h3 class="box-title">Order Table</h3>
                    </div>
                    <div class="box-body table-responsive">
                        <table class="table table-bordered example1">
                            <thead>
                                <tr>
                                    <th>Serial</th>
                                    <th>Agent</th>
                                    <th>Email</th>
                                    <th>Package</th>
                                    <th>Purchase Date</th>
                                    <th>Expired Date</th>
                                    <th>Price</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                               <?php $i=1;
                                $sql_ptm=mysqli_query($conn, "select pricing_package_cart.*,plan_pricing.plan_name,plan_pricing.duration,es_property_user.name,es_property_user.email_id from pricing_package_cart join plan_pricing on pricing_package_cart.plan_id=plan_pricing.id join es_property_user on pricing_package_cart.puser_id=es_property_user.id");
                                    while($respck= mysqli_fetch_array($sql_ptm)){
                                     $duration=$respck['duration'];
                                     $trans_date=$respck['trans_date'];
                                     if($duration==="30"){
                                    $newDate = date('Y-m-d', strtotime($trans_date. ' + 1 months'));
                                    }else if($duration==="12 Month"){
                                    $newDate = date('Y-m-d', strtotime($trans_date. ' + 12 months'));
                                    $datetimes = date('Y-m-d'); 
                                    } ?>
                                <tr>
                                    <td><?php $i; $i++; ?></td>
                                    <td><?= $respck['name'];?></td>
                                    <td><?= $respck['email_id'];?></td>
                                    <td><?= $respck['plan_name'];?></td>
                                    <td><?= $respck['trans_date'];?></td>
                                    <td><?= $newDate;?></td>
                                    <td><?= $respck['price'];?></td>
                                    <td><button class="btn btn-sm btn-success"><?= $respck['payment_status'];?></button> </td>
                                    <td><a href="view-payment-details.php?id=<?php echo $respck['property_id']; ?>" class="btn btn-md btn-success edit_data"><i class="fa fa-pencil fa-lg"></i></a>
                                    </td>
                                </tr><?php } ?>
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
