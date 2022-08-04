<?php
include('db.php');
header('Content-Type:application/json');
if(isset($_GET['token'])){
    $token=mysqli_real_escape_string($conn,$_GET['token']);
    $checkTokenRes=mysqli_query($conn,"SELECT * FROM api_token WHERE token='$token'");
    if(mysqli_num_rows($checkTokenRes)>0){
        $checkTokenRow=mysqli_fetch_assoc($checkTokenRes);
        if($checkTokenRow['status']==1){
            

        }else{
            $status='true';
            $data='API Token deactivated';
            $code='3';

        }
    }else{
        $status='true';
        $data='Please Provide Valid API Token';
        $code='2';
    }
}else{
    $status='true';
    $data='Please Provide API Token';
    $code='1';

}

?>