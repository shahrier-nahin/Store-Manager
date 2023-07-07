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
        $sql = "SELECT * FROM `product` WHERE p_id=$id";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);
        $id = $row['p_id'];
        $c_name = $row['p_name'];
        $number = $row['p_price'];
    
        if (isset($_POST['submit'])) {
           

            $id=$_POST['p_id'];
            $c_name=$_POST['p_name'];
            $number=$_POST['p_price'];
    
            $sql = "UPDATE `product` SET p_name='$c_name', p_price='$number' WHERE p_id=$id";
            $result = mysqli_query($conn, $sql);
            if ($result) {
               header('location:display_product.php');
                
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
    placeholder="Enter The product ID" name="p_id" value="<?php echo $id;?>">
  </div>

  <div class="form-group">
    <label>Product Name</label>
    <input type="text" class="form-control" placeholder="Enter Product Name" name="p_name"value="<?php echo $c_name;?>">

  </div>

  <div class="form-group">
    <label>Product Price</label>
    <input type="tel" class="form-control" 
    placeholder="Enter Price" name="p_price" value="<?php echo $number;?>">
</div>

 
  <button type="submit" class="btn btn-dark" name="submit">Update</button>
</form>
    </body>
</html> 