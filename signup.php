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

    <?php
        // Database connection
        include 'connect.php';

        // Check connection
        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }

        // Check if the form was submitted
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Retrieve form data
            $username = $_POST['username'];
            $password = $_POST['password'];

            // Insert user data into the database
            $sql = "INSERT INTO users (username, password) VALUES ('$username', '$password')";

            if (mysqli_query($conn, $sql)) {
                header('location:login.php');
            } else {
                echo "Error: " . $sql . "<br>" . mysqli_error($conn);
            }
        }

        // Close the database connection
        mysqli_close($conn);
    ?>
<nav class="navbar navbar-dark bg-dark">
        <a class="navbar-brand text-white">Store Manager</a>
    </nav>

    <div class="content">
<h2>Sign Up</h2>
    <form action="signup.php" method="POST">

        <label for="username">Username:</label>
        <input type="text" name="username" id="username" required><br><br>

        <label for="password">Password:</label>
        <input type="password" name="password" id="password" required><br><br>
        
        <button class="btn btn-outline-light my-2 my-sm-0" input type="submit">Sign Up</button>
    </form>
    </div>

</body>
</html>
