<?php  
$connection=new mysqli('localhost','root','','doctorappointmentsystem');
if(!$connection){
    die('error occured'.mysqli_error($connection));
}
if(isset($_POST['d_specialization'])){
    $opt='<option value="" >Select Doctor</option>';
    $specialization = $_POST['d_specialization'];
$sql="select * from doctors where specialization='$specialization'";
$result=$connection->query($sql);
if($result){
    while($row=$result->fetch_assoc()){
        $opt.="<option value='".$row['id']."'>".ucfirst($row['name'])."</option>";
    }
}
echo $opt;
}
if(isset($_POST['d_doctorRecord'])){
    $opt='<option value="" >Select Day</option>';
    $doctor_id = $_POST['d_doctorRecord'];
$sql="select * from doc_schedule_day where doctor_id='$doctor_id'";
$result=$connection->query($sql);
if($result){
    while($row=$result->fetch_assoc()){
        $opt.="<option value='".$row['day']."'>".ucfirst($row['day'])."</option>";
    }
}
echo $opt;
}
if(isset($_POST['d_dayRecord']) && isset($_POST['d_doctorId'])){
    $opt='<option value="" >Select Slot</option>';
    $day = $_POST['d_dayRecord'];
    $doctor_id = $_POST['d_doctorId'];
$sql="select * from doc_schedule_day where day='$day' and doctor_id=$doctor_id";
$result=$connection->query($sql);
if($result){
    while($row=$result->fetch_assoc()){
        if($row['status']==0){
            $opt.="<option value='".$row['id']."'>".substr($row['slots'],0,5)."</option>";
        }
    }
}
echo $opt;
}




?>