<?php
// {"Account":"owner05","Pwd":"123456","UserName":"張曉明","NickName":"xxx","Gender":"女性","Mobile":"0912345678","Email":"owner05@test.com","Address":"火星球地球村","Level":"90","Permissions":"0"}
$data = file_get_contents("php://input", "r");
if ($data != "") {
    $mydata = array();
    $mydata = json_decode($data, true);
    if (isset($mydata["LayerId"]) && isset($mydata["Product_Name"]) && isset($mydata["Product_Price"]) && isset($mydata["Product_Content"]) && isset($mydata["Product_Photo"]) && isset($mydata["AddId"]) && $mydata["LayerId"] != "" && $mydata["Product_Name"] != "" && $mydata["Product_Price"] != "" && $mydata["Product_Content"] != "" && $mydata["Product_Photo"] != "" && $mydata["AddId"] != "") {
        $p_LayerId = $mydata["LayerId"];
        $p_Product_Name = $mydata["Product_Name"];
        $p_Product_Price = $mydata["Product_Price"];
        $p_Product_Content = $mydata["Product_Content"];
        $p_Product_Photo = $mydata["Product_Photo"];
        $p_AddId = $mydata["AddId"];

        $servername = "localhost";
        $username = "owner01";
        $password = "123456";
        $dbname = "project13";

        $conn = mysqli_connect($servername, $username, $password, $dbname);
        if (!$conn) {
            die("連線錯誤!" . mysqli_connect_error());
        }

        $sql = "INSERT INTO product(LayerId, Product_Name, Product_Price, Product_Content, Product_Photo, AddId) VALUES ('$p_LayerId', '$p_Product_Name', '$p_Product_Price', '$p_Product_Content', '$p_Product_Photo', '$p_AddId')";

        if (mysqli_query($conn, $sql)) {
            // 新增成功
            echo '{"state" : true, "message" : "新增成功!"}';
        } else {
            // 新增失敗
            echo '{"state" : false, "message" : "新增失敗!' . $sql . '"}';
        }
    } else {
        echo '{"state" : false, "message" : "傳遞參數格式錯誤!!"' . $sql . '}';
    }
} else {
    echo '{"state" : false, "message" : "未傳遞任何參數!"}';
}