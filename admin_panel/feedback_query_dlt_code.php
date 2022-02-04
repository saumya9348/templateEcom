<?php
include 'dblink.php';
$cmd1="delete from user_query where query_id=".$_GET['id'];
$conn->beginTransaction();
$qry1=$conn->prepare($cmd1);
$stat=$qry1->execute();
if($stat){
    $conn->commit();
    header('location:feedback_user.php');
}
else{
    $conn->rollback();
}