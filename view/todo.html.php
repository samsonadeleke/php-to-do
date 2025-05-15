<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TODO App</title>
    <link href="/assets/css/style.css" type="text/css" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.0.3/css/font-awesome.css" type="text/css" rel="stylesheet" />
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" type="text/css" rel="stylesheet" />
</head>

<body>
    <div class="page-content page-container" id="page-content">
        <div class="padding">
            <div class="row container d-flex justify-content-center">
                <div class="col-md-12">
                    <div class="card px-3">
                        <div class="card-body">
                            <h3>Hi <?php echo $user['username']; ?>,</h3>
                            &nbsp; <a href="/logout.php" style="float: right">Logout</a>
                            <h4 class="card-title">Awesome Todo list</h4>

                            <form method="POST" action="add_todo.php">
                                <div class="add-items d-flex"> 
                                    <input type="text" class="form-control todo-list-input" placeholder="What do you need to do today?" name="todo">
                                    <button class="add btn btn-primary font-weight-bold todo-list-add-btn" type="submit">Add</button>
                                </div>
                            </form>
 
                            <div class="list-wrapper">
                                <form method="post" action="save_todos.php">
                                    <ul id="todo_container" class="d-flex flex-column-reverse todo-list">
                                        <?php foreach($tasks as $task):?>
                                            <li class="completed">
                                                <div class="form-check"> 
                                                    <label class="form-check-label">
                                                        <input 
                                                            class="checkbox" 
                                                            type="checkbox" 
                                                            name="todo[]" 
                                                            value="<?php echo $task['id']; ?>"
                                                            <?php echo $task['done'] ? 'checked' : ''; ?>
                                                        /> 
                                                        <?php echo $task['task']; ?> <i class="input-helper"></i>
                                                    </label>
                                                </div> 
                                                <i class="remove mdi mdi-close-circle-outline"></i>
                                            </li>
                                        <?php endforeach ?>
                                    </ul>

                                    <button class="add btn btn-primary font-weight-bold todo-list-add-btn" type="submit">Save</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
