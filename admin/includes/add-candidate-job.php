<?php include("includes/css.php"); ?>
<style>
.cdy div{ 
width:31%;
float:left;
margin:10px;
}  
hr{
    border:1px #e96125 solid!important;
}
.checkbox-inline + .checkbox-inline, .radio-inline + .radio-inline {
  margin-top: 10px;
  margin-left: 10px;
}
</style>
<?php
if (isset($_POST['submit'])) {
extract($_POST);
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
$emps_name = mysqli_real_escape_string($conn,$emp_name);
$emp_name = strtolower(str_replace(" ", "-", $emp_name));
$job_title = mysqli_real_escape_string($conn,$job_title);
$desp = mysqli_real_escape_string($conn,$desp);
$location = mysqli_real_escape_string($conn,$location);
$tmp_file = $_FILES['img']['tmp_name'];
$ext = pathinfo($_FILES["img"]["name"], PATHINFO_EXTENSION);
$rand = md5(uniqid().rand());
$image = $rand.".".$ext;
move_uploaded_file($tmp_file,"emp/".$image);

$tmp_file = $_FILES['img2']['tmp_name'];
$ext = pathinfo($_FILES["img2"]["name"], PATHINFO_EXTENSION);
$rand = md5(uniqid().rand());
$image2 = $rand.".".$ext;
move_uploaded_file($tmp_file,"emp/".$image2);

$tmp_file = $_FILES['img3']['tmp_name'];
$ext = pathinfo($_FILES["img3"]["name"], PATHINFO_EXTENSION);
$rand = md5(uniqid().rand());
$image3 = $rand.".".$ext;
move_uploaded_file($tmp_file,"emp/".$image3);

$tmp_file = $_FILES['img4']['tmp_name'];
$ext = pathinfo($_FILES["img4"]["name"], PATHINFO_EXTENSION);
$rand = md5(uniqid().rand());
$image4 = $rand.".".$ext;
move_uploaded_file($tmp_file,"emp/".$image4);
$tmp_file = $_FILES['img5']['tmp_name'];
$ext = pathinfo($_FILES["img5"]["name"], PATHINFO_EXTENSION);
$rand = md5(uniqid().rand());
$image5 = $rand.".".$ext;
move_uploaded_file($tmp_file,"emp/".$image5);
$tmp_file = $_FILES['resume']['tmp_name'];
$ext = pathinfo($_FILES["resume"]["name"], PATHINFO_EXTENSION);
$rand = md5(uniqid().rand());
$resume = $rand.".".$ext;
move_uploaded_file($tmp_file,"emp/".$resume);
$tmp_file = $_FILES['wimg']['tmp_name'];
$ext = pathinfo($_FILES["wimg"]["name"], PATHINFO_EXTENSION);
$rand = md5(uniqid().rand());
$wimg = $rand.".".$ext;
move_uploaded_file($tmp_file,"emp/".$wimg);
$tmp_file = $_FILES['wkimg']['tmp_name'];
$ext = pathinfo($_FILES["wkimg"]["name"], PATHINFO_EXTENSION);
$rand = md5(uniqid().rand());
$wkimg = $rand.".".$ext;
move_uploaded_file($tmp_file,"emp/".$wkimg);
    if(file_exists('../'.$category.'/'.$sub_category)){
        if(!file_exists('../'.$category.'/'.$sub_category.'/'.$emp_name)){
            if(copy('../candidate-job-detail.php', '../'.$category.'/'.$sub_category.'/'.$emp_name.'.php')) {
            //$skill = implode(',',$dg_id);    
            $options = [
                'cost' => 11,
            ];
            $passwordFromPost = $_POST['password'];
            $passwordhash = password_hash($passwordFromPost, PASSWORD_BCRYPT, $options);
            $timezones = implode(',',$timezone);
            $sql="INSERT into employee_details(home_page,cat_id,subcat_id,emp_name,email_id,password,mobile_no,salary,location,dg_id,job_type,avalibility,experience_level,assetment_link,resume,github,linkedin,twitter,discord,image,image2,image3,image4,image5,previous_company,previous_comp_linkedin,present_company,present_comp_linkedin,job_title,title,meta_keyword,desp,created_date) values ('$home_page','$category_id','$sub_category_id','$emps_name','$email_id','$passwordhash','$mobile_no','$salary','$location','$timezones','$job_type','$avalibility','$experience_level','$assetment_link','$resume','$github','$linkedin','$twitter','$discord','$image','$image2','$image3','$image4','$image5','$wimg','$previous_comp_linkedin','$wkimg','$present_comp_linkedin','$job_title','$title','$meta_keyword','$desp','$datetime')";
            if  (mysqli_query($conn, $sql)){
                $last_id= mysqli_insert_id($conn);
                if(count($_POST["sname"]) > 0){
                    for($i = 0; $i < count($_POST["sname"]); $i++){
                    $sname = mysqli_real_escape_string($conn,$_POST['sname'][$i]);
                    $syear = mysqli_real_escape_string($conn,$_POST['syear'][$i]);
                    $sql_prd="INSERT into skills(emp_id,skill_name,skill_year) values ('$last_id','$sname','$syear')";
                    $prd_res=mysqli_query($conn, $sql_prd);
                  }
                }
                 echo "<script> 
                                alert('Your Candidate have added successfully!!!'); 
                                location.replace('candidate-job.php');
                            </script>";
            }
            else { 
                    echo "  <script> 
                                alert('There are some problem please try again!!!'); 
                                location.replace('candidate-job.php');
                            </script>";
                }
            } 
            else {
                echo "  <script> 
                            alert('There are some problem please try again!!!'); 
                            location.replace('candidate-job.php');
                        </script>";
            }
        }
        else{ 
            echo "  <script> 
                        alert('Candidate Name aleady exists, please change the and try again!!!'); 
                        location.replace('candidate-job.php');
                    </script>";
        }
    }
    else{ 
        echo "  <script> 
                    alert('Candidate not exists, please check and try again!!!'); 
                    location.replace('candidate-job.php');
                </script>";
    }
}


if(isset($_POST['update']))
{
extract($_POST);
$id=$_POST["cat_id"];
$sql1 ="UPDATE  sub_category  SET category_id='$cat_name',sub_category_name='$subcat_name' WHERE id='$id'"; 
$res=mysqli_query($conn,$sql1) or die(mysqli_error());
}
?>
<body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">
        <?php include("includes/header.php")?>
        <?php include("includes/sidebar.php")?>
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <!-- Main content -->
            <section class="content">
                <div class="row">
                    <div class="col-md-12">
                        <div class="box box-danger">
                            <div class="box-header">
                                <h3 class="box-title">Add Candidate Details</h3>
                            </div>
                            <div class="box-body">
                                <form method="post" action="" enctype="multipart/form-data">
                                    <div class="form-group">
                                        <div class="col-md-4">
                                         <div class="checkbox">
                                             <label class="">
                                              <input name="home_page" value="1" type="checkbox">
                                             Home Page
                                            </label>
                                          </div>
                                        </div> 

                                        <div class="col-md-4">
                                            <label>Category:</label>
                                            <div class="input-group">
                                                <div class="input-group-addon">
                                                    <i class="fa fa-suitcase"></i>
                                                </div>
                                                    <select name="category_id" id="cat_id" class="form-control">
                                                <option>Select</option>
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
                                                <option>Select</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <label>Title:</label>
                                            <div class="input-group">
                                                <div class="input-group-addon">
                                                    <i class="fa fa-suitcase"></i>
                                                </div>
                                                <input type="text" name="job_title" class="form-control" placeholder="Enter Title">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <label>Candidate Name:</label>
                                            <div class="input-group">
                                                <div class="input-group-addon">
                                                    <i class="fa fa-suitcase"></i>
                                                </div>
                                                <input type="text" name="emp_name" class="form-control" placeholder="Enter Candidate Name">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <label>Candidate Location:</label>
                                            <div class="input-group">
                                                <div class="input-group-addon">
                                                    <i class="fa fa-suitcase"></i>
                                                </div>
                                                <input type="text" name="location" class="form-control" placeholder="Enter Candidate Location">
                                            </div>
                                        </div>
                                         <div class="col-md-4">
                                            <label>Candidate Mobile No:</label>
                                            <div class="input-group">
                                                <div class="input-group-addon">
                                                    <i class="fa fa-suitcase"></i>
                                                </div>
                                                <input type="text" name="mobile_no" class="form-control" placeholder="Enter Candidate Mobile No">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <label>Email ID/Username:</label>
                                            <div class="input-group">
                                                <div class="input-group-addon">
                                                    <i class="fa fa-suitcase"></i>
                                                </div>
                                                <input type="text" name="email_id" class="form-control" placeholder="Enter Candidate Email Id" required>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <label>Password:</label>
                                            <div class="input-group">
                                                <div class="input-group-addon">
                                                    <i class="fa fa-suitcase"></i>
                                                </div>
                                                <input type="password" name="password" class="form-control" placeholder="Enter password">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <label>Resume:</label>
                                            <div class="input-group">
                                                <div class="input-group-addon">
                                                    <i class="fa fa-suitcase"></i>
                                                </div>
                                                <input type="file" name="resume" class="form-control" >
                                            </div>
                                        </div>
                                        <div class="col-md-8">
                                            <label>Available Time zone:</label>
                                            <div class="input-group">
                                                  
                                        <?php $sqltp=mysqli_query($conn,"SELECT * from designation");
                                          while($restp=mysqli_fetch_array($sqltp)) { ?>
                                            <label class="checkbox-inline col-md-3">
                                            <input type="checkbox" name="timezone[]" value="<?php echo $restp['id']; ?>"><?php echo $restp['dname'];?></label>
                                         <?php } ?>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <label>Candidate job type:</label>
                                            <div class="input-group">
                                                <div class="input-group-addon">
                                                    <i class="fa fa-suitcase"></i>
                                                </div>
                                                <select class="form-control" name="job_type">
                                                    <option>Select Job Type</option>
                                                     <option>Freelance</option>
                                                    <option>Full Time</option>
                                                    <option>Part Time</option> 
                                                 </select>
                                            </div>
                                        </div>
							<div class="clearfix"></div>
                                        <div class="col-md-4">
                                            <label>Avalibility:</label>
                                            <div class="input-group">
                                                <div class="input-group-addon">
                                                    <i class="fa fa-suitcase"></i>
                                                </div>
                                                <input type="text" name="avalibility" class="form-control" placeholder="Enter avalibility">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <label>Experience:</label>
                                            <div class="input-group">
                                                <div class="input-group-addon">
                                                    <i class="fa fa-suitcase"></i>
                                                </div>
                                                <input type="text" name="experience_level" class="form-control" placeholder="Enter Experience ">
                                            </div>
                                        </div>
                                        <!-- <div class="col-md-4">
                                            <label>Expected Salary:</label>
                                            <div class="input-group">
                                                <div class="input-group-addon">
                                                    <i class="fa fa-suitcase"></i>
                                                </div>
                                                <input type="text" name="exp_salary" class="form-control" placeholder="Enter Salary ">
                                            </div>
                                        </div> -->
                                        <div class="col-md-4">
                                            <label>Base Salary:</label>
                                            <div class="input-group">
                                                <div class="input-group-addon">
                                                    <i class="fa fa-suitcase"></i>
                                                </div>
                                                <input type="text" name="salary" class="form-control" placeholder="Enter Base Salary ">
                                            </div>
                                        </div>
                                        <div class="col-md-8">
                                            <label>Assetment link:</label>
                                            <div class="input-group">
                                                <div class="input-group-addon">
                                                    <i class="fa fa-suitcase"></i>
                                                </div>
                                                <input type="text" name="assetment_link" class="form-control" placeholder="Enter Assetment link">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <label>Github link:</label>
                                            <div class="input-group">
                                                <div class="input-group-addon">
                                                    <i class="fa fa-suitcase"></i>
                                                </div>
                                                <input type="text" name="github" class="form-control" placeholder="Enter Github link">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <label>Linkedin link:</label>
                                            <div class="input-group">
                                                <div class="input-group-addon">
                                                    <i class="fa fa-suitcase"></i>
                                                </div>
                                                <input type="text" name="linkedin" class="form-control" placeholder="Enter Linkedin link">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <label>Twitter link:</label>
                                            <div class="input-group">
                                                <div class="input-group-addon">
                                                    <i class="fa fa-suitcase"></i>
                                                </div>
                                                <input type="text" name="twitter" class="form-control" placeholder="Enter Twitter link">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <label>Discord link:</label>
                                            <div class="input-group">
                                                <div class="input-group-addon">
                                                    <i class="fa fa-suitcase"></i>
                                                </div>
                                                <input type="text" name="discord" class="form-control" placeholder="Enter Discord link">
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <label>Seo Title:</label>
                                            <div class="input-group">
                                                <div class="input-group-addon">
                                                    <i class="fa fa-suitcase"></i>
                                                </div>
                                                <input type="text" name="title" class="form-control" placeholder="Enter Title ">
                                            </div>
                                        </div>
                                        
                                        <div class="col-md-12">
                                            <label> Meta Keyword:</label>
                                            <div class="input-group">
                                                <div class="input-group-addon">
                                                    <i class="fa fa-suitcase"></i>
                                                </div>
                                                <textarea class="form-control" rows="5" name="meta_keyword" placeholder="Meta Keyword "></textarea>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <label> Short Description:</label>
                                            <div class="input-group">
                                                <div class="input-group-addon">
                                                    <i class="fa fa-suitcase"></i>
                                                </div>
                                                <textarea class="form-control" rows="5" name="desp" placeholder="Short Description"></textarea>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <label>Present Work At:</label>
                                            <div class="input-group">
                                                <div class="input-group-addon">
                                                    <i class="fa fa-suitcase"></i>
                                                </div>
                                                <input type="file" name="wimg" class="form-control" >
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <label>Present Company Linkedin Id:</label>
                                            <div class="input-group">
                                                <div class="input-group-addon">
                                                    <i class="fa fa-suitcase"></i>
                                                </div>
                                                <input type="text" name="previous_comp_linkedin" class="form-control" >
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <label>Previous Work At:</label>
                                            <div class="input-group">
                                                <div class="input-group-addon">
                                                    <i class="fa fa-suitcase"></i>
                                                </div>
                                                <input type="file" name="wkimg" class="form-control" >
                                            </div>
                                        </div>
                                        <div class="col-md-8">
                                            <label>Previous Company Linkedin Id:</label>
                                            <div class="input-group">
                                                <div class="input-group-addon">
                                                    <i class="fa fa-suitcase"></i>
                                                </div>
                                                <input type="text" name="present_comp_linkedin" class="form-control" >
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <label>Image 1:(Size: 500px 500px)</label>
                                            <div class="input-group">
                                                <div class="input-group-addon">
                                                    <i class="fa fa-suitcase"></i>
                                                </div>
                                                <input type="file" name="img" class="form-control" >
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <label>Image 2:(Size: 500px 500px)</label>
                                            <div class="input-group">
                                                <div class="input-group-addon">
                                                    <i class="fa fa-suitcase"></i>
                                                </div>
                                                <input type="file" name="img2" class="form-control" >
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <label>Image 3:(Size: 500px 500px)</label>
                                            <div class="input-group">
                                                <div class="input-group-addon">
                                                    <i class="fa fa-suitcase"></i>
                                                </div>
                                                <input type="file" name="img3" class="form-control" >
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <label>Image 4:(Size: 500px 500px)</label>
                                            <div class="input-group">
                                                <div class="input-group-addon">
                                                    <i class="fa fa-suitcase"></i>
                                                </div>
                                                <input type="file" name="img4" class="form-control" >
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <label>Image 5:(Size: 500px 500px)</label>
                                            <div class="input-group">
                                                <div class="input-group-addon">
                                                    <i class="fa fa-suitcase"></i>
                                                </div>
                                                <input type="file" name="img5" class="form-control" >
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <label>Resume:</label>
                                            <div class="input-group">
                                                <div class="input-group-addon">
                                                    <i class="fa fa-suitcase"></i>
                                                </div>
                                                <input type="file" name="resume" class="form-control" >
                                            </div>
                                        </div>
                                        <!-- <div class="col-md-4">
                                            <label>Video Interview:</label>
                                            <div class="input-group">
                                                <div class="input-group-addon">
                                                    <i class="fa fa-suitcase"></i>
                                                </div>
                                                <input type="file" name="video_file" class="form-control" >
                                            </div>
                                        </div> -->
                                   <div class="col-md-12">
                                    <h4>Add Skill Details</h4>
                                   </div>
                                  <div class="col-md-12">
                                    <div class="table-responsive" id="dynamic_field">
                                        <table class="table"> 
                                            <tbody>
                                                <?php $sqltps=mysqli_query($conn,"SELECT * from skill_detail");
                                               while($restps=mysqli_fetch_array($sqltps)) { ?>
                                                <tr>
                                                    <td>
                                                        <strong>Skill Name:</strong>
                                                        <input type="checkbox" name="sname[]" class="skills" placeholder="" value="<?= $restps['id'];?>"><?= $restps['skill_name'];?></input>
                                                    </td>
                                                    <td>
                                                        <strong>Skill Year:</strong>
                                                        <input type="text" name="syear[]" class="form-control tx" placeholder="" style="display: none">
                                                    </td>
                                                </tr><?php } ?>
                                            </tbody>
                                        </table>
                                        <hr/>
                                    </div>
                                    <!-- <div class="clearfix"></div>
                                        <div class="col-sm-12">
                                        <div class="optionBox mt-20">
                                            <div class="block">
                                                <button type="button" name="add" id="add" class="btn btn-success">Add More +</button>
                                            </div>
                                          </div>
                                       </div> -->
                                    <div class="clearfix"></div>
                                    </div>
                                    <div class="clearfix"></div>
                                    <div class="col-md-4 mt-20">
                                        <div class="form-group">
                                            <input type="submit" name="submit" class="btn btn-success btn-md" value="Submit">
                                        </div>
                                    </div>
                                </form>
                            </div>
                            
                        </div>
      </div>
                    </div>
                </div>
            </section>
        </div>
        <?php include("includes/footer.php")?>
    </div>
    <?php include("includes/js.php")?>
    <script>
        $('.add').click(function() {
            $('.block:last').before('<div class="block" style="margin-bottom:10px;font-size:16px;" ><b><u>Add Another Product Details(No. Of Quantity, No. Of Items, Price,..) ....</u></b><span class="remove btn btn-sm btn-danger"><i class="fa fa-trash"></i></span></div>');
        });
        $('.optionBox').on('click', '.remove', function() {
            $(this).parent().remove();
        });


        $(document).ready(function(){
            $('#cat_id').on('change', function(){
                var cat_id = $(this).val();
               // alert(cat_id);
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
    </script>
    <script> 
      $('#summernote_editor').summernote({
         tabsize: 2,
        height: 400,
            spellCheck: true,
    toolbar: [
      ['style', ['style']],
      ['font', ['bold', 'underline', 'italic', 'superscript', 'subscript', 'clear']],
      ['fontname', ['fontname','fontsize']],
      ['color', ['color']],
      ['para', ['ul', 'ol', 'paragraph']],
      ['table', ['table']],
      ['insert', ['link', 'picture', 'video']],
      ['view', ['fullscreen', 'help', 'undo', 'redo']],
    ],
    callbacks: {
        onImageUpload: function(files, editor, welEditable) {
            sendFile(files[0], editor, welEditable);
        }
    }
      });
   function sendFile(file, editor, welEditable) {
    data = new FormData();
    data.append("file", file);
    $.ajax({
        data: data,
        type: "POST",
        url: "upload_img.php",
        cache: false,
        processData: false,
        contentType: false,
        success: function(url) {
            var image = $('<img>').attr('src', url);
            $('#summernote_editor').summernote("insertNode", image[0]);
        }
    });
}
 $(document).ready(function() {
    var i = 1;
    $('#add').click(function() {
        i++;
         $('#dynamic_field').append('<div id="row'+i+'" class="cdy"><div><strong>Skill Name:</strong><br /><input type="text" name="sname[]" class="form-control name_list" /></div><div><strong>Image:<span>(Size: 30px x 30px) </span></strong><br /><input type="file" name="simg[]" class="form-control name_list" /></div><div><strong>Skill Year:</strong><br /><input type="text" name="syear[]" placeholder="" class="form-control name_list" /></div><div style="width:10%; margin-top:30px"><button type="button" name="removes" id="'+i+'" class="btn btn-danger btn_removes">X</button></div></div><div class="clearfix"></div><hr/>'); 
    });
    $(document).on('click', '.btn_removes', function() {
        var button_id = $(this).attr("id");
        $('#row' + button_id + '').remove();
    });
    $('#submit').click(function() {
        $.ajax({
            url: "add-candidate-job.php",
            method: "POST",
            data: $('#add_name').serialize(),
            success: function(data) {
                alert(data);
                $('#add_name')[0].reset();
            }
        });
    });
});
</script> 
<script type="text/javascript">
jQuery($ => {
  $('.skills').on('change', function() {
    $(this).closest('tr').find('.tx').toggle(this.checked);
  });
});    
</script>
</body>
</html>