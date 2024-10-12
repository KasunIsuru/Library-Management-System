<?php
include '../db.php';


$book_id_error = false; 


$sql = "SELECT * FROM bookcategory";
$categories_result = $conn->query($sql);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $book_id = $_POST['book_id'];
    $book_name = $_POST['book_name'];
    $category_id = $_POST['category_id'];

   
    $check_book_id_sql = "SELECT * FROM book WHERE book_id = '$book_id'";
    $book_id_result = $conn->query($check_book_id_sql);

    if ($book_id_result->num_rows > 0) {
       
        $book_id_error = true;
    } else {
        
        $sql = "INSERT INTO book (book_id, book_name, category_id) VALUES ('$book_id', '$book_name', '$category_id')";

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
    <title>Add Book</title>
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
        <h2>Add a New Book</h2>

       
        <form method="POST">
            <label>Book ID:</label>
            <input type="text" name="book_id" class="<?php if ($book_id_error) echo 'error-border'; ?>" required><br>
            <?php if ($book_id_error): ?>
                <span class="error-message">This Book ID already exists. Please choose another.</span><br>
            <?php endif; ?>

            <label>Book Name:</label>
            <input type="text" name="book_name" required><br>

            <label>Category ID:</label>
            <select name="category_id" required>
                <option value="" disabled selected>Select a Category</option>
                <?php
                
                while($row = $categories_result->fetch_assoc()) {
                    echo "<option value='" . $row['category_id'] . "'>" . $row['category_Name'] . "</option>";
                }
                ?>
            </select><br>

            <button type="submit">Add Book</button>
        </form>

        <a href="view.php" class="button">Back</a>
    </div>
</body>
</html>
