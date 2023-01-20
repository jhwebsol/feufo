<?php include("includes/css.php");
if(isset($_POST['update']))
{ extract($_POST); 
$id=$_GET['id'];
$property_desp = htmlentities( $_POST['desp']);
$desps=mysqli_real_escape_string($conn,$property_desp);
$sql1 ="UPDATE custome_page SET pname='$pname',desp='$desps',status='$status',seo_title='$seo_title',seo_desp='$seo_desp' WHERE id='$id'"; 
$res=mysqli_query($conn,$sql1) or die(mysqli_error());
if($res){
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
									<div class="col-md-10"><h3 class="box-title">Edit Career Details</h3></div>
									
								</div>
							</div>
							<?php $id=$_GET['id'];
							$sql2="SELECT * from custome_page where id='$id'";
					            $exe2=mysqli_query($conn,$sql2);
					            $res=mysqli_fetch_array($exe2)?>
								
							<div class="box-body">
								<div class="nav-tabs-custom"> 			 
									<form method="post" action="" enctype="multipart/form-data">
                                
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Page Name </label>
                                        <input type="text" name="pname" value="<?= $res['pname']; ?>" class="form-control" placeholder="Name">
                                    </div>
                                </div>
                                 <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Description </label>
                                        <textarea type="text" name="desp" id="summernote" class="form-control" placeholder="" rows="5"><?= $res['desp']; ?></textarea>
                                    </div>
                                </div>                            

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Status</label>
                                        <select type="text" name="status" class="form-control">
                                            <option><?= $res['status']; ?></option>
                                            <option>Active</option>
                                            <option>InActive</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Seo Title </label>
                                        <input type="text" name="seo_title" value="<?= $res['seo_title']; ?>" class="form-control" placeholder="Seo Title">
                                    </div>
                                </div>
                                 <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Seo Description </label>
                                        <textarea type="text" name="seo_desp" id="summernote" class="form-control" placeholder="" rows="2"><?= $res['seco_desp']; ?></textarea>
                                    </div>
                                </div>   

                                <div class="col-md-12">
                                    <input type="submit" name="update" class="btn btn-success btn-md" value="Submit">
                                </div>
                            </form>
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
</html>