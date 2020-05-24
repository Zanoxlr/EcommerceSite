<?php
// connect to the database
include('database_connection.php');
// set values
$id = $_POST["id"];
$queryReturn = "";
// prepare the query
$query = "SELECT * FROM produkti AS p INNER JOIN category ON category.ID = p.CategoryID INNER JOIN brand ON brand.ID = p.BrandID WHERE p.ID = $id";
// execute the query
$statement = $connect->prepare($query);
$statement->execute();
$result = $statement->fetchAll();
// return the result
echo json_encode($result);
?>
