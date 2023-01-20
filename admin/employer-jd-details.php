<?php include("includes/css.php");?>
<style type="">
.box-header h6{font-size: 18px!important;}
.box-header .table tr th{  color: #858796;
  font-size: 16px;
}
.box-body .table tr th, .box-body .table tr td{color: #858796!important;font-size:17px!important;}
.toggle.btn {
  min-width: 3.7rem;
  min-height: 2.15rem;
}
.toggle {
  position: relative;
  overflow: hidden;
}
.toggle input[type="checkbox"] {
  display: none;
}
.toggle-on.btn {
  padding-right: 1.5rem;
}
.toggle-off.btn {
  padding-left: 1.5rem;
}
.toggle-handle {
  position: relative;
  margin: 0 auto;
  padding-top: 0;
  padding-bottom: 0;
  height: 100%;
  width: 0;
  border-width: 0 1px;
  background-color: #fff;
}
.toggle-group {
  position: absolute;
  width: 200%;
  top: 0;
  bottom: 0;
  left: 0;
  }
</style>
<?php 
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
} } 
if(isset($_POST['update']))
{ extract($_POST);
$id=$_POST["a_id"];
$sql1 ="UPDATE  es_property  SET status='$status' WHERE id='$id'"; 
$res=mysqli_query($conn,$sql1) or die(mysqli_error());
}
?>

<body class="hold-transition skin-blue sidebar-mini">
	<div class="wrapper">
		<?php include("includes/header.php");?>
		<?php include("includes/sidebar.php");?>
		 
			<div class="content-wrapper"> 
      <section class="content">
     <div class="box box-danger gurnew">
        <div class="box-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Jd Detail</h6>
        </div>
							<div class="box-body"> 
								<div class="table-responsive">
									 <table class="table table-bordered dataTable no-footer example1" style="width: 100%;" cellspacing="0">
										<thead>
											<tr>
												<th>Serial</th>
												<th>Subject</th>
												<th>Skills</th>
												<th>Data</th>
                        <th>Status</th>
												<th>Action</th> 
											</tr>
										</thead>

										<tbody>
											<?php $j=1; $idd=$_GET['user_id'];
											$sql="select * from jd_detail where empr_id='".$idd."'"; 
                      $result = mysqli_query($conn, $sql); 
											while($res= mysqli_fetch_array($result))
											{ ?>
											<tr>
											   <td><?php echo $j; $j++; ?></td>
											   <td><?php echo $res['subject']; ?></td> 
											   <td><?php $sk_id=$res['skills'];
                          $rids = explode(",",$sk_id);
                          foreach($rids as $pm_id){
                          $sqltps=mysqli_query($conn,"SELECT * from skill_detail where id='".$pm_id."'");
                          while($restps=mysqli_fetch_array($sqltps)){ echo $resr['skill_name']; } } ?></td>		
                          <td style="height:300px"><?php echo $res['message']; ?></td>
                          <a href="javascript:delete_ptype_by_ID('<?php echo $res['id'] ?>');" class="btn btn-danger btn-sm"><i class="fa fa-trash fa-lg"></i></a>
                         </td>										  
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
function delete_ptype_by_ID(id)
{
    if (confirm('Do You Want to Deleting This \nContinue anyway?')) {
        window.location.href = 'delete_empr_jd.php?id=' + id;
    }
}

    </script>

</html>
