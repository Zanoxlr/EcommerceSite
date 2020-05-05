<?php

include('database_connection.php');

$ids = "";
$cost = 0;

foreach ($_COOKIE as $key=>$val)
    {
        if(is_numeric($key)){
            $ids .= $key.",";
        }
    }


$idsQuery = substr($ids, 0, -1);

$query = "SELECT * FROM `produkti` WHERE ID in ($idsQuery)";

$statement = $connect->prepare($query);
$statement->execute();
$result = $statement->fetchAll();

$data = array();

foreach($result as $row){

    $quantity = $_COOKIE[$row['ID']];
    $price = $row[4];
    $cost += $quantity * $price;

    $sub_array = array();
    $sub_array[] = $row[0];
    $sub_array[] = $row[1];
    $sub_array[] = $price;
    $sub_array[] = $row[6];
    $sub_array[] = $quantity;
    $data[] = $sub_array;
}
$data[] = $cost;


echo json_encode($data);
?>