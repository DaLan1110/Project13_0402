<?php

$data = file_get_contents("php://input", "r");
if ($data != "") {
    $mydata = array();
    $mydata = json_decode($data, true);
    if (isset($mydata["Product_Name"]) && $mydata["Product_Name"] != "") {
        $p_Product_Name = $mydata["Product_Name"];

        $servername = "localhost";
        $username = "owner01";
        $password = "123456";
        $dbname = "project13";

        $conn = mysqli_connect($servername, $username, $password, $dbname);
        if (!$conn) {
            die("連線錯誤!" . mysqli_connect_error());
        }

        $sql = "SELECT Product_Name FROM product WHERE Product_Name = '$p_Product_Name'";

        $result = mysqli_query($conn, $sql);
        if(mysqli_num_rows($result) == 0){
            // 產品分類不存在，可以使用
            echo '{"state" : true, "message" : "產品名稱不存在，可以使用!"}';
        }else{
            // 產品分類已存在，不可以使用
            echo '{"state" : false, "message" : "產品名稱已存在，不可以使用!"}';
        }
    } else {
        echo '{"state" : false, "message" : "傳遞參數格式錯誤!"}';
    }
} else {
    echo '{"state" : false, "message" : "未傳遞任何參數!"}';
}
