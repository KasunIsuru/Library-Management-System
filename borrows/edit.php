<?php
include '../db.php';

if (isset($_GET['borrow_id'])) {
    $borrow_id = $_GET['borrow_id'];
    $sql = "SELECT * FROM bookborrower WHERE borrow_id='$borrow_id'";
    $result = $conn->query($sql);
    $borrow = $result->fetch_assoc();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $borrow_id = $_POST['borrow_id'];
    $book_id = $_POST['book_id'];
    $member_id = $_POST['member_id'];
    $borrow_status = $_POST['borrow_status'];
    $borrower_date_modified = date('Y-m-d H:i:s');

    $sql = "UPDATE bookborrower SET book_id='$book_id', member_id='$member_id', 
            borrow_status='$borrow_status', borrower_date_modified='$borrower_date_modified' 
            WHERE borrow_id='$borrow_id'";

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
    <title>Edit Borrow Record</title>
    <link rel="stylesheet" href="../assets/css/style.css">
</head>
<body>
    <div class="container">
        <h2>Edit Borrow Record</h2>
        <form method="POST">
            <label>Borrow ID:</label>
            <input type="text" name="borrow_id" value="<?php echo $borrow['borrow_id']; ?>" readonly><br>
            <label>Book ID:</label>
            <input type="text" name="book_id" value="<?php echo $borrow['book_id']; ?>" required><br>
            <label>Member ID:</label>
            <input type="text" name="member_id" value="<?php echo $borrow['member_id']; ?>" required><br>
            <label>Borrow Status:</label>
            <select name="borrow_status" required>
                <option value="borrowed" <?php if ($borrow['borrow_status'] == 'borrowed') echo 'selected'; ?>>Borrowed</option>
                <option value="available" <?php if ($borrow['borrow_status'] == 'available') echo 'selected'; ?>>Available</option>
            </select><br>
            <button type="submit">Update Borrow Record</button>
        </form>
        <a href="view.php" class="button">Back</a>
    </div>
</body>
</html>
