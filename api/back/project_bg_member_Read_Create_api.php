<?php
// {"Account":"owner05","Pwd":"123456","UserName":"張曉明","NickName":"xxx","Gender":"女性","Mobile":"0912345678","Email":"owner05@test.com","Address":"火星球地球村","Level":"90","Permissions":"0"}
$data = file_get_contents("php://input", "r");
if ($data != "") {
    $mydata = array();
    $mydata = json_decode($data, true);
    if (isset($mydata["Account"]) && isset($mydata["Pwd"]) && isset($mydata["UserName"]) && isset($mydata["NickName"]) && isset($mydata["Gender"]) && isset($mydata["Mobile"]) && isset($mydata["Email"]) && isset($mydata["Address"]) && isset($mydata["Level"]) && isset($mydata["Permissions"]) && $mydata["Account"] != "" && $mydata["Pwd"] != "" && $mydata["UserName"] != "" && $mydata["NickName"] != "" && $mydata["Gender"] != "" && $mydata["Mobile"] != "" && $mydata["Email"] != "" && $mydata["Address"] != "" && $mydata["Level"] != "" && $mydata["Permissions"] != "") {
        $m_ID = $mydata["ID"];
        $m_Account = $mydata["Account"];
        // 密碼加密 PASSWORD_DEFAULT
        $m_Pwd = password_hash($mydata["Pwd"], PASSWORD_DEFAULT);
        $m_UserName = $mydata["UserName"];
        $m_NickName = $mydata["NickName"];
        $m_Gender = $mydata["Gender"];
        $m_Mobile = $mydata["Mobile"];
        $m_Email = $mydata["Email"];
        $m_Address = $mydata["Address"];
        $m_Level = $mydata["Level"];
        $m_Permissions = $mydata["Permissions"];
        $m_UID01 = substr(hash("sha256", uniqid(time())), 0, 8);
        

        $servername = "localhost";
        $username = "owner01";
        $password = "123456";
        $dbname = "project13";

        $conn = mysqli_connect($servername, $username, $password, $dbname);
        if (!$conn) {
            die("連線錯誤!" . mysqli_connect_error());
        }

        $sql = "INSERT INTO member_account(Account, Pwd, UID01, Level, Permissions) VALUES ('$m_Account', '$m_Pwd', '$m_UID01', '$m_Level', '$m_Permissions')";

        if (mysqli_query($conn, $sql)) {
            // 新增成功
            // echo '{"state" : true, "message" : "Account寫入成功!"}';
            $myhash = substr(hash("sha256", uniqid(time())), 0, 5);
            $sql = "INSERT INTO member_personal(UserName, NickName, Gender, Mobile, Email, Address, UserId) SELECT '$m_UserName', '$m_NickName', '$m_Gender', '$m_Mobile', '$m_Email', '$m_Address', (SELECT ID FROM member_account ORDER BY ID DESC LIMIT 1)";
            if (mysqli_query($conn, $sql)){
                echo '{"state" : true, "message" : "註冊成功!"}';
            }else{
                echo '{"state" : false, "message" : "Personal寫入失敗!' . $sql . mysqli_error($conn) . '"}';
            }
        } else {
            // 新增失敗
            echo '{"state" : false, "message" : "註冊失敗!' . $sql . mysqli_error($conn) . '"}';
        }
    } else {
        echo '{"state" : false, "message" : "傳遞參數格式錯誤!!"'. $sql . mysqli_error($conn) .'}';
    }
} else {
    echo '{"state" : false, "message" : "未傳遞任何參數!"}';
}
