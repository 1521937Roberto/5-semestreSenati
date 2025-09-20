<?php
include("conexion.php");

// Insertar datos si vienen del formulario
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $correo = $_POST['correo'];

    try {
        $sql = "INSERT INTO users (nombre, apellido, correo) VALUES (:nombre, :apellido, :correo)";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([
            ':nombre' => $nombre,
            ':apellido' => $apellido,
            ':correo' => $correo
        ]);
        echo "<p style='color:green;'>✅ Usuario agregado correctamente</p>";
    } catch (PDOException $e) {
        echo "<p style='color:red;'>❌ Error al insertar: " . $e->getMessage() . "</p>";
    }
}

// Listar usuarios
try {
    $stmt = $pdo->query("SELECT * FROM users ORDER BY id DESC");

    echo "<h2>📋 Lista de Usuarios</h2>";
    echo "<table border='1' cellpadding='10' cellspacing='0'>";
    echo "<tr><th>ID</th><th>Nombre</th><th>Apellido</th><th>Correo</th><th>Acciones</th></tr>";

    while ($row = $stmt->fetch()) {
        echo "<tr>";
        echo "<td>" . $row['id'] . "</td>";
        echo "<td>" . $row['nombre'] . "</td>";
        echo "<td>" . $row['apellido'] . "</td>";
        echo "<td>" . $row['correo'] . "</td>";
        echo "<td>
                <a href='delete_user.php?id=" . $row['id'] . "'>🗑 Eliminar</a> | 
                <a href='ejer3.php?id=" . $row['id'] . "'>✏ Editar</a>
              </td>";
        echo "</tr>";
    }

    echo "</table>";
} catch (PDOException $e) {
    echo "<h2>Error en la consulta: " . $e->getMessage() . "</h2>";
}
?>

