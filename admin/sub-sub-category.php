<?php include("includes/css.php");
if (isset($_POST['submit'])) {
// var_dump($_FILES);
extract($_POST);
$sql2="SELECT * from category where id='$category'";
$exe2=mysqli_query($conn,$sql2);
$res2=mysqli_fetch_array($exe2);
$sql_scat="SELECT * from sub_category where id='$sub_category'";
$exe_scat=mysqli_query($conn,$sql_scat);
$res_scat=mysqli_fetch_array($exe_scat);

$category_page = strtolower(str_replace(" ", "-", $res2["cat_name"]));
$sub_category_page = strtolower(str_replace(" ", "-", $res_scat["sub_category_name"])); 
$sub_sub_category_page = strtolower(str_replace(" ", "-", $sub_subcat)); 
 if(!file_exists('../'.$category_page.'/'.$sub_category_page.'/'.$sub_sub_category_page)){
    if(mkdir('../'.$category_page.'/'.$sub_category_page.'/'.$sub_sub_category_page, 0777, true)){
        if(copy('../includes/css.php', '../'.$category_page.'/'.$sub_category_page.'/'.$sub_sub_category_page.'/css.php') && copy('../includes/js.php', '../'.$category_page.'/'.$sub_category_page.'/'.$sub_sub_category_page.'/js.php') && copy('../includes/header.php', '../'.$category_page.'/'.$sub_category_page.'/'.$sub_sub_category_page.'/header.php') && copy('../includes/footer.php','../'.$category_page.'/'.$sub_category_page.'/'.$sub_sub_category_page.'/footer.php') && copy('../includes/db_config.php', '../'.$category_page.'/'.$sub_category_page.'/'.$sub_sub_category_page.'/db_config.php') && copy('../property-service.php', '../'.$category_page.'/'.$sub_category_page.'/'.$sub_sub_category_page.'/index.php') && copy('../htfile/.htaccess', '../'.$category_page.'/'.$sub_category_page.'/'.$sub_sub_category_page.'/.htaccess') && copy('../htfile/web.config', '../'.$category_page.'/'.$sub_category_page.'/'.$sub_sub_category_page.'/web.config') ){
		   
		   		$sql="INSERT into sub_sub_category(category_id,sub_category_id,sub_sub_cat_name) values ('$category','$sub_category','$sub_subcat')";
		$res=mysqli_query($conn,$sql) or die(mysqli_error());
		if($res)
		{	echo " <script>alert('sub sub Category created successfully...');
                            location.replace('sub-sub-category.php');
                        </script>";
		}
     } else{  echo "<script>
                        alert('Something went wrong, Please try again...'); 
                        location.replace('sub-sub-category.php');
                    </script>
                ";
            }
        } else{ 
                echo "
                    <script>
                        alert('Something went wrong, Please try again...'); 
                        location.replace('sub-sub-category.php');
                    </script>
                ";
            }
    } else{
        echo "
            <script>
                alert('Sub Sub Category name already exists, Please change the name and try again...');
                location.replace('sub-sub-category.php');
            </script>
        ";
    }
}

if(isset($_POST['update']))
{
    //var_dump($_FILES);exit();
extract($_POST);
$id=$_POST["scat_id"];
$cat_name=$_POST["cat_name"];
$sql_cat="SELECT * from category where id='".$cat_name."'";
$exe_cat=mysqli_query($conn,$sql_cat);
$res_cat=mysqli_fetch_array($exe_cat);
$sql_scat="SELECT * from sub_category where id='".$sub_category."'";
$exe_scat=mysqli_query($conn,$sql_scat);
$res_scat=mysqli_fetch_array($exe_scat);
$category_page = strtolower(str_replace(" ", "-", $res_cat["cat_name"]));
$sub_category_page = strtolower(str_replace(" ", "-", $res_scat["sub_category_name"])); 
$sub_sub_category_page = strtolower(str_replace(" ", "-", $subsubcat_name)); 
$subcategory_old_page = strtolower(str_replace(" ", "-", $old_subsubcat_name));
//if(!file_exists('../'.$category_new_page)) {
if(!file_exists('../'.$category_page.'/'.$sub_category_page.'/'.$sub_sub_category_page)){	
if(file_exists('../'.$category_page.'/'.$sub_category_page.'/'.$subcategory_old_page)){	
//if(file_exists('../'.$category_old_page)){
  if(rename("../$category_page/$sub_category_page/$subcategory_old_page", "../$category_page/$sub_category_page/$sub_sub_category_page")){
   $sql1 ="UPDATE  sub_sub_category  SET category_id='$cat_name',sub_category_id='$sub_category',sub_sub_cat_name='$subsubcat_name' WHERE id='$id'"; 
    $res=mysqli_query($conn,$sql1) or die(mysqli_error());
   
 } else{ echo "
            <script>
                alert('Something went wrong, Please try again...');
                location.replace('sub-sub-category.php');
            </script>";
 }
} else{
 if(mkdir('../'.$category_page.'/'.$sub_category_page.'/'.$sub_sub_category_page, 0777, true)){
    if(copy('../includes/css.php', '../'.$category_page.'/'.$sub_category_page.'/'.$sub_sub_category_page.'/css.php') && copy('../includes/js.php', '../'.$category_page.'/'.$sub_category_page.'/'.$sub_sub_category_page.'/js.php') && copy('../includes/header.php', '../'.$category_page.'/'.$sub_category_page.'/'.$sub_sub_category_page.'/header.php') && copy('../includes/footer.php','../'.$category_page.'/'.$sub_category_page.'/'.$sub_sub_category_page.'/footer.php') && copy('../includes/db_config.php', '../'.$category_page.'/'.$sub_category_page.'/'.$sub_sub_category_page.'/db_config.php') && copy('../service-property.php', '../'.$category_page.'/'.$sub_category_page.'/'.$sub_sub_category_page.'.php') && copy('../htfile/.htaccess', '../'.$category_page.'/'.$sub_category_page.'/'.$sub_sub_category_page.'/.htaccess') && copy('../htfile/web.config', '../'.$category_page.'/'.$sub_category_page.'/'.$sub_sub_category_page.'/web.config')){
    $sql1 ="UPDATE  sub_sub_category  SET category_id='$cat_name',sub_category_id='$sub_category',sub_sub_cat_name='$subsubcat_name' WHERE id='$id'";  
        $res=mysqli_query($conn,$sql1) or die(mysqli_error());
       } else{
            echo "
                <script>
                    alert('Something went wrong, Please try again...');
                    location.replace('sub-sub-category.php');
                </script>
            ";
        }
    } else{  echo "
                <script>
                    alert('Something went wrong, Please try again...');
                    location.replace('sub-sub-category.php');
                </script>
            ";
        }
   }
} else{
	
    echo "
        <script>
            alert('Sub Category name already exists, Please change the name and try again...');
            location.replace('sub-sub-category.php');
        </script>
    ";
}

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
					<div class="col-md-7">
						<div class="box box-danger">
							<div class="box-header with-border">
								<h3 class="box-title">Sub Sub-Category</h3>
							</div>
							<!-- /.box-header -->
							<div class="box-body table-responsive">
								<table class="table table-bordered example2">
									<thead>
										<tr>
											<th>S. No</th>
											<th>Category</th>
											<th>Sub-Category</th>
											<th>Sub-Sub-Category</th>
											<th>Edit</th>
											<th>Delete</th>
										</tr>
									</thead>
									<tbody>
													<?php
									$sql="select sub_sub_category.*,category.cat_name,sub_category.sub_category_name from sub_sub_category join category on sub_sub_category.category_id=category.id join sub_category on sub_sub_category.sub_category_id=sub_category.id";
									$result = mysqli_query($conn, $sql);

									 $j=1;// 8.Jh- Include pagination
									while($res= mysqli_fetch_array($result))// 7.Jh- Add loop to appling step 5 means selected coloumns 
									{ 
									?>
											<tr>
											<td><?php echo $j; $j++; ?></td>
											<td><?php echo $res['cat_name']; ?></td> 
											<td><?php echo $res['sub_category_name']; ?></td> 
											<td><?php echo $res['sub_sub_cat_name']; ?></td> 
											<td><input type="button" name="edit" value="Edit" id="<?php echo $res["id"]; ?>" class="btn btn-md btn-success edit_data" /></td> 
											 <td><a href="javascript:delete_subsubcat_by_ID('<?php echo $res['id'] ?>','<?php echo $res['cat_name'] ?>','<?php echo $res['sub_category_name'] ?>','<?php echo $res['sub_sub_cat_name'] ?>');" class="ask"><i class="fa fa-trash-o"></i></a></td>
										</tr>
										<?php } ?>
									</tbody>
								</table>
							</div>
							
						</div>
					</div>
					<div class="col-md-5">
						<div class="box box-danger">
							<div class="box-header">
								<h3 class="box-title">Add New Sub-Sub-Category</h3>
							</div>
							<div class="box-body">
								<form method="post" action="" enctype="multipart/form-data">
									<div class="form-group">
										<label>Category:</label>
										<div class="input-group">
											<div class="input-group-addon">
												<i class="fa fa-suitcase"></i>
											</div>
											<select name="category" id="cat_id" class="form-control">
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
									<div class="form-group">
										<label>Sub-Category:</label>
										<div class="input-group">
											<div class="input-group-addon">
												<i class="fa fa-suitcase"></i>
											</div>
											<select name="sub_category" id="sub_cat" class="form-control">
												<option>Select</option>
												 <?php
								          /*  $sql2="SELECT * from category";
								            $exe2=mysqli_query($conn,$sql2);
								            while ($res2=mysqli_fetch_array($exe2))
								            {
								            ?>
								            <option value="<?php echo $res2['id']; ?>"><?php echo $res2['cat_name'];?></option>
								            <?php
								            }*/
								            ?>
											</select>
										</div>
									</div>
									<div class="form-group">
										<label>Sub Sub Category:</label>
										<div class="input-group">
											<div class="input-group-addon">
												<i class="fa fa-suitcase"></i>
											</div>
											<input type="text" name="sub_subcat" class="form-control" placeholder="Enter Sub-Sub-Category Name">
										</div>
									</div>

									<!-- <div class="form-group">
										<label>Sub Sub Category Image : <span class="text-red">Size : 500px X 407px</span></label>
										<div class="input-group">
											<div class="input-group-addon">
												<i class="fa fa-suitcase"></i>
											</div>
											<input type="file" name="subsubcat_img" class="form-control" placeholder="Category">
										</div>
									</div> 
									<div class="form-group">
										<label>Sub Sub Category Banner Image :<span class="text-red">Size : 1600px X 400px</span></label>
										<div class="input-group">
											<div class="input-group-addon">
												<i class="fa fa-suitcase"></i>
											</div>
											<input type="file" name="subsubcat_bnimg" class="form-control" placeholder="Category">
										</div>
									</div>-->



									<div class="form-group">
										<div class="input-group">
											<input type="submit" name="submit" class="btn btn-success btn-md" value="Submit">
										</div>
									</div>
								</form>
							</div>
							
						</div>
					</div>
				</div>
				<!-- Modal Sub-Category --> 
				<div id="add_data_Modal" class="modal fade">  
			      <div class="modal-dialog">  
			           <div class="modal-content">  
			                <div class="modal-header">  
			                     <button type="button" class="close" data-dismiss="modal">&times;</button>  
			                     <h4 class="modal-title">Update Sub Sub Category</h4>  
			                </div>  
			                <form method="post" id="insert_form" enctype="multipart/form-data">  
			                <div class="modal-body">  
				                  <label> Category</label>  
				                 	<select name="cat_name" id="cat_idd" class="form-control">
										<option>Select</option>
										 <?php
						            $sql2="SELECT * from category";
						            $exe2=mysqli_query($conn,$sql2);
						            while ($res2=mysqli_fetch_array($exe2)) { ?>
						            <option value="<?php echo $res2['id']; ?>"><?php echo $res2['cat_name'];?></option>
						            <?php }  ?>
									</select>
									<span style="color: red" id="cat_idd_alert"></span>
                                    </br>
			                          <label>Sub Category</label>  
			                          <select name="sub_category" id="sub_cat" class="form-control" required>
									<?php   $sql2="SELECT * from sub_category";
								            $exe2=mysqli_query($conn,$sql2);
								            while ($res2=mysqli_fetch_array($exe2)) { ?>
								            <option value="<?php echo $res2['id']; ?>"><?php echo $res2['sub_category_name'];?></option>
								            <?php
								            } ?>
														</select>
														<span style="color: red" id="sub_cat_alert"></span>
			                          
                                        <div class="form-group">
			                          <label>Sub Sub Category </label>  
			                          <input type="text" name="subsubcat_name" id="subsubcat_name" class="form-control" placeholder="Enter Sub Sub Category">
			                          <input type="hidden" name="old_subsubcat_name" id="old_subsubcat_name" class="form-control" placeholder="Enter Sub Sub Category">
			                      </div>
									<!-- <div class="form-group">
									   <label>Sub Sub Category Image: <span class="text-red">Size : 500px X 407px</span></label>  
                                     <input type="file" name="ssubcat_img" class="form-control" placeholder=" Photo">
									</div>
										<div class="form-group">
									   <label>Sub Sub Category Banner:<span class="text-red">Size : 1600px X 400px</span></label>  
                                     <input type="file" name="ssubcat_bnimg" class="form-control" placeholder=" Photo">
									</div> -->
			                          <input type="hidden" name="scat_id" id="scat_id" />  
			                </div>  
			                <div class="modal-footer"> 
			                 <input type="submit" name="update" id="insert" value="Insert" class="btn btn-success" /> 
			                     <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>  
			                </div>  
			                </form>  
			           </div>  
			      </div>  
			 </div>  
			<!-- ./Modal Sub-Category -->
			</section>
		</div>
		<?php include("includes/footer.php")?>
	</div>
	<?php include("includes/js.php")?>
	<script>
		$(function() {
			$('#example1').DataTable()
			$('#example2').DataTable({
				'paging': true,
				'lengthChange': false,
				'searching': false,
				'ordering': true,
				'info': true,
				'autoWidth': false
			})
		})

		$(document).ready(function(){
		    $('#cat_id').on('change', function(){
		        var cat_id = $(this).val();
		        if(cat_id){
		            $.ajax({
		                type:'POST',
		                url:'ajax_get_subcat.php',
		                data:'cat_id='+cat_id,
		                success:function(html){
		                    $('#sub_cat').html(html);
		                   // console.log(html);
		                   // $('#city').html('<option value="">Select Division</option>'); 
		                }
		            }); 
		        }
		    });
        });

         $(document).ready(function(){  
     
      $(document).on('click', '.edit_data', function(){  
           var scat_id = $(this).attr("id");  
           $.ajax({  
                url:"edit_subsubcat.php",  
                method:"POST",  
                data:{scat_id:scat_id},  
                dataType:"json",  
                success:function(data){  
                     $('#cat_idd').val(data.category_id); 
                     $('#sub_cat').val(data.sub_category_id); 
                     $('#subsubcat_name').val(data.sub_sub_cat_name); 
                     $('#old_subsubcat_name').val(data.sub_sub_cat_name); 
                     $('#scat_id').val(data.id);  
                     $('#insert').val("Update");  
                     $('#add_data_Modal').modal('show');  
                     console.log(data);
                }  
           });  
      });  
     
 });  


        function delete_subsubcat_by_ID(id,name,sub_name,sub_sub_name)
		{
			if (confirm('Do You Want to Deleting This \nContinue anyway?')) {
				window.location.href = 'delete_subsubcategory.php?id=' + id + '&name=' + name + '&sub_name=' + sub_name + '&sub_sub_name=' + sub_sub_name;
			}
		}


$(document).ready(function(){
    $("#cat_idd").change(function(){
    var select = $("#cat_idd option:selected").val();  
      validcat_idd();  
});   }); 
function validcat_idd()
{
 var cat_idd = $("#cat_idd");   
       if(cat_idd.val() == "" || cat_idd.val() == null || cat_idd.val() == "Select Category")
       {    cat_idd.focus();
          $("#cat_idd").html("select Category field required");
          return false; 
     }
     else { $("#cat_idd_alert").html(""); }
}

$(document).ready(function(){
    $("#sub_cat").change(function(){
    var select = $("#sub_cat option:selected").val();  
      validsub_cat();  
});   }); 
function validsub_cat() 
{
 var sub_cat = $("#sub_cat");   
       if(sub_cat.val() == "" || sub_cat.val() == null || sub_cat.val() == "Select Next Video")
       {    sub_cat.focus();
          $("#sub_cat").html("select Country field required");
          return false; 
     }
     else { $("#sub_cat_alert").html(""); }
}

 $(document).ready(function(){ 
    $("#insert1").click(function(){
      var cat_idd    = validatetext('cat_idd','cat_idd_alert'); 
      var sub_cat    = validatetext('sub_cat','sub_cat_alert'); 
      
      if(cat_idd == 0 || sub_cat == 0 )
      {
        return false;
      }

      });  
  });
	</script>
</body>

</html>
