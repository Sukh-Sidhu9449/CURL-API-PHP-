<?php
include("db.php");
header('Content-Type:application/json');
if (isset($_GET['key'])) {
    $key = mysqli_real_escape_string($conn, $_GET['key']);
    $checkres = mysqli_query($conn, "SELECT * FROM api_token WHERE token ='$key'");
    if (mysqli_num_rows($checkres) > 0) {
        $checkrow = mysqli_fetch_assoc($checkres);
        if ($checkrow['status'] == 1) {
            if($checkrow['hit_count'] >= $checkrow['hit_limit']){
                echo json_encode(['status' => 'false', 'data' => 'API hit limit exceed']);
                die();
            }else{
                mysqli_query($conn,"UPDATE api_token SET hit_count=hit_count+1 WHERE token='$key'");
            }

            $sql = "SELECT * FROM user";
            $result = mysqli_query($conn, $sql);
            $count = mysqli_num_rows($result);
            
            if ($count > 0) {

                while ($row = mysqli_fetch_assoc($result)) {
                    $arr[] = $row;
                }
                echo json_encode(["status" => 'true', "data" => $arr, "result" => "Found"]);
            } else {
                echo json_encode(["status" => 'true', "data" => "No Data", "result" => "Not"]);;
            }
        }else{
            echo json_encode(['status' => 'false', 'data' => 'API key deactivated']);
        }
    } else {
        echo json_encode(['status' => 'false', 'data' => 'Please provide valid api key']);
    }
} else {
    echo json_encode(['status' => 'false', 'data' => 'Please provide api key']);
}
