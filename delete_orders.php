<?php
include 'connect.php';
if (isset($_GET['deleteid'])){
    $id=$_GET['deleteid'];

    $sql="delete from `orders` where order_no=$id";
    $result=mysqli_query($conn, $sql);
    if($result){
        //echo "Deleted successfully";
        header('location:display_orders.php');
    }else{
        die(mysqli_error($conn));
    }
}
?>