<header class="main-header header-style-two">
  <div class="auto-container">
	<!-- Main box -->
	<div class="main-box">
	  <!--Nav Outer -->
	  <div class="nav-outer">
		<div class="logo-box">
		  <div class="logo"><a href="https://www.feufo.com/index.php"><img src="https://www.feufo.com/img/logo.png" alt="" title=""></a></div>
		</div>

		<nav class="nav main-menu">
		  <ul class="navigation" id="navbar">
			<li class="">
				<a href="https://www.feufo.com/index.php"> <span>Home</span> </a>
			</li>     
			<?php $sql_cat="select * from category";
            $result_cat = mysqli_query($conn, $sql_cat); 
            while($res_cat= mysqli_fetch_array($result_cat)){
            $cat_name=$res_cat['cat_name']; 
		        $category = strtolower(str_replace(" ", "-", $cat_name)); 
		        $id=$res_cat['id']; 
            $sql_scat="select * from sub_category where category_id='".$id."'";
            $result_scat = mysqli_query($conn, $sql_scat);?>             
				<li class="dropdown">
				  <span><?php echo $res_cat['cat_name']; ?></span>
				  <ul>
				  	<?php while($res_scat= mysqli_fetch_array($result_scat)){ 
	           $scat_name=$res_scat['sub_category_name']; 
	           $sub_category = strtolower(str_replace(" ", "-", $scat_name)); ?>
					   <li><a href="https://www.feufo.com/<?= "$category/$sub_category/"; ?>"><span><?= $res_scat['sub_category_name']; ?></span></a> </li> 
				    <?php } ?>
				   </ul>
				</li><?php } ?>     
				<li class="">
				<a href="https://www.feufo.com/candidate-job.php"> <span>Find Talent</span> </a>
			</li>    
				<li class="">
				<a href="https://www.feufo.com/contact-us.php"> <span>Contact Us</span> </a>
			</li> 

			<li class="mm-add-listing">
			   <span>
				<span class="contact-info">
				  <span class="phone-num"><span>Call us</span><a href="tel:1234567890">123 456 7890</a></span>
				  <span class="address">Hyderabad, Telangana - 500001, India.</span>
				  <a href="mailto:info@feufo.com" class="email">info@feufo.com</a>
				</span>
				<span class="social-links">
				  <a href="#"><span class="fab fa-facebook-f"></span></a>
				  <a href="#"><span class="fab fa-twitter"></span></a>
				  <a href="#"><span class="fab fa-instagram"></span></a>
				  <a href="#"><span class="fab fa-linkedin-in"></span></a>
				</span>
			  </span>
			</li>
		  </ul>
		</nav>
	   </div>

	  <div class="outer-box">
		 <div class="btn-box">
		  	<?php if (isset($_SESSION['loggedin_employer']) && $_SESSION['loggedin_employer'] == true){ ?>
		  <a href="https://www.feufo.com/employer-dashboard.php" class="theme-btn btn-style-six call-modal">My account</a>
		<?php }else{ ?>
		  <a href="https://www.feufo.com/login-popup.php" class="theme-btn btn-style-six call-modal">Login / Register</a>
	   <?php } ?>
		 <!-- <a href="#" class="theme-btn btn-style-five"><span class="btn-title">Book An Appointment</span></a>-->
		</div>
	  </div>
	</div>
  </div> 
  <div class="mobile-header">
	<div class="logo"><a href="https://www.feufo.com/index.php"><img src="https://www.feufo.com/img/logo.png" alt="" title=""></a></div>
	<div class="nav-outer clearfix">

	  <div class="outer-box">
		<div class="login-box">
		  <a href="https://www.feufo.com/login-popup.php" class="call-modal"><span class="icon-user"></span></a>
		</div>

		<a href="#nav-mobile" class="mobile-nav-toggler navbar-trigger"><span class="flaticon-menu-1"></span></a>
	  </div>
	</div>
  </div>

  <!-- Mobile Nav -->
  <div id="nav-mobile"></div>
</header>