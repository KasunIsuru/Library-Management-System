<?php
include '../db.php';
$sql = "SELECT * FROM book";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Books</title>
    <link rel="stylesheet" href="../assets/css/style.css">
</head>
<body>
    <div class="container">
        <h2>All Books</h2>
        <table>
            <tr>
                <th>Book ID</th>
                <th>Book Name</th>
                <th>Category ID</th>
                <th>Actions</th>
            </tr>
            <?php
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo "<tr>
                            <td>" . $row["book_id"]. "</td>
                            <td>" . $row["book_name"]. "</td>
                            <td>" . $row["category_id"]. "</td>
                            <td>
                                <a href='edit.php?book_id=" . $row['book_id'] . "'>Edit</a> |
                                <a href='delete.php?book_id=" . $row['book_id'] . "' onclick=\"return confirm('Are you sure?')\">Delete</a>
                            </td>
                          </tr>";
                }
            } else {
                echo "<tr><td colspan='4'>No books found</td></tr>";
            }
            ?>
        </table>
        <a href="add.php" class="button">Add New Book</a>
        <a href="../admin.php" class="button">Back</a>
    </div>
</body>
</html>
