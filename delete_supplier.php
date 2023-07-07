<?php
include 'connect.php';
if (isset($_GET['deleteid'])){
    $id=$_GET['deleteid'];

    $sql="delete from `supplier` where s_id=$id";
    $result=mysqli_query($conn, $sql);
    if($result){
        //echo "Deleted successfully";
        header('location:MySQL.php');
    }else{
        die(mysqli_error($conn));
    }
}
?>