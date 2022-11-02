<?php 
    session_start(); 
    include 'models/db.php';


    if(isset($_POST['action']) && isset($_POST['book_id']) && $_POST['action'] === 'request_book') {
        insert('request', ['book_id', 'request_name'], [$_POST['book_id'], $_POST['checkout_name']]);
    }

    $all_books = query("SELECT * FROM book;");
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
    <?php foreach($all_books as $book): ?>
        <div class="book">
            <a href="views/request.php?book_id=<?= $book['book_id'] ?>"><?= $book['book_title'] ?></a>
            <?php if($_SESSION['administrator']): ?>
                <br>
                <a href="">Edit Book</a>
            <?php endif; ?>
         
        </div>
        <br>
    <?php endforeach; ?>
    <a href="views/administrator/admin.php">Administrator login page</a>
</body>
</html>