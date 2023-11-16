<?php

/*******w******** 
    
    Name: Evan Wong
    Date: November 1st, 2023
    Description: 

****************/

    require('connect.php');

    // SQL is written as a String.
    $query = "SELECT * FROM cms";

    // A PDO::Statement is prepared from the query.
    $statement = $db->prepare($query);

    // Execution on the DB server is delayed until we execute().
    $statement->execute();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Wong's Insurance Dashboard</title>
    <link rel="stylesheet" href="main.css">
</head>
<body>
    <header>
        <h1>Wong's Insurance CMS</h1>
    </header>

    <nav>
        <ul>
            <li><a href="index.php">Home</a></li>
            <li><a href="post.php">Open a Claim</a></li>
            <li><a href="contact.php">Contact Us</a></li>
            <li><a href="story.php">Open or Share a Story</a></li>
        </ul>
    </nav>

    <main>
        <section class="content-section">
            
        </section>
    </main>

    <footer>
        <p>&copy; 2023 Wong's Insurance. All rights reserved.</p>
    </footer>
</body>
</html>