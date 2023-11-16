<?php

/*******w******** 
    
    Name: Evan Wong
    Date: September 19th, 2023
    Description: The post page for the blog. Uses HTMl, PHP and a 
    SQL query.

****************/

    require('connect.php');

    if ($_POST && !empty($_POST['user']) && !empty($_POST['content']) && !empty($_POST['user'])) {
        // Sanitize user input to escape HTML entities and filter out dangerous characters.
        $user = filter_input(INPUT_POST, 'user', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $content = filter_input(INPUT_POST, 'content', FILTER_SANITIZE_FULL_SPECIAL_CHARS);

        // Build the parameterized SQL query and bind to the above sanitized values.
        $query = "INSERT INTO cms (user, content) VALUES (:user, :content)";
        $statement = $db->prepare($query);

        // Bind values to the parameters
        $statement->bindValue(':user', $user);
        $statement->bindValue(':content', $content);

        // Execute the INSERT.
        $statement->execute();
        $value = $statement->fetch();

        if ($_POST && !empty($_POST['user']) && !empty($_POST['content'])) {
            // ... (your data validation and insertion code)
        
            // Redirect to index.php after inserting the post.
            header("Location: index.php");
            exit();
        }
    }
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
            <h2>Share a Story</h2>
            <form action="insert.php" method="post">
                <div class="input-group">
                    <label for="user">User:</label>
                    <input name="user" id="user" placeholder="Enter your name">
                </div>
                <div class="input-group">
                    <label for="content">Story:</label>
                    <textarea name="content" id="content" placeholder="Share your story here"></textarea>
                </div>
                <input type="submit" name="command" value="Create">
            </form>
        </section>
    </main>

    <footer>
        <p>&copy; 2023 Wong's Insurance. All rights reserved.</p>
    </footer>
</body>
</html>