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