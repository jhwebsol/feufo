<?php include("includes/css.php");
if (isset($_POST['bnsumbit'])){
extract($_POST);
  //var_dump($_POST);exit();
date_default_timezone_set('Asia/Kolkata');
$id=$_POST["id"];
$sqlg = "SELECT * from pages_banner where id = '$id'";
  $resultg = mysqli_query($conn,$sqlg) or die(mysqli_error());
  $resg = mysqli_fetch_object($resultg);
  if($_FILES["bimage"]["name"] != ""){
    $oname=$_FILES["bimage"]["name"];
    $pos = strrpos($oname, ".");
    $extension=substr($oname,$pos+1);
    $randt = md5(uniqid().rand());
    $tn = $_FILES["bimage"]["tmp_name"];
    $path = "banner/".$resg->id.$randt.'.'.$extension;
    $upath = "banner/".$resg->banner;
    unlink($upath);
     move_uploaded_file($tn,$path);
      $image = $resg->id.$randt.'.'.$extension;
    } else {
      $image = $resg->banner;
    }
$sqlup = "UPDATE pages_banner SET banner='$image' WHERE  id = $resg->id";
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
                        <h6 class="m-0 font-weight-bold text-primary">Banner Image</h6>
                    </div>
                    <div class="box-body table-responsive">
                        <table class="table table-bordered">
                            <tbody> 
                                <?php $idd="1";
                                $restp=mysqli_fetch_array(mysqli_query($conn,"SELECT * from pages_banner where id='".$idd."'")); ?>
                                <tr>
                                    <form action="" method="POST" enctype="multipart/form-data">
                                        <td>Property</td>
                                        <td><img src="admin/banner/<?= $restp['banner'];?>" alt="" width="200px"></td>
                                        <td><input type="file" class="form-control" name="bimage">
                                         <input type="hidden" value="<?php echo $restp['id']; ?>" name="id"></td>
                                        <td><button type="submit" name="bnsumbit" class="btn btn-success">Update</button> </td>
                                    </form> 
                                </tr>
                                <tr>
                                     <?php $bidd="3";
                                     $resm=mysqli_fetch_array(mysqli_query($conn,"SELECT * from pages_banner where id='".$bidd."'")); ?>
                                    <form action="" method="POST" enctype="multipart/form-data">
                                        <td>Blog</td>
                                        <td><img src="admin/banner/<?= $resm['banner'];?>" alt="" width="200px"></td>
                                        <td><input type="file" class="form-control" name="bimage">
                                        <input type="hidden" value="<?php echo $resm['id']; ?>" name="id"></td>
                                        <td><button type="submit" name="bnsumbit" class="btn btn-success">Update</button> </td>
                                    </form> 
                                </tr>
                                <tr><?php $fid="4";
                                     $refp=mysqli_fetch_array(mysqli_query($conn,"SELECT * from pages_banner where id='".$fid."'")); ?>
                                     <form action="" method="POST" enctype="multipart/form-data">
                                        <td>FAQ</td>
                                         <td><img src="admin/banner/<?= $refp['banner'];?>" alt="" width="200px"></td>
                                        <td><input type="file" class="form-control" name="bimage">
                                        <input type="hidden" value="<?php echo $refp['id']; ?>" name="id"></td>
                                        <td><button type="submit" name="bnsumbit" class="btn btn-success">Update</button> </td>
                                    </form> 
                                </tr>
                                <tr><?php $ctid="2";
                                     $rect=mysqli_fetch_array(mysqli_query($conn,"SELECT * from pages_banner where id='".$ctid."'")); ?>
                                     <form action="" method="POST" enctype="multipart/form-data">
                                        <td>Contact Us</td>
                                        <td><img src="admin/banner/<?= $rect['banner'];?>" alt="" width="200px"></td>
                                        <td><input type="file" class="form-control" name="bimage">
                                        <input type="hidden" value="<?php echo $rect['id']; ?>" name="id"></td>
                                        <td><button type="submit" name="bnsumbit" class="btn btn-success">Update</button> </td>
                                    </form> 
                                </tr>
                                <tr><?php $crid="5";
                                     $rescr=mysqli_fetch_array(mysqli_query($conn,"SELECT * from pages_banner where id='".$crid."'")); ?>
                                    <form action="" method="POST" enctype="multipart/form-data">
                                         <td>Career</td>
                                        <td><img src="admin/banner/<?= $rescr['banner'];?>" alt="" width="200px"></td>
                                        <td><input type="file" class="form-control" name="bimage">
                                        <input type="hidden" value="<?php echo $rescr['id']; ?>" name="id"></td>
                                        <td><button type="submit" name="bnsumbit" class="btn btn-success">Update</button> </td>
                                    </form> 
                                </tr>
                                <tr><?php $crid="6";
                                     $resagt=mysqli_fetch_array(mysqli_query($conn,"SELECT * from pages_banner where id='".$crid."'")); ?>
                                    <form action="" method="POST" enctype="multipart/form-data">
                                         <td>Agent</td>
                                        <td><img src="admin/banner/<?= $resagt['banner'];?>" alt="" width="200px"></td>
                                        <td><input type="file" class="form-control" name="bimage">
                                        <input type="hidden" value="<?php echo $resagt['id']; ?>" name="id"></td>
                                        <td><button type="submit" name="bnsumbit" class="btn btn-success">Update</button> </td>
                                    </form> 
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

        function delete_test_by_ID(id) {
            if (confirm('Do You Want to Deleting This \nContinue anyway?')) {
                window.location.href = 'delete_team.php?id=' + id;
            }
        }

    </script>
</body>

</html>
