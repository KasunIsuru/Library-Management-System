<?php
include '../db.php';

if (isset($_GET['book_id'])) {
    $book_id = $_GET['book_id'];
    $sql = "DELETE FROM book WHERE book_id='$book_id'";

    if ($conn->query($sql) === TRUE) {
        header("Location: view.php");
    } else {
        echo "Error deleting record: " . $conn->error;
    }
}
?>
