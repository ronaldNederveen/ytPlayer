<?php
require "db.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>player</title>
</head>
<body>
<a href="index.php">terug</a>
<?php

$query = "SELECT title, creator FROM video WHERE url=?;";
$conn = dbConnect();

$stmt = mysqli_prepare($conn, $query);
mysqli_stmt_bind_param($stmt, "s", $_GET['v']);
mysqli_stmt_execute($stmt);
mysqli_stmt_bind_result($stmt,  $title, $artist);
mysqli_stmt_fetch($stmt);
?>


<iframe width="560" height="315" src="https://www.youtube.com/embed/<?=$_GET['v']?>?autoplay=1" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>

<h2><?=$title?></h2>
<h2><?=$artist?></h2>

</body>
</html>
