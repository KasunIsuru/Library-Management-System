<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

include 'db.php';  

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $user_id = $_POST['user_id'];
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $email = $_POST['email'];

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "Invalid email format";
        return;
    }

    $checkUsername = "SELECT * FROM user WHERE username='$username'";
    $result = $conn->query($checkUsername);
    if ($result->num_rows > 0) {
        echo "Username already taken!";
        return;
    }

    $sql = "INSERT INTO user (user_id, email, first_name, last_name, username, password) 
            VALUES ('$user_id', '$email', '$first_name', '$last_name', '$username', '$password')";

    if ($conn->query($sql) === TRUE) {
        echo "Registration successful!";
        header("Location: index.php");  
        exit();  
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error; 
    }
    
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
    <div class="container2">
        <h2>Register User</h2>
        <form method="POST">
            <label>User ID:</label>
            <input type="text" name="user_id" required><br>
            <label>Firstname:</label>
            <input type="text" name="first_name" required><br>
            <label>Lastname:</label>
            <input type="text" name="last_name" required><br>
            <label>Username:</label>
            <input type="text" name="username" required><br>
            <label>Password:</label>
            <input type="password" name="password" required><br>
            <label>Email:</label>
            <input type="email" name="email" required><br>
            <button type="submit">Register</button>
        </form>
        <p><a href="index.php">Back to Login</a></p>
    </div>
</body>
</html>
