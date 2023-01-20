<?php
 include("includes/db_config.php");
		//var_dump($_POST);exit();
if(!empty($_POST["cat_id"])){ 
	$cat_id=$_POST["cat_id"];
	$res = mysqli_query($conn,"select * from sub_category where category_id='$cat_id' order by id asc");
	
	echo "<select class='simple-select2 form-control' name='div_name' id='div_idd'>";
	if(mysqli_num_rows($res) > 0 ){
		echo "<option value=".">"; echo "Select Sub Category";echo"</option>";
		while($row=mysqli_fetch_array($res)){
			
			echo "<option value=".$row["id"].">"; echo $row["sub_category_name"];echo"</option>";
		}
	echo "</select>";
	
	}else{
			echo "<option value=".">"; echo "Sub Category Not Available!";echo"</option>";
			echo "</select>";
			
	}
				
	} elseif(!empty($_POST["scat_id"])){ 
    
     $res1 = mysqli_query($conn,"select * from sub_sub_category where sub_category_id = ".$_POST['scat_id']." ORDER BY sub_sub_cat_name ASC");
    // Generate HTML of city options list 
    if(mysqli_num_rows($res1) > 0 ){
        echo '<option value="">Select Sub Sub Category</option>'; 
        while($row = mysqli_fetch_array($res1)){  
            echo '<option value="'.$row['id'].'">'.$row['sub_sub_cat_name'].'</option>'; 
        } 
    }else{ 
        echo '<option value=""> Sub Sub Category not available</option>'; 
    } 
} 