<?php include("includes/css.php");

$sql="select sub_category.sub_category_name,category.cat_name,sub_sub_category.sub_sub_cat_name,product.* from product join category on product.category_id=category.id join sub_category on product.sub_category_id=sub_category.id join sub_sub_category on product.sub_sub_cat_id=sub_sub_category.id ";
$result = mysqli_query($conn, $sql);


if(isset($_POST['Search']))
{
//var_dump($_POST);exit();
extract($_POST);
$prd_name=$_POST["prd_name"];
 $sql_prd="select sub_category.sub_category_name,category.cat_name,sub_sub_category.sub_sub_cat_name,product.* from product join category on product.category_id=category.id join sub_category on product.sub_category_id=sub_category.id join sub_sub_category on product.sub_sub_cat_id=sub_sub_category.id where product.prod_name='$prd_name,added_by='admin''";
$result=mysqli_query($conn,$sql_prd) or die(mysqli_error());
}

if(isset($_POST['delete']))
{
$checkbox = $_POST['checkbox'];
for($i=0;$i<count($checkbox);$i++){
$del_id = $checkbox[$i];
$sql = "DELETE FROM product WHERE id='$del_id'";
$res=mysqli_query($conn,$sql1) or die(mysqli_error());

}
if($result){
//echo "<meta http-equiv=\"refresh\" content=\"0;URL=view_links.php\">";
}
 } 

?>

<body class="hold-transition skin-blue sidebar-mini">
	<div class="wrapper">
		<?php include("includes/header.php");?>
		<?php include("includes/sidebar.php");?>
		<div class="content-wrapper">
			<!-- Content Header (Page header) -->
			<section class="content-header">
				<h1>
					Dashboard
					<small>Control panel</small>
				</h1>
				<ol class="breadcrumb">
					<li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
					<li class="active">Dashboard</li>
				</ol>
			</section>
			<!-- Main content -->
			<section class="content">
				<div class="row">
					<div class="col-xs-12">
						<div class="box box-danger">
							<div class="box-header">
								<div class="row">
									<div class="col-md-4">
										<h3 class="box-title">Property Details</h3>
									</div>
									<div class="col-md-2 pull-right"><a href="add-product.php"><button class="btn btn-flat btn-custom2 btn-block"><i class="fa fa-plus"></i> Add New Property</button></a></div>
								</div>
							</div>
							<div class="box-body">
								<div class="bb-2"></div>
								<div class="table-responsive">
									<table class="table table-bordered table-striped example3">	
										<thead>
											<tr>
												<th>All</th>
												<th>Sr. No</th>
												<th>Category</th>
												<th>Sub Category</th>
												<th>Sub Sub Category</th>
												<th>Property Id</th>
												<th>Property Name</th>
												<th>View</th>
												<th>Edit</th>
												<th>Delete</th>
											</tr>
										</thead>

										<tbody>
											<?php
											 $j=1;
											while($res= mysqli_fetch_array($result))
											{ 
											?>
											<tr>
												<td align="center" bgcolor="#FFFFFF"><input name="checkbox[]" type="checkbox" value="<?php echo $res['id']; ?>"></td>
											   <td><?php echo $j; $j++; ?></td>
											   <td><?php echo $res['cat_name']; ?></td> 
											   <td><?php echo $res['sub_category_name']; ?></td> 
											   <td><?php echo $res['sub_sub_cat_name']; ?></td> 
											   <td><?php echo $res['property_id']; ?></td> 
											   <td><?php echo $res['prod_name']; ?></td> 
											  
												<td><a href="view-property-details.php?id=<?php echo $res['id']; ?>"><i class="fa fa-eye"></i></a></td>
												<td><a href="edit-product-details.php?id=<?php echo $res['id']; ?>"><i class="fa fa-pencil"></i></a></td>
												 <td><a href="javascript:delete_prod_by_ID('<?php echo $res['id']; ?>','<?php echo $res['cat_name'] ?>','<?php echo $res['sub_category_name'] ?>','<?php echo $res['sub_sub_cat_name'] ?>','<?php echo $res['prod_name'] ?>');" class="ask"><i class="fa fa-trash-o"></i></a></td>
											</tr>
										<?php } ?>
										</tbody>
										<tfoot>
											<tr>
												<td colspan="12"><input type="button" id="btn_delete" name="delete" class="btn btn-success btn-sm pull-right" value="Delele Products"></td>
												<!-- <td colspan="2"></td> -->
											</tr>

										</tfoot>
										 </form>
									</table>
								</div>
							</div>
							
						</div>
						
					</div>
					
				</div>
				
			</section>
			
		</div>
		
		<?php include("includes/footer.php");?>
		<div class="control-sidebar-bg"></div>
	</div>
	<?php include("includes/js.php");?>
</body>

 <script>

 	$(document).ready(function(){
 
 $('#btn_delete').click(function(){
  
  if(confirm("Are you sure you want to delete this?"))
  {
   var id = [];
   
   $(':checkbox:checked').each(function(i){
    id[i] = $(this).val();
   });
   
   if(id.length === 0) //tell you if the array is empty
   {
    alert("Please Select atleast one checkbox");
   }
   else
   {
    $.ajax({
     url:'all_product_delete.php',
     method:'POST',
     data:{id:id},
     success:function(data)
     {
          $("#row" + id).remove();
            alert('Post Deleted!');
        },
        error: function () {
            alert('Error Deleting Post');
        } 
     
    });
   }
   
  }
  else
  {
   return false;
  }
 });
 
});
     function UpdateRecord(id){
                    var status= $("#prod_status").val();   $.ajax({
                        type: "POST",
                        url: "status_update.php",
                        data: "id=" + id+ "&status=" + status,
                        success: function(data) {
                           alert("sucess");
                           //alert(data);
                          // console.log(data);
                        }
                    });
                     }

         function delete_prod_by_ID(id,name,sub_name,prod_name)
		{
			if (confirm('Do You Want to Deleting This \nContinue anyway?')) {
				window.location.href = 'delete_product.php?id=' + id + '&name=' + name + '&sub_name=' + sub_name +  '&prod_name=' + prod_name;
			}
		}

    </script>

</html>
