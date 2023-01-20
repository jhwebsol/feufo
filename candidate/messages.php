<?php include("includes/db_config.php"); 
 ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <?php include("includes/css.php");?>
    <style type="text/css">.btn-style-one{width:8%;margin-top:10px;}.type_msg{width:90%;}</style>
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
                    <li><a href="job-alerts.php"><i class="la la-bell"></i>Job Alerts</a></li>
                    <li><a href="benifits-offered.php"><i class="la la-bell"></i>Benifit Offered</a></li>
                    <li><a href="shortlisted-jobs.php"><i class="la la-bookmark-o"></i>Shortlisted Jobs</a></li> 
                    <li class="active"><a href="messages.php"><i class="la la-comment-o"></i>Messages</a></li>
                    <li><a href="change-password.php"><i class="la la-lock"></i>Change Password</a></li>
                    <li><a href="logout.php"><i class="la la-sign-out"></i>Logout</a></li>
                </ul> 
            </div>
        </div> 
      <section class="user-dashboard">
      <div class="dashboard-outer">
        <div class="upper-title-box">
          <h3>Messages</h3>
          <div class="text">Ready to jump back in?</div>
        </div>

        <div class="row">
          <div class="col-lg-12">
            <!-- Chat Widget -->
            <div class="chat-widget">
              <div class="widget-content">
                <div class="row">
                  <div class="contacts_column col-xl-4 col-lg-5 col-md-12 col-sm-12 chat" id="chat_contacts">
                    <div class="card contacts_card">
                      <div class="card-header">
                        <div class="search-box-one">
                          <form method="post" action="#">
                            <div class="form-group">
                              <span class="icon flaticon-search-1"></span>
                              <input type="search" name="search-field" value="" placeholder="Search" required="">
                            </div>
                          </form>
                        </div>
                      </div>
                      <!-- <div class="card-body contacts_body">
                        <ul class="contacts">
                          <li>
                            <a href="#">
                              <div class="d-flex bd-highlight">
                                <div class="img_cont">
                                  <img src="https://vethire.io/img/user.jpg" class="rounded-circle user_img" alt="">
                                </div>
                                <div class="user_info">
                                  <span>Darlene Robertson</span>
                                  <p> Head of Development</p>
                                </div>
                                <span class="info">5 mins</span>
                              </div>
                            </a>
                          </li> 
                          <li>
                            <a href="#">
                              <div class="d-flex bd-highlight">
                                <div class="img_cont">
                                  <img src="https://vethire.io/img/user.jpg" class="rounded-circle user_img" alt="">
                                </div>
                                <div class="user_info">
                                  <span>Albert Flores</span>
                                  <p>Head of Development</p>
                                </div>
                                <span class="info">10 mins</span>
                              </div>
                            </a>
                          </li>
                          <li class="active">
                            <a href="#">
                              <div class="d-flex bd-highlight">
                                <div class="img_cont">
                                  <img src="https://vethire.io/img/user.jpg" class="rounded-circle user_img" alt="">
                                </div>
                                <div class="user_info">
                                  <span>Williamson</span>
                                  <p>Head of Development</p>
                                </div>
                                <span class="info">12 mins <span class="count bg-warning">2</span></span>
                              </div>
                            </a>
                          </li>
                          <li>
                            <a href="#">
                              <div class="d-flex bd-highlight">
                                <div class="img_cont">
                                  <img src="https://vethire.io/img/user.jpg" class="rounded-circle user_img" alt="">
                                </div>
                                <div class="user_info">
                                  <span>Kristin Watson</span>
                                  <p>Head of Development</p>
                                </div>
                                <span class="info">42 mins</span>
                              </div>
                            </a>
                          </li>
                          <li>
                            <a href="#">
                              <div class="d-flex bd-highlight">
                                <div class="img_cont">
                                  <img src="https://vethire.io/img/user.jpg" class="rounded-circle user_img" alt="">
                                </div>
                                <div class="user_info">
                                  <span>Annette Black</span>
                                  <p>Head of Development</p>
                                </div>
                                <span class="info">1 Days</span>
                              </div>
                            </a>
                          </li>
                          <li>
                            <a href="#">
                              <div class="d-flex bd-highlight">
                                <div class="img_cont">
                                  <img src="https://vethire.io/img/user.jpg" class="rounded-circle user_img" alt="">
                                </div>
                                <div class="user_info">
                                  <span>Jacob Jones</span>
                                  <p>Head of Development</p>
                                </div>
                                <span class="info">2 Days</span>
                              </div>
                            </a>
                          </li>
                        </ul>
                      </div> -->
                    </div>
                  </div>
                  <div class=" col-xl-8 col-lg-7 col-md-12 col-sm-12 chat">
                    <div class="card message-card">
                      <div class="card-header msg_head">
                        <?php $user_id=$_SESSION['employee_id'];
                        $sqlsr =mysqli_query($conn,"SELECT * FROM employee_details WHERE id='".$user_id."'");
                        $resr= mysqli_fetch_array($sqlsr); ?>
                        <div class="d-flex bd-highlight">
                          <div class="img_cont">
                            <img src="admin/emp/<?= $resr['image'];?>" alt="" class="rounded-circle user_img">
                          </div>
                          <div class="user_info">
                            <span><?= $resr['name'];?></span>
                          </div>
                        </div>
                        <!-- <div class="btn-box">
                          <button class="dlt-chat">Delete Conversation</button>
                          <button class="toggle-contact"><span class="fa fa-bars"></span></button>
                        </div> -->
                      </div>

                      <div class="card-body msg_card_body">
                        <?php  
                        $squ=mysqli_query($conn,"select * from emp_message_chat where user_id='$user_id'");
                        while( $res=mysqli_fetch_array($squ)){
                               $user_msg=$res['user_msg'];
                               if(!empty($user_msg)){
                            ?>
                        <div class="d-flex justify-content-start mb-2">
                          <div class="img_cont_msg">
                            <img src="img/user.jpg" alt="" class="rounded-circle user_img_msg">
                            <div class="name">You <span class="msg_time"><?php $date= $res['user_date'];
                                                $newDate = date("d M Y H:i", strtotime($date));
                                                echo $newDate; ?></span></div>
                          </div>
                          <div class="msg_cotainer">
                            <?php echo $res['user_msg']; ?>
                          </div>
                        </div>
                         <?php }  $admin_msg=$res['admin_msg'];
                                 if(!empty($admin_msg)){ ?>
                        <div class="d-flex justify-content-end mb-2 reply">
                          <div class="img_cont_msg">
                            <img src="img/Stevan.jpg" alt="" class="rounded-circle user_img_msg">
                            <div class="name">Admin <span class="msg_time"><?php $date= $res['admin_date'];
                                $newDate = date("d M Y H:i", strtotime($date));
                                echo $newDate; ?></span></div>
                          </div>
                          <div class="msg_cotainer">
                             <?php echo $res['admin_msg']; ?>
                          </div>
                        </div>
                        <?php } } ?>
                      </div>

                      <div class="card-footer">
                        <div class="form-group mb-0">
                          <form action="" method="post" enctype="multipart/form-data">                          
                          <textarea class="form-control type_msg" name="msg" placeholder="Type a message..." st></textarea>
                          <button type="submit" name="send_ms" class="theme-btn btn-style-one submit-btn">Send</button>
                          </form>
                        </div>
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
    <?php include("includes/footer.php")?>
    </div>
    <?php include("includes/js.php");?>
</body>

</html>