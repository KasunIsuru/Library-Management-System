<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: index.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Library Admin Dashboard</title>
    <link rel="stylesheet" href="assets/css/style.css"> 
    <style>
        body {
            background-color: #e9ecef; 
        }

        .container {
            width: 80%;
            margin: 20px auto;
            padding: 20px;
            background-color: #ffffff; 
            border-radius: 10px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
        }

        h1 {
            font-size: 2.5rem;
            color: #343a40; 
            text-align: center;
            margin-bottom: 20px;
        }

        h2 {
            font-size: 1.8rem;
            color: #495057;
            text-align: center;
            margin-bottom: 30px;
        }

        nav ul {
            list-style-type: none;
            padding: 0;
            text-align: center;
        }

        nav ul li {
            display: inline-block;
            margin: 0 5px;
        }

        nav ul li a {
            text-decoration: none;
            color: #007bff;
            font-weight: bold;
            padding: 10px 15px;
            border: 2px solid transparent;
            border-radius: 5px;
            transition: all 0.3s; 
        }

        nav ul li a:hover {
            background-color: #007bff; 
            color: white; 
            border-color: #007bff;
        }

        .button {
            display: inline-block;
            padding: 10px 20px;
            margin-top: 20px;
            background-color: #dc3545; 
            color: white;
            text-decoration: none;
            border-radius: 5px;
            transition: background-color 0.3s;
            text-align: center;
        }

        .button:hover {
            background-color: #c82333; 
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Library Management System</h1>
        <h2>Welcome, <?php echo $_SESSION["first_name"]; ?> !</h2>
        <nav>
            <ul>
                <li><a href="books/view.php">Manage Books</a></li>
                <li><a href="categories/view.php">Manage Categories</a></li>
                <li><a href="members/view.php">Manage Members</a></li>
                <li><a href="borrows/view.php">Manage Borrows</a></li>
                <li><a href="fines/view.php">Manage Fines</a></li>
            </ul>
        </nav>
        <a href="logout.php" class="button">Logout</a>
    </div>
</body>
</html>
