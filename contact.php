<?php
$name=$_POST['name'];
$email=$_POST['email'];
$message=$_POST['message'];
$c=mysqli_connect('localhost','root','','tuto');
if(!$c){die(mysqli_connect_error());}
else{
   echo 'connection effectué' ;
}
$req=mysqli_query($c,"insert into messages(name,mail,message) values('$name','$email','$message')");
			if ($req) {
			echo'"<script>alert("message sent")</script>"' ; 	
			} 
            else {
				echo "Something Wrong Went";
			}
		
?>