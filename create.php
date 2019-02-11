<<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Create ToDo</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- <link rel="stylesheet" type="text/css" media="screen" href="main.css" />
    <script src="main.js"></script> -->
</head>
<body>
    <h1>
        Create TODO List
    </h1>
    <form method="post" action="create.php">
        <p>ToDo Title: </p>
        <input name="todoTitle" type="text">
        <p>ToDo Description: </p>
        <input name="todoDescription" type="text">
        <br>
        <input type="submit" name="submit" value="submit">
    </form>
</body>
</html>

<?php
require_once("todo.php");
if(isset($_POST['submit'])) {
    $title = $_POST['todoTitle'];
    $description = $_POST['todoDescription'];

    // connect to the database
    db();
    global $link;
    $query = "INSERT INTO todo(todoTitle, todo, date) VALUES ('$title', '$description', now() )";
    $insertTodo = mysqli_query($link, $query);

    if($insertTodo) {
        echo "successfully";
    } else {
        echo mysqli_error($link);
    }
    mysqli_close($link);
}
?>