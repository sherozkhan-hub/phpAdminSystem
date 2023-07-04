<?php


    if(isset($_POST['submit'])) 
    {
        include('connection.php');
        $name = $_POST['name'];
        $price = $_POST['price'];
        
        // Retrieve the uploaded image details
      $image = $_FILES['image'];
      $targetdirectory="uploads/";
      $targetfile=$targetdirectory.basename($image['name']);
      if(move_uploaded_file($image['tmp_name'],$targetfile))
      {
        echo "image upplaoded";
      }

       

        $query = "INSERT INTO product(image, name, price) VALUES ('{$targetfile}', '{$name}', '{$price}')";
        $response = mysqli_query($con, $query);
        if(!$response)
        {
            echo "Erro occured";
        }
        echo "<script>alert('Insertion Successful');</script>";
         header('location:admin_page.php');
    }
?>

<html>
    <head>
        <title>Create</title>
        <link rel="stylesheet" href="./styles/styles.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
  
    </head>

    <body class="container">
        <h2>Create New Product</h2>
        <table class="my-4">
            <form action="create.php" method="post" enctype="multipart/form-data">
            <tbody>
             
                <tr>
                    <td><label for="name" class="form-label">Name:</label></td>
                    <td><input type="text" class="form-control" name="name" id="name"></td>
                </tr>

                <tr>
                    <td><label for="price" class="form-label">Price:</label></td>
                    <td><input type="text" class="form-control" name="price" id="price"></td>
                </tr>

                <tr>
                    <td><label for="image" class="form-label">Image:</label></td>
                    <td><input type="file" class="form-control" name="image" id="image"></td>
                </tr>

                <tr>
                    <td><input type="submit" class="btn btn-success" value="Create" name="submit"></td>
                </tr>
            </tbody>
            </form>
        </table>               
    </body>
</html>