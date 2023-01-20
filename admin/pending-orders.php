<?php include("includes/css.php"); ?>

<body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">
        <?php include("includes/header.php");?>
        <?php include("includes/sidebar.php");?>
        <div class="content-wrapper">
            <section class="content">
                <div class="box box-danger gurnew">
                    <div class="box-header with-border">
                        <h3 class="box-title">Pending Order Table</h3>
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

                                <tr>
                                    <td>1.</td>
                                    <td>Javed</td>
                                    <td>javed@gmail.com</td>
                                    <td>Pro</td>
                                    <td>01-03-2022</td>
                                    <td>01-05-2022</td>
                                    <td>$ 1200</td>
                                    <td><button class="btn btn-sm btn-warning">Pending</button> </td>
                                    <td> <a href="javascript:delete_test_by_ID('<?php echo $res['id'] ?>');" class="ask btn btn-danger btn-md"><i class="fa fa-trash-o"></i></a>
                                    </td>
                                </tr>

                                <tr>
                                    <td>2.</td>
                                    <td>Neha</td>
                                    <td>neha@gmail.com</td>
                                    <td>Pro</td>
                                    <td>11-01-2022</td>
                                    <td>11-06-2022</td>
                                    <td>$ 1200</td>
                                    <td><button class="btn btn-sm btn-warning">Pending</button> </td>
                                    <td> <a href="javascript:delete_test_by_ID('<?php echo $res['id'] ?>');" class="ask"><i class="fa fa-trash-o"></i></a>
                                    </td>
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
