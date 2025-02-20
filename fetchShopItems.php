<?php
include "dbconnect.php";
if($conn->connect_error){
    echo json_encode(["error" => "Database connection failed"]);
    exit();
}

$sql = "SELECT * FROM shop_items ORDER BY item_id";
$result = $conn->query($sql);

$items=[];
foreach($result as $row){
    $items[] = [
        "itemID" => $row["item_id"],
        "image_path" => $row["image_path"],
        "description" => $row["description"],
        "price" => $row["price"]
    ];
}

echo json_encode($items);
$conn->close();
?>