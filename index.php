<?php
$url = "http://localhost/Task/curlapi/apiread.php?token=dgdjkjhjkjhjkh";
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$res = curl_exec($ch);
curl_close($ch);
$res = json_decode($res, true);


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css">
</head>

<body>
<table class="table">
  <thead>
    <tr>
      
      <th scope="col">ID</th>
      <th scope="col">Name</th>
      <th scope="col">Email</th>
      <th scope="col">Action</th>

    </tr>
  </thead>
  <tbody>
    <tr>
      
    <?php
    
        foreach ($res['data'] as $list) {
            ?>
            <tr>
                        <td><?php echo $list['id'] ?> </td>
                        <td><?php echo $list['name'] ?></td>
                        <td><?php echo $list['email'] ?></td>
                        <td><a href="form.php?id=<?php echo $list['id']?>"><i class='bi bi-pencil'></i></a>
                        <a href="delete.php?id=<?php echo $list['id']?>" class='delete' title='delete'><i class='bi bi-trash'></i></a>
                        </td>
                        </tr>
                        <?php
        }
        ?>
  </tbody>
</table>
<div class="col-sm-1">
            <div class="form-group">
                <a href="form.php" class="btn btn-secondary">New User</a>
            </div>
        </div>
</body>

</html>








<?php
// if (isset($res['status'])) {
//     if ($res['status'] == true) {
//         if (isset($res['result'])) {
//             if ($res['result'] == true) {
// 
?>
<!-- //                 <table>
//                     <tr>
//                         <td>Id</td>
//                         <td>Name</td>
//                         <td>Email</td>
//                     </tr> -->
 <?php
    //                     foreach ($res['data'] as $list) {
    //                         echo "<tr>
    //                         <td>" . $list['id'] . "</td>
    //                         <td>" . $list['name'] . "</td>
    //                         <td>" . $list['email'] . "</td>
    //                         </tr>";
    //                     }
    //                     
    ?>
<!-- //                 </table> -->
 <?php

    //             }
    //         } else {
    //             echo $res['data'];
    //         }
    //     } else {
    //         echo $res['data'];
    //     }
    // } else {
    //     echo "API not working";
    // }
    ?>