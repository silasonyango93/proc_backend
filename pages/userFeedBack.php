<?php
 require_once('dbConnect.php');
 if($_SERVER["REQUEST_METHOD"]=="POST"){
 
 $UserEmail =$_POST["UserEmail"];
 $Comment =$_POST["Comment"];
 


 $query="INSERT INTO `feedback` (`UserEmail`, `Comment`, `PostedDate`) VALUES ('$UserEmail', '$Comment', NOW());"; 
 $response["Success"] = TRUE;
echo json_encode($response);
 mysqli_query($con,$query) or die(mysqli_error($con));
 mysqli_close($con);}
 ?>
 
 
 