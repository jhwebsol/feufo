<?php session_start();
/*$servername = "localhost";
$username = "root";
$password = "";
$dbname = "vethire";
$conn = mysqli_connect($servername, $username, $password, $dbname);*/

$servername = "103.21.58.4:3306";
$username = "hirinscars";
$password = "Ee2ak5$6";
$dbname = "vethire_share";
$conn = mysqli_connect($servername, $username, $password, $dbname);
//$conn = new mysqli("103.21.58.4:3306", "hirinscars", "Ee2ak5$6", "vethire_share");
/*try{
$host="103.21.58.4:3306";
$user="hirinscars";
$password="Ee2ak5$6";
$databaseName = "vethire_share";
$conn=mysqli_connect($host,$user,$password, $databaseName);
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
echo "connected succesfully";
}catch(Exception $e){
echo $e->getMessage();
}*/
?>