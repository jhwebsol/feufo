 <?php include("db_config.php"); 
if (isset($_POST['blog_submit'])) {
extract($_POST);
date_default_timezone_set('Asia/Kolkata');
$date = date('Y-m-d H:i:s');
$blog_id=$_POST['blog_id'];
$comment=mysqli_real_escape_string($conn,$_POST['comment']);
$sql="INSERT into blog_enquiry(blog_id,name,email_id,comment,created_date) values ('$blog_id','$name','$email_id','$comment','$date')";
$res=mysqli_query($conn,$sql) or die(mysqli_error());
if($res){ 
  echo "<script> alert('Thank You ! We Will Get Back To You!!'); 
              </script>";
  }
} ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <?php include("css.php");?> 
<link href="../css/candidate.css" rel="stylesheet"> 
</head>
<?php $current_url=$_SERVER['REQUEST_URI']; 
$csub_id= explode("/", $current_url);
 $csub= $csub_id[2];
    $findid = (mysqli_query($conn, "SELECT * FROM blog"));
    while ($res2=mysqli_fetch_array($findid)) {
        if(strtolower(str_replace(" ", "-", $res2["blog_title"])) ==  $csub){
        echo $bid = $res2["id"];
        }
    }  
?>
<body>
    <div class="page-wrapper">
        <?php include("header.php");?>
<?php $sql_bggs="select * from blog where id='$bid'";
echo $sql_bggs;
$exe_bggs=mysqli_query($conn,$sql_bggs);
$res=mysqli_fetch_array($exe_bggs);    
?>
        <section class="page-title">
            <div class="auto-container">
                <div class="title-outer">
                    <h1>Blog</h1>
                    <ul class="page-breadcrumb">
                        <li><a href="index.php">Home</a></li>
                        <li> <?php echo $res['blog_title']; ?></li>
                    </ul>
                </div>
            </div>
        </section>
     <section class="blog-single">
      <div class="auto-container">
        <div class="upper-box">
          <h3> <?php echo $res['blog_title']; ?></h3>
          <ul class="post-info">
            <li><span class="thumb"><img src="img/user.jpg" alt=""></span> Admin</li>
            <li><?php $date=$res['blog_date']; 
            $newDate = date("d M Y", strtotime($date)); echo $newDate; ?></li>
            <li>12 Comment</li>
          </ul>
        </div>
      </div>
      <figure class="main-image"><img src="https://www.feufo.com/admin/img/blog/<?php echo $res['banner']; ?>" alt=""></figure>
      <div class="auto-container">
        <h4>Description</h4>
        <p> <?php echo html_entity_decode($res['blod_desp']); ?></p>
        <figure class="image"><img src="https://www.feufo.com/admin/img/blog/<?php echo $res['blog_image']; ?>" alt=""></figure>
        <h4>Requirements</h4>
        <p><?php echo html_entity_decode($res['requirement']); ?></p>
        <!-- Other Options -->
        <div class="other-options">
          <div class="social-share">
            <h5>Share this post</h5>
            <a href="#" class="facebook"><i class="fab fa-facebook-f"></i> Facebook</a>
            <a href="#" class="twitter"><i class="fab fa-twitter"></i> Twitter</a>
            <a href="#" class="google"><i class="fab fa-google"></i> Google+</a>
          </div>
 
        </div>
 
        <div class="comments-area">
          <!-- Comment Box -->
          <?php $blog_id = $res['id']; $status="Active";
          $sql_review="select blog_enquiry.* from blog_enquiry where blog_enquiry.blog_id='$blog_id' and blog_enquiry.status='$status' limit 3";
          $result_rev= mysqli_query($conn, $sql_review);
          while($res_rev= mysqli_fetch_array($result_rev))
          {  ?>
          <div class="comment-box">
            <h4>Comment</h4>
            <!-- Comment -->
            <div class="comment">
              <div class="user-thumb"><img src="../img/user.jpg" alt=""></div>
              <div class="comment-info">
                <div class="user-name"><?php echo $res_rev['name']; ?></div>
              </div>
              <div class="text"><?php echo $res_rev['comment']; ?></div>
            </div>
          </div><?php } ?>
        </div>


        <!-- Comment Form -->
        <div class="comment-form default-form">
          <h4>Leave your thought here</h4>
          <form method="post" action="">
            <div class="row clearfix">
              <div class="col-lg-6 col-md-12 col-sm-12 form-group">
                <label>Your Name</label>
                <input type="text" name="name" id="bname" placeholder="Name" required="">
                 <span style="color: red" id="bname_alert"></span>
              </div>
              <div class="col-lg-6 col-md-12 col-sm-12 form-group">
                <label>Your Email</label>
                <input type="email" name="email" id="email_id" placeholder="Email" required="">
                 <span style="color: red" id="email_alert"></span>
              </div>
              <div class="col-lg-12 col-md-12 col-sm-12 form-group">
                <label>Your Comment</label>
                <input name="blog_id" value="<?php echo $res['id']; ?>" type="hidden">
                <textarea name="comment" placeholder="Write Comment"></textarea>
              </div>
              <div class="col-lg-12 col-md-12 col-sm-12 form-group">
                <button class="theme-btn btn-style-one" id="blog_review" type="submit" name="blog_submit">Post Comment</button>
              </div>
            </div>
          </form>
        </div>
       </div>
    </section>
        <?php include("footer.php");?>
    </div>
    <?php include("js.php");?>
<script type="text/javascript">
$(document).ready(function(){  
    $("#bname").keyup(function(){
      return validatetext('bname','bname_alert'); 
});   }); 
$(document).ready(function(){  
    $("#email_id").keyup(function(){
      return validemailid('email_id','email_alert'); 
});   }); 
$(document).ready(function(){ 
$("#blog_review").click(function(){
  var bname    = validatetext('bname','bname_alert'); 
  var emailid    = validemailid('email_id','email_alert'); 
  if(emailid == 0 || bname == 0)
  {
    return false;
  }
  });  
}); 
</script>    
</body>

</html>