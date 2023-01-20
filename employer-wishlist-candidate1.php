<?php include("includes/db_config.php"); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <?php include("includes/css.php");?>
    <link href="https://www.feufo.com/css/box.css" rel="stylesheet">
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
            padding: 10px 10px;
            border-radius: 5px;
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
 <a href="employer-jd.php"><i class="la la-bookmark-o"></i>Jd Details</a>
                            <a href="employer-all-candidate.php"><i class="la la-bookmark-o"></i>All Candidates</a>
                            <a href="employer-shortlisted-candidate.php"><i class="la la-bookmark-o"></i>Shortlisted Candidates</a>
                            <a href="employer-wishlist-candidate.php"  class="boxactive"><i class="la la-bookmark-o"></i>Wishlist Candidates</a>
                            <a href="employer-account-summary.php"><i class="la la-box"></i>Account Summary</a>
                            <a href="employer-messages.php"><i class="la la-comment-o"></i>Messages</a>
                            <a href="employer-change-password.php"><i class="la la-lock"></i>Change Password</a>
                            <a href="logout.php"><i class="la la-sign-out"></i>Logout</a>
                        </ul>
                    </div>
                    <div class="col-lg-9 col-md-9">
                        <div class="rightbox">
                              <div class="ls-widget">
                                <div class="tabs-box">                                   

                                    <div class="widget-content">
                                        <div class="row">
                                             <div class="col-lg-12 col-md-12 mb-4"> <h3 class="text-black">Wishlist Candidates</h3></div>
                       <?php $eid=1; $status=0;
                         $sql_prdds=mysqli_query($conn,"select sub_category.sub_category_name,category.cat_name,employee_details.* from wishlist join employee_details on wishlist.emp_id=employee_details.id join category on employee_details.cat_id=category.id join sub_category on employee_details.subcat_id=sub_category.id where wishlist.empr_id='".$eid."' and wishlist.status='".$status."'"); 
                        while($rests= mysqli_fetch_array($sql_prdds)){
                        $cate = strtolower(str_replace(" ", "-", $rests['cat_name']));
                         $scate = strtolower(str_replace(" ", "-", $rests['sub_category_name']));  
                         $empr_name = strtolower(str_replace(" ", "-", $rests['emp_name']));    
                          ?>   
                            <div class="job-block-four col-lg-4 col-md-4 col-sm-12">
                                    <div class="propbox" style="background-image: url(https://www.feufo.com/admin/emp/<?php echo $rests['image']; ?>);">
                                        <div class="gradient">
                                            <div class="icons"><span data-id="<?= $_SESSION['employer_id'];?>" data-empid="<?= $rests['id'];?>" class="add-wishlists"><i class="fa fa-shopping-basket" aria-hidden="true"></i></span></div>
                                            <!-- <div class="icons1"><i class="icon flaticon-cart" aria-hidden="true"></i>
                                            </div> -->
                                            <div class="content">
                                               <a href="https://www.feufo.com/<?= "$cate/$scate/$empr_name" ?>">   
                                             <h2><?= $rests['emp_name'];?></h2>
                                             <p><?= $rests['job_title'];?></p>
                                             <p class="details"><?php $string = html_entity_decode($rests['desp']); echo substr($string, 0, 100) .((strlen($string) > 100) ? '' : ''); ?>...</p>
                                            </a>
                                            </div>
                                        </div>
                                    </div>
                               </div>
                            <?php } ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <?php include("includes/employer-footer.php");?>
    </div>
    <?php include("includes/js.php");?>
    <script type="text/javascript">
$(function() {
    $('body').on('click', '.add-wishlist', function() {
    var empr_id = $(this).data('id');
    var empid = $(this).data('empid');    
    var action = "add";
     //alert(empid);
    $.ajax({
        url: "https://www.feufo.com/insert_to_cart.php",
        method: "POST",
        data: {
        empr_id: empr_id,
        empid: empid,
       action: action
    },
    success: function(msg) {
    console.log(msg);
    }
  });
 });
});
</script>
</body>

</html>