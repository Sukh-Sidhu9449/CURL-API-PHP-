<?php
include('apitoken.php');
$sql="SELECT * FROM user";
if(!isset($status)){
    if(isset($_GET['id']) && $_GET['id']>0){
        $id=mysqli_real_escape_string($conn,$_GET['id']);
        $sql.=" WHERE id='$id'";
    }
    $sqlRes=mysqli_query($conn,$sql);
    if(mysqli_num_rows($sqlRes)>0){
    while($row=mysqli_fetch_assoc($sqlRes)){
        $data[]=$row;
    }
    $status='true';
    $code='5';

    }else{
    $status='true';
    $data='Data not Found';
    $code='4';
    }
    echo json_encode(["status"=>$status, "data"=>$data , "code"=>$code]);
}
?>