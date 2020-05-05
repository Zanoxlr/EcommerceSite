<?php $output='';
include('database_connection.php');

if(isset($_POST["query"])) {
    // insert mysql_real_escape_string 
    $search = $_POST["query"];
    $query = "SELECT * FROM produkti as p WHERE p.Name like '%".$search."%'";
}

else {
    $query="SELECT * FROM produkti";

    $whereCounter=0;
    $orderCounter=0;

    // BRAND
    if (isset($_POST['BrandID'])) {
        $BrandID=$_POST['BrandID'];

        if($BrandID !=-1) {

            if($whereCounter >=1) {
                $query .=" AND ";
            }

            else {
                $query .=" WHERE ";
            }

            $query .=" BrandID = $BrandID";
            $whereCounter++;
        }
    }

    // CATEGORY
    if (isset($_POST['CategoryID'])) {

        $CategoryID=$_POST['CategoryID'];

        if($CategoryID !=-1) {

            if($whereCounter >=1) {
                $query .=" AND ";
            }

            else {
                $query .=" WHERE ";
            }

            $query .=" CategoryID = $CategoryID";
            $whereCounter++;
        }
    }

    // STOCK
    if (isset($_POST['Stock'])) {

        $Stock=$_POST['Stock'];

        if($Stock !=-1) {
            if($whereCounter >=1) {
                $query .=" AND ";
            }

            else {
                $query .=" WHERE ";
            }

            if($Stock >=1) {
                $query .="Stock >= $Stock";
            }

            else {
                $query .="Stock >= $Stock";
            }

            $whereCounter++;
        }
    }

    // RATE
    if (isset($_POST['Rate'])) {

        $Rate=$_POST['Rate'];

        if($Rate !=-1) {
            if($orderCounter >=1) {
                $query .=", ";
            }

            else {
                $query .=" ORDER BY ";
            }

            $query .="Rate $Rate";
            $orderCounter++;
        }
    }

    // PRICE
    if (isset($_POST['Price'])) {
        $Price=$_POST['Price'];

        if($Price !=-1) {
            if($orderCounter >=1) {
                $query .=", ";
            }

            else {
                $query .=" ORDER BY ";
            }

            $query .="Price $Price";
            $orderCounter++;
        }
    }
}
$query .= " LIMIT 25";

$statement=$connect->prepare($query);
$statement->execute();
$result=$statement->fetchAll();

$data=array();

foreach($result as $row) {
    $sub_array=array();
    $sub_array[]=$row['ID'];
    $sub_array[]=$row['Name'];
    $sub_array[]=$row['Price'];
    $sub_array[]=$row['Rate'];
    $sub_array[]=$row['Stock'];
    $data[]=$sub_array;
}

echo json_encode($data);
?>