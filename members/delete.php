<?php
include '../db.php';

if (isset($_GET['member_id'])) {
    $member_id = $_GET['member_id'];
    $sql = "DELETE FROM member WHERE member_id='$member_id'";

    if ($conn->query($sql) === TRUE) {
        header("Location: view.php");
    } else {
        echo "Error deleting record: " . $conn->error;
    }
}
?>
