<?php
$brandIDOption = getSqlData("BrandName","brand","BrandID");
$CategoryIDOption = getSqlData("CategoryName","category","CategoryID");


function getSqlData($queryVal,$dbName,$queryValID){

    $queryReturn = "";

    include('php/database_connection.php');

    $query = "SELECT DISTINCT produkti.$queryValID, $dbName.$queryVal FROM produkti INNER JOIN $dbName ON $dbName.ID = produkti.$queryValID ORDER BY $dbName.$queryVal ASC";

    $statement = $connect->prepare($query);
    $statement->execute();
    $result = $statement->fetchAll();
    foreach ($result as $row)
    {        
        $queryReturn .="<input type='radio' name='$queryValID' class='input' value=".$row[0]."><label for=".$row[0].">".$row[$queryVal]."</label><br>";
    }
    return $queryReturn;
}
?>