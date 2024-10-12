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
    <link rel="stylesheet" href="assets/css/style.css"> <!-- Link to existing CSS -->
    <style>
        /* Admin Dashboard Specific Styles */
        body {
            background-color: #e9ecef; /* Light background for the admin dashboard */
        }

        .container {
            width: 80%;
            margin: 20px auto;
            padding: 20px;
            background-color: #ffffff; /* White background for the dashboard container */
            border-radius: 10px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
        }

        h1 {
            font-size: 2.5rem;
            color: #343a40; /* Darker text color for headings */
            text-align: center;
            margin-bottom: 20px;
        }

        h2 {
            font-size: 1.8rem;
            color: #495057; /* Secondary text color */
            text-align: center;
            margin-bottom: 30px;
        }

        nav ul {
            list-style-type: none; /* Remove bullet points */
            padding: 0;
            text-align: center; /* Center the navigation links */
        }

        nav ul li {
            display: inline-block; /* Horizontal list */
            margin: 0 5px; /* Reduced spacing between links */
        }

        nav ul li a {
            text-decoration: none;
            color: #007bff; /* Bootstrap primary color */
            font-weight: bold; /* Bold links */
            padding: 10px 15px; /* Adjusted padding for smaller button size */
            border: 2px solid transparent; /* Border for hover effect */
            border-radius: 5px;
            transition: all 0.3s; /* Smooth transition for hover effect */
        }

        nav ul li a:hover {
            background-color: #007bff; /* Change background color on hover */
            color: white; /* Change text color on hover */
            border-color: #007bff; /* Match border with background color */
        }

        .button {
            display: inline-block;
            padding: 10px 20px;
            margin-top: 20px;
            background-color: #dc3545; /* Bootstrap danger color */
            color: white;
            text-decoration: none;
            border-radius: 5px;
            transition: background-color 0.3s;
            text-align: center;
        }

        .button:hover {
            background-color: #c82333; /* Darker red on hover */
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
