<?php
session_start();
$command="mysql:dbname=u840981892_saumya;hostname=localhost";
$usrnm="u840981892_saumya9348";
$pwd="Sam@9348";
$conn = new PDO($command,$usrnm,$pwd,array(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION));
$conn->beginTransaction();
$conn->exec("delete from order_data where pro_id ='".$_GET['pid2']."' ");
$conn->exec("delete from order_to_admin where pro_id1 ='".$_GET['pid2']."' ");
$conn->exec("delete from product where pro_id ='".$_GET['pid2']."' ");

$conn->commit();
$_SESSION["pdt_dlt_msg"]="Delete Sucessfully";
session_write_close();
header('location:product_detail.php');
