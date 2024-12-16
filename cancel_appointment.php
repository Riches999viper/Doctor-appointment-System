<?php  
require_once 'object.php';
$id=$_GET['id'];
$appointment->setData('id',$id);
$success=$appointment->deleteRecordByAppointmentId();
if($success==true){
    header('location:view_profile.php');
}else{
    die('error');
}


?>