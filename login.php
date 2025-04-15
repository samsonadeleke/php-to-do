<?php
    $error = null;

    if (isset($_POST['email'])) {
        require 'database/Connection.php';

        $connection = Connection::getInstance();
        $pdo = $connection->connect();

        $password = $_POST['pwd'];
        $email = $_POST['email'];

        // Save to database..
        $query = "SELECT * FROM `users` WHERE email=? AND pwd=?;";

        $stmt = $pdo->prepare($query);
        $stmt->execute([$email, $password]);

        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        if (false === $result) {
            $error = "The credentials provided are invalid.";
        } else {
            session_start();
            $_SESSION['user'] = $result;

            header("Location: index.php"); exit();
        }
    }


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <h3> Login </h3>
    <?php if (null !== $error): ?>
        <div style="background-color: red;"><?php echo $error; ?></div>
    <?php endif; ?>
    <form method="post">
        <input type="text" name="email" placeholder="E-mail"> <br>
        <input type="password" name="pwd" placeholder="password"> <br>
        <button onclick="view/index.php"> Login </button>
    </form>
</body>
</html>