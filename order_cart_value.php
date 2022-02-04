<?php
session_start();
$command="mysql:dbname=u840981892_saumya;hostname=localhost";
$usrnm="u840981892_saumya9348";
$pwd="Sam@9348";
$conn = new PDO($command,$usrnm,$pwd,array(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION));

foreach($_SESSION['prductid'] as $key => $item ){
    $qry2=$conn->prepare("insert into order_to_admin (odr_usr_id,pro_id1,buyer_email,buyer_name,buyer_mob,address) values( '".$_SESSION['usrid']."' , '".$item."' ,'".$_POST['emailid']."','".$_POST['name']."','".$_POST['mobno']."','".$_POST['addrs']."' ) " ) ;
    var_dump($qry2);
    $starusExecute=$qry2->execute();
    var_dump($starusExecute);
}
unset($_SESSION['prductid']);
if(empty($_SESSION['prductid'])){
    header('location:delete_after_odr_done.php');
}

