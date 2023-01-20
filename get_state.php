<?php include("includes/db_config.php"); 
 if(!empty($_POST["ct_id"])){     
$ct_id=$_POST["ct_id"];     
$res = mysqli_query($conn,"select * from state where country_id='$ct_id' order by id asc");
echo "<select class='simple-select2 form-control' name='div_name' id='div_idd'>";
if(mysqli_num_rows($res) > 0 ){
     echo "<option value=".">"; echo "Select State";echo"</option>";
     while($row=mysqli_fetch_array($res)){
          
          echo "<option value=".$row["id"].">"; echo $row["state_name"];echo"</option>";
     }
echo "</select>";
}else{
          echo "<option value=".">"; echo "State Not Available!";echo"</option>";
          echo "</select>";         
}
}
 if(!empty($_POST["st_id"])){     
$st_id=$_POST["st_id"];     
$res = mysqli_query($conn,"select * from city where state_id='$st_id' order by id asc");
echo "<select class='simple-select2 form-control' name='div_name' id='div_idd'>";
if(mysqli_num_rows($res) > 0 ){
     echo "<option value=".">"; echo "Select City";echo"</option>";
     while($row=mysqli_fetch_array($res)){
          
          echo "<option value=".$row["id"].">"; echo $row["city_name"];echo"</option>";
     }
echo "</select>";
}else{
          echo "<option value=".">"; echo "City Not Available!";echo"</option>";
          echo "</select>";         
}
}
 ?>