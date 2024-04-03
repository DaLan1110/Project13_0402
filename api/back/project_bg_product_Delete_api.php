<?php
// input = {"ID":"X"}
/*
    output = {"state" : true, "message" : "刪除成功!"}
    output = {"state" : false, "message" : "刪除失敗!"}
    output = {"state" : false, "message" : "傳遞參數格式錯誤!"}
    output = {"state" : false, "message" : "未傳遞任何參數!"}

*/

$data = file_get_contents("php://input", "r");
if ($data != "") {
    $mydata = array();
    $mydata = json_decode($data, true);
    if (isset($mydata["ID"]) && $mydata["ID"] != "") {
        // $mydata["Pname"]: 抓取陣列裡名為Pname屬性的值
        $p_ID = $mydata["ID"];

        $servername = "localhost";
        $username = "owner01";
        $password = "123456";
        $dbname = "project13";

        $conn = mysqli_connect($servername, $username, $password, $dbname);
        if (!$conn) {
            die("連線錯誤!" . mysqli_connect_error());
        }

        $sql = "DELETE FROM product WHERE ID IN ($p_ID)";

        if (mysqli_query($conn, $sql)) {
            // 新增成功
            echo '{"state" : true, "message" : "刪除成功!"}';
        } else {
            // 新增失敗
            echo '{"state" : false, "message" : "刪除失敗!"}';
        }
    } else {
        echo '{"state" : false, "message" : "傳遞參數格式錯誤!"}';
    }
} else {
    echo '{"state" : false, "message" : "未傳遞任何參數!"}';
}
