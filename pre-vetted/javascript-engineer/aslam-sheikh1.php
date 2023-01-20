<?php include("db_config.php"); 
if(isset($_SESSION['loggedin_employer']) && $_SESSION['loggedin_employer'] == true){
}else{
 echo "<script>location.replace('https://www.feufo.com/index.php'); </script>";
}
?>
<?php $page_name = str_replace(".php", "", basename($_SERVER['PHP_SELF']));
    $Current_URL = basename(dirname(__FILE__));
    $findid = (mysqli_query($conn, "SELECT * FROM employee_details"));
    while ($res2=mysqli_fetch_array($findid)) {
        if(strtolower(str_replace(" ", "-", $res2["emp_name"])) == $page_name){
            $pid = $res2["id"];
        }
    }
$empr_id=$_SESSION['employer_id'];  
$page_count = "SELECT * FROM employer_payment where empr_id='".$empr_id."'";
$result_cts=mysqli_query($conn,$page_count) or die(mysqli_error());
if(mysqli_num_rows($result_cts) < 0){
    $page_count = "SELECT * FROM posts_views where empr_id='".$empr_id."'";
    $result_cts=mysqli_query($conn,$page_count) or die(mysqli_error());
    if(mysqli_num_rows($result_cts) < 5){
    $viewid=(mysqli_query($conn, "SELECT * FROM posts_views where empr_id='".$empr_id."' and emp_id='".$pid."'"));
        if(mysqli_num_rows($viewid) == 0){
        $sqlvw="INSERT into posts_views(empr_id,emp_id) values ('$empr_id','$pid')";
        $res_prds = mysqli_query($conn, $sqlvw);
        } }else{ $pagen=(mysqli_query($conn, "SELECT * FROM posts_views where empr_id='".$empr_id."' and emp_id='".$pid."'"));
         if (mysqli_num_rows($pagen) == 0){    
         echo "<script> alert('Please select plan to view Candidate!'); 
         location.replace('https://www.feufo.com/index.php'); </script>";   
} } }  
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <?php include("css.php");?>
    <link href="https://www.feufo.com/css/candidate.css" rel="stylesheet">    
    <link href="https://www.feufo.com/css/box.css" rel="stylesheet">
    <link href="https://www.feufo.com/css/candidatedetail.css" rel="stylesheet">
    <style type="text/css">
    </style>
</head>
<?php //$id=$_POST["id"];
 $sql_prdd="select sub_category.sub_category_name,category.cat_name,employee_details.* from employee_details join category on employee_details.cat_id=category.id join sub_category on employee_details.subcat_id=sub_category.id where employee_details.id='$pid'";
$result_prdd = mysqli_query($conn, $sql_prdd);
$ress= mysqli_fetch_array($result_prdd); ?>
<body>
    <div class="page-wrapper">
        <?php include("header.php");?>
        <section class="page-title">
            <div class="auto-container">
                <div class="title-outer">
                    <ul class="page-breadcrumb">
                        <li><a href="https://www.feufo.com/index.php">Home</a></li>
                       <li><?= $res_prdd['cat_name']; ?></li>
                        <li><?= $res_prdd['sub_category_name']; ?></li>
                    </ul>
                </div>
            </div>
        </section>
        <section class="ls-section">
            <div class="auto-container">
                <div class="filters-backdrop"></div>
                <div class="row">
                    <aside class="col-lg-4">
                        <article class="gallery-wrap">
                            <div class="img-big-wrap img-thumbnail">
                                <a data-fslightbox="mygalley" data-type="image" href="https://www.feufo.com/admin/emp/<?= $ress['image']; ?>">
                                    <img src="https://www.feufo.com/admin/emp/<?= $ress['image']; ?>" height="560">
                                </a>
                            </div>
                            <div class="thumbs-wrap">
                                <a data-fslightbox="mygalley" data-type="image" href="https://www.feufo.com/admin/emp/<?= $ress['image']; ?>" class="item-thumb">
                                    <img src="https://www.feufo.com/admin/emp/<?= $ress['image']; ?>" width="60" height="60">
                                </a>
                                <?php  $extension2 = end(explode(".", $ress["image2"]));
                                if(!empty($extension2)){ ?>
                                <a data-fslightbox="mygalley" data-type="image" href="https://www.feufo.com/admin/emp/<?= $ress['image2']; ?>" class="item-thumb">
                                    <img src="https://www.feufo.com/admin/emp/<?= $ress['image2']; ?>" width="60" height="60">
                                </a>
                                 <?php } $extension3 = end(explode(".", $ress["image3"]));
                                 if(!empty($extension3)){ ?>
                                <a data-fslightbox="mygalley" data-type="image" href="https://www.feufo.com/admin/emp/<?= $ress['image3']; ?>" class="item-thumb">
                                    <img src="https://www.feufo.com/admin/emp/<?= $ress['image3']; ?>" width="60" height="60">
                                </a>
                                <?php } $extension4 = end(explode(".", $ress["image4"]));
                                 if(!empty($extension4)){ ?>
                                <a data-fslightbox="mygalley" data-type="image" href="https://www.feufo.com/admin/emp/<?= $ress['image4']; ?>" class="item-thumb">
                                    <img src="https://www.feufo.com/admin/emp/<?= $ress['image4']; ?>" width="60" height="60">
                                </a>
                                <?php } $extension5 = end(explode(".", $ress["image5"]));
                                 if(!empty($extension5)){ ?>
                                <a data-fslightbox="mygalley" data-type="image" href="https://www.feufo.com/admin/emp/<?= $ress['image5']; ?>" class="item-thumb">
                                    <img src="https://www.feufo.com/admin/emp/<?= $ress['image5']; ?>" width="60" height="60">
                                </a><?php } ?>
                            </div>
                        </article>
                    </aside>
                    <main class="col-lg-8">
                        <article class="ps-lg-3">
                            <div class="row">
                                <div class="col-lg-12 mb-2">
                                    <h2 class="title text-capitalize"><?= $ress['emp_name'];?> 
                                    <?php if(!empty($ress['linkedin'])){ ?>
                                    <a href="<?= $ress['linkedin']; ?>" target="_blank"><img src="https://www.feufo.com/img/icons/linkedin.png"></a><?php } if(!empty($ress['github'])){ ?> <a href="<?= $ress['github']; ?>" target="_blank"><img src="https://www.feufo.com/img/icons/git.png"></a><?php } if(!empty($ress['discord'])){ ?><a href="<?= $ress['discord']; ?>" target="_blank"><img src="https://www.feufo.com/img/icons/discord.png"></a><?php } if(!empty($ress['twitter'])){ ?> <a href="<?= $ress['twitter']; ?>" target="_blank"><img src="https://www.feufo.com/img/icons/twitter.png"></a><?php } if(!empty($ress['email_id'])){ ?>  <a href="<?= $ress['email_id']; ?>" target="_blank"><img src="https://www.feufo.com/img/icons/email.png"></a><?php } ?> </h2>
                                </div>
                                <div class="col-lg-12 mb-2">
                                    <h5 class="text-capitalize"><i class="fa fa-map-marker"></i> <?= $ress['location'];?> </h5>
                                </div>
                                <div class="col-lg-12 mb-1">
                                    <h4 class="price h5 text-capitalize"><strong>Title : </strong> <?= $ress['job_title'];?></h4>
                                </div>
                                <div class="col-lg-12 mb-1">
                                    <h4 class="price h5"><strong>Experience : </strong><?= $ress['experience_level'];?></h4>
                                </div>
                                <div class="col-lg-12 mb-1">
                                    <h4 class="price h5"><strong>Base Salary : </strong> $<?= $ress['salary'];?></h4>
                                </div><div class="col-lg-12 mb-1">
                                    <h4 class="price h5"><strong>Preferred Time Zone : </strong>
                                   <?php $cd_id=$ress['dg_id'];
                                    $rids = explode(",",$cd_id);
                                    foreach($rids as $pm_id){
                                    $sql_pd=mysqli_query($conn,"select * from designation where id='".$pm_id."'");
                                    while($rest= mysqli_fetch_array($sql_pd)){ echo $rest['dname'].",";   
                                    } } ?></h4>
                                </div>
                                <div class="col-lg-12 mb-1">
                                    <h4 class="price h5 prevcomp"><strong>Previously at : </strong><a href="<?= $ress['previous_comp_linkedin'];?>"><img src="https://www.feufo.com/admin/emp/<?= $ress['previous_company'];?>"></a> <a href="<?= $ress['present_comp_linkedin'];?>"><img src="https://www.feufo.com/admin/emp/<?= $ress['present_company'];?>"></a></h4>
                                </div>
                                <div class="col-lg-12 mb-1 sortdesc mb-2">
                                    <p><?= $ress['desp'];?></p>
                                </div>
                                <?php $cdid=$ress['id'];
                                 $sql_prd="select * from skills where emp_id='".$cdid."'";
                                   $res_prd = mysqli_query($conn, $sql_prd);
                                   if(mysqli_num_rows($res_prd) > 0){ ?>
                                <div class="col-lg-6 mb-4 table-responsive skills ex1">
                                    <table class="table experttech">
                                        <tbody>
                                         <?php $cdid=$ress['id'];
                                         $sql_prd="select * from skills where emp_id='".$cdid."'";
                                           $res_prd = mysqli_query($conn, $sql_prd);
                                           while($res1= mysqli_fetch_array($res_prd)){
                                           $cdid=$res1['skill_name'];
                                           $sqlr_prd=mysqli_query($conn,"select * from skill_detail where id='".$cdid."'");
                                           $resr1= mysqli_fetch_array($sqlr_prd); ?>
                                            <tr>
                                                <td style="width:30%"><img src="https://www.feufo.com/admin/emp/skill/<?= $resr1['skill_image']; ?>"></td>
                                                <td class="expy">- <?= $res1['skill_year']; ?></td>
                                            </tr><?php } ?>
                                        </tbody>
                                    </table>
                                </div><?php } ?>
                            </div>
                             <div class="row">
                                <div class="col-lg-12">
                        <a href="#" target="_new" class="btn btn-yellow mb-10"><span data-id="<?= $_SESSION['employer_id'];?>" data-empid="<?= $ress['id'];?>" class="send-jd"><i class="me-1 fa fa-file"></i></span> Send JD </a> 
                        <a href="<?= $ress['assetment_link']; ?>" target="_new" class="btn btn-primary mb-10"> <i class="me-1 fa fa-link"></i> Assesment </a>
                        <a href="https://www.feufo.com/pdf_download.php?file_id=<?= $ress['id'];?>" class="btn btn-warning mb-10">Resume </a>
                        <a href="#" class="btn btn-warning mb-10"><span data-id="<?= $_SESSION['employer_id'];?>" data-empid="<?= $ress['id'];?>" class="add-wishlist">Wishlist </span></a>
                        <a href="https://www.feufo.com/book-interview/index.php?id=<?= $ress['id'];?>" class="btn btn-success call-modal signup mb-10">Book Interview </a></div>
                            </div>
                        </article>
                    </main>
                </div>
            </div>
        </section>
        <section class="candidates-section candidteboxes">
            <div class="auto-container">
                <div class="sec-title" style="margin-bottom:0px">
                    <h2 class="text-white text-center mb-10">Related Candidates</h2>
                </div>

                <div class="carousel-outer wow fadeInUp">
                    <div class="candidates-carousel owl-carousel owl-theme default-dots">
                        <?php  $sid=$ress["id"];
                        $scid=$ress["subcat_id"];
                        $sql_prdds=mysqli_query($conn,"select sub_category.sub_category_name,category.cat_name,employee_details.* from employee_details join category on employee_details.cat_id=category.id join sub_category on employee_details.subcat_id=sub_category.id where employee_details.subcat_id='$scid' and employee_details.id !='$sid'");
                        while($rests= mysqli_fetch_array($sql_prdds)){
                        $cate = strtolower(str_replace(" ", "-", $rests['cat_name']));
                        $scate = strtolower(str_replace(" ", "-", $rests['sub_category_name']));  
                        $empr_name = strtolower(str_replace(" ", "-", $rests['emp_name'])); ?>
                        <div class="candidate-block">
                          <a href="https://www.feufo.com/<?= "$cate/$scate/$empr_name" ?>">
                                        <div class="propbox" style="background-image: url(https://www.feufo.com/admin/emp/<?php echo $rests['image']; ?>);">
                                        <div class="gradient">
                                            <div class="icons"><i class="fa fa-heart" aria-hidden="true"></i></div>
                                            <div class="icons1"><i class="icon flaticon-money" aria-hidden="true"></i>
                                            </div>
                                            <div class="content">
                                             <h2><?= $rests['emp_name'];?></h2>
                                             <p><?= $rests['job_title'];?></p>
                                             <p class="details"><?php $string = html_entity_decode($rests['desp']); echo substr($string, 0, 100) .((strlen($string) > 100) ? '' : ''); ?>...</p>
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

        <?php include("footer.php");?>
        <?php include("js.php");?><script src="https://www.feufo.com/js/fslightbox.js"></script>
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
  // window.location.href = 'https://www.dezignmania.com/cart.php';
    console.log(msg);
   }
  });
 });
});    
$(function() {
    $('body').on('click', '.send-jd', function() {
    var empr_id = $(this).data('id');
    var empid = $(this).data('empid');    
    var action = "add";
     //alert(empid);
    $.ajax({
        url: "https://www.feufo.com/send-jd.php",
        method: "POST",
        data: {
        empr_id: empr_id,
        empid: empid,
       action: action
    },
    success: function(msg) {
    alert(msg);
  // window.location.href = 'https://www.dezignmania.com/cart.php';
    console.log(msg);
 }
});
});
});    
</script>    
 </div>

</body>

</html>