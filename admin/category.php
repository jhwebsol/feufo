<?php include("includes/css.php");
if (isset($_POST['submit'])) {
extract($_POST);  
 $category_page = strtolower(str_replace(" ", "-", $category));
     if(!file_exists('../'.$category_page)) {
        if(mkdir('../'.$category_page, 0777, true)){
            if(copy('../includes/css.php', '../'.$category_page.'/css.php') ){
			   /* $tmp_file = $_FILES['cat_img']['tmp_name'];
			    $ext = pathinfo($_FILES["cat_img"]["name"], PATHINFO_EXTENSION);
			    $rand = md5(uniqid().rand());
			    $cat_image = $rand.".".$ext;
			    move_uploaded_file($tmp_file,"product/category/".$cat_image);

			    $tmp_file = $_FILES['cat_banner_img']['tmp_name'];
			    $ext = pathinfo($_FILES["cat_banner_img"]["name"], PATHINFO_EXTENSION);
			    $rand = md5(uniqid().rand());
			    $cat_bnimage = $rand.".".$ext;
			    move_uploaded_file($tmp_file,"product/category/".$cat_bnimage);*/
			$sql="INSERT into category(cat_name) values ('$category')";
			$res=mysqli_query($conn,$sql) or die(mysqli_error());
            if($res)
                {
                    echo "
                        <script>
                            alert('Category created successfully...');
                            location.replace('category.php');
                        </script>
                    ";
                }
            } else{
                echo "
                    <script>
                        alert('Something went wrong, Please try again...');
                        location.replace('category.php');
                    </script>
                ";
            }
        } else{
                echo "
                    <script>
                        alert('Something went wrong, Please try again...');
                        location.replace('category.php');
                    </script>
                ";
            }
    } else{
        echo "
            <script>
                alert('Category name already exists, Please change the name and try again...');
                location.replace('category.php');
            </script>
        ";
    }
}

if(isset($_POST['update']))
{
    //var_dump($_FILES);exit();
extract($_POST);
$id=$_POST["cat_id"];
$category_old_page = strtolower(str_replace(" ", "-", $old_cat_name));
$category_new_page = strtolower(str_replace(" ", "-", $cat_name));
if(!file_exists('../'.$category_new_page)) {
if(file_exists('../'.$category_old_page)){
    if(rename("../$category_old_page", "../$category_new_page")){
        $sql1 ="UPDATE  category  SET cat_name='$cat_name'  WHERE id='$id'"; 
        $res=mysqli_query($conn,$sql1) or die(mysqli_error());
       
    } else{ exit();
            echo "
                <script>
                    alert('Something went wrong, Please try again...');
                    location.replace('category.php');
                </script>
            ";
	    }
	} else{
            if(mkdir('../'.$category_new_page, 0777, true)){
                if(copy('../includes/css.php', '../'.$category_new_page.'/css.php') ){
                    $sql1 ="UPDATE  category  SET cat_name='$cat_name'  WHERE id='$id'"; 
                    $res=mysqli_query($conn,$sql1) or die(mysqli_error());
                   /* if($res){
				  $sqlg = "SELECT * from category where id = $id";
				  $resultg = mysqli_query($conn,$sqlg) or die(mysqli_error());
				  $resg = mysqli_fetch_object($resultg);
				  
				  if($_FILES["cat_img"]["name"] != ""){
					$oname=$_FILES["cat_img"]["name"];
					$pos = strrpos($oname, ".");
					$extension=substr($oname,$pos+1);
					$tn = $_FILES["cat_img"]["tmp_name"];
					$path = "product/category/".$resg->id.'32'.'.'.$extension;
					$upath = "product/category/".$resg->cat_image;
					unlink($upath);
					 move_uploaded_file($tn,$path);
					  $image = $resg->id.'32'.'.'.$extension;
					} else {
					  $image = $resg->cat_image;
					}

					 if($_FILES["cat_banner_imag"]["name"] != ""){
						$oname=$_FILES["cat_banner_imag"]["name"];
						$pos = strrpos($oname, ".");
						$extension=substr($oname,$pos+1);
						$tn = $_FILES["cat_banner_imag"]["tmp_name"];
						$path = "product/category/".$resg->id.'66'.'.'.$extension;
						$upath = "product/category/".$resg->cat_banner;
						unlink($upath);
						 move_uploaded_file($tn,$path);
						 $image_bn = $resg->id.'66'.'.'.$extension;
						} else {
						  $image_bn = $resg->cat_banner;
						} 
				$sqlup = "UPDATE category SET  cat_image =  '$image', cat_banner =  '$image_bn'
							 WHERE  id = $resg->id";
					$resultup = mysqli_query($conn,$sqlup) or die(mysqli_error());
				}*/
                } else{ exit();
                    echo "
                        <script>
                            alert('Something went wrong, Please try again...');
                            location.replace('category.php');
                        </script>
                    ";
                }
            } else{ exit();
                    echo "
                        <script>
                            alert('Something went wrong, Please try again...');
                            location.replace('category.php');
                        </script>
                    ";
                }
        }
    } else{
        echo "
            <script>
                alert('Category name already exists, Please change the name and try again...');
                location.replace('category.php');
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
					<div class="col-md-6">
						<div class="box box-danger">
							<div class="box-header with-border">
								<h3 class="box-title">Category</h3>
							</div>
							<!-- /.box-header -->
							<div class="box-body table-responsive">
								<table class="table table-bordered example2">
									<thead>
										<tr>
											<th>S. No</th>
											<th>Category</th>
											<th>Edit</th>
											<th>Delete</th>
										</tr>
									</thead>
									<tbody>
									<?php
									$sql="select * from category";
									$result = mysqli_query($conn, $sql);
									 $j=1;
									while($res= mysqli_fetch_array($result))
									{ 
									?>
										<tr>
											<td><?php echo $j; $j++; ?></td>
											<td><?php echo $res['cat_name']; ?></td> 
											
											<td><input type="button" name="edit" value="Edit" id="<?php echo $res["id"]; ?>" class="btn btn-md btn-success edit_data" /></td> 
											 <td><a href="javascript:delete_cat_by_ID('<?php echo $res['id'] ?>','<?php echo $res['cat_name']; ?>');" class="ask"><i class="fa fa-trash-o"></i></a></td>
										</tr>
										<?php } ?>
									</tbody>
								</table>
							</div>
							
						</div>
					</div>
					<div class="col-md-6">
						<div class="box box-danger">
							<div class="box-header">
								<h3 class="box-title">Add New Category</h3>
							</div>
							<div class="box-body">
								<form method="post" action="" enctype="multipart/form-data">
									<div class="form-group">
										<label> Category :</label>
										<div class="input-group">
											<div class="input-group-addon">
												<i class="fa fa-suitcase"></i>
											</div>
											<input type="text" name="category" class="form-control" placeholder="Category">
										</div>
									</div>
									<!-- <div class="form-group">
										<label> Category Image :</label>
										<div class="input-group">
											<div class="input-group-addon">
												<i class="fa fa-suitcase"></i>
											</div>
											<input type="file" name="cat_img" class="form-control" placeholder="Category">
										</div>
									</div>
                                   <div class="form-group">
										<label> Category Banner :<span class="text-red">Size : 950px X 100px</span></label>
										<div class="input-group">
											<div class="input-group-addon">
												<i class="fa fa-suitcase"></i>
											</div>
											<input type="file" name="cat_banner_img" class="form-control" placeholder="Category">
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
				<!-- Modal Category --> 
				<div id="add_data_Modal" class="modal fade">  
      <div class="modal-dialog">  
           <div class="modal-content">  
                <div class="modal-header">  
                     <button type="button" class="close" data-dismiss="modal">&times;</button>  
                     <h4 class="modal-title">Update Category</h4>  
                </div>  
                 <form method="post" id="insert_form" enctype="multipart/form-data">  
                <div class="modal-body">  
                    
                          <div class="form-group">
                          <label>Category</label>  
                          <input type="text" name="cat_name" id="cat_name" class="form-control" placeholder="Category Name">
                          <input type="hidden" name="old_cat_name" id="old_cat_name" class="form-control" placeholder="Category Name">
                          </div>
                         <!-- <div class="form-group">
                         <label>Category Image</label>  
                          <input type="file" name="cat_img" class="form-control" placeholder=" Photo">
						 </div> 

                           <div class="form-group">
                         <label>Category Banner:<span class="text-red">Size : 500px X 407px</span></label>  
                          <input type="file" name="cat_banner_imag" class="form-control" placeholder=" Photo">
						 </div>  -->
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
			<!-- ./Modal Category -->
			</section>
		</div>
		<?php include("includes/footer.php")?>
	</div>
	<?php include("includes/js.php")?>
<script language="javascript">
 $(document).ready(function(){ 
      $(document).on('click', '.edit_data', function(){  
           var cat_id = $(this).attr("id");  
           $.ajax({  
                url:"edit_category.php",  
                method:"POST",  
                data:{cat_id:cat_id},  
                dataType:"json",  
                success:function(data){  
                     $('#cat_name').val(data.cat_name); 
                     $('#old_cat_name').val(data.cat_name); 
                     $('#cat_id').val(data.id);  
                     $('#insert').val("Update");  
                     $('#add_data_Modal').modal('show');  
                }  
           });  
      });  
     
 });  

function delete_cat_by_ID(id , cat_name)
{
	if (confirm('Do You Want to Deleting This \nContinue anyway?')) {
		window.location.href = 'delete_category.php?id=' + id + '&cat_name=' + cat_name ;
	}
}
</script>
</body>
</html>