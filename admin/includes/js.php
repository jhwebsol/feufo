<script src="assest/js/jquery.min.js"></script>
<script src="assest/js/jquery-ui.min.js"></script>
<script>
	$.widget.bridge('uibutton', $.ui.button);
</script>
<script src="assest/js/bootstrap.min.js"></script>
<!--<script src="assest/js/select2.full.min.js"></script>-->
<script src="assest/js/raphael.min.js"></script>
<script src="assest/js/morris.min.js"></script>
<script src="assest/js/jquery.sparkline.min.js"></script>
<script src="assest/js/jquery.knob.min.js"></script>
<script src="assest/js/moment.min.js"></script>
<script src="assest/js/daterangepicker.js"></script>
<script src="assest/js/bootstrap-datepicker.min.js"></script>
<script src="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote.js"></script>
<script src="assest/js/jquery.slimscroll.min.js"></script>
<script src="assest/js/fastclick.js"></script>
<script src="assest/js/adminlte.min.js"></script>
<script src="assest/js/dashboard.js"></script>
<script src="assest/js/jquery.dataTables.min.js"></script>
<script src="assest/js/dataTables.bootstrap.min.js"></script>
<script src="assest/js/demo.js"></script>
<script src="assest/iCheck/js/icheck.min.js"></script>
<script src="assest/js/jquery-jvectormap-1.2.2.min.js"></script>
<script src="assest/js/jquery-jvectormap-world-mill-en.js"></script>
<script src="assest/js/dataTables.buttons.min.js"></script>
<script src="assest/js/bootstrap3-wysihtml5.all.min.js"></script>
<script src="assest/js/jszip.min.js"></script>
<script src="assest/js/pdfmake.min.js"></script>
<script src="assest/js/vfs_fonts.js"></script>
<script src="assest/js/buttons.html5.min.js"></script>
<script src="assest/js/buttons.print.min.js"></script>
<script src="assest/js/Chart.js"></script> 
<script src="assest/js/validations.js"></script>
 
<script type="text/javascript">
	//Date picker
    $('#datepicker').datepicker({
      autoclose: true
    })
</script>
<script type="text/javascript">
	//Date picker
    $('#datepicker1').datepicker({
      autoclose: true
    })
</script>
<script>
	$(function() {	
		$('.example1').DataTable({
			'paging': true,
			'lengthChange': true,
			'searching': true,
			'ordering': true,
			'info': true,
			'autoWidth': false
		});
$('.example2').DataTable({
			'paging': true,
			'lengthChange': true,
			'searching': true,
			'ordering': true,
			'info': true,
			'autoWidth': false
		});
	});
</script>
<script>
		$(document).ready(function() {
			$('.example3').DataTable({
				'paging': true,
				'searching': true,
				'ordering': true,
				'info': true,
				'autoWidth': true,
				dom: 'Blfrtip',
				buttons: [
					'copyHtml5',
					'excelHtml5',
					'csvHtml5',
					'pdfHtml5',
					'print' ,
					{
					text: 'Delete'               
					},  
				]
			});
			$('.example4').DataTable({
				'paging': true,
				'searching': true,
				'ordering': true,
				'info': true,
				'autoWidth': true,
				dom: 'Blfrtip',
				buttons: [
					'copyHtml5',
					'excelHtml5',
					'csvHtml5',
					'pdfHtml5',
					'print' ,					 
				]
			});
		}); 
	  
	</script>
 
	  <script>
ClassicEditor
.create( document.querySelector( '#editor' ) )
.then( editor => {
        console.log( editor );
} )
.catch( error => {
        console.error( error );
} );
CKEDITOR.editorConfig = function( config ) {
  config.extraPlugins = 'imageuploader';
};
                </script>
<script>
function printDiv() 
{
  var divToPrint=document.getElementById('DivIdToPrint');
  var newWin=window.open('','Print-Window');
  newWin.document.open();
  newWin.document.write('<html><body onload="window.print()">'+divToPrint.innerHTML+'</body></html>');
  newWin.document.close();
  setTimeout(function(){newWin.close();},10);
}
</script>

<script src="summernote/summernote.js"></script> 
<script> 
$('#summernote').summernote({
   tabsize: 2,
  height: 400,
});
$('#summernote2').summernote({
   tabsize: 2,
  height: 400,
});
$('#summernote3').summernote({
   tabsize: 2,
  height: 400,
});
</script> 



