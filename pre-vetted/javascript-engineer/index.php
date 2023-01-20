<?php include("db_config.php"); 
/*if(isset($_SESSION['loggedin_employer']) && $_SESSION['loggedin_employer'] == true){
}else{
 echo "<script> alert('Please Login!'); 
location.replace('https://www.feufo.com/index.php'); </script>";
}*/
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <?php include("css.php");?>
    <link href="../../css/candidate.css" rel="stylesheet">
    <link href="../../css/box.css" rel="stylesheet">
    <style> </style>
</head>
<?php $current_url=$_SERVER['REQUEST_URI']; 
$csub_id= explode("/", $current_url);
$csubs= $csub_id[1];
    $sqlct=mysqli_query($conn,"select * from category");
     while ($resus=mysqli_fetch_array($sqlct)) {
        if(strtolower(str_replace(" ", "-", $resus["cat_name"])) == $csubs){
               $cid=$resus['id'];
        }
    }
$csub= $csub_id[2];
    $findid = (mysqli_query($conn, "SELECT * FROM sub_category where category_id='".$cid."'"));
    while ($res2=mysqli_fetch_array($findid)){
        if(strtolower(str_replace(" ", "-", $res2["sub_category_name"])) ==  $csub){
            $idd = $res2["id"];
        }
    } 
?>
<?php //$id=$_POST["id"];
 $sql_prdd="select sub_category.sub_category_name,category.cat_name,employee_details.* from employee_details join category on employee_details.cat_id=category.id join sub_category on employee_details.subcat_id=sub_category.id where employee_details.subcat_id='$idd'";
 $result_prdd = mysqli_query($conn, $sql_prdd);
$res_prdd= mysqli_fetch_array($result_prdd); ?>
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
                    <div class="filters-column col-lg-3 col-md-3 col-sm-3">
                        <ul class="accordion-box">
          <li class="accordion block active-block">
            <div class="acc-btn">Filter<span class="icon flaticon-add"></span></div>
            <div class="acc-content">
              <div class="content">
                <form method="post" action="">
                 <div class="row filters-outer">
                                <div class="col-md-12 filter-block">
                                    <h4>Skills</h4>
                                    <div class="form-group">
                                        <select class="chosen-select" name="skill[]" multiple>
                                            <option>Select Skills</option>
                                             <?php $sqltps=mysqli_query($conn,"SELECT * from skill_detail");
                                               while($restps=mysqli_fetch_array($sqltps)) { ?>
                                            <option value="<?= $restps['id'];?>"><?= $restps['skill_name'];?></option><?php } ?>
                                        </select>
                                        <span class="icon flaticon-briefcase"></span>
                                    </div>
                                </div>
                                  <div class="col-md-12 filter-block">
                                    <h4>Salary</h4>
                                    <div class="form-group">
                                        <select class="chosen-select" name="salary[]" multiple>
                                            <option>Select Salary</option>
                                            <option value="500/month">$500 /month</option>
                                            <option value="1000/month">$1000 /month</option>
                                            <option value="1500/month">$1500 /month</option>
                                            <option value="2500/month">$2500 /month</option>
                                            <option value="3500/month">$3500 /month</option>
                                            <option value="4000/month">More $ 4000</option> 
                                        </select>
                                        <span class="icon flaticon-money"></span>
                                    </div>
                                </div>
                               
                               
                                 <div class="col-md-12 filter-block">
                                    <h4>Location</h4>
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="location">
                                        <span class="icon flaticon-map"></span>
                                    </div>
                                </div>
                                 <div class="col-md-12 filter-block">
                                    <h4>Experience Level</h4>
                                    <div class="form-group">
                                        <select class="chosen-select" name="experience">
                                            <option>Select Experience Level</option>
                                            <option>All</option>
                                            <option value="0-1">0-1 Year </option>
                                            <option value="1-3">1-3 Years </option>
                                            <option value="3-5">3-5 Years </option>
                                            <option value="5-30">More Than 5 Years </option>
                                        </select>
                                        <span class="icon flaticon-briefcase"></span>
                                    </div>
                                </div>

                                  <div class="col-md-12 filter-block">
                                    <h4>Time Zone</h4>
                                    <div class="form-group">
                                        <select class="chosen-select" name="timezone[]" multiple>
                                            <option>Select Time Zone</option>
                                              <?php $sqltp=mysqli_query($conn,"SELECT * from designation");
                                          while($restp=mysqli_fetch_array($sqltp)) { ?>
                                            <option value="<?= $restp['id'];?>"><?= $restp['dname'];?></option><?php } ?>
                                        </select>
                                        <span class="icon flaticon-money"></span>
                                    </div>
                                </div>
                                <div class="col-md-12 filter-block"> 
                                    <div class="form-group">
                                        <button type="submit" name="search_sk" class="btn btn-primary btn-block"><span class="btn-title">Search</span></button>
                                    </div>
                                </div>
                            </div>
                        </form>
              </div>
            </div>
          </li>
 
        </ul>
         
                    </div>
                    <div class="content-column col-lg-9 col-md-9 col-sm-12">
                        <div class="ls-outer">
                            <div class="row">
                                <?php if(isset($_POST['search_sk'])){
                                extract($_POST); 
                                $experience = explode('-',$experience);
                                $exp1= $experience[0];  
                                $exp2= $experience[1];  
                                $timezones = implode(',',$timezone); 
                                foreach($skill as $sk_id){  
                                foreach($salary as $salarys){  
                                $sql_prd=mysqli_query($conn,"select * from skills where skill_name='".$sk_id."'");
                                $res1= mysqli_fetch_array($sql_prd);
                                $emp_id=$res1['emp_id'];
                                $sql_prdd="select sub_category.sub_category_name,category.cat_name,employee_details.* from employee_details join category on employee_details.cat_id=category.id join sub_category on employee_details.subcat_id=sub_category.id where employee_details.subcat_id='$idd' and employee_details.id='".$emp_id."' and  employee_details.location like '%".$location."%' and (employee_details.experience_level between '".$exp1."' and '".$exp2."') and employee_details.salary='".$salarys."' and employee_details.dg_id='".$timezones."'"; } } }else{
                                $sql_prdd="select sub_category.sub_category_name,category.cat_name,employee_details.* from employee_details join category on employee_details.cat_id=category.id join sub_category on employee_details.subcat_id=sub_category.id where employee_details.subcat_id='$idd'"; }
                                 $result_prdd = mysqli_query($conn, $sql_prdd);
                                while($res_prdd= mysqli_fetch_array($result_prdd)){
                                 $cate = strtolower(str_replace(" ", "-", $res_prdd['cat_name']));
                                 $scate = strtolower(str_replace(" ", "-", $res_prdd['sub_category_name']));  
                                 $emp_name = strtolower(str_replace(" ", "-", $res_prdd['emp_name'])); ?>
                                <div class="job-block-four col-lg-4 col-md-4 col-sm-12"> 
                                     <div class="propbox" style="background-image: url(https://www.feufo.com/admin/emp/<?php echo $res_prdd['image']; ?>);">
                                        <div class="gradient">
                                            <div class="icons"><span data-id="<?= $_SESSION['employer_id'];?>" data-empid="<?= $res_prdd['id'];?>" class="add-wishlist"><i class="fa fa-heart" aria-hidden="true"></i></span></div>
                                            <div class="icons1"><i class="icon flaticon-money" title="<?php if(!empty($res_prdd['feufo_fees'])){ ?>Feufo Fees $<?= $res_prdd['feufo_fees']; } ?>" aria-hidden="true"></i>
                                            </div>
                                            <div class="content">
                                              <a href="https://www.feufo.com/<?= "$cate/$scate/$emp_name" ?>">
                                                <h2 class="text-capitalize"><?= $res_prdd['emp_name'];?></h2>
                                                <p class="text-capitalize"><?= $res_prdd['job_title'];?></p>
                                                <p class="details"><?php $string = html_entity_decode($res_prdd['desp']); echo substr($string, 0, 100) .((strlen($string) > 100) ? '' : ''); ?>...</p>
                                               </a>
                                            </div> 
                                        </div>
                                    </div>
                                </div><?php } ?>
                            </div>
                          </div>
                    </div>
                </div>
            </div>
        </section>
        <?php include("footer.php");?>
    </div>
    <?php include("js.php");?>
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
</script>    
</body>

</html>