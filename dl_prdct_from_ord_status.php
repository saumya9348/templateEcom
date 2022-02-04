<?php
include 'dblink.php';
$cmd2="delete from order_to_admin where pro_id1 =".$_GET['id'] ;
$conn->beginTransaction();
$qry2=$conn->query($cmd2);
if($qry2->execute()){
    $conn->commit();
    header('location:order_cancel_sucessfuly_msg.php');
}else{
    $conn->rollback();
    echo "fail";
}