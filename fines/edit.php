<?php
include '../db.php';

if (isset($_GET['fine_id'])) {
    $fine_id = $_GET['fine_id'];
    $sql = "SELECT * FROM fine WHERE fine_id='$fine_id'";
    $result = $conn->query($sql);
    $fine = $result->fetch_assoc();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $fine_id = $_POST['fine_id'];
    $book_id = $_POST['book_id'];
    $member_id = $_POST['member_id'];
    $fine_amount = $_POST['fine_amount'];
    $fine_date_modified = date('Y-m-d H:i:s');

    if ($fine_amount < 2 || $fine_amount > 500) {
        echo "Fine amount must be between 2 and 500.";
        return;
    }

    $sql = "UPDATE fine SET book_id='$book_id', member_id='$member_id', fine_amount='$fine_amount', 
            fine_date_modified='$fine_date_modified' WHERE fine_id='$fine_id'";

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
    <title>Edit Fine</title>
    <link rel="stylesheet" href="../assets/css/style.css">
</head>
<body>
    <div class="container">
        <h2>Edit Fine Details</h2>
        <form method="POST">
            <label>Fine ID:</label>
            <input type="text" name="fine_id" value="<?php echo $fine['fine_id']; ?>" readonly><br>
            <label>Book ID:</label>
            <input type="text" name="book_id" value="<?php echo $fine['book_id']; ?>" required><br>
            <label>Member ID:</label>
            <input type="text" name="member_id" value="<?php echo $fine['member_id']; ?>" required><br>
            <label>Fine Amount:</label>
            <input type="number" name="fine_amount" value="<?php echo $fine['fine_amount']; ?>" required><br>
            <button type="submit">Update Fine</button>
        </form>
        <a href="view.php" class="button">Back</a>
    </div>
</body>
</html>
