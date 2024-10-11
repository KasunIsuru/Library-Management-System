<?php
include '../db.php';

if (isset($_GET['fine_id'])) {
    $fine_id = $_GET['fine_id'];
    $sql = "DELETE FROM fine WHERE fine_id='$fine_id'";

    if ($conn->query($sql) === TRUE) {
        header("Location: view.php");
    } else {
        echo "Error deleting record: " . $conn->error;
    }
}
?>
