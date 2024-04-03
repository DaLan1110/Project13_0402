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
    if (isset($mydata["ID"]) && isset($mydata["Pwd"]) && $mydata["ID"] != "" && $mydata["Pwd"] != "") {
        $m_ID = $mydata["ID"];
        $m_Pwd = password_hash($mydata["Pwd"], PASSWORD_DEFAULT);

        $servername = "localhost";
        $username = "owner01";
        $password = "123456";
        $dbname = "project13";

        $conn = mysqli_connect($servername, $username, $password, $dbname);
        if (!$conn) {
            die("連線錯誤!" . mysqli_connect_error());
        }

        $sql = "UPDATE member_account SET Pwd = '$m_Pwd' WHERE ID = '$m_ID'"; 

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
