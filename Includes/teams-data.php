<?php

require_once "includes/db.php";

$sql = "SELECT * FROM sport_teams";

$home = mysqli_query($conn, $sql);
$away = mysqli_query($conn, $sql);