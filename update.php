<?php
require('connect.php');

if ($_POST['confirm'] == 'Delete') {
    $id = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_NUMBER_INT);
    $query = "DELETE FROM cms WHERE id = :id";
    $statement = $db->prepare($query);
    $statement->bindValue(':id', $id, PDO::PARAM_INT);
    $statement->execute();
}
// UPDATE quote if author, content and id are present in POST.
else if ($_POST && isset($_POST['user']) && isset($_POST['content']) && isset($_POST['id'])) {
    // Sanitize user input to escape HTML entities and filter out dangerous characters.
    $user  = filter_input(INPUT_POST, 'user', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $content = filter_input(INPUT_POST, 'content', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $id      = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_NUMBER_INT);
    
    // Build the parameterized SQL query and bind to the above sanitized values.
    $query     = "UPDATE cms SET user = :user, content = :content WHERE id = :id";
    $statement = $db->prepare($query);
    $statement->bindValue(':user', $user);        
    $statement->bindValue(':content', $content);
    $statement->bindValue(':id', $id, PDO::PARAM_INT);
    
    // Execute the INSERT.
    $statement->execute();
} 

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="main.css">
    <title>Wong's Insurance CMS</title>
</head>
<body>
    <?= header("Location: story.php?id={$id}"); ?>
    
</body>
</html>