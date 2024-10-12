<?php
include '../db.php';

if (isset($_GET['category_id'])) {
    $category_id = $_GET['category_id'];
    $sql = "DELETE FROM bookcategory WHERE category_id='$category_id'";

    if ($conn->query($sql) === TRUE) {
        header("Location: view.php");
    } else {
        echo "Error deleting record: " . $conn->error;
    }
}
?>
