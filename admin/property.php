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
      <section class="content-header">
        <a href="add-property.php" class="btn btn-primary"><i class="fa fa-plus fa-lg" aria-hidden="true"></i> Create</a>
      </section> 
      <section class="content">
     <div class="box box-danger gurnew">
        <div class="box-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Property Detail</h6>
        </div>
							<div class="box-body"> 
								<div class="table-responsive">
									 <table class="table table-bordered dataTable no-footer example1" style="width: 100%;" cellspacing="0">
										<thead>
											<tr>
												<th>Serial</th>
												<th>Property Name</th>
												<th>Property Price</th>
												<th>Property Type</th>
												<th>Purpose</th>
												<th>Views</th>
												<th>Property Status</th>
                                                <th>Status</th>
												<th>Action</th> 
											</tr>
										</thead>

										<tbody>
											<?php $j=1; $padded='Admin';
											$sql="select es_property.* from es_property where es_property.property_added='".$padded."' order by es_property.id DESC "; 
                                            $result = mysqli_query($conn, $sql);
											while($res= mysqli_fetch_array($result))
											{ $uid=$res['property_added'];
                                             $ptype=$res['property_type'];
											 $sqlpyt=mysqli_fetch_array(mysqli_query($conn,"select * from es_property_type where id=".$ptype));
                                             $sqls=mysqli_query($conn,"select * from es_property_user where id=".$uid);
											 $resus= mysqli_fetch_array($sqls); ?>
											<tr>
											   <td><?php echo $j; $j++; ?></td>
											   <td><?php echo $res['property_name']; ?></td> 
											   <td><?php echo $res['price']; ?></td> 											   
											   <td><?php echo $sqlpyt['types']; ?></td> 
											   <td> </td> 
											   <td><a href="property-review.php?id=<?php echo $res['id']; ?>"><i class="fa fa-file"></i></a></td>
											   <td><?php echo $res['property_status']; ?></td> 
                                               <td><?php echo $res['status']; ?></td> 
											    <td> <a href="view-property.php?id=<?php echo $res['id']; ?>" class="btn btn-success btn-sm"><i class="fa fa-eye fa-lg"></i></a>
                                <a href="edit-property.php?id=<?= $res['id'];?>" class="btn btn-primary btn-sm"><i class="fa fa-pencil fa-lg"></i></a>
                                <a href="javascript:delete_ptype_by_ID('<?php echo $res['id'] ?>');" class="btn btn-danger btn-sm"><i class="fa fa-trash fa-lg"></i></a>
                            </td>										  
											</tr>
										<?php } ?>
										</tbody>
										<tfoot>
											<tr>
												<td colspan="8"><input type="button" id="btn_delete" name="delete" class="btn btn-success btn-sm pull-right" value="Delete Products"></td>
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

function delete_ptype_by_ID(id)
{
    if (confirm('Do You Want to Deleting This \nContinue anyway?')) {
        window.location.href = 'delete_property.php?id=' + id;
    }
}

    </script>

</html>
