<?php include('db_config.php'); 
if (isset($_POST['rw_send'])) {
extract($_POST);
$id=$_POST['prid'];
date_default_timezone_set('Asia/Kolkata');
$date = date('Y-m-d H:i:s');
$sql_qry="insert into dproperty_enquiry(property_id,name,email_id,rating,comment,created_date) values ('$id','$userprt','$emailprt','$rating','$msgprt','$date')";
$res=mysqli_query($conn,$sql_qry);
if($res){
 echo "<script>alert('Thank you so much for taking the time to send this! '); </script>";
 }
 
}

?>
<!DOCTYPE html>
<html class="no-js" lang="zxx">
<?php
$page_name = str_replace(".php", "", basename($_SERVER['PHP_SELF']));
$Current_URL = basename(dirname(__FILE__));
$findid = (mysqli_query($conn, "SELECT * FROM es_property"));
while ($res2=mysqli_fetch_array($findid)) {
    if(strtolower(str_replace(" ", "-", $res2["property_name"])) == $page_name){
        $pid = $res2["id"];
    }
}  
 $sqlpt=mysqli_query($conn,"select es_property.*,es_property_type.types from es_property join es_property_type on es_property.property_type=es_property_type.id where es_property.id=".$pid);
$respt= mysqli_fetch_array($sqlpt);
$sqlimg=mysqli_fetch_array(mysqli_query($conn,"SELECT * from es_property_image where property_id=".$respt['id']));
$uid=$respt['property_added'];
$resus=mysqli_fetch_array(mysqli_query($conn,"select * from es_property_user where id=".$uid));
$sqlcrt=mysqli_fetch_array(mysqli_query($conn,"select pricing_package_cart.*,plan_pricing.plan_name from pricing_package_cart join plan_pricing on pricing_package_cart.plan_id=plan_pricing.id where pricing_package_cart.puser_id=".$uid));
$plan_name = strtolower(str_replace(" ", "-", $sqlcrt['plan_name']));
?>

<head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="" name="description">
    <meta content="" name="author">
    <meta name="keywords" content="">
    <link rel="shortcut icon" type="image/x-icon" href="img/favicon.png">
    <title>Feufo</title>
    <?php include("css.php");?>
     <style>
.hovertext {
  position: relative;
  border-bottom:0px dotted black;
}

.hovertext:before {
  content: attr(data-hover);
  visibility: hidden;
  opacity: 0;
  width: 140px;
  background-color: black;
  color: #fff;
  text-align: center;
  border-radius: 5px;
  padding: 5px 0;
  transition: opacity 1s ease-in-out;

  position: absolute;
  z-index: 1;
  left: 0;
  top: 110%;
}

.hovertext:hover:before {
  opacity: 1;
  visibility: visible;
}
       

.stars
{
    margin: 20px 0;
    font-size: 24px;
    color: #d17581;
}
    </style>
</head>

<body class="main-body">
    <div class="horizontalMenucontainer">
        <?php include("header.php");?>
        <div class="cover-image sptb-1 bg-background" data-image-src="img/banner1.jpg" style="background: rgba(0, 0, 0, 0) url(&quot;../img/banner1.jpg&quot;) repeat scroll center center;">
            <div class="header-text1 mb-0">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-8 col-lg-12 col-md-12 d-block mx-auto">
                            <div class="text-center text-white text-property">
                                <h1><span class="font-weight-bold">16,25,365</span> Properties Available</h1>
                            </div>
                            <div class=" search-background bg-transparent">
                                <div class="form row no-gutters">
                                    <div class="form-group  col-xl-6 col-lg-5 col-md-12 mb-0 bg-white"> <input type="text" class="form-control input-lg border-right-0" id="text" placeholder="Search Property"> </div>
                                    <div class="form-group col-xl-4 col-lg-4 select2-lg  col-md-12 mb-0 bg-white"> <select class="form-control select2-show-search border-bottom-0 w-100 select2-hidden-accessible" data-placeholder="Select" data-select2-id="1" tabindex="-1" aria-hidden="true">
                                            <optgroup label="Categories" data-select2-id="9">
                                                <option data-select2-id="3">Select</option>
                                                <option value="1" data-select2-id="10">Deluxe Houses</option>
                                                <option value="2" data-select2-id="11">2BHK Homes</option>
                                                <option value="3" data-select2-id="12">Apartments</option>
                                                <option value="4" data-select2-id="13">Modren Houses</option>
                                                <option value="5" data-select2-id="14">Job</option>
                                                <option value="6" data-select2-id="15">Luxury Rooms</option>
                                                <option value="7" data-select2-id="16">Luxury Rooms</option>
                                                <option value="8" data-select2-id="17">Duplex Houses</option>
                                                <option value="9" data-select2-id="18">3BHK Flatss</option>
                                                <option value="10" data-select2-id="19">3BHk Homes</option>
                                            </optgroup>
                                        </select>
                                    </div>
                                    <div class="col-xl-2 col-lg-3 col-md-12 mb-0"> <a href="#" class="btn btn-lg btn-block btn-primary br-bl-0 br-tl-0">Search</a> </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!-- /header-text -->
        </div>
       <div class="bg-white border-bottom">
            <div class="container">
                <div class="page-header">
                    <h4 class="page-title"><?= $respt['types']; ?></h4>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item"><a href="#">Property</a></li>
                        <li class="breadcrumb-item active" aria-current="page"><?= $respt['property_name']; ?></li>
                    </ol>
                </div>
            </div>
        </div>

        <section class="sptb">
            <div class="container">
                <div class="row">
                    <div class="col-xl-8 col-lg-8 col-md-12">
                        <!--Classified Description-->
                        <?php $sqlpt=mysqli_query($conn,"select es_property.*,es_property_type.types from es_property join es_property_type on es_property.property_type=es_property_type.id where es_property.id=".$pid);
                                        $respt= mysqli_fetch_array($sqlpt);
                                        $sqlimg=mysqli_fetch_array(mysqli_query($conn,"SELECT * from es_property_image where property_id=".$respt['id']));
                                        $uid=$respt['property_added'];
                                        $al=$respt['area_location'];
                                        $resus=mysqli_fetch_array(mysqli_query($conn,"select * from es_property_user where id=".$uid));
                                        $sqlcrt=mysqli_fetch_array(mysqli_query($conn,"select pricing_package_cart.*,plan_pricing.plan_name from pricing_package_cart join plan_pricing on pricing_package_cart.plan_id=plan_pricing.id where pricing_package_cart.puser_id=".$uid));
                                        $plan_name = strtolower(str_replace(" ", "-", $sqlcrt['plan_name']));
                                        $sql_area=mysqli_fetch_array(mysqli_query($conn,"SELECT * from area where id=".$respt['area_location'])); ?>
                        <div class="card overflow-hidden">
                            <div class="card-body">
                                <div class="item-det mb-4"> <a href="#" class="text-dark">
                                        <h3 class=""><?= $respt['property_name']; ?></h3>
                                    </a>
                                    <ul class="d-flex">
                                        <li class="mr-5"><a href="#" class="icons"><i class="icon icon-briefcase text-muted mr-1"></i> <?= $respt['types']; ?></a></li>
                                        <li class="mr-5"><a href="#" class="icons"><i class="icon icon-location-pin text-muted mr-1"></i> <?= $sql_area['area_name'].",".$respt['city'].",". $respt['state'];?></a></li>
                                        <li class="mr-5"><a href="#" class="icons"><i class="icon icon-calendar text-muted mr-1"></i> 5 hours ago</a></li>
                                        <li class="mr-5"><a href="#" class="icons"><i class="icon icon-eye text-muted mr-1"></i> <?= $respt['area']." /". $respt['area_in'];?></a></li>
                                        <li class=""><a href="#" class="icons"> <i class="fa fa-star text-warning"></i> <i class="fa fa-star text-warning"></i> <i class="fa fa-star text-warning"></i> <i class="fa fa-star text-warning"></i> <i class="fa fa-star-half-o text-warning mr-1"></i>4.5</a></li>
                                    </ul>
                                </div>
                                <div class="product-slider">
                                    <div id="carousel" class="carousel slide" data-ride="carousel">
                                        <div class="arrow-ribbon2 bg-primary">$<?= $respt['price'];?></div>
                                        <div class="carousel-inner">
                                            <?php $idd=$respt['id'];
                                        $k=0;
                                        $sql_prd=mysqli_query($conn,"select * from es_property_image where property_id=".$idd);
                                         while($resimg= mysqli_fetch_array($sql_prd)){  ?>
                                        <div class="<?php if($k===0){ echo "active"; } ?> carousel-item" >
                                            <img src="../admin/product/image/<?= $resimg['images']; ?>" class="img-fluid" alt="slider-listing">
                                        </div><?php $k++; } ?>
                                          </div> <a class="carousel-control-prev" href="#carousel" role="button" data-slide="prev"> <i class="fa fa-angle-left" aria-hidden="true"></i> </a> <a class="carousel-control-next" href="#carousel" role="button" data-slide="next"> <i class="fa fa-angle-right" aria-hidden="true"></i> </a>
                                    </div>
                                    <div class="clearfix">
                                        <div id="thumbcarousel" class="carousel slide" data-interval="false">
                                            <div class="carousel-inner">
                                                <div class="carousel-item active">
                                                     <?php $idd=$respt['id'];
                                        $t=0;
                                        $sql_prds=mysqli_query($conn,"select * from es_property_image where property_id=".$idd);
                                         while($resimgs= mysqli_fetch_array($sql_prds)){  ?>
                                                    <div data-target="#carousel" data-slide-to="<?= $t; ?>" class="thumb"><img src="../admin/product/image/<?= $resimgs['images']; ?>" class="img"></div>
                                                    <?php $t++; } ?>
                                                </div>
                                            </div> <a class="carousel-control-prev" href="#thumbcarousel" role="button" data-slide="prev"> <i class="fa fa-angle-left" aria-hidden="true"></i> </a> <a class="carousel-control-next" href="#thumbcarousel" role="button" data-slide="next"> <i class="fa fa-angle-right" aria-hidden="true"></i> </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Description</h3>
                            </div>
                            <div class="card-body">
                                <div class="mb-4">
                                   <?php echo html_entity_decode($respt['desp']);  ?>
                                </div>
                                <h4 class="mb-4">Specifications</h4>
                                <div class="row">
                                    <div class="col-xl-6 col-md-12">
                                        <ul class="list-unstyled widget-spec mb-0">
                                            <li class=""> <i class="fa fa-bed text-muted w-5"></i> <?= $respt['room'];?> BedRooms </li>
                                            <li class=""> <i class="fa fa-bath text-muted w-5"></i> <?= $respt['bathrooms'];?> BathRooms </li>
                                            <li class=""> <i class="fa fa-life-ring text-muted w-5"></i> <?= $respt['property_status'];?> </li>
                                            <li class=""> <i class="fa fa-car text-muted w-5"></i> <?= $respt['garages'];?> Car Parking </li>
                                            <li class="mb-xl-0"> <i class="fa fa-pagelines text-muted w-5"></i> <?= $respt['year_built'];?> </li>
                                        </ul>
                                    </div>
                                    <!-- <div class="col-xl-6 col-md-12">
                                        <ul class="list-unstyled widget-spec mb-0">
                                            <li class=""> <i class="fa fa-lock text-muted w-5"></i> Security </li>
                                            <li class=""> <i class="fa fa-building-o text-muted w-5"></i> Lift </li>
                                            <li class=""> <i class="fa fa-check text-muted w-5"></i> Swimming fool </li>
                                            <li class=""> <i class="fa fa-gamepad text-muted w-5"></i> Play Area </li>
                                            <li class=""> <i class="fa fa-futbol-o text-muted w-5"></i> football Court </li>
                                            <li class="mb-0"> <i class="fa fa-trophy text-muted w-5"></i> Cricket Court </li>
                                        </ul>
                                    </div> -->
                                </div>
                            </div>
                            <div class="pt-4 pb-4 pl-5 pr-5 border-top border-top">
                                <div class="list-id">
                                    <div class="row">
                                        <div class="col"> <a class="mb-0">Classified ID : #<?= $respt['property_id'];?></a> </div>
                                        <div class="col col-auto"> Posted By <a class="mb-0 font-weight-bold">Individual</a> / <?= $respt['created_now']; ?> </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Rating And Reviews</h3>
                            </div>
                            <div class="card-body p-0">
                                <?php $pid=$respt['id'];
                                $sqlrw=mysqli_query($conn,"select dproperty_enquiry.* from dproperty_enquiry where dproperty_enquiry.property_id=".$pid);
                                    while($resrw= mysqli_fetch_array($sqlrw)) { ?>
                                <div class="media p-5 border-top mt-0">
                                    <!-- <div class="d-flex mr-3"> <a href="#"> <img class="media-object brround" alt="64x64" src="img/user.png"> </a> </div> -->
                                    <div class="media-body">
                                        <h5 class="mt-0 mb-1 font-weight-semibold"><?= $resrw['name'];?><span class="fs-14 ml-0" data-toggle="tooltip" data-placement="top" title="" data-original-title="verified"><i class="fa fa-check-circle-o text-success"></i></span> <span class="fs-14 ml-2"> <?php if($resrw['rating']==1){ ?><i class="fa fa-star text-warning"></i><?php }elseif($resrw['rating']==2){ ?><i class="fa fa-star text-warning"></i> <i class="fa fa-star text-warning"></i><?php }elseif($resrw['rating']==3){ ?><i class="fa fa-star text-warning"></i> <i class="fa fa-star text-warning"></i> <i class="fa fa-star text-warning"></i><?php }elseif($resrw['rating']==4){ ?><i class="fa fa-star text-warning"></i> <i class="fa fa-star text-warning"></i> <i class="fa fa-star text-warning"></i> <i class="fa fa-star text-warning"></i><?php }elseif($resrw['rating']==5){ ?><i class="fa fa-star text-warning"></i> <i class="fa fa-star text-warning"></i> <i class="fa fa-star text-warning"></i> <i class="fa fa-star text-warning"></i><i class="fa fa-star text-warning"></i><?php } ?></span> </h5> <small class="text-muted"><i class="fa fa-calendar"></i><?php $date=$resrw['created_date'];
                                                $newDate = date("d M ", strtotime($date)); echo $newDate;?></small>
                                        <p class="font-13  mb-2 mt-2"> <?= $resrw['comment'];?> </p>
                                    </div>
                                </div><?php } ?>
                            </div>
                        </div>
                        <!--/Comments-->
                        <div class="card mb-lg-0">
                            <div class="card-header">
                                <h3 class="card-title">Leave a reply</h3>
                            </div>
                            <div class="card-body">
                                <div>  
        
            <div class="row" id="post-review-box" >
                <div class="col-md-12">
                    <form accept-charset="UTF-8" action="" method="post">
                        <input id="ratings-hidden" name="rating" type="hidden"> 
                        <div class="text">
                            <div class="stars starrr" data-rating="0"></div>
                        </div> <div class="clearfix"></div>
                                    <div class="form-group"> <input type="text" class="form-control" name="userprt" placeholder="Your Name"><input type="hidden" value="<?= $respt['id']; ?>" class="form-control" name="prid"> </div>
                                    <div class="form-group"> <input type="email" class="form-control" name="emailprt" placeholder="Email Address"> </div>
                                    <div class="form-group"> <textarea class="form-control" name="msgprt" rows="6" placeholder="Comment"></textarea> </div> <button name="rw_send" type="submit" class="btn btn-primary">Send Reply</button>
                                    </form>
                                </div>
                            </div> 
                    </div>
                    </div>
                    </div>
                    </div>
                    <!--Right Side Content-->
                    <div class="col-xl-4 col-lg-4 col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Posted By</h3>
                            </div> <?php $pidd=$respt['property_added'];
                                        $sqlus=mysqli_query($conn,"select * from es_property_user where id=".$pidd);
                                         $resus= mysqli_fetch_array($sqlus);  
                                         function getTruncatedCCNumber($ccNum){
                                         return str_replace(range(0,9), "*", substr($ccNum, 0, -4)) .  substr($ccNum, -4); }
                                         $ccNum=$resus['mobile_no']; ?>
                                   
                            <div class="card-body  item-user">
                                <div class="profile-pic mb-0"> <img src="../admin/img/profile/<?= $resus['profile_img']; ?>" class="brround avatar-xxl" alt="user">
                                    <div class=""> <a href="#" class="text-dark">
                                            <h4 class="mt-3 mb-1 font-weight-semibold"><?= $resus['name'] ?></h4>
                                        </a>
                                        <p class="mb-0">Real Estate <?= $resus['personal_type']; ?></p><span class="text-muted">Member Since November 2018</span>
                                     </div>
                                </div>
                            </div>
                            <div class="card-body item-user">
                                <h4 class="mb-4">Contact Info</h4>
                                <div>
                                    <h6><span class="font-weight-semibold"><i class="fa fa-map-marker mr-2 mb-2"></i></span><a href="#" class="text-body"> <?= $resus['name'] ?></a></h6>
                                    <h6><span class="font-weight-semibold"><i class="fa fa-envelope mr-2 mb-2"></i></span><a href="#" class="text-body"> <?= $resus['email_id'] ?></a></h6>
                                    <?php  if(isset($_SESSION['loggedinus']) && $_SESSION['loggedinus'] == true){ $user_id=$_SESSION['id'];
                                    $sqlint=mysqli_query($conn,"SELECT * from user_interest_prpty where property_id='".$respt['id']."'"); ?>
                                    <h6><span class="font-weight-semibold"></span><?php if(mysqli_num_rows($sqlint) > 0) { ?><i class="fa fa-phone mr-2  mb-2" style="width: 30px;height: 30px;border-radius: 50%;background: #f2f3f8;text-align: center;line-height: 30px;font-size: 12px;"></i>
                                    <a href="#" class="text-body"><?= $resus['mobile_no'] ?></a>
                                    <?php }else{ ?><a href="#" class="text-body"> </a><button type="button" target="<?= $respt['id']; ?>" id="<?= $respt['id']; ?>" class="text-body sendme" style="background-color: transparent;border:0px;box-shadow: 0px"><span class="hovertext font-weight-semibold" data-hover="Click Here for your interest in this property and get contact details"><i class="fa fa-phone mr-2  mb-2"></i><?= getTruncatedCCNumber($ccNum); ?></span></button><?php } ?>  </h6>
                                    <?php }else{ ?>
                                     <h6>
                                       <span class="hovertext font-weight-semibold" data-hover="Click Here for your interest in this property and get contact details"><i class="fa fa-phone mr-2  mb-2"></i>  <a href="https://www.feufo.com/get-login.php?pid=<?= $respt['id']; ?>" class="text-body"> <?= getTruncatedCCNumber($ccNum); ?></a>
                                      </span>
                                    </h6>
                                <?php } ?>    
                                </div> 
                            </div> 
                        </div>

                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Map location</h3>
                            </div>
                            <div class="card-body">
                                <iframe src="<?= $respt['map_link'];?>" width="100%" height="200" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </section>

        <section class="sptb bg-white">
            <div class="container">
                <div class="section-title center-block text-center">
                    <h2>Related Properties</h2>
                </div>
                <div id="myCarousel1" class="owl-carousel owl-carousel-icons2 owl-loaded owl-drag">
                    <div class="owl-stage-outer">
                        <div class="owl-stage" style="transform: translate3d(-1201px, 0px, 0px); transition: all 0.25s ease 0s; width: 3904px;">
                             <?php $stss="Active";
                             $idd=$respt['id']; $j=1;
                             $sqlpt=mysqli_query($conn,"select es_property.*,es_property_type.types from es_property join es_property_type on es_property.property_type=es_property_type.id where es_property.id != ".$idd." order by es_property.id DESC");
                                       while($respt= mysqli_fetch_array($sqlpt)){
                                        $sqlimg=mysqli_fetch_array(mysqli_query($conn,"SELECT * from es_property_image where property_id=".$respt['id']));
                                        $uid=$respt['property_added'];
                                        $al=$respt['area_location'];
                                        $resus=mysqli_fetch_array(mysqli_query($conn,"select * from es_property_user where id=".$uid));
                                      $propt_name = strtolower(str_replace(" ", "-", $respt['property_name']));
                                        $sql_area=mysqli_fetch_array(mysqli_query($conn,"SELECT * from area where id=".$respt['area_location'])); ?>
                            <div class="owl-item" style="width: 275.25px; margin-right: 25px;">
                                <div class="item">
                                    <div class="card mb-0">
                                        <div class="power-ribbon power-ribbon-top-left text-warning"><span class="bg-warning"><i class="fa fa-bolt"></i></span></div>
                                        <div class="item-card2-img"> <a href="property-services/<?= "$propt_name" ?>"></a> <img src="admin/product/image/<?= $sqlimg['images']; ?>" alt="img" class="cover-image">
                                            <div class="tag-text"><span class="bg-danger tag-option">For <?= $respt['property_for'];?> </span></div>
                                        </div>
                                        <div class="item-card2-icons"> <a href="property-services/<?= "$propt_name" ?>" class="item-card2-icons-l bg-primary"> <i class="fa fa-home"></i></a> <a href="#" class="item-card2-icons-r bg-secondary"><i class="fa fa fa-heart-o"></i></a> </div>
                                        <div class="card-body">
                                            <div class="item-card2">
                                                <div class="item-card2-text"> <a href="property-services/<?= "$propt_name" ?>" class="text-dark">
                                                        <h4 class=""><?= $respt['property_name'];?></h4>
                                                    </a>
                                                    <p class="mb-2"><i class="fa fa-map-marker text-danger mr-1"></i> <?= $respt['city'].",". $respt['state'];?></p>
                                                    <h5 class="font-weight-bold mb-3">$<?= $respt['price'];?></h5>
                                                </div>
                                                <ul class="item-card2-list">
                                                    <li><a href="#"><i class="fa fa-arrows-alt text-muted mr-1"></i> <?= $respt['area']." /". $respt['area_in'];?></a></li>
                                                    <li><a href="#" class="icons"><i class="fa fa-bed text-muted mr-1"></i> <?= $respt['room'];?> Beds</a></li>
                                                    <li><a href="#" class="icons"><i class="fa fa-bath text-muted mr-1"></i> <?= $respt['bathrooms'];?> Bath</a></li>
                                                    <li><a href="#" class="icons"><i class="fa fa-car text-muted mr-1"></i> <?= $respt['garages'];?> Car</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="card-footer">
                                            <div class="footerimg d-flex mt-0 mb-0">
                                                <div class="d-flex footerimg-l mb-0"> <img src="admin/product/image/<?= $sqlimg['images']; ?>" alt="image" class="avatar brround  mr-2">
                                                    <h5 class="time-title text-muted p-0 leading-normal mt-1 mb-0"><?= $resus['name']; ?><i class="si si-check text-success fs-12 ml-1" data-toggle="tooltip" data-placement="top" title="" data-original-title="verified"></i></h5>
                                                </div>
                                                <div class="mt-2 footerimg-r ml-auto"> <small class="text-muted"><?php $now = new DateTime();
                                        $future_date = new DateTime($respt['created_now']);
                                        $interval = $future_date->diff($now);
                                        echo $interval->format("%a days"); ?> ago</small> </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div><?php } ?>
                        </div>
                    </div>
                    <div class="owl-nav"><button type="button" role="presentation" class="owl-prev"><span aria-label="Previous">‹</span></button><button type="button" role="presentation" class="owl-next"><span aria-label="Next">›</span></button></div>
                    <div class="owl-dots disabled"></div>
                </div>
            </div>
        </section>
<?php include("footer.php");?>
<?php include("js.php");?>
<script type="text/javascript">
$(function(){
$('body').on('click', '.sendme', function(){
   var sr_id = $(this).attr("id");
    var action = "add";
       $.ajax({
       url:"https://www.feufo.com/insert_enquiry.php",
       method:"POST",
       data:{
         sr_id: sr_id,
          action:action
        },
         success:function(msg)
        { //alert(msg);
            //console.log(msg);
       
        }
    });
 
  });
  });  
        </script>
        <script type="text/javascript">
            (function(e){var t,o={className:"autosizejs",append:"",callback:!1,resizeDelay:10},i='<textarea tabindex="-1" style="position:absolute; top:-999px; left:0; right:auto; bottom:auto; border:0; padding: 0; -moz-box-sizing:content-box; -webkit-box-sizing:content-box; box-sizing:content-box; word-wrap:break-word; height:0 !important; min-height:0 !important; overflow:hidden; transition:none; -webkit-transition:none; -moz-transition:none;"/>',n=["fontFamily","fontSize","fontWeight","fontStyle","letterSpacing","textTransform","wordSpacing","textIndent"],s=e(i).data("autosize",!0)[0];s.style.lineHeight="99px","99px"===e(s).css("lineHeight")&&n.push("lineHeight"),s.style.lineHeight="",e.fn.autosize=function(i){return this.length?(i=e.extend({},o,i||{}),s.parentNode!==document.body&&e(document.body).append(s),this.each(function(){function o(){var t,o;"getComputedStyle"in window?(t=window.getComputedStyle(u,null),o=u.getBoundingClientRect().width,e.each(["paddingLeft","paddingRight","borderLeftWidth","borderRightWidth"],function(e,i){o-=parseInt(t[i],10)}),s.style.width=o+"px"):s.style.width=Math.max(p.width(),0)+"px"}function a(){var a={};if(t=u,s.className=i.className,d=parseInt(p.css("maxHeight"),10),e.each(n,function(e,t){a[t]=p.css(t)}),e(s).css(a),o(),window.chrome){var r=u.style.width;u.style.width="0px",u.offsetWidth,u.style.width=r}}function r(){var e,n;t!==u?a():o(),s.value=u.value+i.append,s.style.overflowY=u.style.overflowY,n=parseInt(u.style.height,10),s.scrollTop=0,s.scrollTop=9e4,e=s.scrollTop,d&&e>d?(u.style.overflowY="scroll",e=d):(u.style.overflowY="hidden",c>e&&(e=c)),e+=w,n!==e&&(u.style.height=e+"px",f&&i.callback.call(u,u))}function l(){clearTimeout(h),h=setTimeout(function(){var e=p.width();e!==g&&(g=e,r())},parseInt(i.resizeDelay,10))}var d,c,h,u=this,p=e(u),w=0,f=e.isFunction(i.callback),z={height:u.style.height,overflow:u.style.overflow,overflowY:u.style.overflowY,wordWrap:u.style.wordWrap,resize:u.style.resize},g=p.width();p.data("autosize")||(p.data("autosize",!0),("border-box"===p.css("box-sizing")||"border-box"===p.css("-moz-box-sizing")||"border-box"===p.css("-webkit-box-sizing"))&&(w=p.outerHeight()-p.height()),c=Math.max(parseInt(p.css("minHeight"),10)-w||0,p.height()),p.css({overflow:"hidden",overflowY:"hidden",wordWrap:"break-word",resize:"none"===p.css("resize")||"vertical"===p.css("resize")?"none":"horizontal"}),"onpropertychange"in u?"oninput"in u?p.on("input.autosize keyup.autosize",r):p.on("propertychange.autosize",function(){"value"===event.propertyName&&r()}):p.on("input.autosize",r),i.resizeDelay!==!1&&e(window).on("resize.autosize",l),p.on("autosize.resize",r),p.on("autosize.resizeIncludeStyle",function(){t=null,r()}),p.on("autosize.destroy",function(){t=null,clearTimeout(h),e(window).off("resize",l),p.off("autosize").off(".autosize").css(z).removeData("autosize")}),r())})):this}})(window.jQuery||window.$);

var __slice=[].slice;(function(e,t){var n;n=function(){function t(t,n){var r,i,s,o=this;this.options=e.extend({},this.defaults,n);this.$el=t;s=this.defaults;for(r in s){i=s[r];if(this.$el.data(r)!=null){this.options[r]=this.$el.data(r)}}this.createStars();this.syncRating();this.$el.on("mouseover.starrr","span",function(e){return o.syncRating(o.$el.find("span").index(e.currentTarget)+1)});this.$el.on("mouseout.starrr",function(){return o.syncRating()});this.$el.on("click.starrr","span",function(e){return o.setRating(o.$el.find("span").index(e.currentTarget)+1)});this.$el.on("starrr:change",this.options.change)}t.prototype.defaults={rating:void 0,numStars:5,change:function(e,t){}};t.prototype.createStars=function(){var e,t,n;n=[];for(e=1,t=this.options.numStars;1<=t?e<=t:e>=t;1<=t?e++:e--){n.push(this.$el.append("<span class='fa .fa-star-o'></span>"))}return n};t.prototype.setRating=function(e){if(this.options.rating===e){e=void 0}this.options.rating=e;this.syncRating();return this.$el.trigger("starrr:change",e)};t.prototype.syncRating=function(e){var t,n,r,i;e||(e=this.options.rating);if(e){for(t=n=0,i=e-1;0<=i?n<=i:n>=i;t=0<=i?++n:--n){this.$el.find("span").eq(t).removeClass("fa-star-o").addClass("fa-star")}}if(e&&e<5){for(t=r=e;e<=4?r<=4:r>=4;t=e<=4?++r:--r){this.$el.find("span").eq(t).removeClass("fa-star").addClass("fa-star-o")}}if(!e){return this.$el.find("span").removeClass("fa-star").addClass("fa-star-o")}};return t}();return e.fn.extend({starrr:function(){var t,r;r=arguments[0],t=2<=arguments.length?__slice.call(arguments,1):[];return this.each(function(){var i;i=e(this).data("star-rating");if(!i){e(this).data("star-rating",i=new n(e(this),r))}if(typeof r==="string"){return i[r].apply(i,t)}})}})})(window.jQuery,window);$(function(){return $(".starrr").starrr()})

$(function(){

  $('#new-review').autosize({append: "\n"});

  var reviewBox = $('#post-review-box');
  var newReview = $('#new-review');
  var openReviewBtn = $('#open-review-box');
  var closeReviewBtn = $('#close-review-box');
  var ratingsField = $('#ratings-hidden');

  openReviewBtn.click(function(e)
  {
    reviewBox.slideDown(400, function()
      {
        $('#new-review').trigger('autosize.resize');
        newReview.focus();
      });
    openReviewBtn.fadeOut(100);
    closeReviewBtn.show();
  });

  closeReviewBtn.click(function(e)
  {
    e.preventDefault();
    reviewBox.slideUp(300, function()
      {
        newReview.focus();
        openReviewBtn.fadeIn(200);
      });
    closeReviewBtn.hide();
    
  });

  $('.starrr').on('starrr:change', function(e, value){
    ratingsField.val(value);
  });
});
        </script>
    </div>
</body>

</html>