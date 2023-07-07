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
    if(isset($_POST['submit'])){
        $id=$_POST['order_no'];
        $c_name=$_POST['o_name'];
        $number=$_POST['o_quantity'];
        $o_number=$_POST['o_date'];

        $sql="insert into `orders` (order_no, o_name, o_quantity,o_date) values('$id','$c_name', '$number','$o_number')";
        $result=mysqli_query($conn, $sql);
        if($result){
            //echo "Data inserted successfully";
            header('location:display_orders.php');
        }else{
            die(mysqli_error($conn));
        }
    }
?>

<form method = "post">
  <div class="form-group">
    <label>Order No</label>
    <input type="number" class="form-control" 
    placeholder="Enter The Order No" name="order_no">
  </div>


  <div class="form-group">
    <label>Order Name</label>
    <input type="text" class="form-control" 
    placeholder="Enter Order  Name" name="o_name">
  </div>

  <div class="form-group">
    <label>Order Quantity</label>
    <input type="tel" class="form-control" 
    placeholder="Enter The Quantity" name="o_quantity">
  </div>
 
  <div class="form-group">
    <label>Order Date</label>
    <input type="tel" class="form-control" 
    placeholder="Year-Month-Date" name="o_date">
  </div>

  <button type="submit" class="btn btn-dark" name="submit">Submit</button>
</form>
    </body>
</html> 