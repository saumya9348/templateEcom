<?php
include 'dblink.php';
$cmd1="insert into user_data (user_nm,user_login_id,user_mail,user_mob,user_pic,user_pw) values (?,?,?,?,?,?)";
$conn->beginTransaction();
$qry1=$conn->prepare($cmd1);

$data1=array($_POST['usrname'],$_POST['usrid'],$_POST['usrmail'],$_POST['usrmno'],strtoupper($_FILES['usrphoto']['name']),$_POST['usrpwd']);
$result1=$qry1->execute($data1);
if($result1){
    $conn->commit();
    move_uploaded_file(strtoupper($_FILES['usrphoto']['tmp_name']),'uploadimage/'.strtoupper($_FILES['usrphoto']['name']));
    $_SESSION['sgnup_msg'] = "Sucessfully Signup";
    header('location:user_login.php');
    session_write_close();
}else{
    $conn->rollback();
    echo "fail";
}