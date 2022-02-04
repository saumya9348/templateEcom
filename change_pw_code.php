<?php
include 'dblink.php';
$cmd1="select user_pw from user_data where user_id = ".$_SESSION['usrid'];
$qry1=$conn->query($cmd1);
foreach($qry1 as $v1){}
if($_POST['oldpw'] ==$v1['user_pw'] ){
    $cmd2 = "update user_data set user_pw = '".$_POST['newpw']."' where user_id = ".$_SESSION['usrid'];
    $conn->beginTransaction();
    $qry2=$conn->prepare($cmd2);
    $stat=$qry2->execute();
    if($stat){
        $conn->commit();
        $_SESSION['pwreset']="Password Reset Sucessfully";
        session_write_close();
        header('location:change_pw.php');
    }
    else{
        $conn->rollback();
        echo "fail";
    }
}
else{
    $_SESSION['pwreset']="Old Password Is Not Match";
    header('location:change_pw.php');

}