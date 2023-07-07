<?php
include 'connect.php';
if (isset($_GET['deleteid'])){
    $e_id=$_GET['deleteid'];

    $sql="delete from `employees` where emp_id=$e_id";
    $result=mysqli_query($conn, $sql);
    if($result){
        //echo "Deleted successfully";
        header('location:display_employees.php');
    }else{
        die(mysqli_error($conn));
    }
}
?>