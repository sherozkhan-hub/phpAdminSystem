<?php

@include 'connection.php';
session_start();
$query = "SELECT * FROM product";
$response = mysqli_query($con, $query);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="styles/styles.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</head>
<body class="container admin" >
    <header>
        <h1>Hi Admin</h1>
        <!-- <h1>Welcomess </h1> --> 
        
    </header>
    <div>
    <button class="btn btn-success"><a href="create.php" class="text-light">Create new Product</a></button>
    <button class="btn btn-danger"><a href="user_page.php" class="text-light">Preview as User</a></button>
    <button class="btn btn-danger"><a href="index.php" class="text-light">Logout</a></button>

    </div>
   
    
      
              <?php
                    while($row = $response->fetch_assoc())
                    {
                        $id=$row['id'];
                        echo "
                        <div class='card d-inline-block m-2 p-1'>
                       
                        <img  src='{$row['image']}' class='card-img-top ' alt='...''>
                        <div class='card-body'>
                          <h5 class='card-title'>Name: {$row['name']}</h5>
                          <h5 class='card-title'>Price: {$row['price']}</h5>
                          <button class='btn btn-primary '><a href='update.php?editid=$id' class='text-light'>Edit</a></button>
                          <button class='btn btn-danger'><a href='delete.php?dltid=$id' class='text-light'>Delete</a></button>
                          
                        </div>
                      </div>
                        ";

 
                        
                    }

                ?>
               
               

            
</body>
</html>