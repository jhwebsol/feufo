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
    $sql_sscat=mysqli_query($conn,"SELECT * from sub_sub_category where id='$sub_sub_cat_id'");
    $res_sscat=mysqli_fetch_array($sql_sscat);
    $category = strtolower(str_replace(" ", "-", $res_cat['cat_name']));
    $sub_category = strtolower(str_replace(" ", "-", $res_scat['sub_category_name']));
    $sub_sub_category = strtolower(str_replace(" ", "-", $res_sscat['sub_sub_cat_name']));
            $tmp_file = $_FILES['banner']['tmp_name'];
            $ext = pathinfo($_FILES["banner"]["name"], PATHINFO_EXTENSION);
            $rand1 = md5(uniqid().rand());
            $ban_img = $rand1.".".$ext;
            move_uploaded_file($tmp_file,"product/".$ban_img);
                $pdesp = mysqli_real_escape_string($conn,$_POST['property_desp']);
                $property_desp = htmlentities($pdesp);
            $sql="INSERT into property_services(category_id,sub_category_id,sub_sub_cat_id,prod_desp,title,meta_keyword,img,created_date,ip_address) values ('$category_id','$sub_category_id','$sub_sub_cat_id','$property_desp','$title','$meta_keyword','$ban_img','$datetime','$ip')";
            echo $sql;
            $prd_res=mysqli_query($conn, $sql);
            if($prd_res)
            { 
                 echo "<script> alert('Your property have added successfully!!!'); 
                                location.replace('property-services.php');
                            </script>";
            }
            /*else { exit();
                    echo "  <script> 
                                alert('There are some problem please try again!!!'); 
                                location.replace('property.php');
                            </script>";
                }
            } 
            else { exit();
                echo "  <script> 
                            alert('There are some problem please try again!!!'); 
                            location.replace('property.php');
                        </script>";
            }
        }
        else{
            echo "  <script> 
                        alert('property Name aleady exists, please change the and try again!!!'); 
                        location.replace('property.php');
                    </script>";
        }
    }
    else{
        echo "  <script> 
                    alert('property not exists, please check and try again!!!'); 
                    location.replace('property.php');
                </script>";
    }*/
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
                                <h3 class="box-title">Add Property Details</h3>
                            </div>
                            <div class="box-body">
                                <form method="post" action="" enctype="multipart/form-data">
                                    <div class="form-group">
                                        
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
                                         <div class="col-md-4">
                                            <label>Sub-Sub-Category:</label>
                                            <div class="input-group">
                                                <div class="input-group-addon">
                                                    <i class="fa fa-suitcase"></i>
                                                </div>
                                                <select name="sub_sub_cat_id" id="subsub_cat" class="form-control">
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
                                                <input type="text" name="title" class="form-control" placeholder="Enter Title ">
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <label>Banner:</label>
                                            <div class="input-group">
                                                <div class="input-group-addon">
                                                    <i class="fa fa-suitcase"></i>
                                                </div>
                                                <input type="file" name="banner" class="form-control" >
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
                                            <label> Description:</label>
                                            <div class="input-group">
                                                <div class="input-group-addon">
                                                    <i class="fa fa-suitcase"></i>
                                                </div>
                                                <textarea id="summernote" name="property_desp" rows="5" placeholder="Enter Property Description"></textarea>
                                            </div>
                                        </div>
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
    </script> 
</body>
</html>