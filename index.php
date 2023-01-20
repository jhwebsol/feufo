 <?php include("includes/db_config.php"); ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0"> 
  <?php include("includes/css.php");?>
    <link href="css/box.css" rel="stylesheet">
    <style type="text/css">.owl-nav{display:none}</style>
</head>

<body data-anm=".anm">
  <div class="page-wrapper">    
  <?php include("includes/header.php");?> 
  <?php include("includes/slider.php");?> 
 
  <section class="candidates-section candidteboxes">
      <div class="auto-container">
        <div class="carousel-outer wow fadeInUp">
          <div class="candidates-carousel owl-carousel owl-theme default-dots">
            <?php $home_page="1";
             $sql_prds=mysqli_query($conn,"select sub_category.sub_category_name,category.cat_name,employee_details.* from employee_details join category on employee_details.cat_id=category.id join sub_category on employee_details.subcat_id=sub_category.id where employee_details.home_page='".$home_page."'");
            while($res_prds= mysqli_fetch_array($sql_prds)){
             $cate = strtolower(str_replace(" ", "-", $res_prds['cat_name']));
             $scate = strtolower(str_replace(" ", "-", $res_prds['sub_category_name']));  
             $emp_name = strtolower(str_replace(" ", "-", $res_prds['emp_name'])); ?>
            <div class="candidate-block">
                <a href="candidate-job-detail.php">
                  <div class="propbox" style="background-image: url(https://www.feufo.com/admin/emp/<?php echo $res_prds['image']; ?>);">
                    <div class="gradient">
                        <div class="icons"><span data-id="<?= $_SESSION['employer_id'];?>" data-empid="<?= $res_prds['id'];?>" class="add-wishlist"><i class="fa fa-heart" aria-hidden="true"></i></span></div>
                        <div class="icons1"><i class="icon flaticon-money" title="<?php if(!empty($res_prds['feufo_fees'])){ ?>Feufo Fees $<?= $res_prds['feufo_fees']; } ?>" aria-hidden="true"></i>
                        </div>
                        <div class="content">
                            <h2><?= $res_prds['emp_name'];?></h2>
                            <p><?= $res_prds['job_title'];?></p>
                            <p class="details"><?php $string = html_entity_decode($res_prds['desp']); echo substr($string, 0, 100) .((strlen($string) > 100) ? '' : ''); ?>...</p>
                        </div> 
                     </div>
                   </div>
                </a> 
             </div>
             <?php } ?>
          </div>
        </div>
      </div>
    </section> 
     
<section class="section-panel white_bg dived_box-shadow" style="background:rgb(96,40,89);background:linear-gradient(90deg, rgba(96,40,89,1) 0%, rgba(78,48,109,1) 46%, rgba(58,57,133,1) 100%);">
        <div class="container pb-4">
            <div class="row align-items-center text-center-mob swap_sec-mob">
                <div class="col-lg-6 mb-4 mb-lg-0">
                     <?php $restp=mysqli_fetch_array(mysqli_query($conn,"SELECT * from home_section")); ?>
                    <div class="oneWallet-img-sec animateElements inView">
                        <img alt="bg_img-1" class="rounded-img" src="img/bg_img-1.png" style="width: 100%;" width="100%" height="auto">
                        <div class="oneWallet_sub-img"><a href="#"> <img alt="#" src="img/log-img-2.png" style="width: 100%;"> </a></div>
                        <div class="sec-1 cryptoCurrenciesIcons aos-init aos-animate whybox" data-aos="zoom-in" data-aos-duration="1500"><a href="#"><?= $restp['title1'];?></a>
                        </div>
                        <div class="sec-2 cryptoCurrenciesIcons aos-init aos-animate whybox" data-aos="zoom-in" data-aos-duration="1500"><a href="#"><?= $restp['title2'];?></a>
                        </div>
                        <div class="sec-3 cryptoCurrenciesIcons aos-init whybox" data-aos="zoom-in" data-aos-duration="1500"> <div class="animEl sec-box-shadows-right"><a href="#"><?= $restp['title3'];?></a></div>
                        </div>
                        <div class="sec-4 cryptoCurrenciesIcons aos-init whybox" data-aos="zoom-in" data-aos-duration="1500"> <div class="animEl sec-box-shadows-left"><a href="#"><?= $restp['title4'];?></a></div>
                        </div>
                        <div class="sec-5 cryptoCurrenciesIcons aos-init whybox" data-aos="zoom-in" data-aos-duration="1500"> <div class="animEl sec-box-shadows-left"><a href="#"><?= $restp['title5'];?></a></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 mb-4 mb-lg-0 information">
                    <div class="row">
                        <div class="col-md-10 offset-md-2">
                            <h1 class="bigHeadingyellow mt-0">Why Feufo?</h1>
                            
                            <p class="mb-2 mt-1 paragraph"><?= html_entity_decode($restp['desp']);  ?></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>        
    </section>

  <?php include("includes/feufocat.php");?>
  
     
      <section class="call-to-action-two" style="background:rgb(96,40,89);background:linear-gradient(90deg, rgba(96,40,89,1) 0%, rgba(78,48,109,1) 46%, rgba(58,57,133,1) 100%);">
      <div class="auto-container wow fadeInUp">
        <div class="sec-title light text-center">
          <h2> Get hired and earn up to 25% off Feufo fees</h2>
          <div class="text">Coding tests can be really tough. But with Feufo, you'll get a bonus for it once you get hired.</div>
            <div class="text"> Feel valued and appreciated for your skills.</div>
</div>
        </div>

        <div class="btn-box">
          <a href="#" class="theme-btn btn-style-three">Get Hired</a> 
        </div> 
    </section> 
       <section class="about-section -type-2 layout-pt-120 layout-pb-60" style="background:rgb(96,40,89);background:linear-gradient(90deg, rgba(96,40,89,1) 0%, rgba(78,48,109,1) 46%, rgba(58,57,133,1) 100%);">
      <div class="auto-container">
        <div class="row justify-content-between align-items-center">
          <div class="image-group image-column -no-margin col-xl-5 col-lg-5 col-md-12 col-sm-12 wow fadeInRight animated" style="visibility: visible; animation-name: fadeInRight;">
            <?php $sqlhm=mysqli_fetch_array(mysqli_query($conn,"SELECT * from home_aboutus")); ?>
                    
            <div class="image-box -type-1">
               <video width="100%" height="440" controls>
                  <source src="admin/img/<?= $sqlhm['video_link'];?>" type="video/mp4">
                  <source src="movie.ogg" type="video/ogg">
                  Your browser does not support the video tag.
                </video>  
            </div>
          </div>
          <div class="content-column mb-0 col-xl-7 col-lg-7 col-md-12 col-sm-12">
            <div class="wow fadeInLeft animated" style="visibility: visible; animation-name: fadeInLeft;">
              <div class="sec-title mb-0">
                <h2 class="fw-700"><span class="text-orange">About Feufo</span></h2>
                <div class="mt-10 text-justify"><?php echo html_entity_decode($sqlhm['text']); ?></div>
              </div>
              <a href="about-us.php" class="btn btn-warning btn-lg mt-30">Read More</a>
            </div>
          </div>
        </div>
      </div>
    </section>
     <section class="testimonial-section-four" style="background-image: url(img/background/11.png);">
      <div class="container-fluid">
      <div class="row">
      <div class="col-md-12 col-xl-12">
         <div class="sec-title text-center light" style="margin-bottom:40px;">
          <h2>Testimonials</h2>
         </div>
        </div>
         <?php $sql_tm=mysqli_query($conn,"select * from es_testimonial");
          while($restsm= mysqli_fetch_array($sql_tm)){ ?>
      <div class="col-md-12 col-xl-12">
        <div class="carousel-outer wow fadeInUp">
           <div class="testimonial-carousel owl-carousel owl-theme">
            <div class="testimonial-block-four">
              <div class="inner-box">
                <h4 class="title">Great quality!</h4>
                <div class="text"><?php echo $restsm['desp']; ?></div>
                <div class="info-box">
                  <div class="thumb"><img src="admin/img/testimonial/<?php echo $restsm['image']; ?>" alt=""></div>
                  <h4 class="name"><?php echo $restsm['name']; ?><a href="<?php echo $restsm['linkdin_link']; ?>"><i class="fab fa-linkedin-in"></i></a></h4>
                  <span class="designation"><?php echo $restsm['designation']; ?></span>
                </div>
              </div>
            </div>
          </div>
         </div>
        </div>
        <?php } ?>
      </div>
     </div>
   
    </section> 
   
    <section class="news-section" style="background:rgb(96,40,89);background:linear-gradient(90deg, rgba(96,40,89,1) 0%, rgba(78,48,109,1) 46%, rgba(58,57,133,1) 100%);">
      <div class="auto-container">
        <div class="sec-title text-center">
          <h2 class="text-white">From Our Blogs</h2>
          <div class="text text-white">Fresh job related news content posted each day.</div>
        </div>

        <div class="row wow fadeInUp animated" style="visibility: visible; animation-name: fadeInUp;">
          <!-- News Block -->
          <?php $sql_bg=mysqli_query($conn,"select * from blog");
          while($res_bg= mysqli_fetch_array($sql_bg))
          { $blog_title = strtolower(str_replace(" ", "-", $res_bg['blog_title'])); ?>
          <div class="news-block col-lg-4 col-md-6 col-sm-12">
            <div class="inner-box">
              <div class="image-box">
                <figure class="image"><img src="admin/img/blog/<?= $res_bg['blog_image']; ?>" alt=""></figure>
              </div>
              <div class="lower-content">
                <ul class="post-meta">
                  <li><a href="javascript:void(0)"><?php $date=$res_bg['blog_date']; 
            $newDate = date("d M Y", strtotime($date)); echo $newDate; ?></a></li>
                  <!-- <li><a href="javascript:void(0)">12 Comment</a></li> -->
                </ul>
                <h3><a href="blog/<?= $blog_title;?>"><?= $res_bg['blog_title']; ?></a></h3>
                <p class="text"><?php echo $string = html_entity_decode($res_bg['short_desp']); ?>...</p>
                <a href="blog-detail.php" class="read-more">Read More <i class="fa fa-angle-right"></i></a>
              </div>
            </div>
          </div>
           <?php } ?>
      </div>
    </section>

    <section class="call-to-action-three" style="background:rgb(96,40,89);background:linear-gradient(90deg, rgba(96,40,89,1) 0%, rgba(78,48,109,1) 46%, rgba(58,57,133,1) 100%);">
      <div class="auto-container">
        <div class="outer-box">
          <div class="col-md-8 col-xl-8 sec-title">
            <h2>Let employers find you</h2>
            <div class="text">Coding tests can be really tough. But with Feufo, you'll get a bonus for it once you get hired.</div>
          </div>
          <div class="col-md-2 col-xl-2 btn-box">
            <a href="candidate-job.php" class="theme-btn btn-style-one bg-blue"><span class="btn-title">Get Hired</span></a>
          </div>
       </div> 
        </div>
      </div>
    </section>
    
  <?php include("includes/footer.php");?>
  </div>
  <?php include("includes/js.php");?>
  <script type="text/javascript">
    buttons   = document.querySelectorAll 'div.button.select'
pricings  = document.getElementsByClassName 'pricing'

console.log buttons

for button in buttons
  button.addEventListener('click', (e) ->
    for pricing in pricings
      pricing.classList.remove 'spotlight'
    e.target
      .parentNode
      .classList.add 'spotlight'
  )
  </script>
  <script type="text/javascript">
$(function() {
    $('body').on('click', '.add-wishlist', function() {
    var empr_id = $(this).data('id');
    var empid = $(this).data('empid');    
    var action = "add";
     //alert(empid);
    $.ajax({
        url: "https://www.feufo.com/insert_to_wishlist.php",
        method: "POST",
        data: {
        empr_id: empr_id,
        empid: empid,
       action: action
    },
    success: function(msg) {
    alert(msg);
     console.log(msg);
 }
});
});
});    
</script>
</body>
</html>