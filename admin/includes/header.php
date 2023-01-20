<header class="main-header"> 
	<a href="javascript:void(0)" class="logo"> <span><img src="img/logo.png" width="150px"></span> </a>
	<nav class="navbar navbar-static-top">
		<!-- Sidebar toggle button-->
		<a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button"> <span class="sr-only">Toggle navigation</span> </a>
		<!-- Navbar Right Menu -->
		<div class="navbar-custom-menu">
			<ul class="nav navbar-nav">
				<li class="dropdown messages-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
            	<?php $aid=$_SESSION['aid'];
             $ress=mysqli_fetch_array(mysqli_query($conn,"SELECT * from es_admin_user where id='".$aid."'")); ?>
            	              <img src="img/<?= $ress['image'];?>" class="user-image" style="width:30px;height:30px;color:#858796!important"  alt="User Image">
						<span class="hidden-xs text-capitalize">Mr.  <?= $ress['name'];?></span>
            </a>
            <ul class="dropdown-menu">
               <li> 
                <ul class="menu">
                 <li> 
                    <a href="my_profile.php">
                      <h4 style="margin-left:0px;"><span style="padding: 0.25rem 1.5rem;clear: both;font-weight: 400;color: #3a3b45;"><i class="fa fa-user"></i> My Profile</span> </h4>
                    </a>
                  </li>
			<li> 
                    <a href="logout.php">
                      <h4 style="margin-left:0px;"><span style="padding: 0.25rem 1.5rem;clear: both;font-weight: 400;color: #3a3b45;"><i class="fa fa-lock"></i> Logout </span></h4>
                    </a>
                  </li>
			</ul>
              </li>
            </ul>
          </li> 
			</ul>
		</div>
	</nav>
</header>
