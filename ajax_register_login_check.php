<?php  
session_start();
require_once 'object.php';
if(isset($_POST['reg_email']) &&isset($_POST['reg_name']) &&isset($_POST['reg_phone']) &&isset($_POST['reg_gender']) &&isset($_POST['reg_pass'])){
    $patient->setData('name',$_POST['reg_name']);
    $patient->setData('email',$_POST['reg_email']);
    $patient->setData('phone',$_POST['reg_phone']);
    $patient->setData('gender',$_POST['reg_gender']);
    $patient->setData('password',md5($_POST['reg_pass']));
    $patient->setData('created_at',date('Y-m-d H:i:s'));
    $msg=$patient->saveRecord();
    if($msg==true){
        echo 'successfull';
    }else{
        echo 'unsuccesfull';
    }
}

if(!isset($_SESSION['is_login'])){
    if(isset($_POST['login_email']) && isset($_POST['login_password'])){
        $patient->setData('email',$_POST['login_email']);
        $patient->setData('password',md5($_POST['login_password']));
        $status=$patient->checkLogin();
        if (is_array($status)) {
            $_SESSION['email'] = $status['email'];;
            $_SESSION['id']=$status['id'];
            $_SESSION['time']=time()+1600;
            $_SESSION['is_login']=true;
            echo "successfull";
        } else {
            $error['failed'] = $status;
            echo $error['failed'];
        }
    }
}


?>