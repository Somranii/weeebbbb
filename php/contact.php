<?php
$name=$_POST['name'];
$email=$_POST['email'];
$message=$_POST['message'];
$c=mysqli_connect('localhost','root','','tuto');
if(!$c){die(mysqli_connect_error());}
else{
   echo "connection effectué" ;
}
$req=mysqli_query($c,"insert into user(name,age,phone,sexe,type_p,type_d,mail,mdp,image) values('$name','$age','$phone','$gender','$type_p','$type_d','$mail','$mdp','$image') ");
			if ($req) {
				move_uploaded_file($image_tmp_name, $image_folder);
				header('location:./my_account.php'); 	
			} else {
				echo "Something Wrong Went";
			}
		
		?>