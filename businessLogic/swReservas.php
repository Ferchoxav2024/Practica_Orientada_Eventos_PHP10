<?php
include ('../dataAccess/conexion/Conexion.php');
include ('../dataAccess/dataAccessLogic/Producto.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $data = json_decode(file_get_contents('php://input'), true);
    $cliente_id = $data['cliente_id'];
    $carrito = $data['carrito'];
    $total = $data['total'];

    $objConexion = new ConexionDB();
    $connection = $objConexion->connect();

    try {
        $connection->beginTransaction();
        foreach ($carrito as $producto) {
            $sql = "INSERT INTO reservas (cliente_id, producto_id, cantidad, precio_total) VALUES (?, ?, ?, ?)";
            $stmt = $connection->prepare($sql);
            $stmt->execute([$cliente_id, $producto['id'], $producto['cantidad'], $producto['cantidad'] * $producto['precio']]);
        }
        $connection->commit();
        echo json_encode(['success' => true, 'message' => 'Reserva realizada correctamente']);
    } catch (PDOException $e) {
        $connection->rollBack();
        echo json_encode(['success' => false, 'message' => 'Error al realizar la reserva: ' . $e->getMessage()]);
    }
}
?>
