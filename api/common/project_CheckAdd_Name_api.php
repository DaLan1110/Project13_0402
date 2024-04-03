<?php

$data = file_get_contents("php://input", "r");
if ($data != "") {
    $mydata = array();
    $mydata = json_decode($data, true);
    if (isset($mydata["Add_Name"]) && $mydata["Add_Name"] != "") {
        $p_Add_Name = $mydata["Add_Name"];

        $servername = "localhost";
        $username = "owner01";
        $password = "123456";
        $dbname = "project13";

        $conn = mysqli_connect($servername, $username, $password, $dbname);
        if (!$conn) {
            die("連線錯誤!" . mysqli_connect_error());
        }

        $sql = "SELECT Add_Name FROM product_add WHERE Add_Name = '$p_Add_Name'";

        $result = mysqli_query($conn, $sql);
        if(mysqli_num_rows($result) == 0){
            // 加料不存在，可以使用
            echo '{"state" : true, "message" : "產品類別名稱不存在，可以使用!"}';
        }else{
            // 加料已存在，不可以使用
            echo '{"state" : false, "message" : "產品類別名稱已存在，不可以使用!"}';
        }
    } else {
        echo '{"state" : false, "message" : "傳遞參數格式錯誤!"}';
    }
} else {
    echo '{"state" : false, "message" : "未傳遞任何參數!"}';
}
