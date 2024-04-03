<?php
// input = {"ID":"XX", "Email":"XX"}
// {"ID":45,"LayerId":"29","Product_Name":"123123","Product_Price":"21","Product_Content":"123","Product_Photo":"20240322111516_65fcf7c41fae2_熱紐西蘭牛奶.png","AddId":"19, 18"}
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
    if (isset($mydata["ID"]) && isset($mydata["LayerId"]) && isset($mydata["Product_Name"]) && isset($mydata["Product_Price"]) && isset($mydata["Product_Content"]) && isset($mydata["Product_Photo"]) && isset($mydata["AddId"]) && $mydata["ID"] != "" && $mydata["LayerId"] != ""  && $mydata["Product_Name"] != "" && $mydata["Product_Price"] != "" && $mydata["Product_Content"] != "" && $mydata["Product_Photo"] != "" && $mydata["AddId"] != "") {
        $p_ID = $mydata["ID"];
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

        $sql = "UPDATE product SET LayerId = '$p_LayerId', AddId = '$p_AddId', Product_Name = '$p_Product_Name', Product_Price = '$p_Product_Price', Product_Content = '$p_Product_Content', Product_Photo = '$p_Product_Photo' WHERE ID = '$p_ID'"; 

        if (mysqli_query($conn, $sql)) {
            // 新增成功
            echo '{"state" : true, "message" : "更新成功!"}';
        } else {
            // 新增失敗
            echo '{"state" : false, "message" : "更新失敗!"}';
        }
    } else {
        echo '{"state" : false, "message" : "傳遞參數格式錯誤!"}';
    }
} else {
    echo '{"state" : false, "message" : "未傳遞任何參數!"}';
}

?>