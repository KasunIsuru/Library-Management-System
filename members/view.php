<?php
include '../db.php';
$sql = "SELECT * FROM member";
$result = $conn->query($sql);
?>
<?php
include '../db.php';
$sql = "SELECT * FROM member";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Members</title>
    <link rel="stylesheet" href="../assets/css/style.css">
</head>
<body>
    <div class="container">
        <h2>All Library Members</h2>
        <table>
            <tr>
                <th>Member ID</th>
                <th>First Name</th> 
                <th>Last Name</th>  
                <th>Birthday</th>
                <th>Email</th>
                <th>Actions</th>
            </tr>
            <?php
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo "<tr>
                            <td>" . $row["member_id"]. "</td>
                            <td>" . $row["first_name"]. "</td> <!-- Corrected field -->
                            <td>" . $row["last_name"]. "</td>  <!-- Corrected field -->
                            <td>" . $row["birthday"]. "</td>
                            <td>" . $row["email"]. "</td>
                            <td>
                                <a href='edit.php?member_id=" . $row['member_id'] . "'>Edit</a> |
                                <a href='delete.php?member_id=" . $row['member_id'] . "' onclick=\"return confirm('Are you sure?')\">Delete</a>
                            </td>
                          </tr>";
                }
            } else {
                echo "<tr><td colspan='6'>No members found</td></tr>";
            }
            ?>
        </table>
        <a href="add.php" class="button">Add New Member</a>
        <a href="../admin.php" class="button">Back</a>
    </div>
</body>
</html>
