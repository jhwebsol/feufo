<?php include("includes/css.php"); ?>

<body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">
        <?php include("includes/header.php");?>
        <?php include("includes/sidebar.php");?>
        <div class="content-wrapper">
            <section class="content-header">
                <a href="pricing-orders.php" class="btn btn-success"><i class="fa fa-backward fa-lg" aria-hidden="true"></i> Go Back</a>
            </section>
            <section class="content">
                <div class="box box-danger gurnew">
                    <div class="box-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Order Details</h6>
                    </div>
                    <div class="box-body table-responsive">
                        <table class="table table-bordered" id="example1">
                            <tbody>
                                <tr>
                                    <th>Agent</th>
                                    <td>Javed</td>
                                </tr>
                                <tr>
                                    <th>Email</th>
                                    <td>javed@gmail.com</td>
                                </tr>
                                <tr>
                                    <th>Package Name</th>
                                    <td>Pro</td>
                                </tr>
                                <tr>
                                    <th>Amount</th>
                                    <td>$1200</td>
                                </tr>
                                <tr>
                                    <th>Payment Method</th>
                                    <td>Online</td>
                                </tr>
                                <tr>
                                    <th>Transaction-Id </th>
                                    <td>#1231231232</td>
                                </tr>
                                <tr>
                                    <th>Purchase Date</th>
                                    <td>01-03-2022</td>
                                </tr>
                                <tr>
                                    <th>Expired Date</th>
                                    <td>01-05-2022</td>
                                </tr>
                                <tr>
                                    <th>Status</th>
                                    <td><button class="btn btn-sm btn-success">Active</button> </td>
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
