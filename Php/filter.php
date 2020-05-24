<?php
// set the data
$bigData=array();
$bigData[] = getSqlData("BrandName","brand","BrandID");
$bigData[] = getSqlData("CategoryName","category","CategoryID");
// return the data
echo json_encode($bigData);

// creates radio buttons for filter
function getSqlData($queryVal,$dbName,$queryValID){
    // connect to the database
    include('database_connection.php');
    // set the query
    $query = "SELECT DISTINCT produkti.$queryValID, $dbName.$queryVal FROM produkti INNER JOIN $dbName ON $dbName.ID = produkti.$queryValID ORDER BY $dbName.$queryVal ASC";
    // execute the query
    $statement = $connect->prepare($query);
    $statement->execute();
    $result = $statement->fetchAll();
    // create an array
    $data = array();
    // insert values into array
    foreach ($result as $row)
    {
        $sub_data = array();
        $sub_data[] = $queryValID; // ID_type, BrandID
        $sub_data[] = $row[0]; // ID
        $sub_data[] = $row[$queryVal]; // Name_type, BrandName
        $data[] = $sub_data;
    }
    return $data;
}
?>
