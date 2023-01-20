<?php include("includes/css.php");
if (isset($_POST['submit'])) {
extract($_POST);
 date_default_timezone_set('Asia/Kolkata');
 $datetime = date('Y-m-d H:i:s');
$file = $_FILES["prod_exc"]["tmp_name"];
$file_open = fopen($file,"r");
while (($csv = fgetcsv($file_open, 10000, ",", '"')) !== FALSE) {
    var_dump($csv[0]);
 $company_name = !empty($csv[0]) ? $csv[0] : '';
 $emp_name = !empty($csv[1]) ? $csv[1] : '';        
 $contact_no = !empty($csv[2]) ? $csv[2] : '';        
 $alt_contact_no = !empty($csv[3]) ? $csv[3] : '';        
 $website = !empty($csv[4]) ? $csv[4] : '';        
 $est_since = !empty($csv[5]) ? $csv[5] : '';        
 $listing = !empty($csv[6]) ? $csv[6] : '';        
 $skill = !empty($csv[7]) ? $csv[7] : '';        
 $about_data = !empty($csv[8]) ? $csv[8] : '';        
 $email_id = !empty($csv[9]) ? $csv[9] : '';        
 $password = !empty($csv[10]) ? $csv[10] : ''; 
 $options = [
    'cost' => 11,
];
$passwordFromPost = $password;
$passwordhash = password_hash($passwordFromPost, PASSWORD_BCRYPT, $options);       
 $facebook = !empty($csv[11]) ? $csv[11] : '';        
 $twitter = !empty($csv[12]) ? $csv[12] : '';  
$linkedin = !empty($csv[13]) ? $csv[13] : '';
$country = !empty($csv[14]) ? $csv[14] : '';
$state = !empty($csv[15]) ? $csv[15] : '';
$city = !empty($csv[16]) ? $csv[16] : '';
$address = !empty($csv[17]) ? $csv[17] : '';
$map_link = !empty($csv[17]) ? $csv[17] : '';
$latitude = !empty($csv[17]) ? $csv[17] : '';
$longitude = !empty($csv[17]) ? $csv[17] : '';
date_default_timezone_set('Asia/Kolkata');
$date = date('Y-m-d H:i:s');
$sql="INSERT into employer(company_name,emp_name,contact_no,alt_contact_no,website,est_since,skill,listing,about_data,email_id,password,created_date) values ('$company_name','$emp_name','$contact_no','$alt_contact_no','$website','$est_since','$skill','$listing','$about_data','$email_id','$passwordhash','$date')";
//echo $sql; exit();
if  (mysqli_query($conn, $sql)) {
$last_id= mysqli_insert_id($conn);
$sqls=mysqli_query($conn,"INSERT into employer_social_md(empr_id,facebook,twitter,linkedin) values ('$last_id','$facebook','$twitter','$linkedin')");
$sqlss=mysqli_query($conn,"INSERT into employer_contact(empr_id,country,state,city,address,map_link,latitude,longitude) values ('$last_id','$country','$state','$city','$address','$map_link','$latitude','$longitude')");
 echo "<script>alert('Employer have added successfully!!!'); 
                    location.replace('employer.php');
                </script>";
}
}
}
?>

<body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">
        <?php include("includes/header.php");?>
        <?php include("includes/sidebar.php");?>
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <!-- Main content -->
            <section class="content">
                <div class="row">
                    <div class="col-md-12">
                        <div class="box box-primary">
                            <div class="box-header with-border">
                                <div class="col-md-7">
                                    <h3 class="box-title">Add Employer/Company Details:</h3>
                                </div>
                            </div>
                            <!-- /.box-header -->
                            <div class="box-body">
								<div class="col-md-12">
                                <form class="form-horizontal" action="" enctype="multipart/form-data" method="post">
                                    <div class="form-group">
										<div class="col-md-4">
											<label> Choose Excel File</label>
											<div class="input-group">
												<div class="input-group-addon">
													<i class="fa fa-suitcase"></i>
												</div>
												<input type="File" name="prod_exc" class="form-control">
											</div>
										</div>
									</div>
									<div class="col-md-offset-1 col-md-3">
										<button type="submit" name="submit" class="btn btn-success btn-lg mt-20" name="Submit"><i class="fa fa-check"></i> Submit</button> 
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
	</div>
	<?php include("includes/js.php");?>
<script type="text/javascript">
         function checkPass()
    {
        var pass1 = document.getElementById('password');
        var pass2 = document.getElementById('repassword');
        var message = document.getElementById('error-nwl');
        var goodColor = "#66cc66";
        var badColor = "#ff6666";
      
        if(pass1.value.length > 5)
        {
            pass1.style.backgroundColor = goodColor;
            message.style.color = goodColor;
            message.innerHTML = "character number ok!"
        }
        else
        {
            pass1.style.backgroundColor = badColor;
            message.style.color = badColor;
            message.innerHTML = " you have to enter at least 6 digit!"
            return;
        }
      
        if(pass1.value == pass2.value)
        {
            pass2.style.backgroundColor = goodColor;
            message.style.color = goodColor;
            message.innerHTML = "Password Match!"
        }
      else
        {
            pass2.style.backgroundColor = badColor;
            message.style.color = badColor;
            message.innerHTML = " These passwords don't match"
        }
    }  
</script>
 

</body>

</html>
