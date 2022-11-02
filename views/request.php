<?php 
    session_start(); 

    include '../models/db.php';

    $id = $_GET['book_id']; 

    $book = queryOne("SELECT * FROM book WHERE book_id = $id");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Request Book</title>
</head>
<body>
    <?php if(!$id || !$book): ?>
        <h1>We couldn't find the book you are looking for :(</h1>
        <a href="../index.php">Return home</a>
    <?php else:  ?>
        <h1><?= $book['book_title'] ?></h1>
        <a href="../index.php">Return home</a>
        <p>Looking to check out? Fill out this form!</p>
        <form action="../index.php" method="post">
            <input type="hidden" name="action" value="request_book">
            <input type="hidden" name="book_id" value="<?= $book['book_id'] ?>">
            <input type="text" id="checkout_name" name="checkout_name" placeholder="name" required>
            <button>Request</button>
        </form>
    <?php endif; ?>
</body>
</html>