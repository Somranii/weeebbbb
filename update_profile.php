<?php
$c=mysqli_connect('localhost','root','','tuto');
session_start();
$user_id = $_SESSION['user_id'];

if(isset($_POST['update_profile'])){

    $update_name = mysqli_real_escape_string($c, $_POST['update_name']);
    $update_email = mysqli_real_escape_string($c, $_POST['update_email']);
    $update_age = mysqli_real_escape_string($c, $_POST['update_age']);
    $update_number = mysqli_real_escape_string($c, $_POST['update_number']);
 if(!empty($update_number)){
mysqli_query($c, "UPDATE `user` SET phone='$update_number' WHERE id = '$user_id'")
or die('query failed');}
if(!empty($update_age)){
    mysqli_query($c, "UPDATE `user` SET age='$update_age' WHERE id = '$user_id'")
    or die('query failed');}
if(!empty($update_name)){
        mysqli_query($c, "UPDATE `user` SET name = '$update_name' WHERE id = '$user_id'")
        or die('query failed');}
if(!empty($update_email)){
            mysqli_query($c, "UPDATE `user` SET mail = '$update_email'WHERE id = '$user_id'")
            or die('query failed');}

   $old_pass = $_POST['old_pass'];
   $update_pass = mysqli_real_escape_string($c, $_POST['update_pass']);
   $new_pass = mysqli_real_escape_string($c,$_POST['new_pass']);
   $confirm_pass = mysqli_real_escape_string($c, $_POST['confirm_pass']);

   if(!empty($update_pass) || !empty($new_pass) || !empty($confirm_pass)){
      if($update_pass != $old_pass){
		echo "<script>alert('old Password not matched.')</script> ";
      }elseif($new_pass != $confirm_pass){
		echo "<script>alert('confirm Password not matched.')</script> ";
      }else{
         mysqli_query($c, "UPDATE `user` SET mdp = '$new_pass' WHERE id = '$user_id'")
          or die('update mdp failed');
          echo "<script>alert('Password updated')</script> ";
        }
   }
   $update_image = $_FILES['update_image']['name'];
   $update_image_size = $_FILES['update_image']['size'];
   $update_image_tmp_name = $_FILES['update_image']['tmp_name'];
   $update_image_folder = 'images/'.$update_image;

   if(!empty($update_image)){
      if($update_image_size > 2000000){
         echo 'image is too large';
      }else{
         $image_update_query = mysqli_query($c, "UPDATE `user` SET image = '$update_image' WHERE id = '$user_id'")
          or die('update image failed');
         if($image_update_query){
            move_uploaded_file($update_image_tmp_name, $update_image_folder);
         }
         echo 'image updated succssfully!';
      }
   } 
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>update profile</title>
   <link rel="stylesheet" href="style_1.css" type="text/css">
</head>
<body>  
<div class="update-profile">
   <?php
      $select = mysqli_query($c, "SELECT * FROM `user` WHERE id = '$user_id'")
       or die('select failed failed');
      if(mysqli_num_rows($select) > 0){
         $fetch = mysqli_fetch_assoc($select);
      }
   ?>
   <form action="" method="post" enctype="multipart/form-data">
      <?php
          if($fetch['image'] == ''){
            echo '<img src="images/default-avatar.png">';
         }else{
            echo '<img src="images/'.$fetch['image'].'">';
         }
      ?>
      <div class="flex">
         <div class="inputBox">
            <label>new username :</label>
            <input type="text" name="update_name" class="box">
          <br>  <label>new email :</label>
            <input type="email" name="update_email"  class="box">
          <br>  <label>age :</label>
            <input type="number" name="update_age" class="box">
          <br>  <label>phone number :</label>
            <input type="number" name="update_number" class="box">
            <br>    <label>update your pic :</label>
            <input type="file" name="update_image" class="box">
         </div>
         <div class="inputBox">
         <br>   
         <input type="hidden" name="old_pass" value="<?php echo $fetch['mdp']; ?>">
            <label>old password :</label>
            <input type="password" name="update_pass" placeholder="enter previous password" class="box">
            <br>    <label>new password :</label>
            <input type="password" name="new_pass" placeholder="enter new password" class="box">
            <br>    <label>confirm password :</label>
            <input type="password" name="confirm_pass" placeholder="confirm new password" class="box">
         </div>
      </div>
      <input type="submit" value="update" name="update_profile" class="btn">
      <a href="my_account.php" class="delete-btn">go back</a>
   </form>
</div>

</body>
</html>