<?php
session_start();
$user_id = $_SESSION['user_id'];
if(!isset($user_id)){
   header('location:signin.html');
};
?>

<html>
<head>
<title> Donate here</title>
<link rel ="stylesheet" href="style_thank.css" type="text/css">
<script src="script.js"></script>
</head>

<form method="POST" action="donation.php">
<p >Please fill out the below details to carry out your Good Work</p><br>
<p>Donation details: </p>
<label for="d">donation amount: </label>
<input id="d" type="text" name="card"  required />
<br>
<label for="c">card Number: </label>
<input id="c" type="text" name="card"  required />
<br>
<label for="cp">code postal: </label>
<input id="cp" type="text" name="card"  required />
<br>
<textarea style="height: 50px; width:500px" placeholder="leave a comment (optional)"></textarea>
<br>

<!--donation popup-->
<div class="container">
   <button class="btn-send" onclick="show()">donate now</button>
   <div class="card" id="pop">
      <img src="az.png">
      <h2>thank you </h2>
      <p>thank you for your donation</p>
       <button class="btn-close" onclick="hide()">dismiss</button>
   </div>
</div>

</form>
</body>
</html>