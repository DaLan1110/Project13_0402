<?php
// input = {"ID":"XX", "Email":"XX"}
/*
    output = {"state" : true, "message" : "更新成功!"}
    output = {"state" : false, "message" : "更新失敗!"}
    output = {"state" : false, "message" : "傳遞參數格式錯誤!"}
    output = {"state" : false, "message" : "未傳遞任何參數!"}
*/

$data = file_get_contents("php://input", "r");
if ($data != "") {
    $mydata = array();
    $mydata = json_decode($data, true);
    if (isset($mydata["ID"]) && isset($mydata["Layer_Name"]) && $mydata["ID"] != "" && $mydata["Layer_Name"] != "") {
        $p_ID = $mydata["ID"];
        $p_Layer_Name = $mydata["Layer_Name"];

        $servername = "localhost";
        $username = "owner01";
        $password = "123456";
        $dbname = "project13";

        $conn = mysqli_connect($servername, $username, $password, $dbname);
        if (!$conn) {
            die("連線錯誤!" . mysqli_connect_error());
        }

        $sql = "UPDATE product_layer SET Layer_Name = '$p_Layer_Name' WHERE ID = '$p_ID'"; 

        if (mysqli_query($conn, $sql)) {
            // 新增成功
            echo '{"state" : true, "message" : "更新成功!"}';
        } else {
            // 新增失敗
            echo '{"state" : false, "message" : "更新失敗!"}';
        }
    } else {
        echo '{"state" : false, "message" : "傳遞參數格式錯誤!' . $sql . mysqli_error($conn) . '"}';
    }
} else {
    echo '{"state" : false, "message" : "未傳遞任何參數!"}';
}

?>
