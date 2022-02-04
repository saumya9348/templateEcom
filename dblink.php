<?php
session_start();
$command="mysql:dbname=u840981892_saumya;hostname=localhost";
$usrnm="u840981892_saumya9348";
$pwd="Sam@9348";
$conn = new PDO($command,$usrnm,$pwd,array(PDO::ATTR_AUTOCOMMIT=>false));


if(isset($_SESSION['usrid'])){
	$command11="SELECT user_pic FROM user_data where user_id =".$_SESSION['usrid'];
	$queryy=$conn->query($command11);
	$_SESSION['store']=0;
	foreach($queryy as $variable1){
		$_SESSION['store'] = strlen($variable1['user_pic']);
		}
		// echo $_SESSION['store'];
	// var_dump($store);
	// exit;
	// 
	// 	
	// $_SESSION['pfile']=$store ;
	// $aaa=isset($variable1['userpic']);
}
?>