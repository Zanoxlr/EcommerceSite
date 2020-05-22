<?php
$output='';
// connection to the database
include('database_connection.php');
// gets the search bar text and sets a query 
if(isset($_POST["query"])) {
    // insert mysql_real_escape_string 
    $search = $_POST["query"];
    $query = "SELECT * FROM produkti as p WHERE p.Name like '%".$search."%'";
}
// if search bar text is null then get the filter attributes
else {
    // set the 1st half of the query
    $query="SELECT * FROM produkti";
    // set the counter
    $whereCounter=0;
    $orderCounter=0;
    // gets the BRAND value 
    if (isset($_POST['BrandID'])) {
        // get the value
        $BrandID = $_POST['BrandID'];
        // call the method to update the query
        AndWhereCounter($BrandID);
    }
    // gets the CATEGORY value 
    if (isset($_POST['CategoryID'])) {
        // get the value
        $CategoryID = $_POST['CategoryID'];
        // call the method to update the query
        AndWhereCounter($CategoryID);
    }
    // gets the STOCK value 
    if (isset($_POST['Stock'])) {
        // get the value
        $Stock = $_POST['Stock'];
        // call the method to update the query
        AndWhereCounter($Stock);
    }
    // gets the RATE value 
    if (isset($_POST['Rate'])) {
        // get the value
        $Rate=$_POST['Rate'];
        // call the method to update the query
        OrderBy($Rate);
    }
    // gets the PRICE value 
    if (isset($_POST['Price'])) {
        // get the value
        $Price=$_POST['Price'];
        // call the method to update the query
        OrderBy($Price);
    }
}
function AndWhereCounter($stringVal){
    // if its isnt -1
    if ($stringVal != -1) {
        // add AND if its positive
        if($whereCounter >=1) {
            $query .=" AND ";
        }
        //else add WHERE
        else {
            $query .=" WHERE ";
        }
        // add to the query and +1 on the counter
        $query .=" BrandID = $stringVal";
        $whereCounter++;
    }
}
function OrderBy($stringVal){
    // if its isnt -1
    if($stringVal !=-1) {
        // if positive add a comma
        if($orderCounter >=1) {
            $query .=", ";
        }
        // else add ORDER BY
        else {
            $query .=" ORDER BY ";
        }
        // add to the query and +1 on the counter
        $query .=$stringVal." ".$stringVal;
        $orderCounter++;
    }
}
// add the query limit
$query .= " LIMIT 25";
// prepare and excecute the query
$statement=$connect->prepare($query);
$statement->execute();
$result=$statement->fetchAll();
// set an array
$data=array();
// set the data in array
foreach($result as $row) {
    $sub_array=array();
    $sub_array[]=$row['ID'];
    $sub_array[]=$row['Name'];
    $sub_array[]=$row['Price'];
    $sub_array[]=$row['Rate'];
    $sub_array[]=$row['Stock'];
    $data[]=$sub_array;
}
// return the data
echo json_encode($data);
?>
