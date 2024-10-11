<?php
include '../db.php';

$member_id_error = false; 

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $member_id = $_POST['member_id'];
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $birthday = $_POST['birthday'];
    $email = $_POST['email'];

    $check_member_id_sql = "SELECT * FROM member WHERE member_id = '$member_id'";
    $member_id_result = $conn->query($check_member_id_sql);

    if ($member_id_result->num_rows > 0) {
        $member_id_error = true;
    } else {
        $sql = "INSERT INTO member (member_id, firstname, lastname, birthday, email) 
                VALUES ('$member_id', '$firstname', '$lastname', '$birthday', '$email')";

        if ($conn->query($sql) === TRUE) {
            header("Location: view.php");
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Member</title>
    <link rel="stylesheet" href="../assets/css/style.css">
    <style>
        .error-border {
            border: 2px solid red;
        }
        .error-message {
            color: red;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Add a New Member</h2>
        <form method="POST">
            <label>Member ID:</label>
            <input type="text" name="member_id" class="<?php if ($member_id_error) echo 'error-border'; ?>" required><br>
            <?php if ($member_id_error): ?>
                <span class="error-message">This Member ID already exists. Please choose another.</span><br>
            <?php endif; ?>

            <label>Firstname:</label>
            <input type="text" name="firstname" required><br>
            <label>Lastname:</label>
            <input type="text" name="lastname" required><br>
            <label>Birthday:</label>
            <input type="date" name="birthday" required><br>
            <label>Email:</label>
            <input type="email" name="email" required><br>

            <button type="submit">Add Member</button>
        </form>
        <a href="view.php" class="button">Back</a>
    </div>
</body>
</html>
