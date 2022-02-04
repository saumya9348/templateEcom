<?php
include 'dblink.php';
$x=Placed;
$cmd2="update order_to_admin set order_status ='".$x."' where odr_usr_id='".$_GET['id']."' and pro_id1=".$_GET['id1'] ;
$conn->beginTransaction();
$qry1=$conn->prepare($cmd2);
$stat=$qry1->execute();
if($stat){
    $conn->commit();
    header('location:order_view.php');
}else{
    $conn->rollback();
    echo "fail";
}