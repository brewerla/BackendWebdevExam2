<?php 
    session_start(); 

    //Log the admin out 
    if(isset($_POST['action'])) {
        if($_POST['action'] === 'logout') {
            $_SESSION['administrator'] = null; 
        }
    }

    //Log the admin in if the password is correct
    if(isset($_POST['admin_password'])) {
        $pass = $_POST['admin_password']; 

        if($pass === "admin") {
            $_SESSION['administrator'] = TRUE; 
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administrator</title>
</head>
<body>
    <h1>Adminstrator login</h1>
    <a href="../../index.php">Return home</a>
    <form action="" method="post"  <?= ($_SESSION['administrator'] ? 'hidden': '') ?>>
        <input type="password" id="admin_password" name="admin_password" placeholder="Password" require>
        <button>Login</button>
    </form>

    <?php if($_SESSION['administrator']): ?>
        <p>Logged in as administrator</p>

        <a href="requests.php">View all requests</a>

        <form action="" method="post">
            <input type="hidden" id="action" name="action" value="logout">
            <button>Log out</button>
        </form>
    <?php endif; ?>
</body>
</html>