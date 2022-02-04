<?php
include 'dblink.php';
$cmd2="delete from order_data where pro_id='".$_GET['pid']."' and order_user_id = '".$_SESSION['usrid']."' ";
$conn->beginTransaction();
$qry2=$conn->prepare($cmd2);
$res2=$qry2->execute();
if($res2){
    $conn->commit();
    header('location:checkout.php');
}
else{
    $conn->rollback();
    echo "fail";
}