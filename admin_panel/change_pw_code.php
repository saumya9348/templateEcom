<?php
include 'dblink.php';
$cmd1="select * from admin";
$qry1=$conn->query($cmd1);
foreach($qry1 as $v1){}
if($_POST['oldpw']==$v1['adm_pw']){
    $cmd2="update admin set adm_pw='".$_POST['newpw']."' where admin_id=".$_SESSION['admid'];
    $conn->beginTransaction();
    $qry2=$conn->prepare($cmd2);
    $stat=$qry2->execute();
    if($stat){
        $conn->commit();
        $_SESSION["pw_upd_msg"]="Your Password Reset Sucessfully";
        header("location:change_pw.php");
        echo "done";
    }
}else{
    $_SESSION["pw_upd_msg"]="Your Old Password isn't Match";
    header("location:change_pw.php");    
    echo "not";
}