<?php
include 'dblink.php';
$cmd3="delete from order_data where order_user_id =".$_SESSION['usrid'] ;
$conn->beginTransaction();
$qry3=$conn->prepare($cmd3);
$stat = $qry3->execute();
// var_dump($stat);
// exit;
if($stat){
    $conn->commit();
    $_SESSION['odr_msg']="Your Order Sucessfully Placed";
    session_write_close();
    header('location:order_sucessful_msg.php');
}else{
    $conn->rollback();
    echo "fail";
}