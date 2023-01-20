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
                    <li><a href="dashboard.php"><i class="la la-home"></i>Dashboard</a></li>
                    <li><a href="my-profile.php"><i class="la la-user-tie"></i>My Profile</a></li>
                    <li><a href="edit-profile.php"><i class="la la-user-tie"></i>Edit Profile</a></li>
                    <li><a href="my-resume.php"><i class="la la-file-invoice"></i>My Resume</a></li> 
                    <li class="active"><a href="job-alerts.php"><i class="la la-bell"></i>Job Alerts</a></li>
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
          <h3>Job Alerts</h3>
          <div class="text">Ready to jump back in?</div>
        </div>

        <div class="row">
          <div class="col-lg-12">
            <!-- Ls widget -->
            <div class="ls-widget">
              <div class="tabs-box">
                <div class="widget-title">
                  <h4>My Job Alerts</h4>

                  <div class="chosen-outer">
                    <!--Tabs Box-->
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
                  <div class="table-outer table-responsive">
                    <table class="default-table manage-job-table table table-bordered">
                      <thead>
                        <tr>
                          <th>Title</th>
                          <th>Applications</th>
                          <th>Created &amp; Expired</th>
                          <th>Status</th>
                          <th>Action</th>
                        </tr>
                      </thead>

                      <tbody>
                        <tr>
                          <td>
                            <h6>Senior Full Stack Developer</h6>
                            <span class="info"><i class="icon flaticon-map-locator"></i> London, UK</span>
                          </td>
                          <td class="applied"><a href="#">Applied</a></td>
                          <td>September 27, 2022 <br>October 10, 2022</td>
                          <td class="status">Active</td>
                          <td>
                            <div class="option-box">
                              <ul class="option-list">
                                <li><button data-text="View Aplication"><span class="la la-eye"></span></button></li>
                                <li><button data-text="Reject Aplication"><span class="la la-pencil"></span></button></li>
                                <li><button data-text="Delete Aplication"><span class="la la-trash"></span></button></li>
                              </ul>
                            </div>
                          </td>
                        </tr> 
                        <tr>
                          <td>
                            <h6>Java Developer</h6>
                            <span class="info"><i class="icon flaticon-map-locator"></i> London, UK</span>
                          </td>
                          <td class="applied"><a href="#">Applied</a></td>
                          <td>August 27, 2022 <br>Octon=ber 15, 2022</td>
                          <td class="status">Active</td>
                          <td>
                            <div class="option-box">
                              <ul class="option-list">
                                <li><button data-text="View Aplication"><span class="la la-eye"></span></button></li>
                                <li><button data-text="Reject Aplication"><span class="la la-pencil"></span></button></li>
                                <li><button data-text="Delete Aplication"><span class="la la-trash"></span></button></li>
                              </ul>
                            </div>
                          </td>
                        </tr>
                      </tbody>
                    </table>
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