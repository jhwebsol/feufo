<?php include("includes/db_config.php"); 
$ip = $_SERVER['REMOTE_ADDR'];
$details = json_decode(file_get_contents("http://ipinfo.io/{$ip}/json"));
if (isset($_POST['img_submit'])) {
extract($_POST); 
date_default_timezone_set('Asia/Kolkata');
$date = date('Y-m-d H:i:s');
$ip=$_SERVER['REMOTE_ADDR'];
$tmp_file = $_FILES['cimg']['tmp_name'];
$ext = pathinfo($_FILES["cimg"]["name"], PATHINFO_EXTENSION);
$rand = md5(uniqid().rand());
$simg = $rand.".".$ext;
move_uploaded_file($tmp_file,"admin/imgaes/uploaded/".$simg);
$csize = mysqli_real_escape_string($conn,$_POST['csize']);
$sql="INSERT into upload_img_enquiry(name,email_id,contact_no,image,sign,size,detail,created_date,ip_address) values ('$cname','$cemail','$cphone','$simg','$radioindoor','$csize','$cdetails','$date','$ip')";
   $result = mysqli_query($conn, $sql);
   if($result){
       echo '<script>alert("Image uploaded successfully!")</script>'; 
   }
} 
if (isset($_POST['enq_submit'])) {
extract($_POST);
date_default_timezone_set('Asia/Kolkata');
$date = date('Y-m-d H:i:s');
$ip=$_SERVER['REMOTE_ADDR'];
  $sql="INSERT into get_quote(name,email,contact_no,sign,details,created_date,ip_address) values ('$ename','$email_id','$phone_no','$radio1','$data','$date','$ip')";
   $result = mysqli_query($conn, $sql);
   if($result){
       echo '<script>alert("Thank You! We Will Get Back To You.")</script>'; 
   }
} 
if (isset($_POST['enq_submit'])) {
extract($_POST);
date_default_timezone_set('Asia/Kolkata');
$date = date('Y-m-d H:i:s');
$ip=$_SERVER['REMOTE_ADDR'];
  $sql="INSERT into get_quote(name,email,contact_no,sign,details,created_date,ip_address) values ('$ename','$email_id','$phone_no','$radio1','$data','$date','$ip')";
   $result = mysqli_query($conn, $sql);
   if($result){
       echo '<script>alert("Thank You! We Will Get Back To You.")</script>'; 
   }
} 
?> 
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Dezign Mania</title>
    <?php include("includes/css.php");?>
    <?php $sqlcsr=mysqli_query($conn,"select * from custom_service");
    $rescsr= mysqli_fetch_array($sqlcsr);  
    $idds=$rescsr['id'];
    $sqlci=mysqli_query($conn,"select * from custom_image where custom_id='$idds'");
    $resci= mysqli_fetch_array($sqlci);
    $extension4 = (explode(".", $resci["image"])); 
    $exts=$extension4[0]; ?>
    <style> .text-black{color:#000!important}
        .prd-size tbody tr td:nth-child(1) {
            background-color: #fff !important;
            color: #000!important;
        }
.prd-size tbody tr td, tbody tr th{font-weight:800!important;}
        .prd-size tbody tr td:nth-child(2) {
            background-color:#ffcc00!important;
            color: #000!important;
        }
.prd-block_options:not(.prd-block_options--select) {
    margin-top: 14px;
}

        .prd-size tbody tr td:nth-child(3) {
            background-color:#00ff01!important;
            color: #000!important;
        }

        .prd-size tbody tr td:nth-child(4) {
            background-color: #00ccff!important;
            color: #000!important;
        }

        .prd-size tbody tr td:nth-child(5) {
            background-color:#ff6600!important;
            color: #000 !important;
        }

        .hide {
            display: none;
        }


        .myDIV:hover+.hide {
            display: block;
        }

        .hide1 {
            display: none;
        }

        .myDIV1:hover+.hide1 {
            display: block;
        }

        .font_style li {
            list-style: none;
            font-size: 12px;
            width: 15%;
            line-height: 18px;
            height: 25px;
            font-size: 11px;
            overflow: hidden;
        }

        .font_group ul {
            margin-left: 0px !important;
            margin-right: 0px !important;
        }

        .color_style #color_table ul {
            margin-left: 0px !important;
            margin-right: 0px !important;
        }

        .color_style #color_table li {
            list-style: none
        }

        .color_style #color_table li.col-xs-2 {
            width: 11% !Important;
            padding: 0 !important;
            float: left;
        }

        .color_style #color_table li>.color_name {
            left: 0;
            top: 4rem;
            text-align: center;
            font-size: 0.6rem !important;
            line-height: 0.7rem !important;
            color: #000
        }

        .dzcustom_text {
            background-image: url('admin/images/<?= $resci['image']; ?>');
            height: 400px;
            width: 100%
        }

        .shtext {
            text-shadow: rgb(255, 255, 255) 0px 0px 5px, rgb(255, 255, 255) 0px 0px 10px, rgb(255, 144, 255) 0px 0px 20px, rgb(255, 144, 255) 0px 0px 30px, rgb(255, 144, 255) 0px 0px 40px, rgb(255, 144, 255) 0px 0px 55px, rgb(255, 144, 255) 0px 0px 75px;
        }

        .table-bordered>thead>tr>th,
        .table-bordered>tbody>tr>th,
        .table-bordered>tfoot>tr>th,
        .table-bordered>thead>tr>td,
        .table-bordered>tbody>tr>td,
        .table-bordered>tfoot>tr>td {
            border-width: 1px;
            border-style: solid;
            border-color: #bcb4b4;
            padding: 8px 6px;
            text-align: center
        }

        .table-bordered>thead>tr>th span,
        .table-bordered>thead>tr>td strong {
            font-weight: 600 !important;
        }

        .table-bordered>thead>tr .main,
        .table-bordered>thead>tr .main strong {
            background-color: #cc33ff;
            color: #000;
            vertical-align: middle;
            font-size: 10px;
        }



        .demo_on_off {
            position: relative;
            z-index: 1
        }

        .demo_on_off img {
            height: 34px;
            float: left;
            width: 74px;
            top: 10px;
            left: 10px;
        }

        .btnsizee {
            border: 0px solid !important;
            background-color: transparent !important;
            font-size: 13px;
        }

        div.bottom-handle .indicator-container span.first {
            left: 0;
            top: 0;
            bottom: 0;
            width: 2px;
        }

        div.bottom-handle .indicator-container span.second {
            top: calc(50% - 1px);
        }

        .table-striped>tbody>tr>td strong {
            color: #4d4d4d;
font-weight:800;
        }

        .indicator-container span.second {
            width: 100%;
            height: 2px;
            left: 0;
            right: 0;
            top: 0;
        }

        div.size-indicator {
            position: absolute;
            text-align: center;
            display: flex;
            align-items: center;
            justify-content: center;
            color: rgb(191 190 190);
            font-size: .85rem;
        }
.size_note{color: #000}
        div.bottom-handle .indicator-container {
            height: 2px;
            background-color: #fff;
        }

        div.indicator-container {
            position: relative;
            height: 100%;
            width: 100%;
        }

        div.calculated-width {

            margin: 0 4px;
            white-space: nowrap;
            text-shadow: 1px 1px 3px #343434;

        }

        .prd-block_info {
            display: -ms-flexbox;
            display: flex;
            flex-direction: column;
            -ms-flex-direction: column;
            position: relative;
            z-index: 1;
            top: 0px;
        }

        .lefttextneon {
            width: 50%;
            float: left;
        }

        .righttextneon {
            width: 48%;
            float: left;
            margin-left: 20px
        }

        .sizedatatexth {
            z-index: 0;
            margin-top: -476px;;
        }

        .faqs h3 {
            margin: 0 0 4px;
            color: #0f08f5;
            font-size: 24px;
        }

        .faqs h1 {
         font-size: 49px; 
margin-bottom:0px;
text-align: left;
color: #000;
text-shadow: rgb(2, 116, 252) 0px 0px 5px, rgb(2, 116, 252) 0px 0px 5px, rgb(2, 116, 252) 0px 0px 5px, rgb(2, 116, 252) 0px 0px 10px, rgb(2, 116, 252) 0px 0px 40px, rgb(2, 116, 252) 0px 0px 15px, rgb(2, 116, 252) 0px 0px 15px;  }

        .faqs h2 {
            font-family: 'Forum', cursive;
        }

        .faqs p {
            font-family: 'Forum', cursive;
            font-size: 15px;
            line-height: 25px;
            color: #fff;
		text-align:justify;
        }

.prd-block_linkks{font-size:12.8px!important;}
.linkksbtns{border-radius:4px!important;background-color:#00fdfd;padding:10px;}
     .catdimmer{border-radius:4px!important;background-color:#00fdfd;padding:0px 0px;margin-left:15px;}.catdimmer label{width:100%;height:auto;margin-bottom:0px;}.catdimmer label span{border-radius:4px;text-align:center;padding:0px 0;display:block;font-weight:600;text-transform:uppercase}.catdimmer label input{position:absolute;display:none;color:#000!important;}.catdimmer label input + span{font-size:12.8px!important;color:#000;
min-height:17px;padding-top:10px;padding-bottom:10px;}.catdimmer input:checked + span{color:#ffffff;text-shadow:0 0 6px rgba(0, 0, 0, 0.8);}.action input:checked + span{background-color:#282828;}.prd-block_link{padding:0px 10px;}
.adcomcart{margin-top:0px;}
   @media (min-width:320px) and (max-width:640px) {
            .lefttextneon {
                width: 100%;
                float: left
            }.prd-block_actions--wishlist.prd-block_actions {margin-right: 0px;margin-left: 0px;}
.adcomcart{margin-top:10px;}
            .catdimmer{border-radius:50px!important;margin-right: 10px; }
            .catdimmer label input + span {
  font-size: 14.8px !important;
  color: #403f3f;
  min-height: 17px;
  padding-top: 10px;
  padding-bottom: 10px;
}
.prd-block_actions .btn-wrap { 
  margin: 0px 0px 0px!important;
 
}
.linkksbtns{border-radius:50px!important;background-color:#00fdfd;padding:5px;}
.size_note{color: #fff!important;}
.btn {    padding: 3px 20px;
}
            .sizedatatexth {
                z-index: 0;
                margin-top: 5px;
            }

            .righttextneon {
                width: 100%;
                float: left;
                margin-left: 0px
            }
 .steps-progress .nav-tabs:not(.tab-category) > li {
min-width: 22%;
width: 29%;
float: left;
}
.steps-progress .nav-tabs:not(.tab-category) > li .nav-link span:first-child {
    font-size: 22px;
    top: -4px;
}
            .steps-progress .nav-tabs:not(.tab-category) > li .nav-link { 
                min-width: 120px;}
            .prd-block_info {
                display: -ms-flexbox;
                display: flex;
                flex-direction: column;
                -ms-flex-direction: column;
                position: relative;
                z-index: 1;
                top: 0px;
            } .faqs h1 {
                font-size: 14px;
                text-align: center;
            }
.font_style li {
    list-style: none;
    font-size: 12px;
    width: 21%; 
    overflow: hidden;
}
        }
        body{background-color: #fff; color: #000;}
     label{color:#000!important}
        .lefttextneon h2{color:#000!important}
        .lefttextneon p{color:#000!important}
        .nav-item a{color:#000!important;}
        .table-responsive a{color:#000!important;}
        .prd-block_info_item a{color:#000!important;}
.prd-block_links a {margin: auto;}
.prd-block_links li { margin:auto;}
.prd-block_links li:not(:first-child) {margin-top: 0px;}
.prd-block_link > span { 
    width: 100%;}

 </style>
<style>
<?php $sqlfts=mysqli_query($conn,"select * from product_fonts");
 while($resfts= mysqli_fetch_array($sqlfts)){ echo $resfts['import_font']; } ?>
</style>
<?php $sqlftss=mysqli_query($conn,"select * from product_fonts");
 while($resftss= mysqli_fetch_array($sqlftss)){ echo $resftss['style_font']; } ?>
  

</head>
<?php   if(!empty($_POST['textsign'])) {
    $valueOfInput = $_POST['textsign'];
} ?><body class="template-product has-smround-btns has-loader-bg equal-height has-sm-container" style="background-color:#000">
    <?php include("includes/header.php");?>
    <div class="page-content" style="background-color:#000">
        <div class="holder breadcrumbs-wrap mt-0" style="background-color:#000">
            <div class="container">
                <div class="holder" style="background-color:#000">
                    <div class="container container2 pb-1">
                        <div class="row">
                            <div class="col-md-18">
                                <div class="p-20" style="color:#ffffff!important;margin-bottom:10px;text-align:center;text-shadow:rgb(247, 248, 247) 0px 0px 2px, rgb(247, 250, 247) 0px 0px 1px, rgb(244, 244, 244) 0px 0px 1px, rgb(240, 243, 240) 0px 0px 10px, rgb(247, 249, 246) 0px 0px 20px, rgb(238, 245, 238) 0px 0px 5px, rgb(244, 247, 243) 0px 0px 5px;font-size:30px;min-height:76px;color:#7ae553;text-align:center;font-family: 'Forum', cursive;padding-left:0px;margin-left:0px;margin-top:22px;line-height:36px;"> 
                                Hey Artist! Dezign Your Own Neon Sign Here...</div>
                            </div>
                        </div>
                        <div class="row">
                            <?php $sqlcs=mysqli_query($conn,"select * from custom_service");
                        $rescs= mysqli_fetch_array($sqlcs);  ?>
                            <div class="lefttextneon" style="box-shadow:0px 6px 23px -2px rgba(0,0,0,0.27);background-color:#FFFFFF;padding:12px 10px 10px 10px;border-radius:15px;">
                                <div class="steps-progress" style="z-index:1;position:relative;">
                                     <ul class="nav nav-tabs">
                                        <li class="nav-item">
                                            <a class="nav-link active" data-toggle="tab" href="#step1" data-step="1"><span>01.</span><span>Text</span></a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" data-toggle="tab" href="#step2" data-step="2"><span>02.</span><span>Font</span></a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" data-toggle="tab" href="#step3" data-step="3"><span>03.</span><span>Color</span></a>
                                        </li>
                                    </ul>
                                    <div class="progress">
                                        <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="1" aria-valuemin="1" aria-valuemax="5" style="width: 25%;"></div>
                                    </div>
                                </div>
                                <div class="tab-content" style="margin-top:10px">
                                    <div class="tab-pane fade show active" id="step1">
                                        <div class="prd-size swatches">
                                            <textarea onInput="showCurrentValue(event)" rows="2" class="form-control myDIV" maxlength="30" placeholder="Your Text" id="textsign" style="padding: 12px 20px 12px;background: #f5f5f5;text-lign:center;border-radius: 15px;border: 1px solid #b9b9b9;"></textarea>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="step2">
                                        <div class="form-group font_style active">
                                            <h2 class="text-black" style="text-transform: uppercase; text-align:center">
                                                Choose font
                                            </h2>
                                            <ul class="row" style="padding-left:0px;min-height:980px">
                                                <?php $sqlft=mysqli_query($conn,"select * from product_fonts");
                                        while($resft= mysqli_fetch_array($sqlft)){  ?>
                                                <!-- <button type="button" style="border:0px;background-color: transparent;" onclick="setFont('<?= $resft['font']; ?>',<?= $resft['id']; ?>,this);"> -->
                                                <li class="col-xs-2" <?php echo html_entity_decode($resft['font_css']); ?>><input type="button" data-font="<?= $resft['font'] ?>" onclick="fontselect(this.value); return false;" class="fontchg" style="background-color:#fff;color:#000;min-width:90px;height:40px;font-size: 18px;border:0px solid #ccc;" value="<?= $resft['font'] ?>">
                                                </li><?php } ?>
                                                <input id="fontchg" name="fontchg" type="hidden" class="form-control">

                                            </ul>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="step3">
                                        <div class="form-group color_style ddd-test active">
                                            <label class="text-black" style="text-transform: uppercase;">
                                                Choose color </label>
                                            <ul id="color_table" style="min-height: 580px;">
                                                <?php $sqlcl=mysqli_query($conn,"select * from product_color");
                                        while($rescl= mysqli_fetch_array($sqlcl)){  
                                            $data=$rescl['color']; ?>
                                                <li style="float: left;width:50px;height:80px; text-align: center; margin-right:5px;"><input type="button" onclick="colorselect(this.value); return false;" class="colorcd" style="background-color: <?= $rescl['color'] ?>;width:30px;border-radius:50%;font-size:0px;height:30px;border:0px solid #ccc;" data-code="<?= $rescl['color'] ?>" data-color="<?= $rescl['color_text'] ?>" value="<?= $rescl['color_text'] ?>">
                                                    <p class="color_name" style="margin-top: 1px;padding-top: 1px;text-shadow: none;text-transform: capitalize;"><?= $rescl['color_name']; ?></p>
                                                </li><?php } ?>
                                                <input id="slcolor" name="slcolor" type="hidden" class="form-control">
                                            </ul> 
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="righttextneon">
                                <div class="aside-content">
                                    <?php $idd=$rescs['id'];
                                $sqlcig=mysqli_query($conn,"select * from custom_image where custom_id='$idd'");
                                $rescig= mysqli_fetch_array($sqlcig);
                                $extension4 = (explode(".", $rescig["image"])); 
                                $exts=$extension4[0];
                              $img = 'admin/images/'. $rescig["image"]; ?>
                         
                           <div class="prd-block_main-image dzcustom_texts" style="background-image:url('<?= $img; ?>');height:400px; width:100%">
                                        <button type="button" id="fton" style="background-color:transparent;width:130px;height:40px;border:0px solid #ccc;" class="demo_on_off offswitch"><img src="images/off_new.png"></button>
                                        <button type="button" id="sdon" style="display:none; background-color:transparent;width:130px;height:40px;border:0px solid #ccc;" class="demo_on_off onswitch"><img src="images/on_new.png"></button>
                                        <h1 class="text-center shtext myDIV" style="color:#fff;padding-top:100px;font-size:50px;" id="labeltext">Your text</h1>
                                        
                                        <h1 class="text-center myDIV1 hide1" style="color:#ff0000;padding-top:100px;font-size:50px;" id="labeltexts">Your text</h1>
                                       
                                    </div>
                                    <div class="row">
                                       
                                        <?php $idd=$rescs['id']; 
                                    $sqlcimg=mysqli_query($conn,"select * from custom_image where custom_id='$idd'");
                                     while($rescimg= mysqli_fetch_array($sqlcimg)){  
                                      ?>
                                        <div class="col-3 cbgselect"><button onclick="ik(this.value); return false;" type="button" class="thumbnail" value="<?= $rescimg['id']; ?>"><img src="admin/images/<?= $rescimg['image']; ?>" style="height:70px"></button></div><?php } ?>
                                        <input id="bcimg" name="bcimg" type="hidden" class="form-control">
                                    </div>
                                       <!-- <ul class="prd-block_links list-unstyled">
                                            <li><a href="#" data-fancybox="" class="modal-info-link btn btn-success btn-sm mt-1 mb-1" data-src="#uploadimage"><i class="icon-size-guide text-blacks"></i> Upload Your Image Or Logo</a></li>
                                            <li><a href="#" data-fancybox="" class="modal-info-link btn btn-success btn-sm mt-1 mb-1" data-src="#contactModal"><i class="icon-email-1 text-blacks"></i> I need Help-Get a Quote</a></li>
                                        </ul>-->

                                        <!-- <center> <?php  if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
                                               $user_id=$_SESSION['id'];
                                            ?>
                                            <button type="button" class="btn btn-success btn-sm mt-1 mb-1 saveimg"><i class="icon-email-1"></i> Save My Images</button><?php }else{ ?>
                                            <a href="check-login.php?id=custom"> <button class="btn btn-success btn-sm mt-1 mb-1"><i class="icon-email-1"></i> Save My Images</button></a><?php } ?>
                                        </center> -->
                                </div>
                            </div>
                            <?php $countrys=$details->country; ?>
                            <div class="lefttextneon sizedatatexth" style="background-color: #fff">
                                <div class="prd-block_info prd-block_info--style1" data-prd-handle="London">
                                    <div class="order-0 order-md-100">
                                        <div class="prd-block_options">
                                            <div class="prd-size ">
                                                <?php include("custom-table-price.php"); ?>
                                                <div style="margin-left:10px;"><label class="size_note">*All prices above are inclusive of all the taxes (GST/VAT) & Custom Duties & Clearance if any.<br/> Just place your order and leave the rest to us for your awesome Neon Sign to arrive at your doorsteps within 14 days <a href="https://www.dezignmania.com/term_condition.php" style="color:#000">(T&C)</a></label></div>       
                                                
 <div class="faqs" style="margin-left:10px;margin-bottom:5px;margin-top:10px"><h1 style="font-size:17px;margin-bottom:10px;min-height:30px;color:#fff">FREE BRIGHTNESS CONTROLLER</h1></div>       
                                                
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane-inside" style="">
                                        <div class="clearfix"> 
                                            <div class="row mt-20" style="text-align:center;margin:auto">
                                              <?php   if($countrys === IN){ ?>
                                               <div class="col-xl-9 col-md-12 catdimmer action"><label><input type="checkbox"  class="trigger" value="1000"><span>Add on Dimmer with Remote: ₹ 1000 </span></label></div><?php }elseif ($countrys=== GB) { ?>
                                          <div class="col-xl-9 col-md-12"><label><input type="checkbox"  class="trigger" value="10"><span>Add on Dimmer with Remote: £ 10 </span></label></div><?php  }elseif ($countrys=== AU) { ?>
                                            <div class="col-xl-9 col-md-12"><label><input type="checkbox"  class="trigger" value="20"><span>Add on Dimmer with Remote: $  20</span></label></div><?php }elseif ($countrys=== EU) { ?>
                                            <div class="col-xl-9 col-md-12"><label><input type="checkbox"  class="trigger" value="15"><span>Add on Dimmer with Remote:  €  15</span></label></div><?php }elseif ($countrys=== UE) { ?>
                                            <div class="col-xl-9 col-md-12"><label><input type="checkbox"  class="trigger" value="15"><span>Add on Dimmer with Remote:  $ 15</span></label></div><?php }else{ ?>
                                            <div class="col-xl-9 col-md-12"><label><input type="checkbox"  class="trigger" value="50"><span>Add on Dimmer with Remote: د.إ  50</span></label></div>
                                           <?php } ?>
                                        </div>
                                        </div>
                                    </div>
<div class="row" style="text-align:center;margin:auto">
                                    <div class="col-md-10 prd-block_actions prd-block_actions--wishlist">
                                        <div style="text-align:center;margin:auto"> 
                                            <div class="prd-block_links-wrap prd-block_info_item container mt-0 linkksbtns" style="margin-bottom:10px;">
                                                <div class="prd-block_link text-uppercase prd-block_linkks"><span>Total with selected options: </span></div>
                                                <div class="prd-block_link" style="color:#000"><?php if($countrys === IN){ echo "₹"; }elseif ($countrys=== GB){ echo "£";
                                                }elseif ($countrys=== AU) { echo "$";
                                                }elseif ($countrys=== AE) { echo "د.إ ";
                                                }elseif ($countrys=== EU) { echo "€";
                                                }elseif ($countrys=== UE) { echo "$";  
                                                }elseif ($countrys=== US) { echo "$"; } ?>
                                                 <span id="our_price" class="our_price"> 0 </span>
                                                    <input type="hidden" name="our_prices" id="our_prices" value="0">
                                                    <input type="hidden" class="our_prcs" id="our_prcs" value="0" />
                                                </div> 
                                        </div>
                                     </div>
                                    </div>
                                    <div class="col-md-7 prd-block_actions prd-block_actions--wishlist" style="margin-top:0px">                                        
                                        <div class="" style="margin:auto;">
                                            <div class="btn-wrap">
                                                <?php  if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
                                               $user_id=$_SESSION['id'];
                                            ?>
                                                <button type="button" class="btn btn--add-to-cart js-trigger-addtocart js-prd-addtocart addtocarts adcomcart" style="padding:4px 25px;height:40px;"><i class="icon-cart"></i> Add to cart</button><?php }else{ ?>
                                                <a href="check-login.php?idd=custom adcomcart"> <button type="button" class="btn btn--add-to-cart js-trigger-addtocart js-prd-addtocart adcomcart" style="padding:4px 25px;height:40px;"><i class="icon-cart"></i> Add to cart</button></a><?php } ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--<div class="lefttextneon" style="float:left;width:100%">
                                <div class="aside-content">
                                    <div class="prd-block_info_item">                                 
 
                                            <div class="row oksaved" style="display:none;">
                                                <!-- <div class="col-md-10 prd-block_actions prd-block_actions--wishlist mt-3">
                                                    <?php  $user_id=$_SESSION['id'];
                                                $sql_im="SELECT * from save_image where user_id='$user_id'";
                                                 $exem=mysqli_query($conn,$sql_im);
                                                 $resm=mysqli_fetch_array($exem); ?>
                                                    <textarea class="form-control" rows="2">https://www.dezignmania.com/custom-service-details.php?mid=<?= $resm['img_id']; ?></textarea>
                                                </div> -->
                                              <!--  <div class="col-md-4 prd-block_actions prd-block_actions--wishlist mt-3">
                                                    <div class="mt-1" style="margin:auto;text-align:center;">
                                                        <div class="prd-action-left">
                                                            <form action="#">
                                                                <button class="btn js-prd-addtocart"> Copy To Clipboard</button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div> -->
 
                                           <!-- <div id="uploadimage" style="display: none;" class="modal-info-content modal-info-content-lg">
                                                <div class="modal-info-heading">
                                                    <h2 class="mb-0">Upload Your Image - Get a Free Design Proof</h2>

                                                  <p>You can also make a rough sketch simply on paper of what your Neon Sign should look like and upload the picture... this template will help us craft your Neon Sign exactly as per your vision.
<br/>Or you upload any picture (be it something off the internet or your own)... You can add instructions in detail so that your vision is clear to us & we are able to craft your Neon Sign exactly how you want it to be! Our passion for perfection makes us proud DEZIGN MANIACS!!
</p>
                                                </div> 
                                                <form method="post" action="" class="contact-form" enctype="multipart/form-data">
                                                    <div class="row form-group">
                                                        <div class="col-xl-9 mt-1">
                                                            <label>Name</label>
                                                            <input type="text" name="cname" class="form-control form-control--sm" placeholder="Name">
                                                        </div>
                                                        <div class="col-xl-9 mt-1">
                                                            <label>Email</label>
                                                            <input type="text" name="cemail" class="form-control form-control--sm" placeholder="Email" required="">
                                                        </div>
                                                        <div class="col-xl-9 mt-1">
                                                            <label>Contact No.</label>
                                                            <input type="text" name="cphone" class="form-control form-control--sm" placeholder="Phone Number">
                                                        </div>
                                                        <div class="col-xl-9 mt-1">
                                                            <label>Upload Image</label>
                                                            <input type="file" name="cimg" class="form-control form-control--sm" placeholder="Choose Images">
                                                        </div> 
                                                        <div class="col-xl-9 mt-1">
                                                            <label>Approximate size (length/height)</label>
                                                            <input type="text" name="csize" class="form-control form-control--sm" placeholder="Approximate size (length/height)">
                                                        </div>
                                                        <div class="col-xl-18 mt-1">
                                                            <label> Tell us as much as you can about your new Dezign Mania sign </label>
                                                            <textarea class="form-control textarea--height-170" name="cdetails" placeholder="" required=""> </textarea>
                                                        </div>
                                                        <div class="col-xl-9 mt-3">
                                                            <button class="btn" name="img_submit" type="submit">GET A FREE QUOTE & MOCKUP</button>
                                                        </div>
                                                        <div class="col-xl-9 mt-1">
                                                            <button class="btn-primary p-1" name="noimg" value="noimg" type="submit">No image attached. Send anyway?</button>
                                                        </div>
                                                        <div class="col-xl-18 mt-1">
                                                            <p class="altp" style="text-align:center">Use our online design tool to <a href="https://www.dezignmania.com/">Create Your Dezign Mania</a>, or email your files and requirements to <?php $countrys=$details->country; if($countrys === IN){ ?> <a href="mailto:india@dezignmania.com" style="color:#fff!important;">india@dezignmania.com</a><?php }else{ ?><a href="mailto:info@dezignmania.com" style="color:#fff!important;">info@dezignmania.com</a><?php } ?></p>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>

                                          <div id="contactModal" style="display: none;" class="modal-info-content modal-info-content-lg">
                                                <div class="modal-info-heading">
                                                    <h2 class="mb-1">Have a question?</h2>
                                                </div>
                                                <form method="post" action="" class="contact-form">
                                                    <div class="row form-group">
                                                        <div class="col-xl-18 mt-1">
                                                            <label>Name</label>
                                                            <input type="text" name="ename" class="form-control form-control--sm" placeholder="Name">
                                                        </div>
                                                        <div class="col-xl-9 mt-1">
                                                            <label>Email</label>
                                                            <input type="text" name="email_id" class="form-control form-control--sm" placeholder="Email" required="">
                                                        </div>
                                                        <div class="col-xl-9 mt-1">
                                                            <label>Contact No.</label>
                                                            <input type="text" name="phone_no" class="form-control form-control--sm" placeholder="Phone Number">
                                                        </div>
                                                       
                                                        <div class="col-xl-18 mt-1">
                                                            <label>What can we help you with?</label>
                                                            <textarea class="form-control textarea--height-170" name="data" placeholder="Text details here" required=""></textarea>
                                                        </div>
                                                        <div class="col-xl-18 mt-3">
                                                            <button name="enq_submit" class="btn" type="submit">Send Form</button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div> -->
                    </div>
                </div>
            </div>

            <div class="container container2 mt-3" style="background-color:#000">
                <div class="row faqs">
                    
                    <?php $sqlqr=mysqli_query($conn,"SELECT * from faq ");
                        while ($rows=mysqli_fetch_array($sqlqr)){ ?>
                   <div class="col-md-18">
                        <div class="section-header text-center">
                            <h1 class="text-white">GUIDE FOR DEZIGNING YOUR NEON SIGN</h1>
                        </div>
                    </div>
 <div class="col-sm-18">
                        <div class="box">                            
                            <p style="font-family: 'Forum', cursive;text-align:justify;"><?php echo html_entity_decode($rows['desp']);?></p>
                        </div>
                    </div><?php } ?>
                </div>
            </div>
            <div class="container container2 mt-3">
                <div class="row">
                    <div class="col-md-18" style="padding-top:20px;padding-bottom:20px;text-align:center">  <h2 class="topwidthsmain">Package content and Installation Guide</h2>
                        <img src="admin/images/<?= $rescs['image'] ?>" class="img-fluid img-responsive">
                    </div>
                </div>
            </div>
            <?php include("includes/footer.php");?>

            <?php include("includes/js.php");?>
            <script>
                function showCurrentValue(event) {
                    const value = event.target.value;
                    //var len = event.value.length;
                    //alert(len);
                    document.getElementById("labeltext").innerText = value;
                    document.getElementById("labeltexts").innerText = value;
                }
                $(document).ready(function() {
                    $("#textadd").keyup(function() {
                        var getv = $("#textadd").val();
                        // alert(getv);
                        $("#textedit").append(getv);
                    });
                });
                /*$(document).ready(function(){
                  $("#clrclks").click(function(){
                    var getv = $("#clrclks").val();
                    alert(getv);
                   //     $("#textedit").append(getv);
                  });
                });*/

                $('.fontchg').each(function() {
                    var myFont = $(this).data('font');
                    $(this).css({
                        fontFamily: myFont
                    }).click(function() {
                        //  alert(myFont);
                        $('#labeltext').css({
                            fontFamily: myFont
                        });
                        $('#labeltexts').css({
                            fontFamily: myFont
                        });
                    });

                });
                $('.thumbnailss').each(function() {
                    var bgmg = $(this).data('bg');
                    $(this).css({
                        backgroundimage: 'admin/images/' + bgmg
                    }).click(function() {
                        $('.dzcustom_textss').css({
                            backgroundimage: 'admin/images/' + bgmg
                        });
                    });

                });

            </script>
            <script type="text/javascript">
                $('document').ready(function() {
                    $('.thumbnail').click(function() {
                        var ig_id = $(this).val();
                        $.ajax({
                            url: "get_bg_img.php",
                            type: "POST",
                            data: 'ig_id=' + ig_id,
                            success: function(location) {
                                $('.dzcustom_texts').css("background-image", "url(" + location + ")");
                            }
                        });
                    });
                });
                $(function() { 
                    $('body').on('click', '.triggera', function() {
                        var getv = $(this).val();

                        //   $(".trigger").click(function() {
                        data_w = $(this).attr('data-wd');
                        data_h = $(this).attr('data-hg');
                        alert(getv);
                        $(".wdt").append(data_w);
                        $(".hgt").append(data_h);
                    });
                });

                function countChar(val) {
                    var len = val.value.length;
                    if (len >= 500) {
                        val.value = val.value.substring(0, 500);
                    } else {
                        $('#charNum').text(500 - len);
                    }
                };

            </script>
            <script type="text/javascript">
                $(document).ready(function() {
                    $("#fton").click(function() {
                        $("#sdon").toggle();
                        $("#labeltexts").toggle();
                        $("#fton").hide();
                        $("#labeltext").hide();
                    });
                    $("#sdon").click(function() {
                        $("#sdon").hide();
                        $("#labeltext").toggle();
                        $("#labeltexts").hide();
                        $("#fton").toggle();
                    });
                });
                $(document).ready(function() {
                    $(".saveimg").click(function() {
                        $(".oksaved").toggle();
                    });
                });

            </script>

            <script type="text/javascript">
                $('.colorcd').each(function() {
                    var myColor = $(this).data('color');
                    var colorCode = $(this).data('code');
                    // alert(myColor);
                    $(this).css({
                        textShadow: myColor
                    }).click(function() {
                        $('#labeltext').css({
                            textShadow: myColor
                        });
                    });
                    $(this).css({
                        color: colorCode
                    }).click(function() {
                        $('#labeltexts').css({
                            color: colorCode
                        });
                    });

                });
                $(function() {
                    $('body').on('click', '.trigger', function() {
                        var $container = $(this).closest(".sizereq");
                        data_pid = $(this).attr('data-wd');
                        data_hg = $(this).attr('data-hg');
                        //alert(data_pid);
                        $(".wdts").text(data_pid);
                        $(".wdt").text(data_pid);
                        $(".hgt").text(data_hg);
                        $(".hgts").text(data_hg);

                    });
                });
</script>
<script type="text/javascript">
$(document).ready(function() {
var total = 0;
$(".trigger").on("click", function() {
    var $container = $(this).closest(".container");
    var prc = $('.prd-block_link').find('.our_price').text();
    var prcs = $('.prd-block_link').find('.our_prcs').val();
    var total = parseInt(prc);
      if (this.checked) {
      total = total + parseFloat($(this).val());
      }else{
      total = prcs;  
      }
    if (total == 0) {
        $('#our_price').text(total);
        $('#our_prices').val(total);
        $('#add_data_Modal').container('show');
    } else {
        $('#our_price').text(total);
        $('#our_prices').val(total);

        $('#add_data_Modal').container('show');
    }
});
});


$(function() {
    $('body').on('click', '.addtocarts', function() {
    var $container = $(this).closest(".container");
    var text = $container.find("#textsign").val();
    var bcimg = $container.find("#bcimg").val();
    var pxsize = $container.find("#pxsize").val();
    var color = $container.find("#slcolor").val();
    var font = $container.find("#fontchg").val();
    var qty = $container.find("#numbers").val();
    var our_price = $container.find("#our_prices").val();
var action = "add";
//alert(product_price);
$.ajax({
    url: "insert_tocart.php",
    method: "POST",
    data: {
    text: text,
    bcimg: bcimg,
    pxsize: pxsize,
    color: color,
    font: font,
    qty: qty,
    our_price: our_price,
   action: action
},
success: function(msg) {
//alert(msg);
window.location.href = 'https://www.dezignmania.com/cart.php';
console.log(msg);
}
});

});
});

$(function() {
    $('body').on('click', '.saveimg', function() {
    var $container = $(this).closest(".container");
    var text = $container.find("#textsign").val();
    var bcimg = $container.find("#bcimg").val();
    var pxsize = $container.find("#pxsize").val();
    var color = $container.find("#slcolor").val();
    var font = $container.find("#fontchg").val();
    var qty = $container.find("#number").val();
    var our_price = $container.find("#our_prices").val();
    var action = "add";
    //alert(product_price);
    $.ajax({
    url: "save_img.php",
    method: "POST",
    data: {
    text: text,
    bcimg: bcimg,
    pxsize: pxsize,
    color: color,
    font: font,
    qty: qty,
    our_price: our_price,
    action: action
    },
    success: function(msg) { //alert(msg);
    console.log(msg);
    }
});

});
});

function ik(val) {
    document.getElementById('bcimg').value = val;
}

function sizeselect(val) {
document.getElementById('pxsize').value = val;
}

function colorselect(val) {
document.getElementById('slcolor').value = val;
}

function fontselect(val) {
document.getElementById('fontchg').value = val;
}

</script>
<script type="text/javascript">
$(function(){
$(".plus").click(function(e) {
  e.preventDefault();
  var $this = $(this);
  var $input = $this.siblings('input');
  var value = parseInt($input.val());
  if (value < 30) {
    value = value + 1;
  } 
  else {
    value =30;
  }

  $input.val(value);
});

$(".minus").click(function(e) {
  e.preventDefault();
  var $this = $(this);
  var $input = $this.siblings('input');
  var value = parseInt($input.val());

  if (value > 0) {
    value = value - 1;
  } 
  else {
    value =0;
  }

  $input.val(value);
});
});
</script>
<script type="text/javascript">
$(document).ready(function(){
//$("#textsign").keyup(function() {
$("#textsign").on('keyup click', function(e){
var count=($(this).val().replace(/\s+/g,'').length);
var bprc = $('.ulCategory').find('.active').data('options');
var prc = $('.ulCategory').find('.active').data('values');
//var ibprc = $('.ulCategory').find('.inactive').data('options');
//var iprc = $('.ulCategory').find('.inactive').data('values');
var Envie = '';
var ttls = '';
//alert(ttl);
$('.psize').each(function () {
 Envie += $(this).attr('value') + '';
 Option = $(this).data('options') + '';
 Values = $(this).data('values') + '';
var target = 'li'+$(this).attr('value');
var ttls = parseFloat(Option) + (parseFloat(Values) * count);
    if(target=='li3'){
    update = $(".ulCategory li span")
            .parent()
           // .next()
    update
        .find(`.fprices3`)
        .text(ttls) 
      }
    if(target=='li4'){
    update = $(".ulCategory li span")
            .parent()
    update
        .find(`.fprices4`)
        .text(ttls) 
      }
    if(target=='li5'){
    update = $(".ulCategory li span")
            .parent()
    update
        .find(`.fprices5`)
        .text(ttls) 
      }
  })
$('.active').each(function () {
 Envies = $(this).attr('value');
 Options = $(this).data('options');
 Valuess = $(this).data('values');
var targets = 'li'+$(this).attr('value');
var ttl = parseFloat(Options) + (parseFloat(Valuess) * count);
   // $('#fprice').text(ttl);
    $('#our_price').text(ttl);
    $('#our_prices').text(ttl);
  });
 });
});

$(document).ready(function() {
    $("#textsign").on("keypress", function() { // waiting for keypress event to be fired
        setTimeout(function() { // delay to have the key value inserted into input, and affect value param
            $.post(document.location.href, { textsign: $("#textsign").val().length }, function(data) { // sending ajax post request
              //  console.log(data);
            });
        }, 50);
    });
});
var anchors = $(".ulCategory li span").click(function() {
  //savesubcat()
   // $('#ulCategory li:first-child span').addClass('active');
       // $('#ulCategory li span:not(:first)').addClass('inactive');
  $(this).addClass("active")
  $(this).removeClass("inactive")
  anchors.not(this).removeClass("active")
  anchors.not(this).addClass("inactive")
  var results = $('.ulCategory').find('.active').text();
  var result = results.split(/ +/);
   // var prc = $('.ulCategory').find('.active').data('values');
  //var ttl = parseFloat(bprc) + (parseFloat(prc) * count);
  $('#our_price').text(result[2]); 
  $('#our_prices').text(result[2]); 
  $('#our_prcs').val(result[2]); 
})

</script>
</body>

</html>
