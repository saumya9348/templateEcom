<?php
include 'dblink.php';
if(isset($_SESSION['admid'])){
    unset($_SESSION['admid']);
    session_destroy();
    header('location:admin_login_f.php');
}