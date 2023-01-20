<?php include("includes/css.php");
$id=$_GET['editid'];
$sql2="select * from blog where id='$id'";
$exe2=mysqli_query($conn,$sql2);
$res=mysqli_fetch_array($exe2);
$bid=$res['blog_cat'];
$sqlbg=mysqli_fetch_array(mysqli_query($conn,"select * from blog_category where id='$bid'")); ?>

<body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">
        <?php include("includes/header.php");?>
        <?php include("includes/sidebar.php");?>
        <div class="content-wrapper">
            <section class="content-header">
                <a href="blog-details.php" class="btn btn-success"><i class="fa fa-backward fa-lg" aria-hidden="true"></i> Go Back</a>
            </section>
            <section class="content">
                <div class="box box-danger gurnew">
                    <div class="box-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">View Blog Details</h6>
                    </div>
                    <div class="box-body table-responsive">
                        <table class="table table-bordered" id="example1">
                            <tbody>
                                <tr>
                                    <th>Title</th>
                                    <td><?php echo $res['blog_title']; ?></td>
                                </tr>
                                <tr>
                                    <th>Posted By</th>
                                    <td><?php echo $res['blog_postby']; ?></td>
                                </tr>
                                <tr>
                                    <th>Category</th>
                                    <td><?php echo $sqlbg['bc_name']; ?></td>
                                </tr>
                                <tr>
                                    <th>Short Description</th>
                                    <td><?php echo $res['short_desp']; ?></td>
                                </tr>
                                <tr>
                                    <th>Description</th>
                                    <td><?php echo $res['blod_desp']; ?></td>
                                </tr>
                                <tr>
                                    <th>Banner</th>
                                    <td><img src="img/blog/<?php echo $res['banner']; ?>" style="height:80px;"></td>
                                </tr>
                                <tr>
                                    <th>Photo </th>
                                    <td><img src="img/blog/<?php echo $res['blog_image']; ?>" style="height:100px;"></td>
                                </tr>
                                <tr>
                                    <th>Post Date</th>
                                    <td><?php echo $res['blog_date']; ?></td>
                                </tr>
                                <tr>
                                    <th>Status</th>
                                    <td><button class="btn btn-sm btn-success"><?php echo $res['status']; ?></button></td>
                                </tr>
                                <tr>
                                    <th>Show Home Page</th>
                                    <td><?php echo $res['show_home']; ?></td>
                                </tr>
                                <tr>
                                    <th>Seo Title</th>
                                    <td> <?php echo $res['title']; ?></td>
                                </tr>
                                <tr>
                                    <th>Seo Description</th>
                                    <td><?php echo $res['meta_keyword']; ?> </td>
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
