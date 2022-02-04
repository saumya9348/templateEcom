<?php
include 'dblink.php';
$cmd1="select * from admin where  adm_user_nm='".$_POST['login']."' and adm_pw ='".$_POST['password']."' ";
$qry=$conn->query($cmd1);
$_SESSION['admid']=0;
foreach($qry as $v1){
    $_SESSION['admid']=$v1['admin_id'];
}
if($_SESSION['admid']){
    header('location:product_detail.php');

}else{
    $_SESSION['lin_fail']="Your Userid and Password Is Not Match";
    header('location:admin_login_f.php');
}