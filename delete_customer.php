<?php
include 'connect.php';
if (isset($_GET['deleteid'])){
    $cu_id=$_GET['deleteid'];

    $sql="delete from `customers` where cust_id=$cu_id";
    $result=mysqli_query($conn, $sql);
    if($result){
        //echo "Deleted successfully";
        header('location:display_customer.php');
    }else{
        die(mysqli_error($conn));
    }
}
?> 