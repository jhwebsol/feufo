<section class="banner-section-two">
  <div class="auto-container" style="border:1px solid #fff; border-radius: 5px;">
	<div class="row">
	  <div class="content-column col-lg-7 col-md-12 col-sm-12">
		<div class="inner-column wow fadeInUp">
		  <div class="title-box">
		   <?php $sqlsl=mysqli_fetch_array(mysqli_query($conn,"SELECT * from slider")); ?>	
			<h3><?= $sqlsl['name']; ?></h3>
			<div class="text"><?= $sqlsl['desp']; ?></div>
		  </div> 
		  <div class="">
 			  <div class="row">
				<div class="form-group col-lg-3 col-md-12 col-sm-12 col-5 text-right">
				  <a href="<?= $sqlsl['get_hired']; ?>"><button type="button" class="btn-style-one btn btn-warning" style="width:100%"><span class="btn-title">Get Hired</span></button></a>
				</div>
				<div class="form-group col-lg-3 col-md-12 col-sm-12 col-6 text-right">
				 <a href="<?= $sqlsl['hire_top_talent']; ?>"> <button type="button" class="theme-btn btn-style-one"><span class="btn-title">Hire Top Talent</span></button></a>
				</div>
				<div class="form-group col-lg-12 col-md-12 col-sm-12 count-employers" style="margin-top: 20px">
			  <span class="title">10k+ Candidates</span>
			  <img src="img/multi-peoples.png" alt="">
			</div>
			  </div> 
 		  </div>
		</div>
	  </div>

	  <div class="col-lg-5 col-md-12">
 <div id="slider">
<figure>
<?php $sql_prd=mysqli_query($conn,"select * from slider_img");
while($resimg= mysqli_fetch_array($sql_prd)){  ?>
<a href=""><img src="admin/img/banner/<?= $resimg['image']; ?>" alt></a>
<?php } ?></figure>
</div>
	  </div>
	</div>
  </div>
</section>
 <style>@keyframes slidy {
0% { left: 0%; }
20% { left: 0%; }
25% { left: -100%; }
45% { left: -100%; }
50% { left: -200%; }
70% { left: -200%; }
75% { left: -300%; }
95% { left: -300%; }
100% { left: -400%; }
}  
div#slider { overflow: hidden;margin-top:100px}
div#slider figure img { width: 20%; float: left; }
div#slider figure { 
  position: relative;
  width: 500%;
  margin: 0;
  left: 0;
  text-align: left;
  font-size: 0;
  animation: 30s slidy infinite; 
}
@media (min-width:320px) and (max-width:640px){
.banner-section-two .content-column .inner-column {
  padding-top: 120px;
  padding-bottom: 40px;
}
div#slider { overflow: hidden;margin-top:5px}
}
</style>