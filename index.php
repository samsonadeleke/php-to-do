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

require 'database/Connection.php';

$connection = Connection::getInstance();
$connection->connect();

require 'view/todo.html.php';