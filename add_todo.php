<?php
    echo ($_POST['todo']);

    if (isset($_POST['todo'])) {
        require 'database/Connection.php';

        $connection = Connection::getInstance();
        $pdo = $connection->connect();

        $task = ($_POST['todo']);
    }
        // Save to database..
    $query = "INSERT INTO task (task) VALUES (?)";

        
    $stmt = $pdo->prepare($query);
    $stmt->execute([$task]);
    
    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    header("Location: index.php"); exit();
?>
