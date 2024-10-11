<?php
include '../db.php';

$borrow_id_error = false;

$book_sql = "SELECT * FROM book";
$book_result = $conn->query($book_sql);

$member_sql = "SELECT * FROM member";
$member_result = $conn->query($member_sql);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $borrow_id = $_POST['borrow_id'];
    $book_id = $_POST['book_id'];
    $member_id = $_POST['member_id'];
    $borrow_status = $_POST['borrow_status'];

    $check_borrow_id_sql = "SELECT * FROM bookborrower WHERE borrow_id = '$borrow_id'";
    $borrow_id_result = $conn->query($check_borrow_id_sql);

    if ($borrow_id_result->num_rows > 0) {
        $borrow_id_error = true;
    } else {
        $sql = "INSERT INTO bookborrower (borrow_id, book_id, member_id, borrow_status, borrower_date_modified) 
                VALUES ('$borrow_id', '$book_id', '$member_id', '$borrow_status', NOW())";

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
    <title>Add Borrow Record</title>
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
        <h2>Add a New Borrow Record</h2>
        <form method="POST">
            <label>Borrow ID:</label>
            <input type="text" name="borrow_id" class="<?php if ($borrow_id_error) echo 'error-border'; ?>" required><br>
            <?php if ($borrow_id_error): ?>
                <span class="error-message">This Borrow ID already exists. Please choose another.</span><br>
            <?php endif; ?>

            <label>Book ID:</label>
            <select name="book_id" required>
                <option value="" disabled selected>Select a Book</option>
                <?php while($row = $book_result->fetch_assoc()) {
                    echo "<option value='" . $row['book_id'] . "'>" . $row['book_name'] . "</option>";
                } ?>
            </select><br>

            <label>Member ID:</label>
            <select name="member_id" required>
                <option value="" disabled selected>Select a Member</option>
                <?php while($row = $member_result->fetch_assoc()) {
                    echo "<option value='" . $row['member_id'] . "'>" . $row['first_name'] . " " . $row['last_name'] . "</option>";
                } ?>
            </select><br>

            <label>Borrow Status:</label>
            <select name="borrow_status" required>
                <option value="borrowed">Borrowed</option>
                <option value="returned">Returned</option>
            </select><br>

            <button type="submit">Add Borrow Record</button>
        </form>
        <a href="view.php" class="button">Back</a>
    </div>
</body>
</html>
