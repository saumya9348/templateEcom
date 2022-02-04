<?php
include 'dblink.php';
$cmd1="update admin set admin_name=? ,adm_user_nm=?,admin_mail_or_ph=? where admin_id =".$_SESSION['admid'];
$conn->beginTransaction();
$qry1=$conn->prepare($cmd1);
$data=array($_POST['nm'],$_POST['unm'],$_POST['mlid']);
$stat=$qry1->execute($data);
if($stat){
    $conn->commit();
    $_SESSION['upd_pro_msg']="Update Sucessfully";
    header('location:profile_edit.php');
}else{
    $conn->rollback();
    $_SESSION['upd_pro_msg']="Something Error";
    header('location:profile_edit.php');
}