<?php
require 'vendor/autoload.php';
use Firebase\JWT\JWT;
use Firebase\JWT\Key;

$secretKey = 'your_secret_key';
$authHeader = $_SERVER['HTTP_AUTHORIZATION'];

if ($authHeader) {
    list($jwt) = sscanf($authHeader, 'Bearer %s');

    try {
        $decoded = JWT::decode($jwt, new Key($secretKey, 'HS256'));
        echo json_encode(['message' => 'Access granted', 'user' => $decoded->sub]);
    } catch (Exception $e) {
        echo json_encode(['error' => 'Access denied']);
    }
} else {
    echo json_encode(['error' => 'No token provided']);
}
?>
