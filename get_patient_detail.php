<?php  
require_once 'object.php';
if(isset($_POST['role']) && isset($_POST['patient_id'])){
    $patient->setData('id',$_POST['patient_id']);
    $patientDetail=$patient->selectAllRecordById();
    echo json_encode($patientDetail,true);
}

?>