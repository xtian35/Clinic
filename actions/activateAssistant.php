<?php require_once('../config/config.php');
$assistantID=$_GET['assistant_ID'];
$status=$_GET['status'];

if($status==0){
    $status_update=1;
    $message='Activated Successfully';
}else if($status==1){
    $status_update=0;
    $message='Deactivated ';
}

$update=update('assistant',['Assistant_ID'=>$assistantID],['assistantStatus'=>$status_update]);
if($update){
    setFlash('success',$message);
    redirect('manageAssistant');
}