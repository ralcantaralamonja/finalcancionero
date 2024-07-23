<?php
// Incluir el archivo de configuración de la base de datos
require_once '../db.php';

// Establecer el encabezado para devolver JSON
header('Content-Type: application/json');

// Leer el cuerpo de la solicitud
$data = json_decode(file_get_contents('php://input'), true);

// Verificar que todos los campos necesarios estén presentes
if (isset($data['can_gen_id'], $data['can_nombre'], $data['can_ruta'], $data['can_duracion'])) {
    $can_gen_id = $data['can_gen_id'];
    $can_nombre = $data['can_nombre'];
    $can_ruta = $data['can_ruta'];
    $can_duracion = $data['can_duracion'];

    try {
        // Preparar la consulta SQL
        $stmt = $pdo->prepare('INSERT INTO Cancion (can_gen_id, can_nombre, can_ruta, can_duracion) VALUES (:can_gen_id, :can_nombre, :can_ruta, :can_duracion)');

        // Ejecutar la consulta
        $stmt->execute([
            ':can_gen_id' => $can_gen_id,
            ':can_nombre' => $can_nombre,
            ':can_ruta' => $can_ruta,
            ':can_duracion' => $can_duracion
        ]);

        // Obtener el ID de la canción insertada
        $insertedId = $pdo->lastInsertId();

        // Devolver una respuesta en JSON
        echo json_encode(['success' => true, 'id' => $insertedId]);

    } catch (PDOException $e) {
        echo json_encode(['success' => false, 'error' => $e->getMessage()]);
    }
} else {
    echo json_encode(['success' => false, 'error' => 'Datos incompletos']);
}
?>
