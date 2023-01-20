<?php include("includes/db_config.php"); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <?php include("includes/css.php");?>
       <style>
        .menuesboxes {
            background-color: #2f315c !important;
            margin-top: 28px;
            padding-top: 20px;
        }

        .navgation {
            background-color: #fff;
            border: 1px solid #eee;
            border-radius: 5px;
        }

        .navgation a {
            padding: .75rem 1.25rem;
            background-color: #ced031 !important;
            color: #000 !important;
            font-weight: 600;
            display: block;
            width: 100%;
            border: 1px solid rgba(0, 0, 0, .125);
        }

        .navgation .boxactive {
            background-color: #fff !important;
            color: #000 !important;
        }

        .rightbox {
            background-color: #fff !important;
            padding: 10px 10px;border-radius: 5px;
        }
    </style>
</head>

<body>
    <div class="page-wrapper">
        <span class="header-span"></span>
        <?php include("includes/header.php");?>
        <section class="menuesboxes">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 col-md-3">
                        <ul class="navgation">
                            <a href="employer-dashboard.php"> <i class="la la-home"></i> Dashboard</a>
                            <a href="employer-profile.php"><i class="la la-user-tie"></i>My Profile</a>
<a href="employer-jd.php" class="boxactive"><i class="la la-bookmark-o"></i>Jd Details</a>
                            <a href="employer-all-candidate.php"><i class="la la-bookmark-o"></i>All Candidates</a>

                            <a href="employer-wishlist-candidate.php"><i class="la la-bookmark-o"></i>Wishlist Candidates</a>                      
      <a href="employer-interview-candidate.php"><i class="la la-bookmark-o"></i>Interview Candidates</a>
                            <a href="employer-account-summary.php"><i class="la la-box"></i>Account Summary</a>
                            <a href="employer-messages.php"><i class="la la-comment-o"></i>Messages</a>
                            <a href="employer-change-password.php"><i class="la la-lock"></i>Change Password</a>
                            <a href="logout.php"><i class="la la-sign-out"></i>Logout</a>
                        </ul>
                    </div>
                    <div class="col-lg-9 col-md-9">
                        <div class="rightbox">
   <div class="row" style="margin-bottom:10px;">
                           <div class="col-lg-10 col-md-10"> <h3 class="text-black">Jd Details</h3></div>
<div class="col-lg-2 col-md-2"> <a href="employer-add-jd.php" class="btn btn-sm btn-success">Add JD</a></div>
 </div>
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>S.No. </th>
                                            <th>Title</th>
                                            <th>Skills</th>                                             
                                            <th>Data</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $eid=$_SESSION['employer_id']; $j=1;
                                        $sqlsr =mysqli_query($conn,"SELECT * FROM jd_detail WHERE empr_id='".$eid."'");
                                         while($resr= mysqli_fetch_array($sqlsr)){ ?>
                                        <tr>
                                           <td><?php echo $j; $j++; ?></td>
                                            <td><?php echo $resr['subject']; ?></td>
                                            <td><?php $sk_id=$resr['skills'];
                                                $rids = explode(",",$sk_id);
                                                foreach($rids as $pm_id){
                                                $sqltps=mysqli_query($conn,"SELECT * from skill_detail where id='".$pm_id."'");
                                                while($restps=mysqli_fetch_array($sqltps)){ echo $restps['skill_name'].','; } } ?></td>
                                            <td style="height:300px"><div style="height:250px; overflow:auto"><?php echo html_entity_decode($resr['message']); ?></div></td>
                                            <td><a href="employer-edit-jd.php?id=<?php echo $resr['id'] ?>"><i class="fa fa-edit"></i></a> <a href="javascript:delete_empr_by_ID('<?php echo $resr['id'] ?>');"><i class="fa fa-trash"></i></a></td>
                                        </tr> <?php } ?>
                                    </tbody> 
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
<?php include("includes/employer-footer.php");?>
<?php include("includes/js.php");?>
<script type="text/javascript">
 function delete_empr_by_ID(id)
{
    if (confirm('Do You Want to Deleting This \nContinue anyway?')) {
        window.location.href = 'delete_empr_jd.php?id=' + id;
    }
}   
        </script>
        </body>
</html>