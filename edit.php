<?php

require('connect.php');
require('authenticate.php');

    if(isset($_GET['id'])) {
        $id = $_GET['id'];

        $query = "SELECT * FROM cms WHERE id = :id";

        $statement = $db->prepare($query);        
        $statement->bindValue(':id', $id, PDO::PARAM_INT);

        $statement->execute();
        $value = $statement->fetch();
    
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Wong's Insurance Dashboard</title>
    <link rel="stylesheet" href="main.css">
    <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
    <script>

      tinymce.init({

        selector: 'textarea#textbox'

      })

    </script>
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
            <form action="update.php" method="post">
                <input type="hidden" name="id" value="<?= $value['id']?>">
                <div class="input-group">
                    <label for="user">User:</label>
                    <input name="user" id="user" placeholder="Enter the author's name" value="<?= $value['user'] ?>"/>
                </div>
                <div class="input-group">
                    <label for="content">Story:</label>
                    <textarea id="textbox" name="content" placeholder="Share your story here" ><?= $value['content'] ?></textarea>
                </div>
                <input type="submit" name="confirm" value="Update">
                <input type="submit" name="confirm" value="Delete" onclick="return confirm('Are you sure you want to delete?')"/>
            </form>
        </section>
    </main>

    <footer>
        <p>&copy; 2023 Wong's Insurance. All rights reserved.</p>
    </footer>
</body>
</html>