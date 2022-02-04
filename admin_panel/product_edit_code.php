<?php
include 'dblink.php';
$cmd1="select * from product where pro_id =".$_POST['pid1'];
$qry1=$conn->query($cmd1);
foreach($qry1 as $v1){
}
$conn->beginTransaction();
if(strlen($_FILES['pdtimg']['name']) > 1    ){
$cmd2="update product set pro_img='".$_FILES['pdtimg']['name']."' where pro_id =".$_POST['pid1'];

$qry2=$conn->prepare($cmd2);
$res2=$qry2->execute();
    if(! empty($_FILES['pdtimg']['name'])){
    unlink('prdct_upload_image/'.$v1['pro_img']);
    }
}
$cmd3="update product set pro_nmp=? , pro_price=?, pro_status=?, pro_desc=? where pro_id =".$_POST['pid1'];
$qry3=$conn->prepare($cmd3);
$daa=array($_POST['pdtname'],$_POST['pdtprice'],$_POST['pdtstat'],$_POST['txtara']);
$statuss=$qry3->execute($daa);
if($statuss){
    $conn->commit();
    if(strlen($_FILES['pdtimg']['name']) > 1){
    move_uploaded_file($_FILES['pdtimg']['tmp_name'],'prdct_upload_image/'.$_FILES['pdtimg']['name']);
    }
    $_SESSION['update_prdct_msg']="Update Sucessfull";
    $_SESSION['id1']=$_POST['pid1'];
    session_write_close();
    // echo "done;";
    header("location:product_edit.php?ik={$_POST['pid1']} ");
}

else{
    $conn->rollback();
    echo "fail";    
}
?>

