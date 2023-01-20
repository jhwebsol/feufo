<section class="carousel-slider-main text-center border-top border-bottom bg-white">
	<div class="owl-carousel owl-carousel-slider">
	  <?php $sql2="SELECT * from slider";
								$exe2=mysqli_query($conn,$sql2);
								while ($res=mysqli_fetch_array($exe2))
								{ ?>
		<div class="item">
			<a href="#"><img class="img-fluid" src="admin/slider/<?php echo $res['image'];?>" alt="Feufo"></a>
		</div> 
	  <?php } ?>
	</div>
</section>
