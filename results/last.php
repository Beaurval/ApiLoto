<?php
include("../db_connect.php");
$request_method = $_SERVER["REQUEST_METHOD"];

//FONCTIONS
function getLastDraw()
{
    global $conn;
    $query = "SELECT * FROM HISTORIQUE_LOTO ORDER BY DATE_TIRAGE DESC LIMIT 1";

    $response = array();
    $result = mysqli_query($conn, $query);
    while ($row = mysqli_fetch_assoc($result)) {
        $response[] = $row;
    }
    header('Content-Type: application/json');
    echo json_encode($response[0], JSON_PRETTY_PRINT);
}


//ROUTES
switch ($request_method) {
    case 'GET':
        getLastDraw();
        break;
    default:
        // Requête invalide
        header("HTTP/1.0 405 Method Not Allowed");
        break;
}