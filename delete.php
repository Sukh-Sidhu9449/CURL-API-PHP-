<?php
if(isset($_GET['id']) && $_GET['id']>0){
    $url = "http://localhost/Task/curlapi/apidel.php?token=dgdjkjhjkjhjkh";
    $ch = curl_init();
    $arr['id']=$_GET['id'];
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $arr);
    $res = curl_exec($ch);
    curl_close($ch);
    $res = json_decode($res, true);
    if(isset($res['status']) && isset($res['code']) && isset($res['status'])==7){
        header('location:index.php');
        die();
    }else{
        echo $res['data'];
    }
    
}else{
    header('location:index.php');
    die();
}
