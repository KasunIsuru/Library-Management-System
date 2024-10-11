<?php
include '../db.php';
$sql = "SELECT * FROM fine";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Fines</title>
    <link rel="stylesheet" href="../assets/css/style.css">
</head>
<body>
    <div class="container">
        <h2>All Fines</h2>
        <table>
            <tr>
                <th>Fine ID</th>
                <th>Book ID</th>
                <th>Member ID</th>
                <th>Fine Amount</th>
                <th>Date Modified</th>
                <th>Actions</th>
            </tr>
            <?php
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo "<tr>
                            <td>" . $row["fine_id"]. "</td>
                            <td>" . $row["book_id"]. "</td>
                            <td>" . $row["member_id"]. "</td>
                            <td>" . $row["fine_amount"]. "</td>
                            <td>" . $row["fine_date_modified"]. "</td>
                            <td>
                                <a href='edit.php?fine_id=" . $row['fine_id'] . "'>Edit</a> |
                                <a href='delete.php?fine_id=" . $row['fine_id'] . "' onclick=\"return confirm('Are you sure?')\">Delete</a>
                            </td>
                          </tr>";
                }
            } else {
                echo "<tr><td colspan='6'>No fines found</td></tr>";
            }
            ?>
        </table>
        <a href="add.php" class="button">Add New Fine</a>
        <a href="../admin.php" class="button">Back</a>
    </div>
</body>
</html>
