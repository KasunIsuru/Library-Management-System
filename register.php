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
}
?>