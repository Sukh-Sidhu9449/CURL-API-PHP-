<?php
$msg = "";
$name = "";
$email = "";
if (isset($_POST['submit'])) {
    $arr['name'] = $_POST['name'];
    $arr['email'] = $_POST['email'];
    $id="";
    if (isset($_GET['id']) && $_GET['id'] > 0) {
        $id=$_GET['id'];
    }
    $url = "http://localhost/Task/curlapi/apiui.php?token=dgdjkjhjkjhjkh&id=".$id;
    $ch = curl_init();
    $arr['id'] = $_GET['id'];
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $arr);
    $res = curl_exec($ch);
    curl_close($ch);
    $res = json_decode($res, true);
    $msg= $res['data'];
}

if (isset($_GET['id']) && $_GET['id'] > 0) {
    $url = "http://localhost/Task/curlapi/apiread.php?token=dgdjkjhjkjhjkh&id=".$_GET['id'];
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $res = curl_exec($ch);
    curl_close($ch);
    $res = json_decode($res, true);
    if(isset($res['status']) && isset($res['code']) && $res['code']== '5'){
        $name=$res['data']['0']['name'];
        $email=$res['data']['0']['email'];

    }else{
        header('location:index.php');
        die();
    }
}
echo $msg;

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

</head>

<body>
    <form action="#" method="post">
        <div class="col-sm-4">
            <div class="form-group">
                <input type="name" id="name" class="form-control" placeholder="Enter Name" value="<?php echo $name ?>"name="name" required>
            </div>
        </div>
        <div class="col-sm-4">
            <div class="form-group">
                <input type="email" id="email" class="form-control" placeholder="Enter Email" name="email" value="<?php echo $email ?>" required>
            </div>
        </div>
        <div class="col-sm-1">
            <div class="form-group">
                <input type="submit" value="Submit" class="btn btn-info btn-block" name="submit">
            </div>
        </div>
    </form>
    <div class="col-sm-1">
        <div class="form-group">
            <a href="index.php" class="btn btn-secondary">Back</a>
        </div>
    </div>
</body>

</html>
