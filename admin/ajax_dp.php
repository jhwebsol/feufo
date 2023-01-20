<?php include("includes/db_config.php"); 

	/*if(!empty($_POST["dp_id"])){
		 $dp_id=$_POST["dp_id"];
		$res = mysqli_query($conn,"select * from designation where dp_id='".$dp_id."' order by id asc");
	
		echo "<select class='simple-select2 form-control' name='designation' id='designation'>";
	if(mysqli_num_rows($res) > 0 ){
		echo "<option value=".">"; echo "Select designation";echo"</option>";
		while($row=mysqli_fetch_array($res)){
			
			echo "<option value=".$row["id"].">"; echo $row["dg_name"];echo"</option>";
		}
	echo "</select>";
	
	}else{
			echo "<option value=".">"; echo "designation Not Available!";echo"</option>";
			echo "</select>";
			
	}
	}*/

if(!empty($_POST["cat_id"])){ 
	$cat_id=$_POST["cat_id"];
	$res = mysqli_query($conn,"select * from designation where dp_id='$cat_id' order by id asc");
	
	echo "<select class='simple-select2 form-control' name='designation' id='designation'>";
	if(mysqli_num_rows($res) > 0 ){
		echo "<option value=".">"; echo "Select designation";echo"</option>";
		while($row=mysqli_fetch_array($res)){
			
			echo "<option value=".$row["id"].">"; echo $row["dg_name"];echo"</option>";
		}
	echo "</select>";
	
	}else{
			echo "<option value=".">"; echo "designation Not Available!";echo"</option>";
			echo "</select>";
			
	}
				
	}
?>