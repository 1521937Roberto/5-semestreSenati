<?php
// Configuración de la conexión
$host = "localhost";
$dbname = "basesebas";   // <-- Nombre de la base de datos
$username = "root";
$password = "senati";

try {
    // Crear la conexión PDO
    $pdo = new PDO("mysql:host=$host;port=3306;dbname=$dbname;charset=utf8", $username, $password);
    // Activar el modo de errores
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Mensaje si la conexión es correcta
    echo "✅ Conexión correcta a la base de datos '$dbname'";
} catch(PDOException $e) {
    // Mensaje si hay error
    die("❌ Error al conectar: " . $e->getMessage());
}
?>
