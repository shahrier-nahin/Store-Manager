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
        $cu_id = $_GET['updateid'];
        $sql = "SELECT * FROM `customers` WHERE cust_id=$cu_id";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);
        $cu_id = $row['cust_id'];
        $cu_name = $row['cust_name'];
        $cu_address = $row['cust_address'];
        $cu_number = $row['cust_number'];

    
        if (isset($_POST['submit'])) {

            $cu_id=$_POST['cust_id'];
            $cu_name=$_POST['cust_name'];
            $cu_address=$_POST['cust_address'];
            $cu_number=$_POST['cust_number'];
    
            $sql = "UPDATE `customers` SET cust_name='$cu_name', cust_address='$cu_address', cust_number='$cu_number' WHERE cust_id=$cu_id";
            $result = mysqli_query($conn, $sql);
            if ($result) {
               header('location:display_customer.php');
                
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
    placeholder="Enter ID" name="cust_id" value="<?php echo $cu_id;?>">
  </div>

  <div class="form-group">
    <label>Customers's Name</label>
    <input type="text" class="form-control" 
    placeholder="Enter customers's Name" name="cust_name"value="<?php echo $cu_name;?>">

  </div>

  <div class="form-group">
    <label>Contact Number</label>
    <input type="tel" class="form-control" 
    placeholder="Enter Phone Number" name="cust_number" value="<?php echo $cu_number;?>">
  </div>

  <div class="form-group">
    <label>Contact Number</label>
    <input type="text" class="form-control" 
    placeholder="Enter Address" name="cust_address" value="<?php echo $cu_address;?>">
  </div>

 
  <button type="submit" class="btn btn-dark" name="submit">Update</button>
</form>
    </body>
</html> 