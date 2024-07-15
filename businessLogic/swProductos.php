<?php
include ('../dataAccess/dataAccessLogic/Producto.php');


// Manejar método DELETE - Eliminar producto
if ($_SERVER['REQUEST_METHOD'] == 'DELETE') {
    // Obtener el ID del producto a eliminar
    $id = intval($_GET['id']);
    $objConexion = new ConexionDB();
    $objProducto = new Producto($objConexion);

    $objProducto->setId($id);
    $objProducto->eliminarProducto();
    $response = array('sucess'=>true,'message'=>'Producto eliminado correctamente');
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
    // Instancia de conexión a la base de datos
    $objConexion = new ConexionDB();
    $objProducto = new Producto($objConexion);

    // Setear datos en el objeto de producto
    $objProducto->setNombre($nombre);
    $objProducto->setDescripcion($descripcion);
    $objProducto->setPrecio($precio);
    $objProducto->setImagen($imagen);
    $objProducto->setCategoriaId($categoria_id);
    $objProducto->agregarProducto();
    exit();
}

// Manejar método GET - Listar productos
else if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    $objConexion = new ConexionDB();
    $objProducto= new Producto($objConexion);
    $array = $objProducto->listarProductos();
    echo json_encode($array);
    exit;

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

    $objConexion = new ConexionDB();
    $objProducto= new Producto($objConexion);

    // Setear datos en el objeto de producto
    $objProducto->setId($id);
    $objProducto->setNombre($nombre);
    $objProducto->setDescripcion($descripcion);
    $objProducto->setPrecio($precio);
    $objProducto->setImagen($imagen);
    $objProducto->setCategoriaId($categoria_id);
    $objProducto->actualizarProducto();
    exit;
}
?>
