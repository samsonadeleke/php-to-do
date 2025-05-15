<?php
if (isset($_GET['task'])) {
    $task = $_GET['task'];
    // var_dump($task); exit;

    require 'database/Connection.php';

    $connection = Connection::getInstance();
    $pdo = $connection->connect();

    // delete from database..
    $query = "DELETE FROM task WHERE id = ?;";

    $stmt = $pdo->prepare($query);
    $stmt->execute([$task]);

    header("Location: index.php");
    exit();
}
