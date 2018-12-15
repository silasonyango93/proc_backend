
<?php
 require_once('dbConnect.php');

	global $connection;
 if($_SERVER["REQUEST_METHOD"]=="POST"){
 
 $token_value =$_POST["token_value"];
 
 
 

	  
	   $query="INSERT INTO `token` (`token_value`) VALUES ('$token_value');"; 
 // $response["success"] = TRUE
// echo json_encode($response);
 mysqli_query($con,$query) or die(mysqli_error($con));
 
 mysqli_close($con);}
 ?>
 
 <form  action="" method="POST" enctype="multipart/form-data">
    <input type="hidden" name="action" value="submit">
   
	token_value:<br>
    <input name="token_value" type="text" value="" size="30"/><br> 
	
	
	
	 <input type="submit" value="Send"/> 
	 </form>	
	