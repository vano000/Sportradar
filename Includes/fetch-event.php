<?php
    require_once "db.php";
    $type= $_GET['type'];
    $json = array();
   
if($type=='all'){
    $sqlQuery = "SELECT * FROM events ORDER BY id";
}else{
    $sqlQuery = "SELECT * FROM events where _sport_type='$type' ORDER BY id";

}
    $result = mysqli_query($conn, $sqlQuery);
    $eventArray = array();
while ($row = mysqli_fetch_assoc($result)) {
    array_push($eventArray, $row);
    }
    mysqli_free_result($result);

    mysqli_close($conn);
    echo json_encode($eventArray);
?>