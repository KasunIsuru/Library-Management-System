<?php
include '../db.php';

$fine_id_error = false; 

$book_sql = "SELECT * FROM book";
$book_result = $conn->query($book_sql);

$member_sql = "SELECT * FROM member";
$member_result = $conn->query($member_sql);


?>