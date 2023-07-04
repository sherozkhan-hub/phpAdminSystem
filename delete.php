<?php 

    @include 'connection.php';

    if(isset($_GET['dltid'])){
        $id=$_GET['dltid'];

        $delete= "DELETE FROM product where id=$id";
        $result=mysqli_query($con, $delete);
        if($result){
            echo "Deletion Successful";
            header('location:admin_page.php');
        }else{
            die(mysqli_error($con));
        }
       
        

    }
?>