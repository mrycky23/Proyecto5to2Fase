// auth.php
<?php
require 'vendor/autoload.php';
use Firebase\JWT\JWT;

// Clave secreta para firmar el token
$secretKey = 'your_secret_key';

// Datos de usuario para el ejemplo (esto normalmente se obtendría de una base de datos)
$username = 'user';
$password = 'password';

// Simulación de autenticación
if ($_POST['username'] === $username && $_POST['password'] === $password) {
    $payload = [
        'iss' => 'http://yourdomain.com',  // Emisor del token
        'iat' => time(),                   // Hora en que se emitió el token
        'exp' => time() + 3600,            // Expiración del token (1 hora)
        'sub' => $username                 // Asunto del token (en este caso, el nombre de usuario)
    ];
    $jwt = JWT::encode($payload, $secretKey);
    echo json_encode(['token' => $jwt]);
} else {
    echo json_encode(['error' => 'Invalid credentials']);
}
?>
