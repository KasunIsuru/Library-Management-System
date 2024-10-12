<?php
include '../db.php';

if (isset($_GET['category_id'])) {
    $category_id = $_GET['category_id'];
    $sql = "SELECT * FROM bookcategory WHERE category_id='$category_id'";
    $result = $conn->query($sql);
    $category = $result->fetch_assoc();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $category_id = $_POST['category_id'];
    $category_name = $_POST['category_name'];
    $date_modified = date('Y-m-d H:i:s');

    $sql = "UPDATE bookcategory SET category_name='$category_name', date_modified='$date_modified' WHERE category_id='$category_id'";

    if ($conn->query($sql) === TRUE) {
        header("Location: view.php");
    } else {
        echo "Error updating record: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Category</title>
    <link rel="stylesheet" href="../assets/css/style.css">
</head>
<body>
    <div class="container">
        <h2>Edit Category Details</h2>
        <form method="POST">
            <label>Category ID:</label>
            <input type="text" name="category_id" value="<?php echo $category['category_id']; ?>" readonly><br>
            <label>Category Name:</label>
            <input type="text" name="category_name" value="<?php echo $category['category_name']; ?>" required><br>
            <button type="submit">Update Category</button>
        </form>
        <a href="view.php" class="button">Back</a>
    </div>
</body>
</html>
