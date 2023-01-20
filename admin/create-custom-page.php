<?php include("includes/css.php");
if (isset($_POST['submit'])) {
extract($_POST); 
$cname = strtolower(str_replace(" ", "-", $name));
if(file_exists('../real-estate-projects')){
  if(!file_exists('../real-estate-projects/'.$cname)){
    if(copy('../custom-page.php', '../real-estate-projects/'.$cname.'.php')) {
    $desp = htmlentities( $_POST['desp']);
    $seo_desp = htmlentities( $_POST['seo_desp']);
    $sql="INSERT into custome_page(pname,desp,status,seo_title,seco_desp) values ('$name','$desp','$status','$title','$seo_desp')";
    $res=mysqli_query($conn,$sql) or die(mysqli_error());
    if($res){
         echo "<script>window.location.href='custom-page.php'</script>";
    }
  }else { echo "<script> alert('There are some problem please try again!!!'); 
            location.replace('create-custom-page.php');
        </script>";
  }
 } else {  echo "  <script> alert('There are some problem please try again!!!'); 
                            location.replace('create-custom-page.php');
                        </script>";
        }
}else{  echo "<script> alert('Custome page Name aleady exists, please change the and try again!!!'); 
            location.replace('create-custom-page.php');
        </script>";
}
}
?> 

<body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">
        <?php include("includes/header.php");?>
        <?php include("includes/sidebar.php");?>
        <div class="content-wrapper">
            <section class="content-header">
                <a href="custom-page.php" class="btn btn-primary"><i class="fa fa-list fa-lg" aria-hidden="true"></i> All Custom Page</a>
            </section>
            <!-- Main content -->
            <section class="content">
                <div class="row">
                <div class="col-md-6">
                    <div class="box box-danger gurnew">
                        <div class="box-header with-border">
                            <h3 class="box-title">Custom Page Form</h3>
                        </div>
                        <div class="box-body table-responsive">
                            <form method="post" action="" enctype="multipart/form-data">
                                
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Page Name </label>
                                        <input type="text" name="name" class="form-control" placeholder="Name">
                                    </div>
                                </div>
                                 <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Description </label>
                                        <textarea type="text" name="desp" id="summernote_editor" class="form-control" placeholder="" rows="5"></textarea>
                                    </div>
                                </div>                            

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Status</label>
                                        <select type="text" name="status" class="form-control">
                                            <option>Active</option>
                                            <option>Inactive</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Seo Title </label>
                                        <input type="text" name="title" class="form-control" placeholder="Seo Title">
                                    </div>
                                </div>
                                 <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Seo Description </label>
                                        <textarea type="text" name="seo_desp" id="summernote" class="form-control" placeholder="" rows="2"></textarea>
                                    </div>
                                </div>   

                                <div class="col-md-12">
                                    <input type="submit" name="submit" class="btn btn-success btn-md" value="Submit">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
              </div>
            </section>
        </div>
    </div>
            <?php include("includes/footer.php")?>

    <?php include("includes/js.php")?>
</body>
<script language="javascript">
    $(document).ready(function() {
        $(document).on('click', '.edit_data', function() {
            var p_id = $(this).attr("id");
            $.ajax({
                url: "edit_ptype.php",
                method: "POST",
                data: {
                    p_id: p_id
                },
                dataType: "json",
                success: function(data) {
                    $('#type').val(data.types);
                    $('#v_id').val(data.id);
                    $('#insert').val("Update");
                    $('#add_data_Modal').modal('show');
                }
            });
        });

    });


    function delete_video_by_ID(id) {
        if (confirm('Do You Want to Deleting This \nContinue anyway?')) {
            window.location.href = 'delete_ptype.php?id=' + id;
        }
    }

</script>
<script> 
      $('#summernote_editor').summernote({
         tabsize: 2,
        height: 400,
            spellCheck: true,
    toolbar: [
      ['style', ['style']],
      ['font', ['bold', 'underline', 'italic', 'superscript', 'subscript', 'clear']],
      ['fontname', ['fontname','fontsize']],
      ['color', ['color']],
      ['para', ['ul', 'ol', 'paragraph']],
      ['table', ['table']],
      ['insert', ['link', 'picture', 'video']],
      ['view', ['fullscreen', 'help', 'undo', 'redo']],
    ],
    callbacks: {
        onImageUpload: function(files, editor, welEditable) {
            sendFile(files[0], editor, welEditable);
        }
    }
      });
   function sendFile(file, editor, welEditable) {
    data = new FormData();
    data.append("file", file);
    $.ajax({
        data: data,
        type: "POST",
        url: "upload_img.php",
        cache: false,
        processData: false,
        contentType: false,
        success: function(url) {
            var image = $('<img>').attr('src', url);
            $('#summernote_editor').summernote("insertNode", image[0]);
        }
    });
}
    </script> 

</html>
