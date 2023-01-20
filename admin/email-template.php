<?php include("includes/css.php"); ?>
<body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">
        <?php include("includes/header.php");?>
        <?php include("includes/sidebar.php");?>
        <div class="content-wrapper">
            
            <section class="content">
                <div class="box box-danger gurnew">
                    <div class="box-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Email Template</h6>
                    </div>
                    <div class="box-body table-responsive">
                        <table class="table table-bordered example2">
                            <thead>
                                <tr>
                                    <th>Serial</th>
                                    <th>Email Template</th>
                                    <th>Subject</th> 
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                  <?php $sql="select * from email_template";
                                    $result = mysqli_query($conn, $sql);
                                     $j=1;
                                    while($res= mysqli_fetch_array($result)){ ?>
                                <tr>
                                    <td><?= $j; $j++;?></td>
                                    <td><?= $res['name'];?></td>
                                    <td><?= $res['subject'];?></td> 
                                    <td><a href="edit-email-template.php?id=<?= $res['id'];?>" class="pl-10 pr-10 font-20"><i class="fa fa-pencil-square"></i></a>  </td>
                                </tr> <?php } ?>                              
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

        function delete_test_by_ID(id) {
            if (confirm('Do You Want to Deleting This \nContinue anyway?')) {
                window.location.href = 'delete_team.php?id=' + id;
            }
        }
    </script>
</body>

</html>