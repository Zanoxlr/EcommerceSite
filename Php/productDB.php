<?php

include('database_connection.php');

$id = $_GET["id"];
$queryReturn = "";

$query = "SELECT * FROM produkti AS p INNER JOIN category ON category.ID = p.CategoryID INNER JOIN brand ON brand.ID = p.BrandID WHERE p.ID = $id";

    
$statement = $connect->prepare($query);
$statement->execute();
$result = $statement->fetchAll();

echo json_encode($result);

?>