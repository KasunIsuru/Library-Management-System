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