<?php
header('Content-Type: application/json');

// Incluir el archivo de conexión a la base de datos
require_once '../db.php';

try {
    // Consulta para obtener todas las canciones
    $sql = "SELECT * FROM Cancion";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();

    // Obtener todas las filas como un array asociativo
    $canciones = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Crear un array para almacenar los resultados
    $resultado = [];

    // Recorrer las filas y agregarlas al array de resultados
    foreach ($canciones as $cancion) {
        $resultado[] = [
            'can_id' => $cancion['can_id'],
            'can_gen_id' => $cancion['can_gen_id'],
            'can_nombre' => $cancion['can_nombre'],
            'can_ruta' => $cancion['can_ruta'],
            'can_duracion' => $cancion['can_duracion']
        ];
    }

    // Devolver los datos en formato JSON
    echo json_encode($resultado);
} catch (PDOException $e) {
    // Manejo de errores
    echo json_encode(['error' => $e->getMessage()]);
}
?>
