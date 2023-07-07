<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="styles_auth.css">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <title>Store Manager</title>

</head>
<body>
    <?php include 'connect.php';
        // Check if the form was submitted
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Retrieve form data
            $username = $_POST['username'];
            $password = $_POST['password'];

            // Fetch user data from the database
            $sql = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";
            $result = mysqli_query($conn, $sql);

            // Check if user exists
            if (mysqli_num_rows($result) == 1) {
                header('location:MySQL.php');
            } else {
                echo "<p style='color: white;'>Invalid username or password.</p>";
            }
        }
    ?>

    <nav class="navbar navbar-dark bg-dark">
        <a class="navbar-brand text-white">Store Manager</a>
    </nav>

    <div class="content">
        <h2>Login</h2>
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
        
            <label for="username">Username:</label>
            <input type="text" name="username" id="username" required><br><br>

            <label for="password">Password:</label>
            <input type="password" name="password" id="password" required><br><br>

            <button class="btn btn-outline-light my-2 my-sm-0" input type="submit">Login</button>
           

            <p>Don’t have an account?</p><a class="text" href="signup.php">Sign Up</a>
        </form>
    </div>

</body>
</html>
