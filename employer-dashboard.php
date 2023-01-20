<?php include("db_config.php"); ?>
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
                            <a href="employer-dashboard.php" class="boxactive"> <i class="la la-home"></i> Dashboard</a>
                            <a href="employer-profile.php"><i class="la la-user-tie"></i>My Profile</a>
<a href="employer-jd.php"><i class="la la-bookmark-o"></i>Jd Details</a>
                            <a href="employer-all-candidate.php"><i class="la la-bookmark-o"></i>All Candidates</a>
                            <a href="employer-shortlisted-candidate.php"><i class="la la-bookmark-o"></i>Shortlisted Candidates</a>
                            <a href="employer-wishlist-candidate.php"><i class="la la-bookmark-o"></i>Wishlist Candidates</a>
                            <a href="employer-account-summary.php"><i class="la la-box"></i>Account Summary</a>
                            <a href="employer-messages.php"><i class="la la-comment-o"></i>Messages</a>
                            <a href="employer-change-password.php"><i class="la la-lock"></i>Change Password</a>
                            <a href="logout.php"><i class="la la-sign-out"></i>Logout</a>
                        </ul>
                    </div>
                    <div class="col-lg-9 col-md-9">
                        <div class="rightbox">
                            
                            <div class="dashboard-outer">
                                <?php $eid=$_SESSION['employer_id'];
$sqlsr =mysqli_query($conn,"SELECT * FROM employer WHERE id='".$eid."'");
$resr= mysqli_fetch_array($sqlsr); ?>
                                <div class="upper-title-box">
                                    <h3 class="text-black">Hello, <?= $resr['emp_name'];?>!!</h3>
                                    <div class="text">Ready to jump back in?</div>
                                </div>
                                <div class="row">

                                    <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12">
                                        <div class="ui-item ui-green">
                                            <div class="left">
                                                <i class="icon la la-bookmark-o"></i>
                                            </div>
                                            <div class="right">
                                                <h4>10</h4>
                                                <p>Shortlisted Candidates</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12">
                                        <div class="ui-item">
                                            <div class="left">
                                                <i class="icon flaticon-briefcase"></i>
                                            </div>
                                            <div class="right">
                                                <h4>22</h4>
                                                <p>Appointment With Candidates</p>
                                            </div>
                                        </div>
                                    </div>
                                     
                                    <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12">
                                        <div class="ui-item ui-yellow">
                                            <div class="left">
                                                <i class="icon la la-comment-o"></i>
                                            </div>
                                            <div class="right">
                                                <h4>5</h4>
                                                <p>Messages</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-7">
                                         <div class="graph-widget ls-widget">
                                            <div class="tabs-box">
                                                <div class="widget-title">
                                                    <h4>Your Profile Views</h4>
                                                    <div class="chosen-outer">
                                                        <select class="chosen-select">
                                                            <option>Last 6 Months</option>
                                                            <option>Last 12 Months</option>
                                                            <option>Last 16 Months</option>
                                                            <option>Last 24 Months</option>
                                                            <option>Last 5 year</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="widget-content">
                                                    <canvas id="chart" width="100" height="45"></canvas>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-5">
                                        <div class="notification-widget ls-widget">
                                            <div class="widget-title">
                                                <h4>Notifications</h4>
                                            </div>
                                            <div class="widget-content">
                                                <ul class="notification-list">
                                                    <li><span class="icon flaticon-briefcase"></span> <strong>Jone</strong> selected for a job <span class="colored">Java Developer</span></li>
                                                    <li><span class="icon flaticon-briefcase"></span> <strong>Henry Wilson</strong> selected for a job <span class="colored">Senior Product Designer</span></li>
                                                    <li class="success"><span class="icon flaticon-briefcase"></span> <strong>Raul Costa</strong> selected for a job <span class="colored">Product Manager, Risk</span></li>
                                                    <li><span class="icon flaticon-briefcase"></span> <strong>Jack Milk</strong> selected for a job <span class="colored">Technical Architect</span></li>
                                                    <li class="success"><span class="icon flaticon-briefcase"></span> <strong>Michel Arian</strong> selected for a job <span class="colored">Software Engineer</span></li>
                                                    <li><span class="icon flaticon-briefcase"></span> <strong>Ali Tufan</strong> selected for a job <span class="colored">UI Designer</span></li>
                                                </ul>
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