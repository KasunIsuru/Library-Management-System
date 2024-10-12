<?php
include '../db.php';

if (isset($_GET['member_id'])) {
    $member_id = $_GET['member_id'];
    $sql = "SELECT * FROM member WHERE member_id='$member_id'";
    $result = $conn->query($sql);
    $member = $result->fetch_assoc();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $member_id = $_POST['member_id'];
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $birthday = $_POST['birthday'];
    $email = $_POST['email'];

    $sql = "UPDATE member SET first_name='$first_name', last_name='$last_name', birthday='$birthday', email='$email' 
            WHERE member_id='$member_id'";

    if ($conn->query($sql) === TRUE) {
        header("Location: view.php");
    } else {
        echo "Error updating record: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Member</title>
    <link rel="stylesheet" href="../assets/css/style.css">
</head>
<body>
    <div class="container">
        <h2>Edit Member Details</h2>
        <form method="POST">
            <label>Member ID:</label>
            <input type="text" name="member_id" value="<?php echo $member['member_id']; ?>" readonly><br>
            <label>Firstname:</label>
            <input type="text" name="firstname" value="<?php echo $member['first_name']; ?>" required><br>
            <label>Lastname:</label>
            <input type="text" name="lastname" value="<?php echo $member['last_name']; ?>" required><br>
            <label>Birthday:</label>
            <input type="date" name="birthday" value="<?php echo $member['birthday']; ?>" required><br>
            <label>Email:</label>
            <input type="email" name="email" value="<?php echo $member['email']; ?>" required><br>
            <button type="submit">Update Member</button>
        </form>
        <a href="view.php" class="button">Back</a>
    </div>
</body>
</html>
