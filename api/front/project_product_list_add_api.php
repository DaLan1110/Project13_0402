<?php

$data = file_get_contents("php://input", "r");
if ($data != "") {
    $mydata = array();
    $mydata = json_decode($data, true);
    if (isset($mydata["ID"]) && $mydata["ID"] != "") {
        $p_ID = $mydata["ID"];

        $servername = "localhost";
        $username = "owner01";
        $password = "123456";
        $dbname = "project13";

        $conn = mysqli_connect($servername, $username, $password, $dbname);
        if (!$conn) {
            die("連線錯誤!!" . mysqli_connect_error());
        }

        if ($p_ID == "不加料") {
            $mydata = array();
            $mydata[] = "不加料";
            echo '{"state" : true, "data":' . json_encode($mydata) . ', "message" : "查詢資料成功，但加料為不加料!"}';
            mysqli_close($conn);
        } else {
            $sql = "SELECT ID, Add_Name FROM product_add WHERE ID IN ($p_ID);";

            $result = mysqli_query($conn, $sql);
            $mydata = array();
            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    $mydata[] = $row;
                }
                echo '{"state" : true, "data":' . json_encode($mydata) . ',"message" : "查詢資料成功!"}';
            } else {
                echo '{"state" : false, "message" : "查詢資料失敗，查無資料!' . $sql . mysqli_error($conn) . '"}';
            }
            mysqli_close($conn);
        }
    } else {
        echo '{"state" : false, "message" : "傳遞參數格式錯誤!' . $sql . mysqli_error($conn) . '"}';
    }
} else {
    echo '{"state" : false, "message" : "未傳遞任何參數!"}';
}
