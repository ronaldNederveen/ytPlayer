<?php
function dbConnect()
{
    return mysqli_connect("localhost", "ytUser", "qwerty", "yt");

}