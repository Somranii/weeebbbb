<?php
$c=mysqli_connect('localhost','root','','tuto');
session_start();
$user_id = $_SESSION['user_id'];

if(!isset($user_id)){
   header('location:signin.html');
};

if(isset($_GET['logout'])){
   unset($user_id);
   session_destroy();
   header('location:signin.html');
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>my account</title>
    <link rel="stylesheet" href="style_1.css" type="text/css">
</head>
<body>
 <div class="container">
   <div class="profile"> 
       <?php
       $select = mysqli_query($c, "SELECT * FROM `user` WHERE id = '$user_id'") or die('selection failed');
       if(mysqli_num_rows($select) > 0){
          $fetch = mysqli_fetch_assoc($select);
       }
       if($fetch['image'] == ''){
          echo '<img src="images/default-avatar.png">';
       }else{
          echo '<img src="images/'.$fetch['image'].'">';
       }
       ?><br>
     <label for="nom">username : </label>     
     <?php echo $fetch['name']; ?> <br>

     <label for="email">email : </label>    
        <?php echo $fetch['mail']; ?><br>

     <label for="age"> age : </label>   
         <?php echo $fetch['age']; ?> <br>

     <label for="gender"> gender : </label>     
       <?php echo $fetch['sexe']; ?><br>

     <label for="ph">phone number : </label>    
        <?php echo $fetch['phone']; ?>  <br>

     <label for="tu">type user : </label> 
        <?php echo $fetch['type_p']; ?> <br>

     <label for="dis">form of disability : </label>
         <?php echo $fetch['type_d']; ?><br>

      <a href="update_profile.php" class="btn">update profile</a>
      <a href="donation.php" class="btn">donate now</a>
      <a href="my_account.php?logout=<?php echo $user_id; ?>" class="btn">logout</a>
      <p >new <a href="signin.html">login</a> or <a href="signup.html">register</a></p>
   </div>

</div>

</body>
</html>

