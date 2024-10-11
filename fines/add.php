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