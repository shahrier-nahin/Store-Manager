<?php
include 'connect.php';
if (isset($_GET['deleteid'])){
    $id=$_GET['deleteid'];

    $sql="delete from `inventory` where i_id=$id";
    $result=mysqli_query($conn, $sql);
    if($result){
        //echo "Deleted successfully";
        header('location:display_inventory.php');
    }else{
        die(mysqli_error($conn));
    }
}
?>