
<?php 
include("includes/db_config.php");
$id=$_GET["id"];

$sql="select sub_category.sub_category_name,category.cat_name,sub_sub_category.sub_sub_cat_name,product.* from product join category on product.category_id=category.id join sub_category on product.sub_category_id=sub_category.id join sub_sub_category on product.sub_sub_cat_id=sub_sub_category.id where product.id='$id'";
$result = mysqli_query($conn, $sql);


if(isset($_POST['add']))
{
	//var_dump($_POST);exit();
extract($_POST);
$id=$_GET["id"];
 $sql_prd="INSERT into product_detail(prod_id,total_no_prod_quantity,prod_quantity,prod_quantity_type,prod_discount,prod_price,prod_cross_price) values ('$id','$total_no_prod_qua','$prod_quantity','$prod_quantity_type','$prod_discount','$prod_price','$prod_cross_price')";
       $prd_res=mysqli_query($conn, $sql_prd) or die(mysqli_error());
}

if(isset($_POST['update']))
{
	//var_dump($_POST);exit();
extract($_POST);
$id=$_POST["prd_id"];
$sql1 ="UPDATE  product_detail  SET total_no_prod_quantity='$total_no_prod_qua',prod_quantity='$prod_quantity',prod_quantity_type='$prod_quantity_type',prod_discount='$prod_discount',prod_price='$prod_price',prod_cross_price='$prod_cross_price' WHERE id='$id'"; 
$res=mysqli_query($conn,$sql1) or die(mysqli_error());
}



?>

<!DOCTYPE html>
<html lang="en-IN">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Feufo</title>
	<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
	<?php include("includes/css.php")?>
</head>

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
										<h3 class="box-title">View Product Details</h3>
									</div>
									<div class="col-md-1 pull-right"><a href="products.php"><button class="btn btn-flat btn-custom2 btn-block"><i class="fa fa-arrow-left"></i> Back</button></a> </div>
								</div>
							</div>
							<div class="box-body">
								<div class="nav-tabs-custom">
									<div class="table-responsive">
										<table class="table table-bordered">
											<thead></thead>
											<tbody>
												<?php
											 $j=1;
											while($res= mysqli_fetch_array($result))
											{ 
											?>
												<tr>
													<th>Category</th>
													 <td><?php echo $res['cat_name']; ?></td>
													<th>Sub Category:</th>
													  <td><?php echo $res['sub_category_name']; ?></td> 
												</tr>
												<tr>
													<th>Sub-Sub-Category:</th>
													 <td><?php echo $res['sub_sub_cat_name']; ?></td> 
													<th>Product Code:</th>
													 <td><?php echo $res['prod_code']; ?></td> 
												</tr>
												<tr>
													<th>Product Name:</th>
													<td><?php echo $res['prod_name']; ?></td> 
												
													<th>Brand:</th>
													<td><?php echo $res['prod_brand']; ?></td> 
												</tr>
												<tr>
													<th>Teast Type:</th>
													<td><?php echo $res['prod_test_type']; ?></td> 
													<th>Discription:</th>
													<td><?php echo $res['prod_desp']; ?></td> 
												</tr>
												<tr>	
													<th>Note: </th>
													<td><?php echo $res['note']; ?></td> 
												
													<th>How To Use:</th>
													<td><?php echo $res['how_to_use']; ?></td> 
												</tr>
												<tr>	
													<th>Title: </th>
													<td><?php echo $res['title']; ?></td> 
												
													<th>Meta Keyword:</th>
													<td><?php echo $res['meta_keyword']; ?></td> 
												</tr>
												<tr>
													<th>Product Imges 1:</th>
													<td> <a href="" data-toggle="modal" data-target="#myModal"><img src="product/<?php echo $res['prod_img1']; ?>" width="140px"></a></td>
													<th>Product Imges 2 : </th>
													<td><a href="" data-toggle="modal" data-target="#myModal"><img src="product/<?php echo $res['prod_img2']; ?>"width="140px"></a></td>
												</tr>
												<tr>
													<th>Product Imges 3:</th>
													<td> <a href="" data-toggle="modal" data-target="#myModal"><img src="product/<?php echo $res['prod_img3']; ?>"width="140px"></a></td>
													<th>Product Imges 4 : </th>
													<td><a href="" data-toggle="modal" data-target="#myModal"><img src="product/<?php echo $res['prod_img4']; ?>" width="140px"></a></td>
												</tr>
												<tr>
													<th>Product Imges 5:</th>
													<td colspan="3"> <a href="" data-toggle="modal" data-target="#myModal"><img src="product/<?php echo $res['prod_img5']; ?>" width="140px"></a></td>
												</tr>
											<?php } ?>



												<tr>
													<th colspan="4" style="background-color: #e8d8a7;"><h3 class="text-center mt-10 mb-10"> Product Details</h3></th> 
												</tr>
                        <td class="pull-right" colspan="4"> <button type="button" class="btn btn-md btn-success " data-toggle="modal" data-target="#myModal">Add</button></td>  
                                           <?php     
                                             $sql_prd="select * from product_detail where product_detail.prod_id={$_GET["id"]}";
                                         $res_prd = mysqli_query($conn, $sql_prd);
                                         while($res1= mysqli_fetch_array($res_prd))
											{  ?>
												<tr>
												<th colspan="4" style="height:1px; background-color: #e96125;"></th> 
												</tr>
												<tr>
												<td class="pull-right" colspan="4"><input type="button" name="edit" value="Edit" id="<?php echo $res1["id"]; ?>" class="btn btn-md btn-success edit_data" />

												 <a href="javascript:delete_prd_by_ID('<?php echo $res1['id'] ?>');" class="ask"><i class="fa fa-trash-o"></i></a></td>  
												 <?php if(!empty($res1['seller_id'])){ ?>
												<th class="pull-right" colspan="4">Added By Seller</th>  
												<?php } ?> 
                        </tr>
                        </tr>
                         <?php if(!empty($res1['seller_id'])){
                        	$seller_id=$res1['seller_id'];
                        	$sql_sel="select * from seller_profile where seller_profile.id='".$seller_id."'";
                     $ress_sel = mysqli_query($conn, $sql_sel);
                     while($res_sel= mysqli_fetch_array($ress_sel)) { ?>
												<tr>
													<th>Seller Name:</th>
													<td><?php echo $res_sel['name']; ?></td> 
													<th>firm name:</th>
													<td><?php echo $res_sel['firm_name']; ?></td> 
												</tr>
											    <?php } } ?>
												<tr>
													<th>Total No. Of Product Quantity:</th>
													<td><?php echo $res1['total_no_prod_quantity']; ?></td> 
													<th>Product Quantity:</th>
													<td><?php echo $res1['prod_quantity']; ?></td> 
												</tr>
												<tr>
													<th>Product Quantity Type:</th>
													<td><?php echo $res1['prod_quantity_type']; ?></td> 
												
													<th>Product Price(Per Piece):</th>
													<td><?php echo $res1['prod_price']; ?></td> 
												</tr>
												<tr>
													<th>Discount </th>
													<td><?php echo $res1['prod_discount']; ?></td> 
													<th>Product Cross Price(Per Piece):</th>
													<td><?php echo $res1['prod_cross_price']; ?></td> 
												</tr>
												<?php } ?>
											</tbody>
											<tfoot>
												<tr>
													<td colspan="4"><a href="products.php"><button class="btn btn-flat btn-custom2 btn-md"><i class="fa fa-backward"></i> Back</button></a></td>
												</tr>
											</tfoot>
										</table> 
									</div>
								</div>
							</div>							
						</div>						
					</div>					
				</div>
							</section>
				</div>
		
		<!-- Modal Category --> 
			<div id="add_data_Modal" class="modal fade">  
		      <div class="modal-dialog">  
		           <div class="modal-content">  
		                <div class="modal-header">  
		                     <button type="button" class="close" data-dismiss="modal">&times;</button>  
		                     <h4 class="modal-title">Update Products Details</h4>  
		                </div>  
		                <div class="modal-body">  
		                     <form method="post" name="frm" id="insert_form">  
		                          
		                          <label>Total No. Of Product Quantity</label>  
		                         <input type="text" name="total_no_prod_qua" id="total_no_prod_qua" class="form-control" placeholder="Category Name">
		                          </br>

		                        <label>Product Quantity</label>  
		                         <input type="text" name="prod_quantity" id="prod_quantity" class="form-control" placeholder="Category Name">
		                          </br>

		                        <label>Product Quantity Type</label>  
		                         <input type="text" name="prod_quantity_type" id="prod_quantity_type" class="form-control" placeholder="Category Name">
		                          </br>
		                           <label>Product MRP</label>  
		                         <input type="text" name="prod_cross_price" onchange="Adder()"  id="prod_cross_price" class="form-control" placeholder="Category Name">
		                          </br>


		                        <label>Discount</label>  
		                         <input type="text" name="prod_discount" onchange="Adder()"  id="prod_discount" class="form-control" placeholder="Category Name">
		                          </br>

		                       
		                        <label>Our Price </label>  
		                         <input type="text" name="prod_price" id="prod_price" class="form-control" placeholder="Category Name">
		                          </br>

		                      

		                          <input type="hidden" name="prd_id" id="prd_id" />  
		                          <input type="submit" name="update" id="insert" value="Insert" class="btn btn-success" />  
		                     </form>  
		                </div>  
		                <div class="modal-footer">  
		                     <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>  
		                </div>  
		           </div>  
		      </div>  
		 </div>  
			<!-- ./Modal Category -->


			  <!-- The Modal -->
  <div class="modal" id="myModal">
    <div class="modal-dialog">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Add Products Details</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
         <form method="post" name="add" id="insert_form">  
		                          
		                          <label>Total No. Of Product Quantity</label>  
		                         <input type="text" name="total_no_prod_qua" class="form-control" placeholder="Enter Category No. Of Product Quantity">
		                          </br>

		                        <label>Product Quantity</label>  
		                         <input type="text" name="prod_quantity" id="prod_quantity" class="form-control" placeholder=" Enter Product Quantity">
		                          </br>

		                        <label>Product Quantity Type</label>  
		                         <select name="prod_quantity_type" class="form-control">
															<option>Gm</option>
															<option>ML</option>
															<option>KG</option>
															<option>Piece</option>
														</select>
		                          </br>
		                           <label>Product MRP</label>  
		                         <input type="text" name="prod_cross_price" onchange="Addprd()"  id="prodcross_price" class="form-control" placeholder="Enter Product MRP">
		                          </br>


		                        <label>Discount</label>  
		                         <input type="text" name="prod_discount" onchange="Addprd()"  id="proddiscount" class="form-control" placeholder="Enter Discount">
		                          </br>

		                       
		                        <label>Our Price </label>  
		                         <input type="text" name="prod_price" id="prodprice" class="form-control" placeholder="Enter Our Price">
		                          </br>
  
		                          <input type="submit" name="add" id="insert" value="Add" class="btn btn-success" />  
		                     </form>  
        </div>
       
      </div>
    </div>
  </div>
  
		<?php include("includes/footer.php");?>
		<div class="control-sidebar-bg"></div>
	</div>
	<?php include("includes/js.php");?>
</body>


<script language="javascript">
 $(document).ready(function(){  
      $(document).on('click', '.edit_data', function(){  
           var prd_id = $(this).attr("id");  
           $.ajax({  
                url:"get_prod_details.php",  
                method:"POST",  
                data:{prd_id:prd_id},  
                dataType:"json",  
                success:function(data){  
                     $('#total_no_prod_qua').val(data.total_no_prod_quantity); 
                     $('#prod_quantity').val(data.prod_quantity); 
                     $('#prod_quantity_type').val(data.prod_quantity_type); 
                    // $('#prod_price').val(data.prod_price); 
                     $('#prod_discount').val(data.prod_discount); 
                     $('#prod_cross_price').val(data.prod_cross_price); 
                     $('#prd_id').val(data.id);  
                     $('#insert').val("Update");  
                     $('#add_data_Modal').modal('show');  
                }  
           });  
      });  
     
 });  


function Adder()
		{
		var a= parseInt(document.frm.prod_cross_price.value);
		var b = parseInt(document.frm.prod_discount.value);
		var result=a/100 * b;
		var disprice=a - result;
       // alert(result);
		document.frm.prod_price.value=disprice;
		}

	function Addprd()
		{
		var a= parseInt(document.add.prodcross_price.value);
		var b = parseInt(document.add.proddiscount.value);
		var result=a/100 * b;
		var disprice=a - result;
       // alert(result);
		document.add.prodprice.value=disprice;
		}
function delete_prd_by_ID(id)
{
	if (confirm('Do You Want to Deleting This \nContinue anyway?')) {
		window.location.href = 'delete_prd.php?id=' + id;
	}
}

</script>

</html>
