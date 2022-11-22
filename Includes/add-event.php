<?php
require_once "db.php";


$homeTeam = isset($_POST['home']) ? $_POST['home'] : "";
$awayTeam = isset($_POST['away']) ? $_POST['away'] : "";
$start = isset($_POST['start']) ? $_POST['start'] : "";
$end = isset($_POST['start']) ? $_POST['start'] : "";
$sport_type = isset($_POST['_sport_type']) ? $_POST['_sport_type'] : "";
$title = $homeTeam . "-" . $awayTeam;


$homeSql = "SELECT * FROM sport_teams where Name = '$homeTeam' and _sport_type_id = '$sport_type'";
$home = mysqli_query($conn, $homeSql);


$awaySql = "SELECT * FROM sport_teams where Name = '$awayTeam' and _sport_type_id = '$sport_type'";
$away = mysqli_query($conn, $homeSql);

if(mysqli_num_rows($home) && mysqli_num_rows($away)){
    $sqlInsert = "INSERT INTO events (title,start,end,_sport_type) VALUES ('".$title."','".$start."','".$end."', '".$sport_type."')";
    $result = mysqli_query($conn, $sqlInsert);

    header('Location: /sportradar/index.php');
    exit;
} else {
    
    header('Location: /sportradar/index.php');
    exit;
}


?>