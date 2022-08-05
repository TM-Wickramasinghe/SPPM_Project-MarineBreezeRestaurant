<?php 	
// db connection
$con= mysqli_connect("localhost", "root", "", "marinebreeze");
// check connection
if($con->connect_error) {
  die("Connection Failed : " . $con->connect_error);
} else {
   //echo "Successfully connected";
}

?>