<?php

$todos = [];

if (file_exists("todos.json")) {
  $josn = file_get_contents("todos.json");
  $todos = json_decode($josn, true);
}

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1,maximum-scale=5"
    />
    <link rel="icon" href="devchallenges.png" />
    <!-- <link
      rel="shortcut icon"
      type="image/x-icon"
      href="https://devchallenges.io/"
    /> -->

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700&display=swap"
      rel="stylesheet"
    />

    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Raleway:wght@700&display=swap"
      rel="stylesheet"
    />

    <!-- Icons -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <!-- CSS -->
    <link rel="stylesheet" href="css/style.css" />

    <title>Devchallenges - Todo app</title>
  </head>
  <body>
    <div class="container">
      <h1>#todo</h1>

      <div class="container__nav">
        <p class="active" id="allBtn">All</p>
        <p id="activeBtn">Active</p>
        <p id="completedBtn">Completed</p>
      </div>

      <div class="container__add-todo">
        <form action="addTodo.php" method="POST">
          <input
            type="text"
            name="title"
            id="addNote"
            placeholder="add details"
          />
          <button type="submit">Add</button>
        </form>
      </div>

      <div class="container__todos">

        <?php foreach($todos as $todoName => $todo): ?>

        <div class="container__todos__todo">
          
          <form action="change_status.php" method="POST">
            <input type="hidden" name="todo_name" value="<?php echo $todoName ?>">
            <input type="checkbox" class="todoInput <?php echo $todo['compeleted'] ? "checked" : '' ?>" <?php echo $todo['compeleted'] ? "checked" : '' ?> name="completedInput" id="<?php echo $todoName ?>" id="completedInput" />
            <label for="<?php echo $todoName ?>" data-content="<?php echo $todoName ?>"
              ><?php echo $todoName ?></label>
          </form>

            <form class="hidden" action="delete.php" method="POST">
              <input type="hidden" name="todo_name" value="<?php echo $todoName ?>">
              <button type="submit"><span class="material-icons" style="color: #BDBDBD;">delete_outline</span></button>
          </form>

        </div>
        
        <?php endforeach; ?>
        
        <form action="deleteAll.php" class="hidden" method="post">
          <button type="submit" class="delete-all-button"><span class="material-icons md-18">delete_outline</span> Delete All</button>
        </form>

      </div>
      
    </div>
    <script src="script/main.js"></script>
  </body>
</html>