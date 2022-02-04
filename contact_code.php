<?php
include 'dblink.php';
if(isset($_SESSION['usrid'])){
	$cmd1="insert into user_query (user_id ,user_mail,user_msg,use_name) values (?,?,?,?)";
	$conn->beginTransaction();
	$query1=$conn->prepare($cmd1);
	$data1=array($_SESSION['usrid'],$_POST['mil'],$_POST['msg'],$_POST['nam']);
	$stat=$query1->execute($data1);
	if($stat){
		$conn->commit();
		header('location:usersendmessage.php');
	}else{
		$conn->rollback();
		echo "fail";
	}
}else{
	$_SESSION['contact_msg']="Please LogIn First" ;
	header('location:user_login.php');
}