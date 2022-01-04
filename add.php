<?php

include "db.php";

$artist = filter_input(INPUT_POST, "artist", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
$url = filter_input(INPUT_POST, "playbackid", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
$title = filter_input(INPUT_POST, "title", FILTER_SANITIZE_FULL_SPECIAL_CHARS);


$query = "INSERT INTO `video` (`url`, `title`, `creator`) VALUES (?,?,?);";
$conn = dbConnect();
echo mysqli_error($conn);

$stmt = mysqli_prepare($conn, $query);
echo mysqli_error($conn);
mysqli_stmt_bind_param($stmt, "sss", $url,$title,$artist);
echo mysqli_error($conn);
mysqli_stmt_execute($stmt);
echo mysqli_error($conn);

mysqli_close($conn);

header("refresh:2;url=index.php");
echo "succesfully added song";