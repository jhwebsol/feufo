<?php include("includes/css.php");
if (isset($_POST['submit'])) {
 //var_dump($_FILES);exit();
extract($_POST);
date_default_timezone_set('Asia/Kolkata');
$datetime = date('Y-m-d H:i:s');
$prod_desp = htmlentities($_POST['prod_desp']);
$tmp_file = $_FILES['prod_img']['tmp_name'];
$ext = pathinfo($_FILES["prod_img"]["name"], PATHINFO_EXTENSION);
$rand = md5(uniqid().rand());
$prod_image1 = $rand.".".$ext;
move_uploaded_file($tmp_file,"img/".$prod_image1);
$sql="INSERT into service_details(title,service_img,description) values ('$serv_title','$prod_image1','$prod_desp')";
 if  (mysqli_query($conn, $sql)){
	 echo "<script>alert('Your service have added successfully!!!'); 
		                            location.replace('service-detail.php');
		                        </script>";
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
							<div class="box-header">
								<h3 class="box-title">Add Home Services</h3>
							</div>
							<div class="box-body">
								<form method="post" action="" enctype="multipart/form-data">
									<div class="form-group">
									    <div class="form-group">
											<label> Title</label>
											<div class="input-group">
												<div class="input-group-addon">
													<i class="fa fa-suitcase"></i>
												</div>
												<input type="text" name="serv_title" class="form-control" placeholder="Enter Title">
											</div>
									    </div>
										<div class="col-md-4">
											<label>  Images :</label>
											<div class="input-group">
												<div class="input-group-addon">
													<i class="fa fa-suitcase"></i>
												</div>
												<input type="File" name="prod_img" class="form-control">
											</div>
										</div>
										<div class="col-md-12">
											<label> Description:</label>
											<div class="input-group">
												<div class="input-group-addon">
													<i class="fa fa-suitcase"></i>
												</div>
												<textarea id="summernote" name="prod_desp" rows="5" placeholder="Enter Product Description"></textarea>
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
		                url:'ajax_get_subcat.php',
		                data:'cat_id='+cat_id,
		                success:function(html){
		                    $('#sub_cat').html(html);
		                }
		            }); 
		        }
		    });

		    	/*$('#sub_cat').on('change', function(){
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
		    });*/
        });
function Addprd()
{
var a= parseInt(document.add.prod_mrp.value);
var b = parseInt(document.add.pro_dis.value);
var result=a/100 * b;
var disprice=a - result;
// alert(result);
document.add.pro_price.value=disprice;
}
	</script>
</body>

</html>
