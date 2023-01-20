<?php include("includes/css.php"); 
if (isset($_POST['lg_sumbit'])){
extract($_POST);
  //var_dump($_POST);exit();
date_default_timezone_set('Asia/Kolkata');
$id=$_POST["id"];
$sqlg = "SELECT * from login_image where id = '$id'";
  $resultg = mysqli_query($conn,$sqlg) or die(mysqli_error());
  $resg = mysqli_fetch_object($resultg);
  if($_FILES["image"]["name"] != ""){
    $oname=$_FILES["image"]["name"];
    $pos = strrpos($oname, ".");
    $extension=substr($oname,$pos+1);
    $randt = md5(uniqid().rand());
    $tn = $_FILES["image"]["tmp_name"];
    $path = "img/".$resg->id.$randt.'.'.$extension;
    $upath = "img/".$resg->image;
    unlink($upath);
     move_uploaded_file($tn,$path);
      $image = $resg->id.$randt.'.'.$extension;
    } else {
      $image = $resg->image;
    }
$sqlup = "UPDATE login_image SET image='$image' WHERE  id = $resg->id";
$resultup = mysqli_query($conn,$sqlup) or die(mysqli_error());
}
?>

<body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">
        <?php include("includes/header.php");?>
        <?php include("includes/sidebar.php");?>
        <div class="content-wrapper">

            <section class="content">
                <div class="box box-danger gurnew">
                    <div class="box-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Login Image</h6>
                    </div>
                    <div class="box-body table-responsive">
                        <table class="table table-bordered">
                            <tbody>
                                <tr><?php $idd="1";
                                $restp=mysqli_fetch_array(mysqli_query($conn,"SELECT * from login_image where id='".$idd."'")); ?>
                                    <form action="" method="POST" enctype="multipart/form-data"> 
                                    <td>Admin Login</td>
                                    <td><img src="https://www.feufo.com/admin/img/<?= $restp['image'];?>" alt="" width="100px">
                                     <input type="hidden" value="<?php echo $restp['id']; ?>" name="id"></td>
                                    <td><input type="file" class="form-control" name="image" value=""></td>
                                    <td><button type="submit" name="lg_sumbit" class="btn btn-success">Update</button> </td>
                                    </form>
                                </tr>
                                <!-- <tr><form action="#" method="POST"></form> 
                                    <td>Staff Login</td>
                                    <td><img src="https://www.feufo.com/admin/banner/<?= $restp['banner'];?>" alt="" width="100px"></td>
                                    <td><input type="file" class="form-control" name="image" value=""></td>
                                    <td><button type="submit" class="btn btn-success">Update</button> </td>
                                </tr> --> 
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
