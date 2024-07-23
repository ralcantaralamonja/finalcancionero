<?php
// Incluir el archivo de conexión a la base de datos
include '../db.php';

// Leer el cuerpo de la solicitud JSON
$data = json_decode(file_get_contents('php://input'), true);

// Verificar que los campos necesarios estén presentes en el cuerpo de la solicitud
if (isset($data['can_id'], $data['can_gen_id'], $data['can_nombre'], $data['can_ruta'], $data['can_duracion'])) {
    $can_id = $data['can_id'];
    $can_gen_id = $data['can_gen_id'];
    $can_nombre = $data['can_nombre'];
    $can_ruta = $data['can_ruta'];
    $can_duracion = $data['can_duracion'];

    // Preparar la consulta SQL para actualizar la canción
    $stmt = $pdo->prepare('
        UPDATE Cancion 
        SET can_gen_id = :can_gen_id, 
            can_nombre = :can_nombre, 
            can_ruta = :can_ruta, 
            can_duracion = :can_duracion 
        WHERE can_id = :can_id
    ');

    // Ejecutar la consulta con los valores proporcionados
    $stmt->execute([
        ':can_gen_id' => $can_gen_id,
        ':can_nombre' => $can_nombre,
        ':can_ruta' => $can_ruta,
        ':can_duracion' => $can_duracion,
        ':can_id' => $can_id
    ]);

    // Verificar si la actualización fue exitosa
    if ($stmt->rowCount() > 0) {
        echo json_encode(['success' => true, 'message' => 'Canción actualizada correctamente']);
    } else {
        echo json_encode(['success' => false, 'message' => 'No se encontraron cambios para actualizar']);
    }
} else {
    // Si faltan datos en la solicitud, retornar un error
    echo json_encode(['success' => false, 'message' => 'Faltan datos para actualizar']);
}
?>
