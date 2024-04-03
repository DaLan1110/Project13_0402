<?php
// input = {"ID":"XX"}

$data = file_get_contents("php://input", "r");
if ($data != "") {
    $mydata = array();
    $mydata = json_decode($data, true);
    if (isset($mydata["UID01"]) && $mydata["UID01"] != "") {
        $m_UID01 = $mydata["UID01"];

        $sername = "localhost";
        $username = "owner01";
        $password = "123456";
        $dbname = "project13";

        $conn = mysqli_connect($servername, $username, $password, $dbname);
        if (!$conn) {
            die("連線錯誤!" . mysqli_connect_error());
        }

        $sql = "SELECT member_account.ID, member_account.Account, member_account.UID01, member_account.Level, member_personal.UserName, member_personal.NickName, member_personal.Gender, member_personal.Mobile, member_personal.Email, member_personal.Birthday, member_personal.Address, member_personal.Photo FROM member_account INNER JOIN member_personal ON member_account.ID = member_personal.UserId WHERE UID01 = '$m_UID01'";
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) == 1) {
            $mydata = array();
            while ($row = mysqli_fetch_assoc($result)) {
                $mydata[] = $row;
            }
            echo '{"state" : true, "data" : ' . json_encode($mydata) . ', "message" : "查詢資料成功!"}';
        } else {
            echo '{"state" : false, "message" : "查詢資料失敗，查無資料!' . $sql . mysqli_error($conn) . '"}';
        }
        mysqli_close($conn);
    } else {
        echo '{"state" : false, "message" : "傳遞參數格式錯誤!"}';
    }
} else {
    echo '{"state" : false, "message" : "未傳遞任何參數!"}';
}