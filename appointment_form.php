<?php  
require_once 'object.php';
if(isset($_POST['pemail'])&&isset($_POST['pname']) && isset($_POST['pmessage']) && isset($_POST['pdoctor_id']) && isset($_POST['pphone'])&& isset($_POST['ppatient_id']) && isset($_POST['pselect_slots'])){
    $appointment->setData('email',$_POST['pemail']);
    $appointment->setData('name',$_POST['pname']);
    $appointment->setData('message',$_POST['pmessage']);
    $appointment->setData('phone',$_POST['pphone']);
    $appointment->setData('doctor_id',$_POST['pdoctor_id']);
    $appointment->setData('patient_id',$_POST['ppatient_id']);
    $appointment->setData('doc_sche_id',$_POST['pselect_slots']);
    $msg=$appointment->saveRecord();
    $schedule->setData('id',$_POST['pselect_slots']);
    $schedule->updateStatus('1');
    if($msg==true){
        echo 'success';
    }else{
        echo 'Data insertion failed';
    }
}
?>