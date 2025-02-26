<!-- returns items with parsed category -->
<?php
include "dbconnect.php";

if($conn->connect_error){
    die("Connection failed: " . $conn->connect_error);
}

if(isset($_GET["item_type"])){
    $item_type = $_GET["item_type"];
    $sql = "SELECT * FROM shop_items WHERE item_type = ?";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $item_type);
    $stmt->execute();
    $result = $stmt->get_result();

    $items = [];
    foreach($result as $item){
        $items[] = [
            "itemID" => $row["item_id"],
            "image_path" => $row["image_path"],
            "description" => $row["description"],
            "price" => $row["price"]
        ];
    }
    echo json_encode($items);
    $conn->close();
}
?>