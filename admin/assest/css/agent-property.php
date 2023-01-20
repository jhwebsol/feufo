<?php include("includes/css.php");?>
<body class="hold-transition skin-blue sidebar-mini">
	<div class="wrapper">
		<?php include("includes/header.php");?>
		<?php include("includes/sidebar.php");?>
		<div class="content-wrapper">
			<!-- Content Header (Page header) -->
			<section class="content-header">
				<a href="add-agent-property.php" class="btn btn-primary"><i class="fa fa-plus" aria-hidden="true"></i> Create</a>
			</section>
			<!-- Main content -->
			<section class="content">
		 <div class="box box-danger gurnew">
        <div class="box-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Agent Properties</h6>
        </div>
							<div class="box-body table-responsive">
            <div class="table-responsive">
                <div id="dataTable_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer"><div class="row"><div class="col-sm-12 col-md-6"><div class="dataTables_length" id="dataTable_length"><label>Show <select name="dataTable_length" aria-controls="dataTable" class="custom-select custom-select-sm form-control form-control-sm"><option value="10">10</option><option value="25">25</option><option value="50">50</option><option value="100">100</option></select> entries</label></div></div><div class="col-sm-12 col-md-6"><div id="dataTable_filter" class="dataTables_filter"><label>Search:<input type="search" class="form-control form-control-sm" placeholder="" aria-controls="dataTable"></label></div></div></div><div class="row"><div class="col-sm-12"><table class="table table-bordered dataTable no-footer" id="dataTable" role="grid" aria-describedby="dataTable_info" style="width: 100%;" width="100%" cellspacing="0">
                    <thead>
                        <tr role="row"><th class="sorting sorting_asc" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" style="width: 43.2px;" aria-sort="ascending" aria-label="Serial: activate to sort column descending" width="5%">Serial</th><th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" style="width: 136.2px;" aria-label="Agent: activate to sort column ascending" width="15%">Agent</th><th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" style="width: 253.2px;" aria-label="Property: activate to sort column ascending" width="25%">Property</th><th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" style="width: 78.2px;" aria-label="Price: activate to sort column ascending" width="10%">Price</th><th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" style="width: 136.2px;" aria-label="Type: activate to sort column ascending" width="15%">Type</th><th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" style="width: 79.2px;" aria-label="Purpose: activate to sort column ascending" width="10%">Purpose</th><th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" style="width: 80.2px;" aria-label="Status: activate to sort column ascending" width="10%">Status</th><th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" style="width: 78.2px;" aria-label="Action: activate to sort column ascending" width="15%">Action</th></tr>
                    </thead>
                    <tbody>
                                                
                                                
                                                
                                                
                                                
                        
                    <tr class="odd">
                            <td class="sorting_1">1</td>
                            <td><a href="https://demo.websolutionus.com/topland/agent?user_type=2&amp;user_name=timothy-jason">Timothy Jason</a></td>
                            <td>Luxury Gymnasium  Club</td>
                            <td>$250</td>
                            <td>House and Garden</td>
                            <td>For Sale</td>
                            <td>
                                                                <a href="" onclick="propertyStatus(26)"><div class="toggle btn btn-success" data-toggle="toggle" role="button" style="width: 96.65px; height: 37.6px;"><input type="checkbox" checked="" data-toggle="toggle" data-on="Active" data-off="InActive" data-onstyle="success" data-offstyle="danger"><div class="toggle-group"><label for="" class="btn btn-success toggle-on">Active</label><label for="" class="btn btn-danger toggle-off">InActive</label><span class="toggle-handle btn btn-light"></span></div></div></a>
                                                            </td>
                            <td>
                                <a target="_blank" href="https://demo.websolutionus.com/topland/property/luxury-gymnasium-club" class="btn btn-success btn-sm"><i class="fas fa-eye"></i></a>
                                <a data-toggle="modal" data-target="#deleteModal" href="javascript:;" onclick="deleteData(26)" class="btn btn-danger btn-sm"><i class="fas fa-trash    "></i></a>



                            </td>
                        </tr><tr class="even">
                            <td class="sorting_1">2</td>
                            <td><a href="https://demo.websolutionus.com/topland/agent?user_type=2&amp;user_name=david-simmons">David Simmons</a></td>
                            <td>Ozalj apartment</td>
                            <td>$500</td>
                            <td>Hotel And Resort</td>
                            <td>For Rent</td>
                            <td>
                                                                <a href="" onclick="propertyStatus(23)"><div class="toggle btn btn-success" data-toggle="toggle" role="button" style="width: 96.65px; height: 37.6px;"><input type="checkbox" checked="" data-toggle="toggle" data-on="Active" data-off="InActive" data-onstyle="success" data-offstyle="danger"><div class="toggle-group"><label for="" class="btn btn-success toggle-on">Active</label><label for="" class="btn btn-danger toggle-off">InActive</label><span class="toggle-handle btn btn-light"></span></div></div></a>
                                                            </td>
                            <td>
                                <a target="_blank" href="https://demo.websolutionus.com/topland/property/ozalj-apartment" class="btn btn-success btn-sm"><i class="fas fa-eye"></i></a>
                                <a data-toggle="modal" data-target="#deleteModal" href="javascript:;" onclick="deleteData(23)" class="btn btn-danger btn-sm"><i class="fas fa-trash    "></i></a>



                            </td>
                        </tr><tr class="odd">
                            <td class="sorting_1">3</td>
                            <td><a href="https://demo.websolutionus.com/topland/agent?user_type=2&amp;user_name=david-warner">David Warner</a></td>
                            <td>Stay Greenwich Village</td>
                            <td>$60</td>
                            <td>Hotel And Resort</td>
                            <td>For Sale</td>
                            <td>
                                                                <a href="" onclick="propertyStatus(18)"><div class="toggle btn btn-success" data-toggle="toggle" role="button" style="width: 96.65px; height: 37.6px;"><input type="checkbox" checked="" data-toggle="toggle" data-on="Active" data-off="InActive" data-onstyle="success" data-offstyle="danger"><div class="toggle-group"><label for="" class="btn btn-success toggle-on">Active</label><label for="" class="btn btn-danger toggle-off">InActive</label><span class="toggle-handle btn btn-light"></span></div></div></a>
                                                            </td>
                            <td>
                                <a target="_blank" href="https://demo.websolutionus.com/topland/property/stay-greenwich-village" class="btn btn-success btn-sm"><i class="fas fa-eye"></i></a>
                                <a data-toggle="modal" data-target="#deleteModal" href="javascript:;" onclick="deleteData(18)" class="btn btn-danger btn-sm"><i class="fas fa-trash    "></i></a>



                            </td>
                        </tr><tr class="even">
                            <td class="sorting_1">4</td>
                            <td><a href="https://demo.websolutionus.com/topland/agent?user_type=2&amp;user_name=david-simmons">David Simmons</a></td>
                            <td>Black glass house</td>
                            <td>$20</td>
                            <td>Hotel And Resort</td>
                            <td>For Rent</td>
                            <td>
                                                                <a href="" onclick="propertyStatus(17)"><div class="toggle btn btn-success" data-toggle="toggle" role="button" style="width: 96.65px; height: 37.6px;"><input type="checkbox" checked="" data-toggle="toggle" data-on="Active" data-off="InActive" data-onstyle="success" data-offstyle="danger"><div class="toggle-group"><label for="" class="btn btn-success toggle-on">Active</label><label for="" class="btn btn-danger toggle-off">InActive</label><span class="toggle-handle btn btn-light"></span></div></div></a>
                                                            </td>
                            <td>
                                <a target="_blank" href="https://demo.websolutionus.com/topland/property/black-glass-house" class="btn btn-success btn-sm"><i class="fas fa-eye"></i></a>
                                <a data-toggle="modal" data-target="#deleteModal" href="javascript:;" onclick="deleteData(17)" class="btn btn-danger btn-sm"><i class="fas fa-trash    "></i></a>



                            </td>
                        </tr><tr class="odd">
                            <td class="sorting_1">5</td>
                            <td><a href="https://demo.websolutionus.com/topland/agent?user_type=2&amp;user_name=david-simmons">David Simmons</a></td>
                            <td>Luxury Family Home</td>
                            <td>$20</td>
                            <td>Business</td>
                            <td>For Sale</td>
                            <td>
                                                                <a href="" onclick="propertyStatus(16)"><div class="toggle btn btn-success" data-toggle="toggle" role="button" style="width: 96.65px; height: 37.6px;"><input type="checkbox" checked="" data-toggle="toggle" data-on="Active" data-off="InActive" data-onstyle="success" data-offstyle="danger"><div class="toggle-group"><label for="" class="btn btn-success toggle-on">Active</label><label for="" class="btn btn-danger toggle-off">InActive</label><span class="toggle-handle btn btn-light"></span></div></div></a>
                                                            </td>
                            <td>
                                <a target="_blank" href="https://demo.websolutionus.com/topland/property/luxury-family-home" class="btn btn-success btn-sm"><i class="fas fa-eye"></i></a>
                                <a data-toggle="modal" data-target="#deleteModal" href="javascript:;" onclick="deleteData(16)" class="btn btn-danger btn-sm"><i class="fas fa-trash    "></i></a>



                            </td>
                        </tr></tbody>
                </table></div></div><div class="row"><div class="col-sm-12 col-md-5"><div class="dataTables_info" id="dataTable_info" role="status" aria-live="polite">Showing 1 to 5 of 5 entries</div></div><div class="col-sm-12 col-md-7"><div class="dataTables_paginate paging_simple_numbers" id="dataTable_paginate"><ul class="pagination"><li class="paginate_button page-item previous disabled" id="dataTable_previous"><a href="#" aria-controls="dataTable" data-dt-idx="0" tabindex="0" class="page-link">Previous</a></li><li class="paginate_button page-item active"><a href="#" aria-controls="dataTable" data-dt-idx="1" tabindex="0" class="page-link">1</a></li><li class="paginate_button page-item next disabled" id="dataTable_next"><a href="#" aria-controls="dataTable" data-dt-idx="2" tabindex="0" class="page-link">Next</a></li></ul></div></div></div></div>
            </div>
        </div>
    </div>
				 	</section>
			<!-- /.content -->
		</div>
		<!-- /.content-wrapper -->
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
