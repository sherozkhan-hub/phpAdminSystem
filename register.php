<?php 

    if(isset($_POST['submit'])){
        $name = $_POST['name'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $cpassword = $_POST['cpassword'];
        $user_type = $_POST['user_type'];

        @include 'connection.php';

        $query = "SELECT * FROM user WHERE email = '$email' && password='$password'";
        $response = mysqli_query($con, $query);

        if(mysqli_num_rows($response) > 0)
        {
            $error[] ='user already exist';
        }else{
            if($password !=$cpassword){
                $error[]= "password does not match with current_password";
            }else{
                $insert ="INSERT INTO user(name, email , password, user_type) VALUES('$name', '$email', '$password', '$user_type')";
                mysqli_query($con, $insert);
                header('location: index.php');
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
   <title>register form</title>

   <!-- custom css file link  -->
   <link rel="stylesheet" href="styles/styles.css">

</head>
<body>
   
<div class="form-container">

   <form action="register.php" method="post">
      <h3>register now</h3>
      <?php
      if(isset($error)){
         foreach($error as $error){
            echo '<span class="error-msg">'.$error.'</span>';
         };
      };
      ?>
      <input type="text" name="name" required placeholder="enter your name">
      <input type="email" name="email" required placeholder="enter your email">
      <input type="password" name="password" required placeholder="enter your password">
      <input type="password" name="cpassword" required placeholder="confirm your password">
      <select name="user_type">
         <option value="user">user</option>
         <option value="admin">admin</option>
      </select>
      <input type="submit" name="submit" value="register now" class="form-btn">
      <p>already have an account? <a href="index.php">login now</a></p>
   </form>

</div>

</body>
</html>