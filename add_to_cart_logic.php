<?php
include "dbconnect.php";

if (session_status() === PHP_SESSION_NONE) {
    session_start();
    session_regenerate_id(true);
};

function createCart($user_id, $conn) {
    $stmt = $conn->prepare("INSERT INTO carts (user_id) VALUES (?)");
    $stmt->bind_param("i", $user_id);
    $stmt->execute();
    return $conn->insert_id; // Returns the new cart ID
}

function addItemToCart($cart_id, $product_id, $quantity, $conn) {
    $stmt = $conn->prepare("INSERT INTO cart_items (cart_id, product_id, quantity) 
    VALUES (?, ?, ?) ON DUPLICATE KEY UPDATE quantity = quantity + ?");
    $stmt->bind_param("iiii", $cart_id, $product_id, $quantity, $quantity);
    $stmt->execute();
}

function getCartItems($cart_id, $conn) {
    $stmt = $conn->prepare("SELECT p.name, p.price, c.quantity FROM cart_items c 
    JOIN products p ON c.product_id = p.id WHERE c.cart_id = ?");
    $stmt->bind_param("i", $cart_id);
    $stmt->execute();
    return $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
}

?>