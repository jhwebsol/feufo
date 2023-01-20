<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <?php include("includes/css.php");?> 
<link href="css/candidate.css" rel="stylesheet"> 
</head>

<body>
    <div class="page-wrapper">
        <?php include("includes/header.php");?>
        <section class="page-title">
            <div class="auto-container">
                <div class="title-outer">
                    <h1>Contact Us</h1>
                    <ul class="page-breadcrumb">
                        <li><a href="index.php">Home</a></li>
                        <li>Contact Us</li>
                    </ul>
                </div>
            </div>
        </section>
 <section class="contact-section">
      <div class="auto-container">
        <div class="">
          <div class="row">
            <div class="contact-block col-lg-4 col-md-6 col-sm-12">
              <div class="inner-box">
                <span class="icon"><img src="images/icons/placeholder.svg" alt=""></span>
                <h4>Address</h4>
                <p>Hyderabad, Telangana - 500001, India </p>
              </div>
            </div>
            <div class="contact-block col-lg-4 col-md-6 col-sm-12">
              <div class="inner-box">
                <span class="icon"><img src="images/icons/smartphone.svg" alt=""></span>
                <h4>Call Us</h4>
                <p><a href="tel:+19876543210" class="phone">+1-9876543210</a></p>
              </div>
            </div>
            <div class="contact-block col-lg-4 col-md-6 col-sm-12">
              <div class="inner-box">
                <span class="icon"><img src="images/icons/letter.svg" alt=""></span>
                <h4>Email</h4>
                <p><a href="mailto:info@feufo.com">info@feufo.com</a></p>
              </div>
            </div>
          </div>
        </div>


        <!-- Contact Form -->
        <div class="contact-form default-form">
          <h3>Leave A Message</h3>
          <!--Contact Form-->
          <form method="post" action="#" id="email-form">
            <div class="row">
              <div class="form-group col-lg-12 col-md-12 col-sm-12">
                <div class="response"></div>
              </div>

              <div class="col-lg-6 col-md-12 col-sm-12 form-group">
                <label>Your Name</label>
                <input type="text" name="username" class="username" placeholder="Your Name*" required="">
              </div>

              <div class="col-lg-6 col-md-12 col-sm-12 form-group">
                <label>Your Email</label>
                <input type="email" name="email" class="email" placeholder="Your Email*" required="">
              </div>

              <div class="col-lg-12 col-md-12 col-sm-12 form-group">
                <label>Subject</label>
                <input type="text" name="subject" class="subject" placeholder="Subject *" required="">
              </div>

              <div class="col-lg-12 col-md-12 col-sm-12 form-group">
                <label>Your Message</label>
                <textarea name="message" placeholder="Write your message..." required=""></textarea>
              </div>

              <div class="col-lg-12 col-md-12 col-sm-12 form-group">
                <button class="theme-btn btn-style-one" type="button" id="submit" name="submit-form">Send Massage</button>
              </div>
            </div>
          </form>
        </div>
        <!--End Contact Form -->
      </div>
    </section>
        <?php include("includes/footer.php");?>
    </div>
    <?php include("includes/js.php");?>
</body>

</html>