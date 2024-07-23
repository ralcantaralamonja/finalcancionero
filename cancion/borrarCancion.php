<?php
include '../db.php'; // Incluye el archivo de conexión a la base de datos

// Verifica si el método de solicitud es GET
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    // Obtén el ID de la canción desde la URL
    $can_id = $_GET['can_id'] ?? null;

    if ($can_id) {
        try {
            // Prepara y ejecuta la consulta para eliminar la canción
            $stmt = $pdo->prepare("DELETE FROM Cancion WHERE can_id = :can_id");
            $stmt->bindParam(':can_id', $can_id, PDO::PARAM_INT);
            $stmt->execute();

            // Verifica si se eliminó alguna fila
            if ($stmt->rowCount() > 0) {
                http_response_code(200);
                echo json_encode(['message' => 'Canción eliminada con éxito']);
            } else {
                http_response_code(404);
                echo json_encode(['message' => 'Canción no encontrada']);
            }
        } catch (PDOException $e) {
            http_response_code(500);
            echo json_encode(['message' => 'Error de base de datos: ' . $e->getMessage()]);
        }
    } else {
        http_response_code(400);
        echo json_encode(['message' => 'ID de canción no proporcionado']);
    }
} else {
    http_response_code(405);
    echo json_encode(['message' => 'Método no permitido']);
}
?>
