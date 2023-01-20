<?php include("db_config.php"); ?>
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
<?php $page_name = str_replace(".php", "", basename($_SERVER['PHP_SELF']));
    $Current_URL = basename(dirname(__FILE__));
    $findid = (mysqli_query($conn, "SELECT * FROM employee_details"));
    while ($res2=mysqli_fetch_array($findid)) {
        if(strtolower(str_replace(" ", "-", $res2["emp_name"])) == $page_name){
            $pid = $res2["id"];
        }
    } 
?>
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
                        <li>Candidate</li>
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
                                <a data-fslightbox="mygalley" data-type="image" href="https://www.feufo.com/admin/emp/<?= $ress['image2']; ?>" class="item-thumb">
                                    <img src="https://www.feufo.com/admin/emp/<?= $ress['image2']; ?>" width="60" height="60">
                                </a>
                                <a data-fslightbox="mygalley" data-type="image" href="https://www.feufo.com/admin/emp/<?= $ress['image3']; ?>" class="item-thumb">
                                    <img src="https://www.feufo.com/admin/emp/<?= $ress['image3']; ?>" width="60" height="60">
                                </a>
                                <a data-fslightbox="mygalley" data-type="image" href="https://www.feufo.com/admin/emp/<?= $ress['image4']; ?>" class="item-thumb">
                                    <img src="https://www.feufo.com/admin/emp/<?= $ress['image4']; ?>" width="60" height="60">
                                </a>
                                <a data-fslightbox="mygalley" data-type="image" href="https://www.feufo.com/admin/emp/<?= $ress['image5']; ?>" class="item-thumb">
                                    <img src="https://www.feufo.com/admin/emp/<?= $ress['image5']; ?>" width="60" height="60">
                                </a>
                            </div>
                        </article>
                    </aside>
                    <main class="col-lg-8">
                        <article class="ps-lg-3">
                            <div class="row">
                                <div class="col-lg-12 mb-2">
                                    <h2 class="title"><?= $ress['emp_name'];?> 
                                    <?php if(!empty($ress['linkedin'])){ ?>
                                    <a href="<?= $ress['linkedin']; ?>" target="_blank"><img src="https://www.feufo.com/img/icons/linkedin.png"></a><?php } if(!empty($ress['github'])){ ?> <a href="<?= $ress['github']; ?>" target="_blank"><img src="https://www.feufo.com/img/icons/git.png"></a><?php } if(!empty($ress['discord'])){ ?><a href="<?= $ress['discord']; ?>" target="_blank"><img src="https://www.feufo.com/img/icons/discord.png"></a><?php } if(!empty($ress['twitter'])){ ?> <a href="<?= $ress['twitter']; ?>" target="_blank"><img src="https://www.feufo.com/img/icons/twitter.png"></a><?php } if(!empty($ress['email_id'])){ ?>  <a href="<?= $ress['email_id']; ?>" target="_blank"><img src="https://www.feufo.com/img/icons/email.png"></a><?php } ?> </h2>
                                </div>
                                <div class="col-lg-12 mb-2">
                                    <h5 class=""><i class="fa fa-map-marker"></i> <?= $ress['location'];?> </h5>
                                </div>
                                <div class="col-lg-12 mb-1">
                                    <h4 class="price h5"><strong>Title : </strong> <?= $ress['job_title'];?></h4>
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
                                    $sql_pd=mysqli_query($conn,"select * from skills where emp_id='".$pm_id."'");
                                    while($rest= mysqli_fetch_array($sql_pd)){ echo $rest['dname'].",";   
                                    } } ?></h4>
                                </div>
                                <div class="col-lg-12 mb-1">
                                    <h4 class="price h5 prevcomp"><strong>Previously at : </strong> <img src="https://www.feufo.com/admin/emp/<?= $ress['previous_company'];?>"> <img src="https://www.feufo.com/admin/emp/<?= $ress['present_company'];?>"></h4>
                                </div>
                                <div class="col-lg-12 mb-1 sortdesc mb-2">
                                    <p><?= $ress['desp'];?></p>
                                </div>
                                <div class="col-lg-6 mb-4 table-responsive skills ex1">
                                    <table class="table experttech">
                                        <tbody>
                                             <?php $cdid=$ress['id'];
                                             $sql_prd="select * from skills where emp_id='".$cdid."'";
                                               $res_prd = mysqli_query($conn, $sql_prd);
                                               while($res1= mysqli_fetch_array($res_prd)){ ?>
                                            <tr>
                                                <td style="width:30%"><img src="https://www.feufo.com/admin/emp/skill/<?= $res1['skill_image']; ?>"></td>
                                                <td class="expy">- <?= $res1['skill_year']; ?></td>
                                            </tr><?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-2 mb-1"><a href="#" target="_new" class="btn btn-yellow mb-10"> <i class="me-1 fa fa-file"></i> Send JD </a></div>
                                <div class="col-lg-3 mb-1"><a href="<?= $ress['assetment_link']; ?>" target="_new" class="btn btn-primary mb-10"> <i class="me-1 fa fa-link"></i> Assesment Link </a></div>
                                <div class="col-lg-4 mb-1"> <a href="http://localhost/feufo/pdf_download.php?file_id=<?= $ress['id'];?>" class="btn btn-warning mb-10"> <i class="me-1 fa fa-download"></i> View / Download Resume </a></div>
                                <div class="col-lg-3 mb-1"><a href="https://www.feufo.com/book-appointment.php" class="btn btn-success call-modal signup"> <i class="me-1 fa fa-shopping-basket"></i> Add Book Interview </a></div>
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
                        <?php $sid=$ress["id"];
                         $sql_prdds=mysqli_query($conn,"select sub_category.sub_category_name,category.cat_name,employee_details.* from employee_details join category on employee_details.cat_id=category.id join sub_category on employee_details.subcat_id=sub_category.id where employee_details.subcat_id='$sid'");
                        while($rests= mysqli_fetch_array($sql_prdds)){ ?>
                        <div class="candidate-block">
                          <a href="candidate-job-detail.php">
                                        <div class="propbox" style="background-image: url(https://www.feufo.com/admin/emp/<?php echo $rests['image']; ?>);">
                                        <div class="gradient">
                                            <div class="icons"><i class="fa fa-heart" aria-hidden="true"></i></div>
                                            <div class="icons1"><i class="icon flaticon-money" aria-hidden="true"></i>
                                            </div>
                                            <div class="content">
                                             <h2><?= $rests['emp_name'];?></h2>
                                             <p><?= $rests['job_title'];?></p>
                                             <p class="details"><?php $string = html_entity_decode($rests['desp']); echo substr($string, 0, 200) .((strlen($string) > 200) ? '' : ''); ?>...</p>
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

    </div>

</body>

</html>