<?php
include '../db.php';

if (isset($_GET['borrow_id'])) {
    $borrow_id = $_GET['borrow_id'];
    $sql = "DELETE FROM bookborrower WHERE borrow_id='$borrow_id'";

    if ($conn->query($sql) === TRUE) {
        header("Location: view.php");
    } else {
        echo "Error deleting record: " . $conn->error;
    }
}
?>