<?php
// {"Account":"owner05","Pwd":"123456","UserName":"張曉明","NickName":"xxx","Gender":"女性","Mobile":"0912345678","Email":"owner05@test.com","Address":"火星球地球村","Level":"90","Permissions":"0"}
$data = file_get_contents("php://input", "r");
if ($data != "") {
    $mydata = array();
    $mydata = json_decode($data, true);
    if (isset($mydata["Add_Name"]) && $mydata["Add_Name"] != "") {
        $p_Add_Name = $mydata["Add_Name"];

        $servername = "localhost";
        $username = "owner01";
        $password = "123456";
        $dbname = "project13";

        $conn = mysqli_connect($servername, $username, $password, $dbname);
        if (!$conn) {
            die("連線錯誤!" . mysqli_connect_error());
        }

        $sql = "INSERT INTO product_add(Add_Name) VALUES ('$p_Add_Name')";

        if (mysqli_query($conn, $sql)) {
            // 新增成功
            echo '{"state" : true, "message" : "新增成功!"}';
        } else {
            // 新增失敗
            echo '{"state" : false, "message" : "新增失敗!' . $sql . mysqli_error($conn) . '"}';
        }
    } else {
        echo '{"state" : false, "message" : "傳遞參數格式錯誤!!"' . $sql . mysqli_error($conn) . '}';
    }
} else {
    echo '{"state" : false, "message" : "未傳遞任何參數!"}';
}
