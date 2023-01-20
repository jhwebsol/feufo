<?php include("includes/css.php");
$sql="select sub_category.sub_category_name,category.cat_name,property_services.* from property_services join category on property_services.category_id=category.id join sub_category on property_services.sub_category_id=sub_category.id ";
$result = mysqli_query($conn, $sql);

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
if(isset($_GET['deleteimg1']))
{
 $deleteimg1=$_GET['deleteimg1'];
 $image_ban="";
$sql=mysqli_query($conn, "UPDATE property_services SET  img='$image_ban'
             WHERE  id = '".$deleteimg1."' ")or die(mysqli_error($conn));
echo "<script>document.location.href='property-services.php'</script>";

}
if(isset($_GET['deleteimg2']))
{
$deleteimg2=$_GET['deleteimg2']; 
$image_ban2="";
$sql=mysqli_query($conn, "UPDATE property_services SET  img2='$image_ban2'
             WHERE  id = '".$deleteimg2."' ")or die(mysqli_error($conn));
echo "<script>document.location.href='property-services.php'</script>";

}
if(isset($_GET['deleteimg3']))
{
$deleteimg3=$_GET['deleteimg3'];
$image_ban3="";
$sql=mysqli_query($conn, "UPDATE property_services SET  img3='$image_ban3'
             WHERE  id = '".$deleteimg3."' ")or die(mysqli_error($conn));
echo "<script>document.location.href='property-services.php'</script>";

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
										<h3 class="box-title">Property Services Details</h3>
									</div>
									<div class="col-md-2 pull-right"><a href="add-property.php"><button class="btn btn-flat btn-custom2 btn-block"><i class="fa fa-plus"></i> Add Property </button></a></div>
								</div>
							</div>
							<div class="box-body">
								<div class="bb-2"></div>
								<div class="table-responsive">
									<table class="table table-bordered table-striped example3">	
										<thead>
											<tr>
												<th>Sr. No</th>
												<th>Category</th>
												<th>Sub Category</th>
												<th>Sub Sub Category</th>
												<th>Details</th>
												<th>Banner</th>
												<th>Edit</th>
												<th>Delete</th>
											</tr>
										</thead>

										<tbody>
											<?php
											 $j=1;
											while($res= mysqli_fetch_array($result))
											{ $sub_sub_cat_id=$res['sub_sub_cat_id'];
											 $sql_sscat=mysqli_query($conn,"SELECT * from sub_sub_category where id='$sub_sub_cat_id'");
                                              $res_sscat=mysqli_fetch_array($sql_sscat); ?>
											<tr>
											   <td><?php echo $j; $j++; ?></td>
											   <td><?php echo $res['cat_name']; ?></td> 
											   <td><?php echo $res['sub_category_name']; ?></td> 
											   <td><?php echo $res_sscat['sub_sub_cat_name']; ?></td> 
											   <!-- <td><img src="img/service/<?php echo $res['img']; ?>" width="40px"> <a href="property-services.php?deleteimg1=<?php echo $res['id']; ?>&delete=command"><i class="fa fa-trash-o"></i></a></td> 
											<td><img src="img/service/<?php echo $res['img2']; ?>" width="40px"> <a href="property-services.php?deleteimg2=<?php echo $res['id']; ?>&delete=command"><i class="fa fa-trash-o"></i></a></td> 
											<td><img src="img/service/<?php echo $res['img3']; ?>" width="40px"> <a href="property-services.php?deleteimg3=<?php echo $res['id']; ?>&delete=command"><i class="fa fa-trash-o"></i></a></td> 
											 -->
											   <td><div style="height:250px; overflow:auto"><?php echo html_entity_decode($res['prod_desp']); ?></div></td> 
											   <td><img src="product/<?php echo $res['img']; ?>" width="40px"> </td>
											   <td><a href="edit-property-service.php?id=<?php echo $res['id']; ?>"><i class="fa fa-pencil"></i></a></td>
											   <td><a href="javascript:delete_prod_by_ID('<?php echo $res['id']; ?>');" class="ask"><i class="fa fa-trash-o"></i></a></td>
											</tr>
										<?php } ?>
										</tbody>
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

         function delete_prod_by_ID(id)
		{
			if (confirm('Do You Want to Deleting This \nContinue anyway?')) {
				window.location.href = 'delete_product.php?id=' + id;
			}
		}

    </script>

</html>
