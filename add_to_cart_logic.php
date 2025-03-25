<?php
include "dbconnect.php";

if (session_status() === PHP_SESSION_NONE) {
    session_start();
    session_regenerate_id(true);
};

function createCart($user_id) {
    global $conn;
    $stmt = $conn->prepare("INSERT INTO carts (user_id) VALUES (?)");
    $stmt->bind_param("i", $user_id);
    $stmt->execute();
}

// checks if user has any cart present already
function checkCartPresence($user_id){
    global $conn;
    $stmt = $conn->prepare
}

function addItemToCart($cart_id, $product_id, $quantity){
    global $conn;
    $stmt = $conn->prepare("INSERT INTO cart_items (cart_id, product_id, quantity) 
    VALUES (?, ?, ?) ON DUPLICATE KEY UPDATE quantity = quantity + ?");
    $stmt->bind_param("iiii", $cart_id, $product_id, $quantity, $quantity);
    $stmt->execute();
}

function deleteItemFromCart($cart_id, $product_id){
    global $conn;
    $stmt = $conn->prepare("DELETE FROM cart_items WHERE cart_id = ? AND product_id = ?");
    $stmt->bind_param("ii", $cart_id, $product_id);
    $stmt->execute();
}

function getCartItems($cart_id){
    global $conn;
    //joins shop_items and cart_items tables together by same productID where 
    //cart_itemsID coresponds to selected user
    $stmt = $conn->prepare("SELECT items.name, items.price, c.quantity FROM cart_items c 
    JOIN shop_items items ON c.product_id = items.id WHERE c.cart_id = ?");
    $stmt->bind_param("i", $cart_id);
    $stmt->execute();
    return $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
}

function getCartID($user_id){
    global $conn;
    $stmt = $conn->prepare("SELECT id from carts WHERE user_id = ?");
    $stmt->bind_param("i", $user_id);
    $stmt->execute();
    $result = $stmt->get_result();
    if ($row = $result->fetch_assoc()) { 
        return $row['id'];
    }
}

?>