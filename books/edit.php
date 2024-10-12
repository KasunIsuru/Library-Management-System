<?php
include '../db.php';

if (isset($_GET['book_id'])) {
    $book_id = $_GET['book_id'];
    $sql = "SELECT * FROM book WHERE book_id='$book_id'";
    $result = $conn->query($sql);
    $book = $result->fetch_assoc();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $book_id = $_POST['book_id'];
    $book_name = $_POST['book_name'];
    $category_id = $_POST['category_id'];

    $sql = "UPDATE book SET book_name='$book_name', category_id='$category_id' WHERE book_id='$book_id'";

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
    <title>Edit Book</title>
    <link rel="stylesheet" href="../assets/css/style.css">
</head>
<body>
    <div class="container">
        <h2>Edit Book Details</h2>
        <form method="POST">
            <label>Book ID:</label>
            <input type="text" name="book_id" value="<?php echo $book['book_id']; ?>" readonly><br>
            <label>Book Name:</label>
            <input type="text" name="book_name" value="<?php echo $book['book_name']; ?>" required><br>
            <label>Category ID:</label>
            <input type="text" name="category_id" value="<?php echo $book['category_id']; ?>" required><br>
            <button type="submit">Update Book</button>
        </form>
        <a href="view.php" class="button">Back</a>
    </div>
</body>
</html>
