<?php
include 'dblink.php';
if(isset($_SESSION['usrid'])){
    unset($_SESSION['usrid']);
    session_destroy();
    header('location:user_login.php');
}
else{

}