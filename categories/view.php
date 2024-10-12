<?php
include '../db.php';
$sql = "SELECT * FROM bookcategory"; 
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Categories</title>
    <link rel="stylesheet" href="../assets/css/style.css">
</head>
<body>
    <div class="container">
        <h2>All Book Categories</h2>
        <table>
            <tr>
                <th>Category ID</th>
                <th>Category Name</th> 
                <th>Date Modified</th>
                <th>Actions</th>
            </tr>
            <?php
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo "<tr>
                            <td>" . $row["category_id"]. "</td>
                            <td>" . $row["category_Name"]. "</td> <!-- Correct field -->
                            <td>" . $row["date_modified"]. "</td>
                            <td>
                                <a href='edit.php?category_id=" . $row['category_id'] . "'>Edit</a> |
                                <a href='delete.php?category_id=" . $row['category_id'] . "' onclick=\"return confirm('Are you sure?')\">Delete</a>
                            </td>
                          </tr>";
                }
            } else {
                echo "<tr><td colspan='4'>No categories found</td></tr>";
            }
            ?>
        </table>
        <a href="add.php" class="button">Add New Category</a>
        <a href="../admin.php" class="button">Back</a>
    </div>
</body>
</html>
