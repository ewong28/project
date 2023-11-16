<?php
    require('connect.php');
    require('authenticate.php');

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
            <h2>Stories</h2>
            <ul>
                <!-- Fetch each table row in turn. Each $row is a table row hash.
                    Fetch returns FALSE when out of rows, halting the loop. -->
                <?php while($row = $statement->fetch()): ?>
                    <h2><?=$row['user']?></h2>    
                    
                    <?=$row['content']?>

                    <small>
                        <p><a href="edit.php?id=<?= $row['id'] ?>"> edit</a></p>
                    </small>
                    
                    <?php endwhile ?>
            </ul>
        </section>
        
        <ul class="content-section">
            <li><a href="post.php">Add a Story</a></li>
        </ul>
    </main>

    <footer>
        <p>&copy; 2023 Wong's Insurance. All rights reserved.</p>
    </footer>
</body>
</html>