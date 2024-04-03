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
    if (isset($mydata["ID"]) && isset($mydata["UserName"]) && isset($mydata["NickName"]) && isset($mydata["Gender"]) && isset($mydata["Mobile"]) && isset($mydata["Email"]) && isset($mydata["Birthday"]) && isset($mydata["Address"]) && isset($mydata["Level"]) && isset($mydata["Permissions"]) && $mydata["ID"] != "" && $mydata["UserName"] != "" && $mydata["NickName"] != "" && $mydata["Gender"] != "" && $mydata["Mobile"] != "" && $mydata["Email"] != "" && $mydata["Birthday"] != "" && $mydata["Address"] != "" && $mydata["Level"] != "" && $mydata["Permissions"] != "") {
        $m_ID = $mydata["ID"];
        $m_UserName = $mydata["UserName"];
        $m_NickName = $mydata["NickName"];
        $m_Gender = $mydata["Gender"];
        $m_Mobile = $mydata["Mobile"];
        $m_Email = $mydata["Email"];
        $m_Birthday = $mydata["Birthday"];
        $m_Address = $mydata["Address"];
        $m_Level = $mydata["Level"];
        $m_Permissions = $mydata["Permissions"];

        $servername = "localhost";
        $username = "owner01";
        $password = "123456";
        $dbname = "project13";

        $conn = mysqli_connect($servername, $username, $password, $dbname);
        if (!$conn) {
            die("連線錯誤!" . mysqli_connect_error());
        }

        $sql = "UPDATE member_account AS ma INNER JOIN member_personal AS mp ON ma.ID = mp.UserId SET ma.Level = '$m_Level', ma.Permissions = '$m_Permissions', mp.UserName = '$m_UserName', mp.NickName = '$m_Gender', mp.Gender = '$m_Gender', mp.Mobile = '$m_Mobile', mp.Email = '$m_Email', mp.Birthday = '$m_Birthday', mp.Address = '$m_Address' WHERE ma.ID = $m_ID";

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
