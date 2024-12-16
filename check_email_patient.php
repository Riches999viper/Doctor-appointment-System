<?php  
$connection = new mysqli ('localhost','root','','doctorappointmentsystem');
if(!$connection){
    die('connection error');
}

if(isset($_POST['patient_email'])){
    $patientemail=$_POST['patient_email'];
    $sql="select * from patients where email='$patientemail'";
    $msg=$connection->query($sql);
    if($msg->num_rows==1){
        echo "email already exists";
    }else{
        echo 1;
    }
}

?>