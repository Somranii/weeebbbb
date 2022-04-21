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
<<<<<<< HEAD:php/contact.php
				move_uploaded_file($image_tmp_name, $image_folder);
				header('location:./my_account.php'); 	
			} else {
				echo "Something Wrong Went";
			}
		
		?>
=======
			echo'"<script>alert("message sent")</script>"' ; 	
			} 
            else {
				echo "Something Wrong Went";
			}
		
?>
>>>>>>> 8db7c111e1617763392a5b3ba3c5bd8617480c7b:contact.php
