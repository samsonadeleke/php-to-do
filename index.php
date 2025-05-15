<?php

    # Requirements:
    # - Connect the application to a database.
    # - The application should allow the user to add new tasks.
    # - The application should save the tasks in a persistent storage (e.g., database or file).
    # - The application should display a list of tasks.
    # - Each task should have a checkbox to mark it as completed.
    # - The application should allow the user to remove tasks.
    # - The application should load the tasks from the persistent storage when it starts.
    # - When user clicks on a checkbox for a task, it should be marked as completed.

    session_start();

    if (!isset($_SESSION['user'])) {
        header("Location: login.php");
    }

    require 'database/Connection.php';

    $user = $_SESSION['user'];

    $connection = Connection::getInstance();
    $connection->connect();



    $query = 'SELECT * FROM `task`';
    $pdo = $connection->connect();
    $stmt = $pdo->prepare($query);
    $stmt->execute();

    $tasks = $stmt->fetchAll(PDO::FETCH_ASSOC);

    require 'view/todo.html.php';
?>
<!-- 
<pre>
<?php print_r($result); ?>
</pre> -->
