<?php
include('apitoken.php');
if(!isset($status)){
    if(isset($_POST['id'])&& $_POST['id']){
        mysqli_query($conn, "SELECT * FROM user");
        $id=mysqli_real_escape_string($conn,$_POST['id']);
        mysqli_query($conn,"DELETE FROM user WHERE id='$id'");
        $status='true';
        $data='Data deleted';
        $code='7';
    }else{
        $status='true';
        $data='Provide Id';
        $code='6';
    }
    
    }
echo json_encode(["status"=>$status, "data"=>$data , "code"=>$code]);
?>