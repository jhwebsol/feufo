<?php include("includes/db_config.php");
 ?>
<div class="model">
  <!-- Login modal -->
  <div id="login-modal">
    <!-- Login Form -->
    <div class="login-form default-form">
      <div class="form-inner">
        <h3>Login to Feufo</h3>
        <!--Login Form-->
        <form method="post" action="">
          <div class="form-group">
            <label>Username</label>
            <input type="text" name="username" id="emailid" placeholder="Username" required>
            <div class="alert alert-warning" id="result" style="display: none;"> </div>
            <span style="color: red" id="emailid_alert"></span>
          </div>

          <div class="form-group">
            <label>Password</label>
            <input id="password-field" type="password" name="passwords" value="" placeholder="Password">
          </div>

          <div class="form-group">
            <div class="field-outer">
              <!-- <div class="input-group checkboxes square">
                <input type="checkbox" name="remember-me" value="" id="remember">
                <label for="remember" class="remember"><span class="custom-checkbox"></span> Remember me</label>
              </div> -->
              <a href="#" class="pwd">Forgot password?</a>
            </div>
          </div>

          <div class="form-group">
            <button class="theme-btn btn-style-one" type="submit" name="log_submit">Log In</button>
          </div>
        </form>

        <div class="bottom-box">
          <div class="text">Don't have an account? <a href="register-popup.php" class="call-modal signup">Signup</a></div>
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
 
  <script type="text/javascript">
    // Open modal in AJAX callback
    jQuery('.call-modal.signup').on('click', function(event) {
      event.preventDefault();
      this.blur();
      jQuery.get(this.href, function(html) {
        jQuery(html).appendTo('body').modal({
          fadeDuration: 300,
          fadeDelay: 0.15
        });
      });
    });
  </script>
</div>