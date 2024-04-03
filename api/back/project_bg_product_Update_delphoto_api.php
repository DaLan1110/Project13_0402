<?php
$data = file_get_contents("php://input", "r");
if ($data != "") {
    $mydata = array();
    $mydata = json_decode($data, true);
    if (isset($mydata["ID"]) && isset($mydata["Product_Photo"]) && ($mydata["ID"] != "") && ($mydata["Product_Photo"] != "")) {
        $p_ID = $mydata["ID"];
        $p_Product_Photo = $mydata["Product_Photo"];

        //  /   根目錄
        //  ./  目前所在目錄
        //  ../ 跳到上一層              
        // require_once '../../conn.php';

        $servername = "localhost";
        $username = "owner01";
        $password = "123456";
        $dbname = "project13";

        $conn = mysqli_connect($servername, $username, $password, $dbname);
        if (!$conn) {
            die("連線錯誤!" . mysqli_connect_error());
        }

        // 照片不是空白的  
        $sql = "SELECT Product_Photo FROM product WHERE ID = '$p_ID' AND Product_Photo = '$p_Product_Photo'";
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) > 0) {
            while ($row = $result->fetch_assoc()) {
                if ($row["Product_Photo"] != "") {
                    $p_folderPath = "/var/www/html/photo/product";
                    $filename = $p_folderPath . "/" . $row["Product_Photo"];
                    if (file_exists($filename))
                        unlink($filename);
                    echo '{"state":true, "message":"刪除產品圖片成功"}';
                }
            }
        } else {
            echo '{"state":false, "message":"刪除產品圖片失敗, 找不到檔案"}';
        }
        mysqli_close($conn);
    } else {
        echo '{"state" : false, "message" : "傳遞參數格式錯誤!"}';
    }
} else {
    echo '{"state":false, "message":"未傳遞任何參數"}';
}
