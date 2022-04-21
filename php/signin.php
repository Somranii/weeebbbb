<?php 
$c=mysqli_connect('localhost','root','','tuto');
session_start();
if(!$c){die(mysqli_connect_error());}
if (isset($_POST['submit'])) {
	$email = $_POST['email'];
	$password = $_POST['password'];

	$sql = "SELECT * FROM user WHERE mail='$email' AND mdp='$password'";
	$result = mysqli_query($c, $sql);
	if ($result->num_rows > 0) {
		$row = mysqli_fetch_assoc($result);
		$_SESSION['user_id'] = $row['id'];
		header('location:./my_account.php');
	} else {
		echo "<script>alert('Woops! Email or Password is Wrong.')</script> ";
	}
}

?>
