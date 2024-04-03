<?php
// 收到POST請求，是否有收到Layer_Name
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["Layer_Name"])) {
    $p_Layer_Name = $_POST["Layer_Name"];

    $servername = "localhost";
    $username = "owner01";
    $password = "123456";
    $dbname = "project13";

    $conn = mysqli_connect($servername, $username, $password, $dbname);
    if (!$conn) {
        die("連線錯誤!" . mysqli_connect_error());
    }

    if ($p_Layer_Name == '全部') {
        $sql = "SELECT product.* FROM product";
    } else {
        $sql = "SELECT product.*, product_layer.* FROM product INNER JOIN product_layer ON product.LayerId = product_layer.ID WHERE product_layer.Layer_Name = '$p_Layer_Name'";
    }

    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $mydata = array();
        while ($row = $result->fetch_assoc()) {
            $mydata[] = $row;
        }
        echo '{"state" : true, "data" : ' . json_encode($mydata) . ', "message" : "讀取產品及分類成功!"}';
    } else {
        echo '{"state" : false, "message" : "讀取產品及分類失敗!"}';
    }
    $conn->close();
} else {
    echo '{"state" : false, "message" : "未傳遞任何參數!"}';
}
?>