<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <?php include("includes/css.php");?>
</head>

<body>
    <div class="page-wrapper dashboard">
        <span class="header-span"></span>
        <?php include("includes/header.php");?>
        <div class="sidebar-backdrop"></div>
        <div class="user-sidebar">
            <div class="sidebar-inner">
                <ul class="navigation">
                    <li class="active"><a href="dashboard.php"><i class="la la-home"></i>Dashboard</a></li>
                    <li><a href="my-profile.php"><i class="la la-user-tie"></i>My Profile</a></li>
                    <li><a href="edit-profile.php"><i class="la la-user-tie"></i>Edit Profile</a></li>
                    <li><a href="my-resume.php"><i class="la la-file-invoice"></i>My Resume</a></li> 
                    <li><a href="job-alerts.php"><i class="la la-bell"></i>Job Alerts</a></li>
                    <li><a href="benifits-offered.php"><i class="la la-bell"></i>Benifit Offered</a></li>
                    <li><a href="shortlisted-jobs.php"><i class="la la-bookmark-o"></i>Shortlisted Jobs</a></li> 
                    <li><a href="messages.php"><i class="la la-comment-o"></i>Messages</a></li>
                    <li><a href="change-password.php"><i class="la la-lock"></i>Change Password</a></li>
                    <li><a href="logout.php"><i class="la la-sign-out"></i>Logout</a></li>
                </ul> 
            </div>
        </div>
        <section class="user-dashboard">
            <div class="dashboard-outer">
                <div class="upper-title-box">
                    <h3>Hello, Stevan!!</h3>
                    <div class="text">Ready to jump back in?</div>
                </div>
                <div class="row">
                    
                    <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12">
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
                    <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12">
                        <div class="ui-item ui-red">
                            <div class="left">
                                <i class="icon la la-file-invoice"></i>
                            </div>
                            <div class="right">
                                <h4>12</h4>
                                <p>Status</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12">
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
                    <div class="col-lg-12"> 
                        <div class="applicants-widget ls-widget">
                            <div class="widget-title">
                                <h4>Jobs selected Recently</h4>
                            </div>
                            <div class="widget-content">
                                <div class="row">
                                     <div class="job-block col-lg-6 col-md-12 col-sm-12">
                                        <div class="inner-box">
                                            <div class="content">
                                                <span class="company-logo"><img src="img/company-logo/1-1.png" alt=""></span>
                                                <h4><a href="#">Software Engineer (Android), Libraries</a></h4>
                                                <ul class="job-info">
                                                    <li><span class="icon flaticon-briefcase"></span> Segment</li>
                                                    <li><span class="icon flaticon-map-locator"></span> London, UK</li>
                                                    <li><span class="icon flaticon-clock-3"></span> 11 hours ago</li>
                                                    <li><span class="icon flaticon-money"></span> $35k - $45k</li>
                                                </ul>
                                                <ul class="job-other-info">
                                                    <li class="time">Full Time</li>
                                                    <li class="privacy">Private</li>
                                                    <li class="required">Urgent</li>
                                                </ul>
                                                <button class="bookmark-btn"><span class="flaticon-bookmark"></span></button>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="job-block col-lg-6 col-md-12 col-sm-12">
                                        <div class="inner-box">
                                            <div class="content">
                                                <span class="company-logo"><img src="img/company-logo/1-2.png" alt=""></span>
                                                <h4><a href="#">Recruiting Coordinator</a></h4>
                                                <ul class="job-info">
                                                    <li><span class="icon flaticon-briefcase"></span> Segment</li>
                                                    <li><span class="icon flaticon-map-locator"></span> London, UK</li>
                                                    <li><span class="icon flaticon-clock-3"></span> 11 hours ago</li>
                                                    <li><span class="icon flaticon-money"></span> $35k - $45k</li>
                                                </ul>
                                                <ul class="job-other-info">
                                                    <li class="time">Full Time</li>
                                                    <li class="privacy">Private</li>
                                                    <li class="required">Urgent</li>
                                                </ul>
                                                <button class="bookmark-btn"><span class="flaticon-bookmark"></span></button>
                                            </div>
                                        </div>
                                    </div>

                                     <div class="job-block col-lg-6 col-md-12 col-sm-12">
                                        <div class="inner-box">
                                            <div class="content">
                                                <span class="company-logo"><img src="img/company-logo/1-3.png" alt=""></span>
                                                <h4><a href="#">Product Manager, Studio</a></h4>
                                                <ul class="job-info">
                                                    <li><span class="icon flaticon-briefcase"></span> Segment</li>
                                                    <li><span class="icon flaticon-map-locator"></span> London, UK</li>
                                                    <li><span class="icon flaticon-clock-3"></span> 11 hours ago</li>
                                                    <li><span class="icon flaticon-money"></span> $35k - $45k</li>
                                                </ul>
                                                <ul class="job-other-info">
                                                    <li class="time">Full Time</li>
                                                    <li class="privacy">Private</li>
                                                    <li class="required">Urgent</li>
                                                </ul>
                                                <button class="bookmark-btn"><span class="flaticon-bookmark"></span></button>
                                            </div>
                                        </div>
                                    </div>

                                     <div class="job-block col-lg-6 col-md-12 col-sm-12">
                                        <div class="inner-box">
                                            <div class="content">
                                                <span class="company-logo"><img src="img/company-logo/1-4.png" alt=""></span>
                                                <h4><a href="#">Senior Product Designer</a></h4>
                                                <ul class="job-info">
                                                    <li><span class="icon flaticon-briefcase"></span> Segment</li>
                                                    <li><span class="icon flaticon-map-locator"></span> London, UK</li>
                                                    <li><span class="icon flaticon-clock-3"></span> 11 hours ago</li>
                                                    <li><span class="icon flaticon-money"></span> $35k - $45k</li>
                                                </ul>
                                                <ul class="job-other-info">
                                                    <li class="time">Full Time</li>
                                                    <li class="privacy">Private</li>
                                                    <li class="required">Urgent</li>
                                                </ul>
                                                <button class="bookmark-btn"><span class="flaticon-bookmark"></span></button>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="job-block col-lg-6 col-md-12 col-sm-12">
                                        <div class="inner-box">
                                            <div class="content">
                                                <span class="company-logo"><img src="img/company-logo/1-5.png" alt=""></span>
                                                <h4><a href="#">Senior Full Stack Engineer, Creator Success</a></h4>
                                                <ul class="job-info">
                                                    <li><span class="icon flaticon-briefcase"></span> Segment</li>
                                                    <li><span class="icon flaticon-map-locator"></span> London, UK</li>
                                                    <li><span class="icon flaticon-clock-3"></span> 11 hours ago</li>
                                                    <li><span class="icon flaticon-money"></span> $35k - $45k</li>
                                                </ul>
                                                <ul class="job-other-info">
                                                    <li class="time">Full Time</li>
                                                    <li class="privacy">Private</li>
                                                    <li class="required">Urgent</li>
                                                </ul>
                                                <button class="bookmark-btn"><span class="flaticon-bookmark"></span></button>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="job-block col-lg-6 col-md-12 col-sm-12">
                                        <div class="inner-box">
                                            <div class="content">
                                                <span class="company-logo"><img src="img/company-logo/1-6.png" alt=""></span>
                                                <h4><a href="#">Software Engineer (Android), Libraries</a></h4>
                                                <ul class="job-info">
                                                    <li><span class="icon flaticon-briefcase"></span> Segment</li>
                                                    <li><span class="icon flaticon-map-locator"></span> London, UK</li>
                                                    <li><span class="icon flaticon-clock-3"></span> 11 hours ago</li>
                                                    <li><span class="icon flaticon-money"></span> $35k - $45k</li>
                                                </ul>
                                                <ul class="job-other-info">
                                                    <li class="time">Full Time</li>
                                                    <li class="privacy">Private</li>
                                                    <li class="required">Urgent</li>
                                                </ul>
                                                <button class="bookmark-btn"><span class="flaticon-bookmark"></span></button>
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
     <?php include("includes/footer.php");?>
    </div>
    <?php include("includes/js.php");?>
</body>

</html>