<?php
require "db.php";

$query = "SELECT * FROM video;";
$conn = dbConnect();

$stmt = mysqli_prepare($conn, $query);
mysqli_stmt_execute($stmt);
mysqli_stmt_bind_result($stmt, $url, $title, $artist);


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>home</title>
</head>
<body>
<table>
    <tr>
        <th>titel</th>
        <th>artiest</th>
        <th>link</th>
    </tr>
    <?php
    while (mysqli_stmt_fetch($stmt)) {
        echo "<tr>";
        echo "<td>$title</td>";
        echo "<td>$artist</td>";
        echo "<td><a href='player.php?v=$url'>play song</a></td>";
        echo "</tr>";
    }
    ?>
</table>

<a href="beheer.html">toevoegen</a>
</body>
</html>

