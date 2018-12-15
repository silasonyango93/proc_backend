<?php
 require_once('dbConnect.php');
 if($_SERVER["REQUEST_METHOD"]=="POST"){
 
 $AdmissionNo =$_POST["AdmissionNo"];
 $StudentName =$_POST["StudentName"];
 $StudentGender =$_POST["StudentGender"];
 $StudentType =$_POST["StudentType"];
 $ClassName =$_POST["ClassName"];
 
 
$sql = "select * from class WHERE ClassName='$ClassName'";
 
 $res = mysqli_query($con,$sql);
 
 if($res)
 {
	 while($idd=mysqli_fetch_assoc($res)){
		 $ClassId=$idd['ClassId'];
		 echo $ClassId;
		 echo "s";
		
	 }
	
 }
 
 
 
 
 
 
 $query="INSERT INTO `students` (`students`.`AdmissionNo`, `StudentName`, `StudentGender`, `StudentType`, `ClassId`) VALUES ('$AdmissionNo', '$StudentName', '$StudentGender', '$StudentType', '$ClassId');"; 
 // $response["success"] = TRUE
// echo json_encode($response);
 mysqli_query($con,$query) or die(mysqli_error($con));
 
 
 $query1="INSERT INTO `fee` (`AdmissionNo`,`LunchScheme`,`PE`,`EW`,`LT`,`RMI`,`Administration`,`Insuarance`,`Activity`,`Medical`,`Total`,`RecentPaidDate`,`TermBalance`,`AnnualBalance`) VALUES ('$AdmissionNo',0,0,0,0,0,0,0,0,0,0,NOW(),99999999,99999999);"; 
 mysqli_query($con,$query1) or die(mysqli_error($con));
 // $response["success"] = TRUE
// echo json_encode($response);
 mysqli_query($con,$query);
 mysqli_close($con);}
 ?>
 
 <form  action="" method="POST" enctype="multipart/form-data">
    <input type="hidden" name="action" value="submit">
   
	AdmissionNo:<br>
    <input name="AdmissionNo" type="text" value="" size="30"/><br> 
	StudentName:<br>
    <input name="StudentName" type="text" value="" size="30"/><br> 
	StudentGender:<br>
    <input name="StudentGender" type="text" value="" size="30"/><br> 
	StudentType:<br>
    <input name="StudentType" type="text" value="" size="30"/><br> 
	ClassName:<br>
    <input name="ClassName" type="text" value="" size="30"/><br> 
	
	
	
	
	 <input type="submit" value="Send"/> 
	 </form>
	
 