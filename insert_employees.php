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
        $e_id=$_POST['emp_id'];
        $e_name=$_POST['emp_name'];
        $e_address=$_POST['emp_address'];
        $e_number=$_POST['emp_number'];


        $sql="insert into `employees` (emp_id, emp_name, emp_address, emp_number) values('$e_id','$e_name', '$e_address', '$e_number')";
        $result=mysqli_query($conn, $sql);
        if($result){
            //echo "Data inserted successfully";
            header('location:display_employees.php');
        }else{
            die(mysqli_error($conn));
        }
    }
?>

<form method = "post">
  <div class="form-group">
    <label>ID</label>
    <input type="number" class="form-control" 
    placeholder="Enter ID" name="emp_id">
  </div>

  <div class="form-group">
    <label>Employee's Name</label>
    <input type="text" class="form-control" 
    placeholder="Enter Employee's Name" name="emp_name">
  </div>

  <div class="form-group">
    <label>Contact Number</label>
    <input type="tel" class="form-control" 
    placeholder="Enter Phone Number" name="emp_number">
  </div>

  <div class="form-group">
    <label>Address</label>
    <input type="tel" class="form-control" 
    placeholder="Enter Address" name="emp_address">
  </div>
 
  <button type="submit" class="btn btn-dark" name="submit">Submit</button>
</form>
    </body>
</html> 