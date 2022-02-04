<?php
include 'dblink.php';
$conn->beginTransaction();
if(strlen($_FILES['upic']['name']) > 1 ){
    $cmd4= "update user_data set user_pic='".$_FILES['upic']['name']."' where user_id =".$_SESSION['usrid'];

    $qry4=$conn->prepare($cmd4);
    $stat=$qry4->execute();
    if( empty($_FILES['upic']['name'])){
    unlink('prdct_upload_image/'.$v1['pro_img']);
    }
    // move_uploaded_file($_FILES['upic']['tmp_name'],'uploadimage/'.$_FILES['upic']['name']);
    }

$cmd3="update user_data set user_nm=? ,user_mail=? ,user_mob=?,user_login_id=? where user_id =".$_SESSION['usrid'];

$qry3=$conn->prepare($cmd3);
$data2=array($_POST['unm'],$_POST['umail'],$_POST['umob'],$_POST['usrid']);
// var_dump($data2);   
$sta=$qry3->execute($data2);
if($sta){
    $conn->commit();
    if(strlen($_FILES['upic']['name']) > 1 ){

    move_uploaded_file($_FILES['upic']['tmp_name'],'uploadimage/'.$_FILES['upic']['name']);
    // echo "hi";
    
    }
    $_SESSION['edit_msg']= "Your Profile Update Sucessfully";
    session_write_close();
    header('location:edit_usr_profile.php');
}
else{
    $conn->rollback();
    echo "fail";
}
