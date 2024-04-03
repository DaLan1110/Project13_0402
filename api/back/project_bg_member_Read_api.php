<?php
$userserver = "localhost";
$username = "owner01";
$password = "123456";
$dbname = "project13";

$conn = mysqli_connect($servername, $username, $password, $dbname);
if (!$conn) {
    die("連線錯誤!!" . mysqli_connect_error());
}

$sql = "SELECT ma.ID, ma.Account, ma.Pwd, ma.Level, ma.Permissions, mp.UserName, mp.NickName, mp.Gender, mp.Mobile, mp.Email, mp.Birthday, mp.Address, mp.Created_at, mp.Update_at FROM member_account AS ma JOIN member_personal AS mp ON ma.ID = mp.UserId WHERE ma.Level NOT IN (1)";
$result = mysqli_query($conn, $sql);

$mydata = array();
if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $mydata[] = $row;
    }
    echo '{"state" : true, "data":'. json_encode($mydata) .',"message" : "查詢資料成功!"}';
} else {
    echo '{"state" : false, "message" : "查詢資料失敗，查無資料!"}';
}

mysqli_close($conn);
?>