<?php
include('apitoken.php');
if(!isset($status)){
    if(isset($_POST['name'])&& $_POST['email']){
        $name=mysqli_real_escape_string($conn,$_POST['name']);
        $email=mysqli_real_escape_string($conn,$_POST['email']);
        if(isset($_GET['id']) && $_GET['id']>0){
            $id=mysqli_real_escape_string($conn,$_GET['id']);
            mysqli_query($conn, "UPDATE user SET name='$name', email='$email' WHERE id='$id'");
            $data="Data Updated";
            $code='10';

        }else{
            mysqli_query($conn, "INSERT INTO user(name,email) VALUES('$name','$email')");
            $status='true';
            $data='Data Inserted';
            $code='8';
        }

        
        
        
    }else{
        $status='true';
        $data='Invalid column counter';
        $code='9';
    }
    
    }
echo json_encode(["status"=>$status, "data"=>$data , "code"=>$code]);
?>