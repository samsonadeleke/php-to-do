<?php
$checkedTodos = $_POST['todo'];


// print '<pre>';
// print_r($checkedTodos);
// print '</pre>';

if (isset($_POST['todo'])) {
    require 'database/Connection.php';

    $connection = Connection::getInstance();
    $pdo = $connection->connect();

    // Save to database..
    $tokens = implode(', ', $checkedTodos);
   
    $query = "UPDATE task SET done = 1 WHERE id IN ($tokens)";

    $stmt = $pdo->prepare($query);
    $stmt->execute();

    $query = "UPDATE task SET done = 0 WHERE id NOT IN ($tokens)";

    $stmt = $pdo->prepare($query);
    $stmt->execute();

    header("Location: index.php");
}

?>