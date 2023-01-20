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
<body class="hold-transition skin-blue sidebar-mini">
  <div class="wrapper">
    <?php include("includes/header.php");?>
    <?php include("includes/sidebar.php");?>
    <div class="content-wrapper"> 
    <!--  <section class="content-header">
        <a href="add-agent-properties.php" class="btn btn-primary"><i class="fa fa-plus fa-lg" aria-hidden="true"></i> Create</a>
      </section> -->
      <section class="content">
     <div class="box box-danger gurnew">
        <div class="box-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Agent Properties</h6>
        </div>
              <div class="box-body table-responsive"> 
                 <div class="col-sm-12">
                  <table class="table table-bordered dataTable no-footer example1" style="width: 100%;" cellspacing="0">
                    <thead>
                        <tr role="row">
                          <th class="sorting" width="10%">Serial</th>
                          <th class="sorting" width="15%">Agent</th>
                          <th class="sorting" width="15%">Property</th>
                          <th class="sorting" width="10%">Price</th>
                          <th class="sorting" width="10%">Type</th>
                          <th class="sorting sorting_asc" width="10%">Purpose</th>
                          <th class="sorting" width="10%">Status</th>
                          <th class="sorting" width="10%">Payment Status</th>
                          <th class="sorting" width="15%">Action</th>
                        </tr>
                    </thead>
                    <tbody>                
                    <?php $j=1; $padded='Admin';
                    $sql="select es_property.*,es_property_type.types from es_property join es_property_type on es_property.property_type=es_property_type.id where es_property.property_added !='".$padded."' order by es_property.id DESC "; 
                    $result = mysqli_query($conn, $sql);
                    while($res= mysqli_fetch_array($result))
                    { $uid=$res['property_added'];
                     $sqls=mysqli_query($conn,"select * from es_property_user where id=".$uid);
                     $resus= mysqli_fetch_array($sqls);
                     $ptid=$res['property_for'];
                     $sqlpt=mysqli_fetch_array(mysqli_query($conn,"select * from property_purpose where id=".$ptid));
                     $sql_ptm=mysqli_query($conn, "select pricing_package_cart.*,plan_pricing.plan_name,plan_pricing.duration from pricing_package_cart join plan_pricing on pricing_package_cart.plan_id=plan_pricing.id where property_id='".$res['id']."' ");
                     $respck= mysqli_fetch_array($sql_ptm);
                                    
                      ?>
                    <tr class="odd">
                            <td class="sorting_1"><?php echo $j; $j++; ?></td>
                            <td><?php echo $resus['name']; ?></td> 
                            <td><?php echo $res['property_name']; ?></td> 
                           <td><?php echo $res['price']; ?></td>
                           <td><?php echo $res['types']; ?></td> 
                           <td><?php echo $sqlpt['purpose']; ?></td> 
                            <td> 
                                <form method="post" action="" id="FORM_ID">
                                        <select class="toggle btn btn-success nstatus" id="nstatus" data-toggle="toggle" role="button" style="width: 96.65px; height: 37.6px;">
                                            <option value="<?= $res['status']; ?>"><?= $res['status']; ?></option>
                                            <option value="Active" data-nid="<?= $res['id'];?>" for="" class="btn btn-success toggle-on">Active</option>
                                            <option value="Inactive" data-nid="<?= $res['id'];?>" for="" class="btn btn-success toggle-on">InActive</option>
                                        </select></form>
                           </td>
                            <td> 
                                <form method="post" action="" id="FORM_ID">
                                        <select class="toggle btn btn-success pstatus" id="pstatus" data-toggle="toggle" role="button" style="width: 96.65px; height: 37.6px;">
                                            <option value="<?= $respck['payment_status']; ?>"><?= $respck['payment_status']; ?></option>
                                            <option value="Active" data-nid="<?= $respck['id'];?>" for="" class="btn btn-success toggle-on">Pending</option>
                                            <option value="Active" data-nid="<?= $respck['id'];?>" for="" class="btn btn-success toggle-on">Active</option>
                                            <option value="Inactive" data-nid="<?= $respck['id'];?>" for="" class="btn btn-success toggle-on">Inactive</option>
                                        </select></form>
                           </td>
                            <td>
                                <a href="view-agent-property.php?id=<?php echo $res['id']; ?>" class="btn btn-success btn-sm"><i class="fa fa-eye fa-lg"></i></a>
                                <a href="view-payment-details.php?id=<?php echo $res['id']; ?>" class="btn btn-success btn-sm"><i class="fa fa-money"></i></a>
                                <a href="javascript:delete_ptype_by_ID('<?php echo $res['id'] ?>');" class="btn btn-danger btn-sm"><i class="fa fa-trash fa-lg"></i></a>
                        </tr><?php } ?>
                    </tbody>
                </table>
            </div>
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
<script type="text/javascript">
 $(document).ready(function(){
$('.nstatus').on('change', function(){
    var nstatus = $(this).val();
    var nid = $(this).find(':selected').data('nid');
    var dbdetails="es_property";
    if(nstatus){
        $.ajax({
            type:'POST',
            url:'update-status.php',
            data:'nstatus='+nstatus+ "&id=" + nid+ "&db=" + dbdetails,
            success:function(data){
                alert("successfully Updated");
               window.location.href=window.location.href;
               // console.log(html);
               // $('#city').html('<option value="">Select Division</option>'); 
            }
        }); 
    }
});
});
$(document).ready(function(){
$('.pstatus').on('change', function(){
    var pstatus = $(this).val();
    var nid = $(this).find(':selected').data('nid');
    if(pstatus){
        $.ajax({
            type:'POST',
            url:'update-pstatus.php',
            data:'pstatus='+pstatus+ "&id=" + nid,
            success:function(data){
                alert("successfully Updated");
               window.location.href=window.location.href;
               // console.log(html);
               // $('#city').html('<option value="">Select Division</option>'); 
            }
        }); 
    }
});
});
       function delete_ptype_by_ID(id)
{
    if (confirm('Do You Want to Deleting This \nContinue anyway?')) {
        window.location.href = 'delete_property.php?id=' + id;
    }
}
  </script>
</body>
 
</html>
