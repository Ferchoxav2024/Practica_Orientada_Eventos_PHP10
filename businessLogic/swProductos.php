<?php
require_once '../dataAccess/conexion/Conexion.php';
require_once '../dataAccess/dataAccessLogic/Producto.php';

// Instancia de conexión a la base de datos
$objConexion = new ConexionDB();
$objProducto = new Producto($objConexion);

// Manejar método DELETE - Eliminar producto
if ($_SERVER['REQUEST_METHOD'] == 'DELETE') {
    // Obtener el ID del producto a eliminar
    $id = intval($_GET['id']);

    // Establecer el ID en el objeto de producto
    $objProducto->setId($id);

    // Llamar al método para eliminar el producto
    if ($objProducto->eliminarProducto()) {
        $response = array('success' => true, 'message' => 'Producto eliminado correctamente');
    } else {
        $response = array('success' => false, 'message' => 'Error al eliminar el producto');
    }
    echo json_encode($response);
    exit();
}

// Manejar método POST - Agregar producto
else if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Obtener datos del formulario
    $nombre = $_POST['nombre_producto'];
    $descripcion = $_POST['descripcion_producto'];
    $precio = $_POST['precio_producto'];
    $imagen = $_POST['imagen_producto']; // Aquí deberías manejar la lógica de subir y guardar la imagen si es necesario
    $categoria_id = $_POST['categoria_id'];

    // Setear datos en el objeto de producto
    $objProducto->setNombre($nombre);
    $objProducto->setDescripcion($descripcion);
    $objProducto->setPrecio($precio);
    $objProducto->setImagen($imagen);
    $objProducto->setCategoriaId($categoria_id);

    // Llamar al método para agregar el producto
    if ($objProducto->agregarProducto()) {
        $response = array('success' => true, 'message' => 'Producto agregado correctamente');
    } else {
        $response = array('success' => false, 'message' => 'Error al agregar el producto');
    }
    echo json_encode($response);
    exit();
}

// Manejar método GET - Listar productos
else if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    $arrayProductos = $objProducto->listarProductos();
    echo json_encode($arrayProductos);
    exit();
}

// Manejar método PUT - Actualizar producto
else if ($_SERVER['REQUEST_METHOD'] == 'PUT') {
    // Obtener datos JSON enviados
    $data = json_decode(file_get_contents('php://input'), true);

    // Obtener el ID del producto y otros datos a actualizar
    $id = intval($data['id']);
    $nombre = $data['nombre_producto'];
    $descripcion = $data['descripcion_producto'];
    $precio = $data['precio_producto'];
    $imagen = $data['imagen_producto']; // Aquí también deberías manejar la lógica de la imagen si es necesaria
    $categoria_id = $data['categoria_id'];

    // Setear datos en el objeto de producto
    $objProducto->setId($id);
    $objProducto->setNombre($nombre);
    $objProducto->setDescripcion($descripcion);
    $objProducto->setPrecio($precio);
    $objProducto->setImagen($imagen);
    $objProducto->setCategoriaId($categoria_id);

    // Llamar al método para actualizar el producto
    if ($objProducto->actualizarProducto()) {
        $response = array('success' => true, 'message' => 'Producto actualizado correctamente');
    } else {
        $response = array('success' => false, 'message' => 'Error al actualizar el producto');
    }
    echo json_encode($response);
    exit();
}
?>
