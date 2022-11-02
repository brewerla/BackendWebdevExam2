<?php 
    session_start(); 

    include '../../models/db.php';

    
    $all_requests = query("SELECT * FROM request"); 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../assets/style.css">
    <title>Requests</title>
</head>
<body>
    <?php if(!$_SESSION['administrator']): ?>
        <p>User is not an administrator</p>
    <?php else: ?>
        <h1>All requests</h1>
        <a href="admin.php">Back</a>
        <?php foreach($all_requests as $request): ?>

            <?php 
                $book_id = $request['book_id']; 
                $book = queryOne("SELECT * FROM book WHERE book_id = $book_id;"); 
            ?>

            <div class="bordered">
                <p>Name: <?= $request['request_name'] ?></p>
                <p>Book Title: <?= $book['book_title'] ?> </p>
            </div>
        <?php endforeach; ?>
    <?php endif; ?>
</body>
</html>