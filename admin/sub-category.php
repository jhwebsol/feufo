<?php include("includes/css.php");
if (isset($_POST['submit'])) {
extract($_POST);  
$sql2="SELECT * from category where id='$category'";
$exe2=mysqli_query($conn,$sql2); 
$res2=mysqli_fetch_array($exe2); 
$category_page = strtolower(str_replace(" ", "-", $res2["cat_name"]));
$sub_category_page = strtolower(str_replace(" ", "-", $sub_name)); 
 $subc_name=mysqli_real_escape_string($conn,$_POST['sub_name']);
if(!file_exists('../'.$category_page.'/'.$sub_category_page)){
    if(mkdir('../'.$category_page.'/'.$sub_category_page, 0777, true)){
       if(copy('../includes/css.php', '../'.$category_page.'/'.$sub_category_page.'/css.php') && copy('../includes/js.php', '../'.$category_page.'/'.$sub_category_page.'/js.php') && copy('../includes/header.php', '../'.$category_page.'/'.$sub_category_page.'/header.php') && copy('../includes/footer.php','../'.$category_page.'/'.$sub_category_page.'/footer.php') && copy('../includes/db_config.php', '../'.$category_page.'/'.$sub_category_page.'/db_config.php') && copy('../candidate-job.php', '../'.$category_page.'/'.$sub_category_page.'/index.php') && copy('../htfile/.htaccess', '../'.$category_page.'/'.$sub_category_page.'/.htaccess') && copy('../htfile/web.config', '../'.$category_page.'/'.$sub_category_page.'/web.config') ){
		  	$sql="INSERT into sub_category(category_id,sub_category_name) values ('$category','$subc_name')";
			$res=mysqli_query($conn,$sql) or die(mysqli_error());
			if($res)
			{ echo "<script>alert('sub Category created successfully...');
                            location.replace('sub-category.php');
                        </script>
                    ";
			}
	     } else{
                echo "
                    <script>
                        alert('Something went wrong, Please try again...');
                        location.replace('sub-category.php');
                    </script>
                ";
            }
        } else{
                echo "
                    <script>
                        alert('Something went wrong, Please try again...');
                        location.replace('sub-category.php');
                    </script>
                ";
            }
    } else{
        echo "
            <script>
                alert('Sub Category name already exists, Please change the name and try again...');
                location.replace('sub-category.php');
            </script>
        ";
    }
}


if(isset($_POST['update']))
{
    //var_dump($_FILES);exit();
extract($_POST);
$id=$_POST["cat_id"];
$cat_name=$_POST["cat_name"];
$sql_cat="SELECT * from category where id='".$cat_name."'";
$exe_cat=mysqli_query($conn,$sql_cat);
$res_cat=mysqli_fetch_array($exe_cat);
//$category_page=$res_cat['cat_name'];
$category_page = strtolower(str_replace(" ", "-", $res_cat['cat_name']));
$subcategory_old_page = strtolower(str_replace(" ", "-", $old_subcat_name));
$subcategory_new_page = strtolower(str_replace(" ", "-", $subcat_name));
//if(!file_exists('../'.$category_new_page)) {
if(!file_exists('../'.$category_page.'/'.$subcategory_new_page)){	
if(file_exists('../'.$category_page.'/'.$subcategory_old_page)){	
//if(file_exists('../'.$category_old_page)){
  if(rename("../$category_page/$subcategory_old_page", "../$category_page/$subcategory_new_page")){
    $sql1 ="UPDATE  sub_category  SET category_id='$cat_name',sub_category_name='$subcat_name' WHERE id='$id'";  
    $res=mysqli_query($conn,$sql1) or die(mysqli_error());
   
 } else{
        echo "
            <script>
                alert('Something went wrong, Please try again...');
                location.replace('sub-category.php');
            </script>
        ";
 }
} else{
 if(mkdir('../'.$category_page.'/'.$subcategory_new_page, 0777, true)){
    if(copy('../includes/css.php', '../'.$category_page.'/'.$subcategory_new_page.'/css.php') && copy('../includes/js.php', '../'.$category_page.'/'.$subcategory_new_page.'/js.php') && copy('../includes/header.php', '../'.$category_page.'/'.$subcategory_new_page.'/header.php') && copy('../includes/footer.php','../'.$category_page.'/'.$subcategory_new_page.'/footer.php') && copy('../includes/db_config.php', '../'.$category_page.'/'.$subcategory_new_page.'/db_config.php') && copy('../candidate-job.php', '../'.$category_page.'/'.$subcategory_new_page.'/index.php') && copy('../htfile/.htaccess', '../'.$category_page.'/'.$subcategory_new_page.'/.htaccess') && copy('../htfile/web.config', '../'.$category_page.'/'.$subcategory_new_page.'/web.config')){
        $sql1 ="UPDATE  sub_category  SET category_id='$cat_name',sub_category_name='$subcat_name' WHERE id='$id'";  
        $res=mysqli_query($conn,$sql1) or die(mysqli_error());
       /**/
        } else{
            echo "
                <script>
                    alert('Something went wrong, Please try again...');
                    location.replace('sub-category.php');
                </script>
            ";
        }
    } else{
            echo "
                <script>
                    alert('Something went wrong, Please try again...');
                    location.replace('sub-category.php');
                </script>
            ";
        }
   }
} else{
    echo "
        <script>
            alert('Sub Category name already exists, Please change the name and try again...');
            location.replace('sub-category.php');
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
								<h3 class="box-title">Sub-Category</h3>
							</div>
							<!-- /.box-header -->
							<div class="box-body table-responsive">
								<table class="table table-bordered example2">
									<thead>
										<tr>
											<th>S. No</th>
											<th>Category</th>
											<th>Sub-Category</th>
											<th>Edit</th>
											<th>Delete</th>
										</tr>
									</thead>
									<tbody>
										<tr>
												<?php
									$sql="select sub_category.*,category.cat_name from sub_category join category on sub_category.category_id=category.id";
									$result = mysqli_query($conn, $sql);

									 $j=1;// 8.Jh- Include pagination
									while($res= mysqli_fetch_array($result))// 7.Jh- Add loop to appling step 5 means selected coloumns 
									{ 
									?>
											<tr>
											<td><?php echo $j; $j++; ?></td>
											<td><?php echo $res['cat_name']; ?></td> 
											<td><?php echo $res['sub_category_name']; ?></td> 
											<!-- <td><img src="product/subcat/<?php echo $res['sub_categoryimg']; ?>" width="40px"></td> 
											<td><img src="product/subcat/<?php echo $res['subcat_banner']; ?>" width="40px"></td> --> 
											<td><input type="button" name="edit" value="Edit" id="<?php echo $res["id"]; ?>" class="btn btn-md btn-success edit_data" /></td> 
											 <td><a href="javascript:delete_subcat_by_ID('<?php echo $res['id'] ?>','<?php echo $res['cat_name'] ?>', '<?php echo $res['sub_category_name'] ?>');" class="ask"><i class="fa fa-trash-o"></i></a></td>
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
								<h3 class="box-title">Add New Sub-Category</h3>
							</div>
							<div class="box-body">
								<form method="post" action="" enctype="multipart/form-data">
									<div class="form-group">
										<label>Category:</label>
										<div class="input-group">
											<div class="input-group-addon">
												<i class="fa fa-suitcase"></i>
											</div>
											<select name="category" class="form-control">
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
										<label>Sub Category:</label>
										<div class="input-group">
											<div class="input-group-addon">
												<i class="fa fa-suitcase"></i>
											</div>
											<input type="text" name="sub_name" class="form-control" placeholder="Enter Sub-Category Name">
										</div>
									</div>

									<!-- <div class="form-group">
										<label>Sub Category Image :<span class="text-red">Size : 500px X 407px</span></label>
										<div class="input-group">
											<div class="input-group-addon">
												<i class="fa fa-suitcase"></i>
											</div>
											<input type="file" name="subcat_img" class="form-control" placeholder="Category">
										</div>
									</div>
									<div class="form-group">
										<label>Sub Category Banner :<span class="text-red">Size : 950px X 100px</span></label>
										<div class="input-group">
											<div class="input-group-addon">
												<i class="fa fa-suitcase"></i>
											</div>
											<input type="file" name="subcat_banner" class="form-control" placeholder="Category">
										</div>
									</div> -->
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
			                     <h4 class="modal-title">Update Sub Category</h4>  
			                </div>  
			                  <form method="post" id="insert_form" enctype="multipart/form-data">  
			                <div class="modal-body">  
			                          <label> Category</label>  
			                         	<select name="cat_name" id="cat_name" class="form-control">
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
			                         <div class="form-group">

			                          <label>Sub Category </label>  
			                          <input type="text" name="subcat_name" id="subcat_name" class="form-control" placeholder=" ">
			                          <input type="hidden" name="old_subcat_name" id="old_subcat_name" class="form-control" placeholder=" ">
			                      </div>
								<!-- <div class="form-group">
									   <label>Sub Category Image: <span class="text-red">Size : 500px X 407px</span></label>  
                                  <input type="file" name="subcat_img" class="form-control" placeholder=" Photo">
								</div> 	
								<div class="form-group">
									   <label>Sub Category Banner:<span class="text-red">Size : 950px X 100px</span></label>  
                                  <input type="file" name="subcat_bnimg" class="form-control" placeholder=" Photo">
								</div> --> 	
			                    <input type="hidden" name="cat_id" id="cat_id" />  
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

	</script>
</body>

<script language="javascript">
 $(document).ready(function(){  
      $(document).on('click', '.edit_data', function(){  
           var scat_id = $(this).attr("id");  
           $.ajax({  
                url:"edit_subcat.php",  
                method:"POST",  
                data:{scat_id:scat_id},  
                dataType:"json",  
                success:function(data){  
                     $('#cat_name').val(data.category_id); 
                     $('#subcat_name').val(data.sub_category_name); 
                     $('#old_subcat_name').val(data.sub_category_name); 
                     $('#cat_id').val(data.id);  
                     $('#insert').val("Update");  
                     $('#add_data_Modal').modal('show');  
                }  
           });  
      });  
     
 });  
/*function delete_subcat_by_ID(id)
{
	if (confirm('Do You Want to Deleting This \nContinue anyway?')) {
		window.location.href = 'delete_subcategory.php?id=' + id;
	}
}*/
</script>
<script type="text/javascript">
    function delete_subcat_by_ID(id, name, sub_name)
{
    if (confirm('Do You Want to Deleting This \nContinue anyway?')) {
        window.location.href = 'delete_subcategory.php?id=' + id + '&name=' + name + '&sub_name=' + sub_name;
    }
}
</script>

</html>
