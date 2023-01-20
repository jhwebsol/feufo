<?php include("includes/css.php");
if(isset($_POST['update']))
{ extract($_POST);
$id=$_GET["id"];
date_default_timezone_set('Asia/Kolkata');
$datetime = date('Y-m-d H:i:s');
$ip=$_SERVER['REMOTE_ADDR'];
$sql_cat="SELECT * from category where id='$category_id'";
$exe_cat=mysqli_query($conn,$sql_cat);
$res_cat=mysqli_fetch_array($exe_cat);
$sql_scat="SELECT * from sub_category where id='$sub_category_id'";
$exe_scat=mysqli_query($conn,$sql_scat);
$res_scat=mysqli_fetch_array($exe_scat);
$category = strtolower(str_replace(" ", "-", $res_cat['cat_name']));
$sub_category = strtolower(str_replace(" ", "-", $res_scat['sub_category_name']));
$emp_namess = strtolower(str_replace(" ", "-", $emp_name));
$old_emp_name = strtolower(str_replace(" ", "-", $old_emp_name));
$emps_name = mysqli_real_escape_string($conn,$emp_namess);
if(file_exists('../'.$category.'/'.$sub_category)){
  if(strtolower(str_replace(" ", "-", $emps_name)) == strtolower(str_replace(" ", "-", $old_emp_name))) {
    if(file_exists('../'.$category.'/'.$sub_category.'/'.strtolower(str_replace(" ", "-", $old_emp_name)).'.php')){
      $sqls ="UPDATE employee_details SET cat_id='$category_id',subcat_id='$sub_category_id', emp_name='$emp_name',email_id='$email_id',salary='$salary',location='$location',job_type='$job_type',avalibility='$avalibility',experience_level='$experience_level',assetment_link='$assetment_link',previous_comp_linkedin='$previous_comp_linkedin',present_comp_linkedin='$present_comp_linkedin',github='$github',linkedin='$linkedin',title='$title',meta_keyword='$meta_keyword' WHERE id='$id'";  
            $ress=mysqli_query($conn,$sqls);
            if($ress)
            {   $sqlg = "SELECT * from employee_details where id = '$id'";
               $resultg = mysqli_query($conn,$sqlg) or die(mysqli_error($conn));
               $resg = mysqli_fetch_object($resultg);
               if($_FILES["image"]["name"] != ""){
                $oname=$_FILES["image"]["name"];
                $pos = strrpos($oname, ".");
                $extension=substr($oname,$pos+1);
                $tn = $_FILES["image"]["tmp_name"];
                $path = "emp/".$resg->id.'313'.'.'.$extension;
                $upath = "emp/".$resg->image;
                unlink($upath);
                 move_uploaded_file($tn,$path);
                 $image = $resg->id.'313'.'.'.$extension;
                } else {
                  $image = $resg->image;
                } 
               if($_FILES["image2"]["name"] != ""){
                $oname=$_FILES["image2"]["name"];
                $pos = strrpos($oname, ".");
                $extension=substr($oname,$pos+1);
                $tn = $_FILES["image2"]["tmp_name"];
                $path = "emp/".$resg->id.'bn'.'.'.$extension;
                $upath = "emp/".$resg->image2;
                unlink($upath);
                 move_uploaded_file($tn,$path);
                 $image2 = $resg->id.'bn'.'.'.$extension;
                } else {
                  $image2 = $resg->image2;
                } 
               if($_FILES["image3"]["name"] != ""){
                $oname=$_FILES["image3"]["name"];
                $pos = strrpos($oname, ".");
                $extension=substr($oname,$pos+1);
                $tn = $_FILES["image3"]["tmp_name"];
                $path = "emp/".$resg->id.'map'.'.'.$extension;
                $upath = "emp/".$resg->image3;
                unlink($upath);
                 move_uploaded_file($tn,$path);
                 $image3 = $resg->id.'map'.'.'.$extension;
                } else {
                  $image3 = $resg->image3;
                } 
               if($_FILES["image4"]["name"] != ""){
                $oname=$_FILES["image4"]["name"];
                $pos = strrpos($oname, ".");
                $extension=substr($oname,$pos+1);
                $tn = $_FILES["image4"]["tmp_name"];
                $path = "emp/".$resg->id.'212'.'.'.$extension;
                $upath = "emp/".$resg->image4;
                unlink($upath);
                 move_uploaded_file($tn,$path);
                 $image4 = $resg->id.'212'.'.'.$extension;
                } else {
                  $image4 = $resg->image4;
                } 
               if($_FILES["resume"]["name"] != ""){
                $oname=$_FILES["resume"]["name"];
                $pos = strrpos($oname, ".");
                $extension=substr($oname,$pos+1);
                $tn = $_FILES["resume"]["tmp_name"];
                $path = "emp/".$resg->id.'414'.'.'.$extension;
                $upath = "emp/".$resg->resume;
                unlink($upath);
                 move_uploaded_file($tn,$path);
                 $resume = $resg->id.'414'.'.'.$extension;
                } else{
                  $resume = $resg->resume;
                }
               $sqlup = "UPDATE employee_details SET image = '$image',image2 = '$image2',image3='$image3',image4='$image4',image5='$image5',resume='$resume' WHERE id = $resg->id"; 
                $resultup = mysqli_query($conn,$sqlup) or die(mysqli_error());    
                       echo "<script>document.location.href='candidate-job.php'</script>";     
            }
      }  else{
        if(copy('../candidate-job-detail.php', '../'.$category.'/'.$sub_category.'/'.strtolower(str_replace(" ", "-", $old_emp_name)).'.php')) {
      $sqls ="UPDATE employee_details SET cat_id='$category_id',subcat_id='$sub_category_id', emp_name='$emp_name',email_id='$email_id',salary='$salary',location='$location',job_type='$job_type',avalibility='$avalibility',experience_level='$experience_level',assetment_link='$assetment_link',previous_comp_linkedin='$previous_comp_linkedin',present_comp_linkedin='$present_comp_linkedin',github='$github',linkedin='$linkedin',title='$title',meta_keyword='$meta_keyword' WHERE id='$id'";  
            $ress=mysqli_query($conn,$sqls);
            if($ress)
            {   $sqlg = "SELECT * from employee_details where id = '$id'";
               $resultg = mysqli_query($conn,$sqlg) or die(mysqli_error($conn));
               $resg = mysqli_fetch_object($resultg);
               if($_FILES["image"]["name"] != ""){
                $oname=$_FILES["image"]["name"];
                $pos = strrpos($oname, ".");
                $extension=substr($oname,$pos+1);
                $tn = $_FILES["image"]["tmp_name"];
                $path = "emp/".$resg->id.'313'.'.'.$extension;
                $upath = "emp/".$resg->image;
                unlink($upath);
                 move_uploaded_file($tn,$path);
                 $image = $resg->id.'313'.'.'.$extension;
                } else {
                  $image = $resg->image;
                } 
               if($_FILES["image2"]["name"] != ""){
                $oname=$_FILES["image2"]["name"];
                $pos = strrpos($oname, ".");
                $extension=substr($oname,$pos+1);
                $tn = $_FILES["image2"]["tmp_name"];
                $path = "emp/".$resg->id.'bn'.'.'.$extension;
                $upath = "emp/".$resg->image2;
                unlink($upath);
                 move_uploaded_file($tn,$path);
                 $image2 = $resg->id.'bn'.'.'.$extension;
                } else {
                  $image2 = $resg->image2;
                } 
               if($_FILES["image3"]["name"] != ""){
                $oname=$_FILES["image3"]["name"];
                $pos = strrpos($oname, ".");
                $extension=substr($oname,$pos+1);
                $tn = $_FILES["image3"]["tmp_name"];
                $path = "emp/".$resg->id.'map'.'.'.$extension;
                $upath = "emp/".$resg->image3;
                unlink($upath);
                 move_uploaded_file($tn,$path);
                 $image3 = $resg->id.'map'.'.'.$extension;
                } else {
                  $image3 = $resg->image3;
                } 
               if($_FILES["image4"]["name"] != ""){
                $oname=$_FILES["image4"]["name"];
                $pos = strrpos($oname, ".");
                $extension=substr($oname,$pos+1);
                $tn = $_FILES["image4"]["tmp_name"];
                $path = "emp/".$resg->id.'212'.'.'.$extension;
                $upath = "emp/".$resg->image4;
                unlink($upath);
                 move_uploaded_file($tn,$path);
                 $image4 = $resg->id.'212'.'.'.$extension;
                } else {
                  $image4 = $resg->image4;
                } 
               if($_FILES["resume"]["name"] != ""){
                $oname=$_FILES["resume"]["name"];
                $pos = strrpos($oname, ".");
                $extension=substr($oname,$pos+1);
                $tn = $_FILES["resume"]["tmp_name"];
                $path = "emp/".$resg->id.'414'.'.'.$extension;
                $upath = "emp/".$resg->resume;
                unlink($upath);
                 move_uploaded_file($tn,$path);
                 $resume = $resg->id.'414'.'.'.$extension;
                } else{
                  $resume = $resg->resume;
                }
             $sqlup = "UPDATE employee_details SET image = '$image',image2 = '$image2',image3='$image3',image4='$image4',image5='$image5',resume='$resume' WHERE id = $resg->id"; 
               $resultup = mysqli_query($conn,$sqlup) or die(mysqli_error()); 
            echo "<script>document.location.href='candidate-job.php'</script>";
                }

              }
            }
          //}
        }else{
            if(file_exists('../'.$category.'/'.$sub_category.'/'.strtolower(str_replace(" ", "-", $old_emp_name)).'.php')){
        if(rename("../$category/$sub_category/".strtolower(str_replace(" ", "-", $old_emp_name)).".php", "../$category/$sub_category/".strtolower(str_replace(" ", "-", $emps_name)).".php")){
      $sqls ="UPDATE employee_details SET cat_id='$category_id',subcat_id='$sub_category_id', emp_name='$emp_name',email_id='$email_id',salary='$salary',location='$location',job_type='$job_type',avalibility='$avalibility',experience_level='$experience_level',assetment_link='$assetment_link',previous_comp_linkedin='$previous_comp_linkedin',present_comp_linkedin='$present_comp_linkedin',github='$github',linkedin='$linkedin',title='$title',meta_keyword='$meta_keyword' WHERE id='$id'";  
            $ress=mysqli_query($conn,$sqls);
            if($ress)
            {  $sqlg = "SELECT * from employee_details where id = '$id'";
               $resultg = mysqli_query($conn,$sqlg) or die(mysqli_error($conn));
               $resg = mysqli_fetch_object($resultg);
               if($_FILES["image"]["name"] != ""){
                $oname=$_FILES["image"]["name"];
                $pos = strrpos($oname, ".");
                $extension=substr($oname,$pos+1);
                $tn = $_FILES["image"]["tmp_name"];
                $path = "emp/".$resg->id.'313'.'.'.$extension;
                $upath = "emp/".$resg->image;
                unlink($upath);
                 move_uploaded_file($tn,$path);
                 $image = $resg->id.'313'.'.'.$extension;
                } else {
                  $image = $resg->image;
                } 
               if($_FILES["image2"]["name"] != ""){
                $oname=$_FILES["image2"]["name"];
                $pos = strrpos($oname, ".");
                $extension=substr($oname,$pos+1);
                $tn = $_FILES["image2"]["tmp_name"];
                $path = "emp/".$resg->id.'bn'.'.'.$extension;
                $upath = "emp/".$resg->image2;
                unlink($upath);
                 move_uploaded_file($tn,$path);
                 $image2 = $resg->id.'bn'.'.'.$extension;
                } else {
                  $image2 = $resg->image2;
                } 
               if($_FILES["image3"]["name"] != ""){
                $oname=$_FILES["image3"]["name"];
                $pos = strrpos($oname, ".");
                $extension=substr($oname,$pos+1);
                $tn = $_FILES["image3"]["tmp_name"];
                $path = "emp/".$resg->id.'map'.'.'.$extension;
                $upath = "emp/".$resg->image3;
                unlink($upath);
                 move_uploaded_file($tn,$path);
                 $image3 = $resg->id.'map'.'.'.$extension;
                } else {
                  $image3 = $resg->image3;
                } 
               if($_FILES["image4"]["name"] != ""){
                $oname=$_FILES["image4"]["name"];
                $pos = strrpos($oname, ".");
                $extension=substr($oname,$pos+1);
                $tn = $_FILES["image4"]["tmp_name"];
                $path = "emp/".$resg->id.'212'.'.'.$extension;
                $upath = "emp/".$resg->image4;
                unlink($upath);
                 move_uploaded_file($tn,$path);
                 $image4 = $resg->id.'212'.'.'.$image4;
                } else {
                  $image4 = $resg->image4;
                } 
               if($_FILES["resume"]["name"] != ""){
                $oname=$_FILES["resume"]["name"];
                $pos = strrpos($oname, ".");
                $extension=substr($oname,$pos+1);
                $tn = $_FILES["resume"]["tmp_name"];
                $path = "emp/".$resg->id.'414'.'.'.$extension;
                $upath = "emp/".$resg->resume;
                unlink($upath);
                 move_uploaded_file($tn,$path);
                 $resume = $resg->id.'414'.'.'.$extension;
                } else{
                  $resume = $resg->resume;
                }
               $sqlup = "UPDATE employee_details SET image = '$image',image2 = '$image2',image3='$image3',image4='$image4',image5='$image5',resume='$resume' WHERE id = $resg->id"; 
                $resultup = mysqli_query($conn,$sqlup) or die(mysqli_error());   
               echo "<script>document.location.href='candidate-job.php'</script>";
        }
      }
     } else{   
        if(copy('../candidate-job-detail.php', '../'.$category.'/'.$sub_category.'/'.strtolower(str_replace(" ", "-", $emps_name)).'.php')) {
      $sqls ="UPDATE employee_details SET cat_id='$category_id',subcat_id='$sub_category_id', emp_name='$emp_name',email_id='$email_id',salary='$salary',location='$location',job_type='$job_type',avalibility='$avalibility',experience_level='$experience_level',assetment_link='$assetment_link',previous_comp_linkedin='$previous_comp_linkedin',present_comp_linkedin='$present_comp_linkedin',github='$github',linkedin='$linkedin',title='$title',meta_keyword='$meta_keyword' WHERE id='$id'";  
            $ress=mysqli_query($conn,$sqls);
            if($ress)
            {  $sqlg = "SELECT * from employee_details where id = '$id'";
               $resultg = mysqli_query($conn,$sqlg) or die(mysqli_error($conn));
               $resg = mysqli_fetch_object($resultg);
               if($_FILES["image"]["name"] != ""){
                $oname=$_FILES["image"]["name"];
                $pos = strrpos($oname, ".");
                $extension=substr($oname,$pos+1);
                $tn = $_FILES["image"]["tmp_name"];
                $path = "emp/".$resg->id.'313'.'.'.$extension;
                $upath = "emp/".$resg->image;
                unlink($upath);
                 move_uploaded_file($tn,$path);
                 $image = $resg->id.'313'.'.'.$extension;
                } else {
                  $image = $resg->image;
                } 
               if($_FILES["image2"]["name"] != ""){
                $oname=$_FILES["image2"]["name"];
                $pos = strrpos($oname, ".");
                $extension=substr($oname,$pos+1);
                $tn = $_FILES["image2"]["tmp_name"];
                $path = "emp/".$resg->id.'bn'.'.'.$extension;
                $upath = "emp/".$resg->image2;
                unlink($upath);
                 move_uploaded_file($tn,$path);
                 $image2 = $resg->id.'bn'.'.'.$extension;
                } else {
                  $image2 = $resg->image2;
                } 
               if($_FILES["image3"]["name"] != ""){
                $oname=$_FILES["image3"]["name"];
                $pos = strrpos($oname, ".");
                $extension=substr($oname,$pos+1);
                $tn = $_FILES["image3"]["tmp_name"];
                $path = "emp/".$resg->id.'map'.'.'.$extension;
                $upath = "emp/".$resg->image3;
                unlink($upath);
                 move_uploaded_file($tn,$path);
                 $image3 = $resg->id.'map'.'.'.$extension;
                } else {
                  $image3 = $resg->image3;
                } 
               if($_FILES["image4"]["name"] != ""){
                $oname=$_FILES["image4"]["name"];
                $pos = strrpos($oname, ".");
                $extension=substr($oname,$pos+1);
                $tn = $_FILES["image4"]["tmp_name"];
                $path = "emp/".$resg->id.'212'.'.'.$extension;
                $upath = "emp/".$resg->image4;
                unlink($upath);
                 move_uploaded_file($tn,$path);
                 $image4 = $resg->id.'212'.'.'.$extension;
                } else {
                  $image4 = $resg->image4;
                } 
               if($_FILES["resume"]["name"] != ""){
                $oname=$_FILES["resume"]["name"];
                $pos = strrpos($oname, ".");
                $extension=substr($oname,$pos+1);
                $tn = $_FILES["resume"]["tmp_name"];
                $path = "emp/".$resg->id.'414'.'.'.$extension;
                $upath = "emp/".$resg->resume;
                unlink($upath);
                 move_uploaded_file($tn,$path);
                 $resume = $resg->id.'414'.'.'.$extension;
                } else{
                  $resume = $resg->resume;
                }
               $sqlup = "UPDATE employee_details SET image = '$image',image2 = '$image2',image3='$image3',image4='$image4',image5='$image5',resume='$resume' WHERE id = $resg->id"; 
                $resultup = mysqli_query($conn,$sqlup) or die(mysqli_error());  
                echo "<script>document.location.href='candidate-job.php'</script>";
            }
          }

        }
      }
    }
  }
 ?> 
<style type="">
  label{color: #858796;font-size: 17px;font-weight: 400;}
.form-control{border-radius:8px;height:40px;}
.box-header h6{font-size: 18px!important;}
.box-header .table tr th{  color: #858796;
  font-size: 16px;
}
.box-body .table tr th, .box-body .table tr td{color: #858796!important;font-size:17px!important;}
 .basicinform{color: #858796;font-size: 26px;font-weight: 500;}
</style>
<body class="hold-transition skin-blue sidebar-mini">
  <div class="wrapper">
    <?php include("includes/header.php");?>
    <?php include("includes/sidebar.php");?>
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <a href="candidate-job.php" class="btn btn-primary"><i class="fa fa-list fa-lg" aria-hidden="true"></i> All Candidate</a>
      </section>
      <!-- Main content -->
      <section class="content">
     <div class="box box-danger gurnew">       
                  <div class="box-body"> 
                        <h4 class="basicinform">Edit Candidate Job</h4>
                        <hr> 
                         <?php $idd=$_GET['id'];
                         $sql=mysqli_query($conn,"select sub_category.sub_category_name,category.cat_name,employee_details.* from employee_details join category on employee_details.cat_id=category.id join sub_category on employee_details.subcat_id=sub_category.id where employee_details.id='".$idd."'");
                          $res= mysqli_fetch_array($sql);
                          ?>
                    
                        <form method="post" action="" enctype="multipart/form-data">
                       <div class="col-md-4">
                      <label>Category:</label>
                      <div class="input-group">
                        <div class="input-group-addon">
                          <i class="fa fa-suitcase"></i>
                        </div>
                          <select name="category_id" id="cat_id" class="form-control">
                        <option value="<?php echo $res['cat_id'];?>"><?php echo $res['cat_name'];?></option>
                         <?php
                                $sql2="SELECT * from category";
                                $exe2=mysqli_query($conn,$sql2);
                                while ($res2=mysqli_fetch_array($exe2))
                                {
                                ?>
                                <option value="<?php echo $res2['id']; ?>"><?php echo $res2['cat_name'];?></option>
                                <?php
                                }
                                ?>
                      </select>
                      </div>
                    </div>
                    <div class="col-md-4">
                      <label>Sub-Category:</label>
                      <div class="input-group">
                        <div class="input-group-addon">
                          <i class="fa fa-suitcase"></i>
                        </div>
                        <select name="sub_category_id" id="sub_cat" class="form-control">
                        <option value="<?php echo $res['subcat_id'];?>"><?php echo $res['sub_category_name'];?></option>
                        </select>
                      </div>
                    </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="address">Candidate Name <span class="text-danger">*</span></label>
                                    <input type="text" name="emp_name" value="<?php echo $res['emp_name']; ?>" class="form-control">
                                    <input type="hidden" name="old_emp_name" value="<?php echo $res['emp_name']; ?>" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="address">Salary <span class="text-danger">*</span></label>
                                    <input type="text" name="salary" value="<?php echo $res['salary']; ?>" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="phone">Location</label>
                                    <input type="text" name="location" value="<?php echo $res['location']; ?>" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="email">Email <span class="text-danger">*</span></label>
                                    <input type="email" name="email_id" value="<?php echo $res['email_id']; ?>" class="form-control">
                                </div>
                            </div>
                             <div class="col-md-6">
                                <div class="form-group">
                                    <label for="job_type">Job type <span class="text-danger">*</span></label>
                                    <input type="text" name="job_type" value="<?php echo $res['job_type']; ?>" class="form-control">
                                </div>
                            </div>
                           
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="website">Avalibility</label>
                                    <input type="text" name="avalibility" value="<?php echo $res['avalibility']; ?>" class="form-control">
                                </div>
                            </div>
                            
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="price">Experience  <span class="text-danger">*</span></label>
                                    <input type="text" name="experience_level" class="form-control" value="<?php echo $res['experience_level'];?>">
                                </div>
                            </div>

                        <div class="col-md-6">
                                <div class="form-group">
                                    <label for="price">Assetment link<span class="text-danger">*</span></label>
                                    <input type="text" name="assetment_link" class="form-control" value="<?php echo $res['assetment_link'];?>">
                                </div>
                            </div>

                           <div class="col-md-6">
                                <div class="form-group">
                                    <label for="price">Github link<span class="text-danger">*</span></label>
                                    <input type="text" name="github" class="form-control" value="<?php echo $res['github'];?>">
                                </div>
                            </div>

                        <div class="col-md-6">
                                <div class="form-group">
                                    <label for="price">Linkedin link<span class="text-danger">*</span></label>
                                    <input type="text" name="linkedin" class="form-control" value="<?php echo $res['linkedin'];?>">
                                </div>
                            </div>

                        </div>
                    </div>  
        </div>  

                         <div class="box box-danger gurnew">     
                        <div class="box-body"> 
                        <h4 class="basicinform">Image, PDF and Video</h4>
                        <hr>
                       <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="">Resume File</label>
                                    <input type="file" name="resume" class="form-control-file">
                                </div>
                            </div>
                          
                    <div class="col-md-4">
                      <label>  Images :<span class="text-red">(Size : 500 px X 582px)</span></label>
                      <div class="input-group">
                        <div class="input-group-addon">
                          <i class="fa fa-suitcase"></i>
                        </div>
                        <input type="File" name="image" class="form-control">
                        <br/><img src="emp/<?php echo $res['image'];?>" width="80px" style="margin-top:10px;margin-left:10px">
                      </div>
                    </div>
                    <div class="col-md-4">
                      <label>  Images 2:<span class="text-red">(Size : 500 px X 582px)</span></label>
                      <div class="input-group">
                        <div class="input-group-addon">
                          <i class="fa fa-suitcase"></i>
                        </div>
                        <input type="File" name="image2" class="form-control">
                         <br/><img src="emp/<?php echo $res['image2'];?>" width="60px">
                      </div>
                    </div>
                    <div class="col-md-4">
                      <label>  Images 3:<span class="text-red">(Size : 500 px X 582px)</span></label>
                      <div class="input-group">
                        <div class="input-group-addon">
                          <i class="fa fa-suitcase"></i>
                        </div>
                        <input type="File" name="image3" class="form-control">
                         <br/><img src="emp/<?php echo $res['image3'];?>" width="60px">
                      </div>
                    </div>
                    <div class="col-md-4">
                      <label>  Images 4:<span class="text-red">(Size : 500 px X 582px)</span></label>
                      <div class="input-group">
                        <div class="input-group-addon">
                          <i class="fa fa-suitcase"></i>
                        </div>
                        <input type="File" name="image4" class="form-control">
                         <br/><img src="emp/<?php echo $res['image4'];?>" width="60px">
                      </div>
                    </div>
                    <div class="col-md-4">
                      <label>  Images 5:<span class="text-red">(Size : 500 px X 582px)</span></label>
                      <div class="input-group">
                        <div class="input-group-addon">
                          <i class="fa fa-suitcase"></i>
                        </div>
                        <input type="File" name="image5" class="form-control">
                         <br/><img src="emp/<?php echo $res['image5'];?>" width="60px">
                      </div>
                    </div>
                        </div>
                         <div class="col-md-12">
                                <label>Present Work At:</label>
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fa fa-suitcase"></i>
                                    </div>
                                    <input type="file" name="wimg" class="form-control" >
                                </div>
                            </div>
                            <div class="col-md-12">
                                <label>Present Company Linkedin Id:</label>
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fa fa-suitcase"></i>
                                    </div>
                                    <input type="text" name="previous_comp_linkedin" class="form-control" value="<?php echo $res['previous_comp_linkedin'];?>">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <label>Previous Work At:</label>
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fa fa-suitcase"></i>
                                    </div>
                                    <input type="file" name="wkimg" class="form-control" >
                                </div>
                            </div>
                            <div class="col-md-12">
                                <label>Previous Company Linkedin Id:</label>
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fa fa-suitcase"></i>
                                    </div>
                                    <input type="text" name="present_comp_linkedin" value="<?php echo $res['present_comp_linkedin'];?>" class="form-control" >
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="seo_title">SEO Title</label>
                                    <input type="text" name="title" class="form-control" id="seo_title" value="<?= $res['title']; ?>">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="seo_description">SEO Description</label>
                                    <textarea name="meta_keyword" id="meta_keyword" cols="30" rows="3" class="form-control"><?= $res['meta_keyword']; ?></textarea>
                                </div>
                            </div>
                            <button name="update" type="update" class="btn btn-success btn-lg">Update</button>
                            </div>
                            </div>
                         </form>
          </section> 
    </div>

    <!-- Modal Category --> 
            <div id="add_data_Modal" class="modal fade">  
              <div class="modal-dialog">  
                   <div class="modal-content">  
                        <div class="modal-header">  
                             <button type="button" class="close" data-dismiss="modal">&times;</button>  
                             <h4 class="modal-title">Update Images</h4>  
                        </div>  
                        <div class="modal-body">  
                             <form method="post" name="frm" id="insert_form" enctype="multipart/form-data">  
                                  
                                  <label>Image</label>  
                                 <input type="file" name="image"  class="form-control" >
                                  </br>
                                  <input type="hidden" name="prd_id" id="prd_id" />  
                                  <input type="submit" name="update_img" id="insert" value="Insert" class="btn btn-success" />  
                             </form>  
                        </div>  
                        <div class="modal-footer">  
                             <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>  
                        </div>  
                   </div>  
              </div>  
         </div>  
            <!-- ./Modal Category -->
    <!-- /.content-wrapper -->
    <?php include("includes/footer.php");?>
    <div class="control-sidebar-bg"></div>
  </div>
  <?php include("includes/js.php");?>
  <script type="text/javascript"> 
$(document).ready(function(){
        $('#cat_id').on('change', function(){
            var cat_id = $(this).val();
            if(cat_id){
                $.ajax({
                    type:'POST',
                    url:'ajax_get_subsub_cat.php',
                    data:'cat_id='+cat_id,
                    success:function(html){
                        $('#sub_cat').html(html);
                       // console.log(html);
                       // $('#city').html('<option value="">Select Division</option>'); 
                    }
                }); 
            }
        });

          $('#sub_cat').on('change', function(){
            var scat_id = $(this).val();
            if(scat_id){
                $.ajax({
                    type:'POST',
                    url:'ajax_get_subsub_cat.php',
                    data:'scat_id='+scat_id,
                    success:function(html){
                        $('#subsub_cat').html(html);
                    }
                }); 
            }
        });
        });
 function delete_prdm_by_ID(id)
{
    if (confirm('Do You Want to Deleting This \nContinue anyway?')) {
        window.location.href = 'delete_imgsr.php?id=' + id;
    }
}

</script>
</body>
</html>