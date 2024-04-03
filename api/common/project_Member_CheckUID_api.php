<?php

$data = file_get_contents("php://input", "r");
if ($data != "") {
    $mydata = array();
    $mydata = json_decode($data, true);
    if (isset($mydata["UID01"]) && $mydata["UID01"] != "") {
        $m_UID01 = $mydata["UID01"];

        $servername = "localhost";
        $username = "owner01";
        $password = "123456";
        $dbname = "project13";

        $conn = mysqli_connect($servername, $username, $password, $dbname);
        if (!$conn) {
            die("連線錯誤!" . mysqli_connect_error());
        }

        $sql = "SELECT member_account.Account, member_account.UID01, member_account.Permissions, member_account.Level, member_personal.UserName FROM member_account INNER JOIN member_personal ON member_account.ID = member_personal.UserId WHERE UID01 = '$m_UID01'";

        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) == 1) {
            $mydata = array();
            while ($row = mysqli_fetch_assoc($result)) {
                $mydata[] = $row;
            }
            // 驗證成功，可以登入
            echo '{"state" : true, "data" :' . json_encode($mydata) . ', "message" : "驗證成功，可以登入!"}';
        } else {
            // 驗證失敗，不可登入
            echo '{"state" : false, "message" : "驗證失敗，不可登入!"}';
        }
        mysqli_close($conn);
    } else {
        echo '{"state" : false, "message" : "UID01傳遞參數格式錯誤或是值為0!"}';
    }
} else {
    echo '{"state" : false, "message" : "未傳遞任何參數!"}';
}
