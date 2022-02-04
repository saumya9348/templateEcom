<?php
include 'dblink.php';
$cmd1="select user_id,user_login_id,user_pw from user_data where user_login_id ='".$_POST['usrid']."' and user_pw = '".$_POST['usrpwd']."' ";
$qry1= $conn->query($cmd1);

$userid=0;
foreach($qry1 as $var1){
    $userid = $var1['user_id'];
}
// var_dump($userid);
// exit;
if(isset($var1['user_id'])){
    $_SESSION['usrid']=$userid;
    header('location:index.php');
}else{
    header('location:user_login.php');
    $_SESSION['usr_login_fail_msg']="Your User Id and Pwd Not match";
}