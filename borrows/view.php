<?php
include '../db.php';
$sql = "SELECT * FROM bookborrower";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Borrow Records</title>
    <link rel="stylesheet" href="../assets/css/style.css">
</head>
<body>
    <div class="container">
        <h2>All Borrow Records</h2>
        <table>
            <tr>
                <th>Borrow ID</th>
                <th>Book ID</th>
                <th>Member ID</th>
                <th>Borrow Status</th>
                <th>Date Modified</th>
                <th>Actions</th>
            </tr>
            <?php
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo "<tr>
                            <td>" . $row["borrow_id"]. "</td>
                            <td>" . $row["book_id"]. "</td>
                            <td>" . $row["member_id"]. "</td>
                            <td>" . $row["borrow_status"]. "</td>
                            <td>" . $row["borrower_date_modified"]. "</td>
                            <td>
                                <a href='edit.php?borrow_id=" . $row['borrow_id'] . "'>Edit</a> |
                                <a href='delete.php?borrow_id=" . $row['borrow_id'] . "' onclick=\"return confirm('Are you sure?')\">Delete</a>
                            </td>
                          </tr>";
                }
            } else {
                echo "<tr><td colspan='6'>No borrow records found</td></tr>";
            }
            ?>
        </table>
        <a href="add.php" class="button">Add New Borrow Record</a>
        <a href="../admin.php" class="button">Back</a>
    </div>
</body>
</html>
