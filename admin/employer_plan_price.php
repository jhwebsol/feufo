<?php include("includes/css.php");
if (isset($_POST['submit'])) {
extract($_POST);  
$sql="INSERT into employee_price(price) values ('$price')";
$res=mysqli_query($conn,$sql) or die(mysqli_error());
if($res)
{  echo "<script>
            alert('Added successfully...');
            location.replace('employer_plan_price.php');
        </script>";
}
}

if(isset($_POST['update']))
{
    //var_dump($_FILES);exit();
extract($_POST);
$id=$_POST["pid"];
$sql1 ="UPDATE  employee_price SET price='$price'  WHERE id='$id'"; 
$res=mysqli_query($conn,$sql1) or die(mysqli_error());
 if($res){
            echo "
                <script>
                    alert('Updated successfully.');
                    location.replace('employer_plan_price.php');
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
					<div class="col-md-12">
						<div class="box box-danger">
							<div class="box-header with-border">
								<h3 class="box-title">Employer Payble Price</h3>
							</div>
							<!-- /.box-header -->
							<div class="box-body table-responsive">
								<table class="table table-bordered example2">
									<thead>
										<tr>
											<th>S. No</th>
											<th>Category</th>
											<th>Edit</th>
											<!-- <th>Delete</th> -->
										</tr>
									</thead>
									<tbody>
									<?php
									$sql="select * from employee_price";
									$result = mysqli_query($conn, $sql);
									 $j=1;
									while($res= mysqli_fetch_array($result))
									{ ?>
										<tr>
											<td><?php echo $j; $j++; ?></td>
											<td><?php echo $res['price']; ?></td>
											<td><input type="button" name="edit" value="Edit" id="<?php echo $res["id"]; ?>" class="btn btn-md btn-success edit_data" /></td> 
											<!--  <td><a href="javascript:delete_cat_by_ID('<?php echo $res['id'] ?>');" class="ask"><i class="fa fa-trash-o"></i></a></td> -->
										</tr>
										<?php } ?>
									</tbody>
								</table>
							</div>
							
						</div>
					</div>
					<!-- <div class="col-md-6">
						<div class="box box-danger">
							<div class="box-header">
								<h3 class="box-title">Add Employer Payble Price</h3>
							</div>
							<div class="box-body">
								<form method="post" action="" enctype="multipart/form-data">
									<div class="form-group">
										<label> Price :</label>
										<div class="input-group">
											<div class="input-group-addon">
												<i class="fa fa-suitcase"></i>
											</div>
											<input type="text" name="price" class="form-control" placeholder="Category">
										</div>
									</div>
									<div class="form-group">
										<div class="input-group">
											<input type="submit" name="submit" class="btn btn-success btn-md" value="Submit">
										</div>
									</div>
								</form>
							</div>
							
						</div>
					</div> -->
				</div>
				<!-- Modal Category --> 
				<div id="add_data_Modal" class="modal fade">  
      <div class="modal-dialog">  
           <div class="modal-content">  
                <div class="modal-header">  
                     <button type="button" class="close" data-dismiss="modal">&times;</button>  
                     <h4 class="modal-title">Update Employer Payble Price</h4>  
                </div>  
                 <form method="post" id="insert_form" enctype="multipart/form-data">  
                     <div class="modal-body">
                        <div class="form-group">
                          <label>Price</label>  
                          <input type="text" name="price" id="price" class="form-control" placeholder="Price">
                          </div>
                          <input type="hidden" name="pid" id="pid" /> 
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
           var pid = $(this).attr("id");  
           $.ajax({  
                url:"edit_eprice.php",  
                method:"POST",  
                data:{pid:pid},  
                dataType:"json",  
                success:function(data){  
                     $('#price').val(data.price); 
                     $('#pid').val(data.id);  
                     $('#insert').val("Update");  
                     $('#add_data_Modal').modal('show');  
                }  
           });  
      });  
     
 });  

function delete_cat_by_ID(id)
{
	if (confirm('Do You Want to Deleting This \nContinue anyway?')) {
		window.location.href = 'delete_eprice.php?id=' + id;
	}
}
</script>
</body>
</html>