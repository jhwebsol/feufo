<?php include("includes/db_config.php");
 ?>
<div class="model">
  <!-- Login modal -->
  <div id="login-modal">
    <!-- Login Form -->
    <div class="login-form default-form">
      <div class="form-inner">
        <h3>Create a Free Feufo Account</h3>
        <form method="post" action="">
          <div class="form-group">
            <div class="btn-box row">
              <div class="col-lg-6 col-md-12">
                <a href="#" class="theme-btn btn-style-four"><i class="la la-briefcase"></i> Employer </a>
              </div>
            </div>
          </div>
          <div class="form-group">
            <label>Email Address</label>
            <input type="email" name="email" class="email-search" placeholder="Email"  required>
            <div class="alert alert-warning" id="result2" style="display: none;"> </div>
            <span style="color: red" id="email_alert"></span>
          </div>

          <div class="form-group">
            <label>Password</label>
            <input id="password-field" type="password" onkeyup="rgcheckPass()" name="password" id="chpassword" placeholder="Password">
          </div> 

          <div class="form-group">
            <label>Conform Password</label>
            <input id="password-field" type="password" onkeyup="rgcheckPass()" name="passwords" id="cchpassword" value="" placeholder="Password">
            <span id="error-nwl" ></span>
          </div>

          <div class="form-group">
            <button class="theme-btn btn-style-one" id="register" onclick="return Validate()" type="submit" name="register">Register</button>
          </div>
        </form>

        <div class="bottom-box">
          <div class="divider"><span>or</span></div>
          <div class="btn-box row">
            <div class="col-lg-6 col-md-12">
              <a href="#" class="theme-btn social-btn-two facebook-btn"><i class="fab fa-linkedin"></i> Log In via Linkedin</a>
            </div>
            <div class="col-lg-6 col-md-12">
              <a href="#" class="theme-btn social-btn-two google-btn"><i class="fab fa-google"></i> Log In via Gmail</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
