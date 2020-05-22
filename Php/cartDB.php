<?php
// connect to database
include('database_connection.php');
// set value
$ids = "";
$cost = 0;
// get ids of items from cookies into a string
foreach ($_COOKIE as $key=>$val)
{
    if(is_numeric($key)){
        $ids .= $key.",";
    }
}
// remove the last comma in the string
$idsQuery = substr($ids, 0, -1);
// do a datebase query 
$query = "SELECT * FROM `produkti` WHERE ID in ($idsQuery)";
$statement = $connect->prepare($query);
$statement->execute();
$result = $statement->fetchAll();
// set an array
$data = array();
// foreach loop sets values in array
// and calculates the price by quantity 
foreach($result as $row){
    // calculate the price for certain items
    $quantity = $_COOKIE[$row['ID']];
    $price = $row[4];
    $cost += $quantity * $price;
    // sets the value of sub array
    $sub_array = array();
    $sub_array[] = $row[0];
    $sub_array[] = $row[1];
    $sub_array[] = $price;
    $sub_array[] = $row[6];
    $sub_array[] = $quantity;
    $data[] = $sub_array;
}
$data[] = $cost;
// echo the array
echo json_encode($data);
?>
