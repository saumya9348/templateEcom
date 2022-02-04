<?php
include 'dblink.php';
$cmd2="insert into product (pro_nmp,pro_price,pro_img,pro_desc) values(?,?,?,?)";
$conn->beginTransaction();
$qry2=$conn->prepare($cmd2);
$data2=array($_POST['prname'],$_POST['price'],$_FILES['prphoto']['name'],$_POST['txtarea']);
$res2=$qry2->execute($data2);
if($res2){
    $conn->commit();
    move_uploaded_file($_FILES['prphoto']['tmp_name'], 'prdct_upload_image/'.$_FILES['prphoto']['name']);
    header('location:product_detail.php'); 
}
else{
    $conn->rollback();
    echo 'fail';
}