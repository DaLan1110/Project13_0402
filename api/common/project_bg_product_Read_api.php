<?php
$userserver = "localhost";
$username = "owner01";
$password = "123456";
$dbname = "project13";

$conn = mysqli_connect($servername, $username, $password, $dbname);
if (!$conn) {
    die("連線錯誤!!" . mysqli_connect_error());
}

$sql = "SELECT product.*, product_add.Add_Name, product_add.Update_at AS Add_Update_at, product_add.Created_at AS Add_Created_at, product_layer.Layer_Name, product_layer.Update_at AS Layer_Update_at, product_layer.Created_at AS Layer_Created_at FROM product LEFT JOIN product_add ON product.AddId = product_add.ID LEFT JOIN product_layer ON product.LayerId = product_layer.ID";

// SELECT t1.*, t2.* FROM t1 
// JOIN t2 ON t1.layerid = t2.id 


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