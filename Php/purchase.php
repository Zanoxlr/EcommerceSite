<?php

include("sess.php");

$userID =  $isValidArr[1];

if($isValidArr[0] == null){
    header("Location: ../login.php");
}
else{

$ids=$text="";
$tempCost=0;
$cookieValues=array();
$cost = 0;

foreach ($_COOKIE as $key=>$val){
    if(is_numeric($key)){
        $ids .= $key.",";
        $cookieValues[] = $val;
    }
}
if($ids == null){
    header("Location: ../index.php");
}
$idsQuery = substr($ids, 0, -1);


// GET PRICE AND STOCK
include('database_connection.php');

$query = "SELECT ID, Name, Price, Stock FROM produkti WHERE ID in ($idsQuery)";

$statement=$connect->prepare($query);
$statement->execute();
$result=$statement->fetchAll();
$data=array();

foreach($result as $row) {
    $sub_array=array();
    $sub_array[]=$row['ID'];
    $sub_array[]=$row['Name'];
    $sub_array[]=$row['Price'];
    $sub_array[]=$row['Stock'];
    $data[]=$sub_array;
}
for($i = 0;$i < count($data); $i++){
    $StockInDB = $data[$i][3];
    $cookieStock = $cookieValues[$i];
    
    if ($StockInDB >= $cookieStock){
        // take as much as you ordered
        $newStock = $StockInDB - $cookieStock;
        $tempId = $data[$i][0];
        //include('database_connection.php');
        $query1 = "UPDATE produkti SET Stock = $newStock WHERE ID = $tempId";
        $statement=$connect->prepare($query1);
        $statement->execute();
    }
    elseif ($StockInDB > 0){
        // take whats left
        $cookieStock = $StockInDB;
        $tempId = $data[$i][0];
        //include('database_connection.php');
        $query1 = "UPDATE produkti SET Stock = 0 WHERE ID = $tempId";
        $statement=$connect->prepare($query1);
        $statement->execute();
    }
    // set the quantity got
    $data[$i][3] = $cookieStock;

    $tempCost = $data[$i][2] * $cookieStock;
    $cost += $tempCost; 
    $text .= "<tr class=\"item-row\"><td class=\"description\"><label>".$data[$i][1]."</label></td><td class=\"cost\"><label>".$data[$i][2]." €</label></td><td><label class=\"qty\">".$cookieValues[$i]."</label></td><td><label class=\"qty\">".$cookieStock."</label></td><td><span class=\"price\">".$tempCost." €</span></td></tr>";
}

$text .= "<tr id=\"hiderow\"><td colspan=\"5\"><br></td></tr><tr><td colspan=\"2\" class=\"blank\"> </td><td colspan=\"2\" class=\"total-line balance\">Balance Due</td><td class=\"total-value balance\"><div class=\"due\">".$cost." €</div></td></tr>";
CreateReceipt($cost,$text,$data,$userID);

header("Location: ../index.php");
}

function CreateReceipt($price,$text,$data,$userID){
    try {
        // Set the PDO error mode to exception
        include('database_connection.php');
        $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        // date
        date_default_timezone_set("Europe/Ljubljana");
        $date = date("m/d/Y G:i:s");
        // insert
        $sql = "INSERT INTO receipt (BuyerID, CrDate, price) VALUES (\"$userID\", NOW() , \"$price\")";
        // in sql
        $connect->exec($sql);
        // id of row
        $last_id = $connect->lastInsertId();
        // send mail info
        SendMail($last_id,$price,$text,$date,$userID);
        CreateReceiptProduct($last_id,$data);
      }
      
      catch(PDOException $e) {
        die("ERROR: Could not connect. ". $e->getMessage());
      }
}
function CreateReceiptProduct($receiptID,$data){

    $values= "";
   
    for($i = 0; $i < count($data); $i++){

        $tempId = $data[$i][0];
        $tempQuantitiy = $data[$i][3];
        $tempPrice = $data[$i][2];

        $values .= " ( $receiptID , $tempId , $tempQuantitiy , $tempPrice ) ,";
    }
    $valuesQuery = substr($values, 0, -1);
    // INSERTING RECEIPT PRODUCTS
    // Set the PDO error mode to exception
    include('database_connection.php');
    $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // insert
    $sql = "INSERT INTO `receiptproducts` (ReceiptID, ProductID, Quantity, PricePerProduct) VALUES $valuesQuery";
    // in sql
    $connect->exec($sql);
    // removes cookies
    foreach ($_COOKIE as $key=>$val){
        if(is_numeric($key)){
            setcookie($key, NULL, time() - 3600,"/");
        }
    }
}
function SendMail($idR,$cost,$text,$date,$userID){
    $headers = "MIME-Version: 1.0" . "\r\n";
    $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

    $toMail = GetEmailAddr($userID);

    $subject = "Your receipt: ".$idR;
    // add mail from database, create a receipt with information
    $beforeTxt = "<!DOCTYPE html><html><head><meta http-equiv='Content-Type' content='text/html; charset=UTF-8'/><title>Invoice</title><style>*{margin:0;padding:0}body{font:14px/1.4 Georgia,serif}#page-wrap{width:800px;margin:0 auto}label[readonly]{border:0;font:14px Georgia,Serif;overflow:hidden;resize:none}table{border-collapse:collapse}table td,table th{border:1px solid #000;padding:5px}#header{height:15px;width:100%;margin:20px 0;background:#222;text-align:center;color:#fff;font:bold 15px Helvetica,Sans-Serif;text-decoration:uppercase;letter-spacing:20px;padding:8px 0}#address{width:250px;height:150px;float:left}#customer{overflow:hidden}#customer-title{font-size:20px;font-weight:700;float:left}#meta{margin-top:1px;width:300px;float:right}#meta td{text-align:right}#meta td.meta-head{text-align:left;background:#eee}#meta td label{width:100%;height:20px;text-align:right}#items{clear:both;width:100%;margin:30px 0 0 0;border:1px solid #000}#items th{background:#eee}#items label{width:80px;height:50px}#items tr.item-row td{border:0;vertical-align:top}#items td.description{width:300px}#items td.item-name{width:175px}#items td.description label,#items td.item-name label{width:100%}#items td.total-line{border-right:0;text-align:right}#items td.total-value{border-left:0;padding:10px}#items td.total-value label{height:20px;background:0 0}#items td.balance{background:#eee}#items td.blank{border:0}#terms{text-align:center;margin:20px 0 0 0;position:absolute;bottom:30px;width:800px}#terms h5{text-transform:uppercase;font:13px Helvetica,Sans-Serif;letter-spacing:10px;border-bottom:1px solid #000;padding:0 0 8px 0;margin:0 0 8px 0}#terms label{width:100%;text-align:center}#items td.total-value label:focus,#items td.total-value label:hover,.delete:hover,label:focus,label:hover{background-color:#ef8}</style></head><body><div id=\"page-wrap\"><div style=\"clear:both\"></div><div id=\"customer\"> <label id=\"customer-title\">zTECH</label> <table id=\"meta\"> <tr> <td class=\"meta-head\">Invoice ID</td><td><label>".$idR."</label></td></tr><tr> <td class=\"meta-head\">Date</td><td>".$date."</td></tr><tr> <td class=\"meta-head\">Amount Due</td><td><div class=\"due\">".$cost." €</div></td></tr></table></div><table id=\"items\"> <tr> <th>Item</th> <th>Unit Cost</th> <th>Quantity orderd</th> <th>Quantity got</th> <th>Price</th> </tr>";
    $text .= "</table><div id=\"terms\"><h5>Terms</h5><label>This is a fake invoice, referencing your order on zTECH site</label></div></div></body></html>";
    mail($toMail,$subject,$beforeTxt.$text,$headers);
}
function GetEmailAddr($id){
    include('database_connection.php');
    $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $query = "SELECT mail FROM users WHERE ID = $id";

    $statement = $connect->prepare($query);
    $statement->execute();
    $result = $statement->fetchAll();
    return $result[0][0];
}
?>