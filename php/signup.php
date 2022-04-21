<?php
$name=$_POST['name'];
$age=$_POST['age'];
$phone=$_POST['number'];
$gender=$_POST['gender'];
$type_p=$_POST['type_p'];
if($type_p=="doner"){$type_d="";}
else
{$type_d=$_POST['type_d'];}
$mail=$_POST['mail'];
$mdp=$_POST['password'];
$cmdp=$_POST['password2'];
$image = $_FILES['image']['name'];
$image_size = $_FILES['image']['size'];
$image_tmp_name = $_FILES['image']['tmp_name'];
$image_folder = '../media/'.$image;
$c=mysqli_connect('localhost','root','','tuto');
if(!$c){die(mysqli_connect_error());}
else{
   echo "connection effectué" ;
}
$sql = "SELECT * FROM user WHERE mail='$mail'";
		$result = mysqli_query($c, $sql);
		if (mysqli_num_rows($result) > 0) {
			echo '<script>alert("email already exist")</script>';
            
		} else {
			$req=mysqli_query($c,"insert into user(name,age,phone,sexe,type_p,type_d,mail,mdp,image) values('$name','$age','$phone','$gender','$type_p','$type_d','$mail','$mdp','$image') ");
			if ($req) {
				move_uploaded_file($image_tmp_name, $image_folder);
				header('location:./my_account.php'); 	
			} else {
				echo "Something Wrong Went";
			}
		}
?>
