<?php 
    session_start(); 

    include '../../models/db.php';

    $id = $_GET['book_id']; 

    $book = queryOne("SELECT * FROM book WHERE book_id = $id");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php if(!$_SESSION['administrator']): ?>
        <p>User is not an administrator</p>
        <a href="../../index.php">Return home</a>
    <?php elseif(!$id || !$book): ?>
        <p>Could not find requested book</p>
        <a href="../../index.php">Return home</a>
    <?php else: ?>
        <h1>Edit</h1>
        <p>Editing: </p>
    <?php endif; ?>
</body>
</html>