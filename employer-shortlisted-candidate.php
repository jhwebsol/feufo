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
                              <div class="ls-widget">
                                <div class="tabs-box">                                   

                                    <div class="widget-content">
                                        <div class="row">
                                             <div class="col-lg-12 col-md-12 mb-4"> <h3 class="text-black">Shortlist Candidates</h3></div>

                                        
                                            <div class="job-block-four col-lg-4 col-md-4 col-sm-12">
                                                <a href="https://www.feufo.com/pre-vetted/java-developer/joy-dezpenza">
                                                    <div class="propbox" style="background-image: url(https://www.feufo.com/admin/emp/74c763f559d7884d8f7f4288e90d7eca.jpg);">
                                                        <div class="gradient">
                                                            <div class="icons"><i class="fa fa-shopping-basket" aria-hidden="true"></i></div>
                                                            <!-- <div class="icons1"><i class="icon flaticon-cart" aria-hidden="true"></i>
                                                            </div> -->
                                                            <div class="content">
                                                                <h2 class="text-capitalize">joy dezpenza</h2>
                                                                <p class="text-capitalize">Senior Full Stack Developer</p>
                                                                <p class="details">He is currently working as a Cloud &amp; Infrastructure Architect at Moodys Analytics, Previously at Co...</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </a>
                                            </div>
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
</body>

</html>