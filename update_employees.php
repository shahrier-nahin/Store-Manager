<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="styles.css">
    
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <title>Store Manager</title>
  </head>
  <body>
  <nav class="navbar navbar-dark bg-dark">
        <a class="navbar-brand text white">Store Manager</a>
        <button class="btn btn-outline-light my-2 my-sm-0" onclick="logout()">Logout</button>
        <script>
        function logout() {
            // Send a request to the logout module
            window.location.href = "login.php";
        }
        </script>
      </div>
  </nav>


      <!--Sidebar-->
      <div class="sidebar">
        <a href="MySQL.php">Supplier</a>
        <a href="display_product.php">Product</a>
        <a href="display_employees.php">Employee</a>
        <a href="display_inventory.php">Inventory</a>
        <a href="display_customer.php">Customer</a>
        <a href="display_orders.php">Orders</a>
      </div>
      
      <div class="content">

      <?php 
    include 'connect.php';

    if (isset($_GET['updateid'])) {
        $e_id = $_GET['updateid'];
        $sql = "SELECT * FROM `employees` WHERE emp_id=$e_id";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);
        $e_id=$row['emp_id'];
        $e_name=$row['emp_name'];
        $e_number=$row['emp_number'];
        $e_address=$row['emp_address'];
    
        if (isset($_POST['submit'])) {
           
            $e_id=$_POST['emp_id'];
            $e_name=$_POST['emp_name'];
            $e_address=$_POST['emp_address'];
            $e_number=$_POST['emp_number'];
    
            $sql = "UPDATE `employees` SET emp_name='$e_name', emp_address='$e_address', emp_number='$e_number' WHERE emp_id=$e_id";
            $result = mysqli_query($conn, $sql);
            if ($result) {
               header('location:display_employees.php');
                
            } else {
                die(mysqli_error($conn));
            }
        }
    }
    
?>


<form method = "post">
  <div class="form-group">
    <label>ID</label>
    <input type="number" class="form-control" 
    placeholder="Enter ID" name="emp_id" value="<?php echo $e_id;?>">
  </div>

  <div class="form-group">
    <label>Employee's Name</label>
    <input type="text" class="form-control" 
    placeholder="Enter Employee's Name" name="emp_name"value="<?php echo $e_name;?>">

  </div>

  <div class="form-group">
    <label>Contact Number</label>
    <input type="tel" class="form-control" 
    placeholder="Enter Phone Number" name="emp_number" value="<?php echo $e_number;?>">
  </div>

  <div class="form-group">
    <label>Contact Number</label>
    <input type="text" class="form-control" 
    placeholder="Enter Address" name="emp_address" value="<?php echo $e_address;?>">
  </div>

 
  <button type="submit" class="btn btn-dark" name="submit">Update</button>
</form>
    </body>
</html> 