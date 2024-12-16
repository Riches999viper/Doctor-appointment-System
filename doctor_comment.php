<?php  
require_once 'object.php';
try{
    if(isset($_POST['name']) && isset($_POST['email']) && isset($_POST['comment']) && isset($_POST['doctor_id'])){
        $comment->setData('name',$_POST['name']);
        $comment->setData('email',$_POST['email']);
        $comment->setData('comment',$_POST['comment']);
        $comment->setData('doctor_id',$_POST['doctor_id']);
        $comment->setData('commented_at',date('Y-m-d H:i:s'));
        $msg=$comment->saveRecord();
        if($msg==true){
            echo "successfull";
        }else{
            echo "unsuccessfull";
        }
    }
    
}catch(Exception $e){
    die('error occured'.$e->getMessage());  
}



?>