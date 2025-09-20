<?php
include("conexion.php");

$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];
$correo = $_POST['correo'];

echo "<h1>Datos recibidos:</h1>";
echo "<h1>" . $nombre . "</h1>";
echo "<h1>" . $apellido . "</h1>";
echo "<h1>" . $correo . "</h1>";

// Lectura de datos de la base de datos
try {
    $stmt = $pdo->query("SELECT * FROM users");

    if ($stmt) {
        echo "<table>";
        echo "<tr><th>id</th><th>Nombre</th><th>Email</th><th></th><th></th></tr>";
        echo "<h1>LISTA DE USUARIOS</h1>";
        while ($row = $stmt->fetch()) {
            echo "<tr>";
            echo "<td>" . $row['id'] . "</td>";
            echo "<td>" . $row['name'] . "</td>";
            echo "<td>" . $row['email'] . "</td>";
            echo "<td><a href='delete_user.php?id=" . $row['id'] . "'>Eliminar</a></td>";
            echo "<td><a href='ejer3.php?id=" . $row['id'] . "'>Actualizar</a></td>";
            echo "</tr>";
        }
        echo "</table>";
    } else {
        echo "<h2>No se pudieron recuperar los datos de la base de datos.</h2>";
    }
} catch (PDOException $e) {
    echo "<h2>Error en la consulta: " . $e->getMessage() . "</h2>";
}
?>
