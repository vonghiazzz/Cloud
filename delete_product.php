<?php
 include_once 'connect.php';
 $conn = new connect();
 $db_link = $conn->connectToPDO();
 if(isset($_GET['pid'])){
    $value = $_GET['pid'];
    $sqlSelect = "DELETE FROM `product` WHERE Product_id = ? ";
    $stmt1 = $db_link->prepare($sqlSelect);
    $execute = $stmt1->execute(array("$value"));
    if($execute){
        header("Location: product_manger.php");
    }else{
        echo "Failed!" .$execute;
    }
 }
?>