<?php
include 'dblink.php';
if(isset($_SESSION['usrid'])){

}else{$_SESSION['shop_msg']="Please Login First";
    header('location:user_login.php');
}
$cmd1="insert into order_data (order_user_id,pro_id) values (?,?)";
$conn->beginTransaction();
$qry1=$conn->prepare($cmd1);

$data1=array($_SESSION['usrid'],$_GET['prdctid']);

$stat2=$qry1->execute($data1);
// var_dump($stat2);exit;
if($stat2){
    $conn->commit();
    header('location:shop.php');
}
else{
    $conn->rollback();
    echo "fail";
}