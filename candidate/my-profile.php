<?php include("includes/db_config.php");
$id=$_SESSION['employee_id'];
$id=1;
$sql="select employee_details.* from employee_details where employee_details.id=".$id;
$result = mysqli_query($conn, $sql); ?>
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
                    <li class="active"><a href="my-profile.php"><i class="la la-user-tie"></i>My Profile</a></li>
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
          <h3>Candidate Profile!</h3>
          <div class="text">Ready to jump back in?</div>
        </div>

        <div class="row">
          <div class="col-lg-12">
             <div class="ls-widget">
              <div class="tabs-box">
                <div class="widget-title">
                  <h4>My Profile</h4>
                </div>
                <div class="widget-content">
                  <div class="uploading-outer"> 
                  <form class="default-form">
                    <?php $res= mysqli_fetch_array($result); ?> 
                    <div class="row">
                        <div class="form-group col-lg-6 col-md-12">
                        <label>Name </label>
                        <input type="text" name="name" placeholder="name" value="<?php echo $res['emp_name']; ?>" readonly="">
                      </div>
                       <div class="form-group col-lg-6 col-md-12">
                        <label>Email-Id</label>
                        <input type="email" name="name" placeholder="vethire@gmail.com" value="<?php echo $res['email_id']; ?>" readonly="">
                      </div>
                       <!-- <div class="form-group col-lg-6 col-md-12">
                        <label>Alt. Email-Id</label>
                        <input type="email" name="name" placeholder="info@feufo.com" readonly="">
                      </div> -->

                       <div class="form-group col-lg-6 col-md-12">
                        <label>Contact Number</label>
                        <input type="text" name="name" placeholder="+1-123 456 7890" value="" readonly="">
                      </div>
                         <div class="form-group col-lg-6 col-md-12">
                        <label>Alt. Contact Number</label>
                        <input type="text" name="name" placeholder="+1-123 456 7890" readonly="">
                      </div>
                         <div class="form-group col-lg-6 col-md-12">
                        <label>Date Of Birth</label>
                        <input type="date" name="name" placeholder="05-10-2022" readonly="">
                      </div>
                      <div class="form-group col-lg-6 col-md-12">
                        <label>Gender</label>
                        <input type="text" name="name" placeholder="Male" readonly="">
                      </div> 
                      <div class="form-group col-lg-6 col-md-12">
                        <label>Website</label>
                        <input type="text" name="name" placeholder="www.feufo.com" readonly="">
                      </div> 
                       <div class="form-group col-lg-12 col-md-12">
                        <label>Company Name </label>
                        <input type="text" name="name" placeholder="Company name" readonly="">
                      </div>  
                      <div class="form-group col-lg-12 col-md-12">
                        <label>About Me</label>
                        <textarea placeholder="Job Description" readonly="">Strong technical background in Java, spring (MVC), RESTFUL Web services and Postgres DB.
                            Thorough understanding of the responsibilities of the platform, database, API, caching layer, proxies, and other web services used in the system. Validating user actions on the client side and providing responsive feedback.
                            Writing non-blocking code, and resorting to advanced techniques such as multi-threading, when needed Skills:- Java, J2EE, Struts, Spring, Hibernate (Java), EJB and PostgreSQL </textarea>
                      </div>  
                       <div class="form-group col-lg-6 col-md-12">
                        <label>Facebook</label>
                        <input type="text" name="name" placeholder="www.facebook.com/" readonly="">
                      </div>

                      <div class="form-group col-lg-6 col-md-12">
                        <label>Twitter</label>
                        <input type="text" name="name" placeholder="www.twitter.com/" readonly="">
                      </div>

                       <div class="form-group col-lg-6 col-md-12">
                        <label>Linkedin</label>
                        <input type="text" name="name" placeholder="www.linkedin.com/" readonly="">
                      </div>

                       <div class="form-group col-lg-6 col-md-12">
                        <label>Gmail</label>
                        <input type="text" name="name" placeholder="" readonly="">
                      </div> 
                     
                       <div class="form-group col-lg-6 col-md-12">
                        <label>Country</label>
                       <input type="text" name="name" value="USA" readonly="">
                      </div>

                       <div class="form-group col-lg-6 col-md-12">
                        <label>City</label>
                          <input type="text" name="name" value="New York City" readonly="">
                      </div>

                       <div class="form-group col-lg-8 col-md-8">
                        <label>Complete Address</label>
                        <input type="text" name="name" placeholder="#121, New York City - 100001, USA" readonly="">
                      </div> 

                       <div class="form-group col-lg-4 col-md-4">
                        <label>Zipcode</label>
                        <input type="text" name="name" placeholder="" readonly="">
                      </div>  
                       <div class="form-group col-lg-4 col-md-4">
                        <label>Photo</label><br/>
                        <img src="https://www.feufo.com/img/Stevan.jpg" alt="" style="height: 150px;">
                      </div> 
                                                 
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
          </div>
        </div>
      </div>
    </section> 
    <?php include("includes/footer.php")?>
    </div>
    <?php include("includes/js.php");?>
</body>

</html>