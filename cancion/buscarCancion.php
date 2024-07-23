<?php
// Incluir el archivo de configuración de la base de datos
require_once '../db.php';

// Obtener el ID de la canción desde los parámetros de la URL
$can_id = isset($_GET['can_id']) ? intval($_GET['can_id']) : 0;

if ($can_id > 0) {
    try {
        // Preparar la consulta SQL
        $stmt = $pdo->prepare('SELECT * FROM Cancion WHERE can_id = :can_id');
        $stmt->bindParam(':can_id', $can_id, PDO::PARAM_INT);
        $stmt->execute();

        // Obtener el resultado
        $cancion = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($cancion) {
            // Devolver el resultado en formato JSON
            echo json_encode($cancion);
        } else {
            echo json_encode(['message' => 'Canción no encontrada']);
        }
    } catch (PDOException $e) {
        echo json_encode(['error' => 'Error en la consulta: ' . $e->getMessage()]);
    }
} else {
    echo json_encode(['error' => 'ID de canción inválido']);
}
// http://tu-dominio/cancion/buscarCancion.php?can_id=1