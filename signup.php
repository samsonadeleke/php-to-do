<?php
    if (isset($_POST['username'])) {
        require 'database/Connection.php';

        $connection = Connection::getInstance();
        $pdo = $connection->connect();

        $username = $_POST['username'];
        $password = $_POST['pwd'];
        $email = $_POST['email'];

        // Save to database..
        $query = "INSERT INTO users (username, pwd, email) VALUES(?,?,?);";

        $stmt = $pdo->prepare($query);
        $stmt->execute([$username, $password, $email]);
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
</head>
<body>
    <h3>Sign Up</h3>
    <form method="post">
        <input type="text" name="username" placeholder="username"> <br>
        <input type="password" name="pwd" placeholder="password"> <br>
        <input type="text" name="email" placeholder="E-mail"> <br>
        <button>Sign Up</button>
    </form>
</body>
</html>