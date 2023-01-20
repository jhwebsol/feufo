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
                          <a href="employer-jd.php"><i class="la la-bookmark-o"></i>Jd Details</a>
                            <a href="employer-all-candidate.php"><i class="la la-bookmark-o"></i>All Candidates</a>
                            <a href="employer-wishlist-candidate.php"><i class="la la-bookmark-o"></i>Wishlist Candidates</a>
                            <a href="employer-interview-candidate.php"><i class="la la-bookmark-o"></i>Interview Candidates</a>
                            <a href="employer-account-summary.php" class="boxactive"><i class="la la-box"></i>Account Summary</a>
                            <a href="employer-messages.php"><i class="la la-comment-o"></i>Messages</a>
                            <a href="employer-change-password.php"><i class="la la-lock"></i>Change Password</a>
                            <a href="logout.php"><i class="la la-sign-out"></i>Logout</a>
                        </ul>
                    </div>
                    <div class="col-lg-9 col-md-9">
                        <div class="rightbox">
                            <h3 class="text-black">Account Summary!</h3>
                            <div class="text">Ready to jump back in?</div>
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>S.No. </th>
                                            <th>Employee Id</th>
                                            <th>Employee Name</th>
                                            <th>Email</th>
                                            <th>Date Of Joining</th>
                                            <th>Salary</th>
                                            <th>Credit</th>
                                            <th>Debit</th>
                                            <th>Total</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>1.</td>
                                            <td>FF-C101</td>
                                            <td>Stefan</td>
                                            <td>stefan@gmail.com</td>
                                            <td>05-10-2022</td>
                                            <td>$1200 / Month</td>
                                            <td>$1200 </td>
                                            <td></td>
                                            <td>$1200 </td>
                                        </tr>
                                        <tr>
                                            <td>2.</td>
                                            <td>FF-C105</td>
                                            <td>Jone</td>
                                            <td>jone@gmail.com</td>
                                            <td>12-09-2022</td>
                                            <td>$2400 / Month</td>
                                            <td>$2400</td>
                                            <td></td>
                                            <td>$2400</td>
                                        </tr>
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th class="text-rignt" colspan="8">Total : </th>
                                            <td>$3600</td>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <?php include("includes/employer-footer.php");?>
        <?php include("includes/js.php");?>
        </body>
</html>