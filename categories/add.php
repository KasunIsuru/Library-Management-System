<?php
include '../db.php';


$category_id_error = false;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $category_id = $_POST['category_id'];
    $category_name = $_POST['category_name'];

  
    $check_category_id_sql = "SELECT * FROM bookcategory WHERE category_id = '$category_id'";
    $category_id_result = $conn->query($check_category_id_sql);

    if ($category_id_result->num_rows > 0) {
       
        $category_id_error = true;
    } else {
       
        $sql = "INSERT INTO bookcategory (category_id, category_Name, date_modified) 
                VALUES ('$category_id', '$category_name', NOW())";

        if ($conn->query($sql) === TRUE) {
            header("Location: view.php");
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Category</title>
    <link rel="stylesheet" href="../assets/css/style.css">
    <style>
        .error-border {
            border: 2px solid red;
        }
        .error-message {
            color: red;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Add a New Category</h2>
        <form method="POST">
            <label>Category ID:</label>
            <input type="text" name="category_id" class="<?php if ($category_id_error) echo 'error-border'; ?>" required><br>
            <?php if ($category_id_error): ?>
                <span class="error-message">This Category ID already exists. Please choose another.</span><br>
            <?php endif; ?>

            <label>Category Name:</label>
            <input type="text" name="category_name" required><br>

            <button type="submit">Add Category</button>
        </form>
        <a href="view.php" class="button">Back</a>
    </div>
</body>
</html>
