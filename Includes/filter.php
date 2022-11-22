<?php
 require_once "db.php";
$sport_type='all';
if(!empty($_GET['search_type'])){
    $sport_type = $_GET['search_type'];
}
