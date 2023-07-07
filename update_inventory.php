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
        $id = $_GET['updateid'];
        $sql = "SELECT * FROM `inventory` WHERE i_id=$id";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);
        $id = $row['i_id'];
        $c_name = $row['i_name'];
        $number = $row['i_quantity'];
    
        if (isset($_POST['submit'])) {
           

            $id=$_POST['i_id'];
            $c_name=$_POST['i_name'];
            $number=$_POST['i_price'];
    
            $sql = "UPDATE `inventory` SET i_name='$c_name', i_quantity='$number' WHERE i_id=$id";
            $result = mysqli_query($conn, $sql);
            if ($result) {
               header('location:display_inventory.php');
                
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
    placeholder="Enter  ID" name="i_id" value="<?php echo $id;?>">
  </div>

  <div class="form-group">
    <label>Item Name</label>
    <input type="text" class="form-control" placeholder="Enter Item Name" name="i_name"value="<?php echo $c_name;?>">

  </div>

  <div class="form-group">
    <label>Product Quantity</label>
    <input type="tel" class="form-control" 
    placeholder="Enter Quantity" name="i_price" value="<?php echo $number;?>">
</div>

 
  <button type="submit" class="btn btn-dark" name="submit">Update</button>
</form>
    </body>
</html> 