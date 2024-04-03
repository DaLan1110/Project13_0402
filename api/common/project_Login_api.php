<?php

$data = file_get_contents("php://input", "r");
if ($data != "") {
    $mydata = array();
    $mydata = json_decode($data, true);
    if (isset($mydata["Account"]) && isset($mydata["Pwd"]) && $mydata["Account"] != "" && $mydata["Pwd"] != "") {
        $m_Account = $mydata["Account"];
        $m_Pwd = $mydata["Pwd"];

        $servername = "localhost";
        $username = "owner01";
        $password = "123456";
        $dbname = "project13";

        $conn = mysqli_connect($servername, $username, $password, $dbname);
        if (!$conn) {
            die("連線錯誤!" . mysqli_connect_error());
        }

        $sql = "SELECT Account, Pwd FROM member_account WHERE Account = '$m_Account'";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) == 1) {
            // 確認帳號符合，密碼不確定
            $row = mysqli_fetch_assoc($result);
            if (password_verify($m_Pwd, $row["Pwd"])) {
                // 密碼比對正確，撈取不包含密碼的使用者資料並產生UID
                $m_UID = substr(hash("sha256", uniqid(time())), 0, 8);
                // 更新至資料庫
                $sql = "UPDATE member_account SET UID01 = '$m_UID' WHERE Account = '$m_Account'";
                if (mysqli_query($conn, $sql)) {
                    // $sql = "SELECT Account, UID01 FROM member_account WHERE Account = '$m_Account'";
                    $sql = "SELECT member_account.Account, member_account.UID01, member_account.Permissions, member_account.Level, member_personal.UserName FROM member_account INNER JOIN member_personal ON member_account.ID = member_personal.UserId WHERE Account = '$m_Account'";
                    $result = mysqli_query($conn, $sql);
                    $row = mysqli_fetch_assoc($result);
                    $mydata = array();
                    $mydata[] = $row;

                    echo '{"state" : true, "data" :' . json_encode($mydata) . ' , "message" : "登入成功!"}';
                }else{
                    echo '{"state" : false, "message" : "登入失敗, UID更新錯誤!"}';
                }
            } else {
                echo '{"state" : false, "message" : "登入失敗!"}';
            }
        } else {
            // 確認帳號不符合，登入失敗
            echo '{"state" : false, "message" : "登入失敗!"}';
        }
    } else {
        echo '{"state" : false, "message" : "傳遞參數格式錯誤!"}';
    }
} else {
    echo '{"state" : false, "message" : "未傳遞任何參數!"}';
}
