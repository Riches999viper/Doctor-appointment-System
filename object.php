<?php  
define('BACKEND_FOLDER','admin-dashboard');
require_once BACKEND_FOLDER.DIRECTORY_SEPARATOR.'autoloader.php';
$doctor=new Doctor();
$setting=new Setting();
$settingRecord=$setting->selectAllRecord();
$settingRecord=$settingRecord[0];
$patient=new Patient();
$schedule=new Schedule();
$comment=new Comment();
$aboutus=new Aboutus();
$appointment=new Appointment();
?>