<?php
// set the data
$brandIDOption = getSqlData("BrandName","brand","BrandID");
$CategoryIDOption = getSqlData("CategoryName","category","CategoryID");
// creates radio buttons for filter
function getSqlData($queryVal,$dbName,$queryValID){
    // set to null
    $queryReturn = "";
    // connect to the database
    include('php/database_connection.php');
    // set the query
    $query = "SELECT DISTINCT produkti.$queryValID, $dbName.$queryVal FROM produkti INNER JOIN $dbName ON $dbName.ID = produkti.$queryValID ORDER BY $dbName.$queryVal ASC";
    // execute the query
    $statement = $connect->prepare($query);
    $statement->execute();
    $result = $statement->fetchAll();
    // create radio buttons
    foreach ($result as $row)
    {        
        $queryReturn .="<input type='radio' name='$queryValID' class='input' value=".$row[0]."><label for=".$row[0].">".$row[$queryVal]."</label><br>";
    }
    // return the results
    return $queryReturn;
}
?>
