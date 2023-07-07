<?php include 'connect.php'?>

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
      <button class="btn btn-outline-dark float-left mb-3"><a href="insert_employees.php" class="text-dark">Add Employee</a></button>      
<table class="table">
  <thead class="thead-dark">


    <tr>
      <th scope="col">ID</th>
      <th scope="col">Employee's Name</th>
      <th scope="col">Phone Number</th>
      <th scope="col">Address</th>
      <th scope="col">Actions</th>
    </tr>
  </thead>
  <tbody>
<?php
include 'connect.php';
$sql="select * from `employees`";
$result=mysqli_query($conn, $sql);
if($result){
  while($row=mysqli_fetch_assoc($result)){
    $e_id=$row['emp_id'];
    $e_name=$row['emp_name'];
    $e_number=$row['emp_number'];
    $e_address=$row['emp_address'];
    echo'<tr>
    <th scope="row">'.$e_id.'</th>
    <td>'.$e_name.'</td>
    <td>'.$e_number.'</td>
    <td>'.$e_address.'</td>
    
    <td>
      
      <button class="btn btn-outline-secondary"><a href="update_employees.php? updateid='.$e_id.'"class="text-dark">Update</a></button>
      <button class="btn btn-outline-secondary"><a href="delete_employees.php? deleteid='.$e_id.'"class="text-dark">Delete</a></button>
    </td>
  </tr>';
  }
}


?>

  </tbody>
</table>
      </div>

    </body>
</html>