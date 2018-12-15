
<?php
 require_once('dbConnect.php');
 include 'fireBaseFunctions.php';

	global $connection;
 if($_SERVER["REQUEST_METHOD"]=="POST"){
     
     $response = array("error" => FALSE);
 
 $email =$_POST["email"];
 $topic =$_POST["topic"];
 $startindex =$_POST["startindex"];
 $endindex =$_POST["endindex"];
 
 $SenderId =$_POST["UserId"];
 
 
 $sql = "select * from `users`  WHERE `users`.`id`=$SenderId";
 
 $res = mysqli_query($con,$sql);
 
 if($res)
 {
	 while($idd=mysqli_fetch_assoc($res)){
		 
		 
		 $SenderName=$idd['name'];
		 //echo $SenderName;
		 
		
	 }
	
 }
 
 
 $sql = "select * from `users`  WHERE `users`.`email` LIKE '%$email%'";
 
 $res = mysqli_query($con,$sql);
 
 
 $counter=0;
 if($res)
 {
	 while($idd=mysqli_fetch_assoc($res)){
		 
		 $counter=$counter+1;
		 $firebase_token=$idd['token_value'];
		// echo $firebase_token;
		
		
		 
		
	 }
	
 }
 
 if($counter==0||$firebase_token==NULL){
     $response["error"] = TRUE;
     $response["error_msg"] = "Your recepient has either not signed up with the PPRA community or his/her device does not support this feature.";
        
 }
 
 echo json_encode($response);
 
 $Blank="";
 
 /*$message = array
          (
		'body' 	=> $SenderName.' has highlighted some script on your book ',
		'title'	=> 'Notification',
		'click_action' => 'PAINTSHARE',
	'Topic' => $BookerId,
	'StartIndex' => $BookerId,
	'EndIndex' => $BookerId,
	'NewsId' => $Blank,
             	
          );*/
          
          $message = array
          (
		'body' 	=> $SenderName.' has highlighted some script on your book .',
		'title'	=> 'Paint-share',
		'click_action' => 'BOOKINGS',
		'Topic' => $topic,
	'StartIndex' => $startindex,
	'EndIndex' => $endindex,
	'NewsId' => $Blank,
	'Name' => $SenderName,
             	
          ); 
          
         /*$firebase_token="dtyqo-ZgROc:APA91bHOdolnkyNDf1igDalMGOPFaIqTZbZwpCqm78aiSdFg1vCdzjKNmgjIsSE9qOM6ifotPMBLJIHBqXiG8i9mVhX8urKHEQF8lrq9I5uEtfnMyf2mDilF7ORVxiQ9Jgz6uFysD-nC";*/
          
          send_notifications($firebase_token, $message);
 
 
 
 mysqli_close($con);}
 ?>
 
 
 