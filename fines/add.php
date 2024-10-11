<?php
include '../db.php';

$fine_id_error = false; 

$book_sql = "SELECT * FROM book";
$book_result = $conn->query($book_sql);

$member_sql = "SELECT * FROM member";
$member_result = $conn->query($member_sql);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $fine_id = $_POST['fine_id'];
    $book_id = $_POST['book_id'];
    $member_id = $_POST['member_id'];
    $fine_amount = $_POST['fine_amount'];

    $check_fine_id_sql = "SELECT * FROM fine WHERE fine_id = '$fine_id'";
    $fine_id_result = $conn->query($check_fine_id_sql);

    if ($fine_id_result->num_rows > 0) {
        
        $fine_id_error = true;
    } else {
        
        $sql = "INSERT INTO fine (fine_id, book_id, member_id, fine_amount, fine_date_modified) 
                VALUES ('$fine_id', '$book_id', '$member_id', '$fine_amount', NOW())";

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
    <title>Add Fine</title>
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
        <h2>Add a New Fine</h2>
        <form method="POST">
            <label>Fine ID:</label>
            <input type="text" name="fine_id" class="<?php if ($fine_id_error) echo 'error-border'; ?>" required><br>
            <?php if ($fine_id_error): ?>
                <span class="error-message">This Fine ID already exists. Please choose another.</span><br>
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

            <label>Fine Amount:</label>
            <input type="number" name="fine_amount" required><br>

            <button type="submit">Add Fine</button>
        </form>
        <a href="view.php" class="button">Back</a>
    </div>
</body>
</html>
