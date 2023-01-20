<?php include("includes/db_config.php"); 
if(isset($_GET["shcountry_id"])){
		 $shcountry_id=$_GET["shcountry_id"]; 
		$res = mysqli_query($conn,"select * from states where country_id='$shcountry_id' order by id asc");
		echo "<select class='form-control select' name='sh_state' id='state_idd'  onchange='state_change()'>";
		if(mysqli_num_rows($res) > 0 ){
			echo "<option value=".">"; echo "Select State";"</option>";
			while($row=mysqli_fetch_array($res)){
				echo "<option value=".$row["id"].">"; echo $row["name"];"</option>";
			}
		echo "</select>";
		
		}else{
				echo "<option value=".">"; echo "State Not Available!";"</option>";
				 "</select>";
				
		}
				
	}
	if(isset($_GET["shstate_id"])){
		$shstate_id=$_GET["shstate_id"];
		$sql_dep = mysqli_query($conn,"select * from cities where state_id='$shstate_id' order by id asc");

		echo "<select class='form-control select' name='sh_city' id='city_idd'>";
		if(mysqli_num_rows($sql_dep) > 0 ){
			echo "<option value=".">"; echo "Select City";"</option>";
			while($row=mysqli_fetch_array($sql_dep)){
				
				echo "<option value=".$row["id"].">"; echo $row["name"];"</option>";
			}
		echo "</select>";
		
		}else{
				echo "<option value=".">"; echo "City Not Available!";"</option>";
				echo "</select>";
		}
	}




if(!empty($_POST["cat_id"])){ 
	//var_dump($_POST);
		$country_id=$_POST["cat_id"];

		$res = mysqli_query($conn,"select * from states where country_id='$country_id' order by id asc");
		
		echo "<select class='inpt-control select simple-select2 form-control' name='state' id='state_id'  onchange='state_change()'>";
		if(mysqli_num_rows($res) > 0 ){
			echo "<option value=".">"; echo "Select State";echo"</option>";
			while($row=mysqli_fetch_array($res)){
				
				echo "<option value=".$row["id"].">"; echo $row["name"];echo"</option>";
			}
		echo "</select>";
		
		}else{
				echo "<option value=".">"; echo "State Not Available!";echo"</option>";
				echo "</select>";
				
		}
				
	}else if(!empty($_POST["scat_id"])){ 
		$state_id=$_POST["scat_id"];

		$sql_dep = mysqli_query($conn,"select * from cities where state_id='$state_id' order by id asc");

		echo "<select class='inpt-control select simple-select2 form-control' name='city' id='city_idd'>";
		if(mysqli_num_rows($sql_dep) > 0 ){
			echo "<option value=".">"; echo "Select City";echo"</option>";
			while($row=mysqli_fetch_array($sql_dep)){
				
				echo "<option value=".$row["id"].">"; echo $row["name"];echo"</option>";
			}
		echo "</select>";
		
		}else{
				echo "<option value=".">"; echo "City Not Available!";echo"</option>";
				echo "</select>";
				
		}
				
	}
?>