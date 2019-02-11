<?php
require_once("todo.php"); ?>

<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>My List of ToDos</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="main.css" />
    <script src="main.js"></script>
</head>
<body>

<h2>
 Next on my agenda
</h2>
<p><a href=create.php>add todo</a></p>

<?php
db();
global $link;
$query = "SELECT id, todoTitle, todo, date FROM todo";
$result = mysqli_query($link, $query);

// check if there's any data inside the table
if (mysqli_num_rows($result) >= 1) {
    while ($row = mysqli_fetch_array($result)) {
        $id = $row['id'];
        $title = $row['todoTitle'];
        $date = $row['date'];
        ?>

        <ul>
            <li>
                <a href="detail.php?id=<?php echo $id?>"> <?php echo $title ?></a>
            </li>
            <?php echo "[[ $date ]]"; ?>
        </ul>

        <?php
    }
}

?>
    
</body>
</html>