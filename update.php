<?php
    include('connection.php');
   session_start();
   if(isset($_GET['editid'])){
    $id = $_GET['editid'];
    $_SESSION['newid']= $_GET['editid'];
    $query= "SELECT * FROM product where id=$id";
    $result= mysqli_query($con, $query);
    $row=$result->fetch_assoc();
    $name = $row['name'];
    $price = $row['price'];
  
    
   }
    
    if(isset($_POST['update'] ))
    {
        $id = $_SESSION['newid'];
        echo $id;
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

        $query = "UPDATE product SET id='{$id}', image='{$targetfile}', name='{$name}', price='{$price}'
         WHERE id='{$id}'";
        $response = mysqli_query($con, $query);
        if(!$response)
        {
            echo "Erro occured";
        }
        echo "<script>alert('Updation Successful');</script>";
          header('location:admin_page.php');
    }
?>

<html>
    <head>
        <title>Update</title>
        <link rel="stylesheet" href="main.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
    </head>

    <body class="container my-4">
        <h2>Update Product</h2>
        <table class="my-4">
            <form action="update.php" method="post" enctype="multipart/form-data">
            <tbody>
             
                <tr >
                    <td><label for="name" class="form-label">Name:</label></td>
                    <td><input type="text" name="name" class="form-control" id="name" value=<?php echo $row['name'] ?>></td>
                </tr>

                <tr >
                    <td><label for="price" class="form-label">Price:</label></td>
                    <td><input type="text" name="price" class="form-control" id="price" value=<?php echo $row['price'] ?>></td>
                </tr>

                <tr >
                    <td><label for="image" class="form-label">Image:</label></td>
                    <td><input type="file" name="image" class="form-control" id="image" value=<?php echo $row['image'] ?>></td>
                </tr>

                <tr>
                    <td><input type="submit" name='update' value="Update" class="btn btn-success my-3"></td>
                </tr>
            </tbody>
            </form>
        </table>               
    </body>
</html>