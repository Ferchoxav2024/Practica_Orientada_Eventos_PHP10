<?php
include ('../dataAccess/dataAccessLogic/Categoria.php');

// Instancia de conexión a la base de datos
$objConexion = new ConexionDB();
$objCategoria = new Categoria($objConexion);

// Manejar método DELETE - Eliminar categoría
if ($_SERVER['REQUEST_METHOD'] == 'DELETE') {
    // Obtener el ID de la categoría a eliminar
    $id = intval($_GET['id']);

    // Establecer el ID en el objeto de categoría
    $objCategoria->setId($id);

    // Llamar al método para eliminar la categoría
    if ($objCategoria->eliminarCategoria()) {
        $response = array('success' => true, 'message' => 'Categoría eliminada correctamente');
    } else {
        $response = array('success' => false, 'message' => 'Error al eliminar la categoría');
    }
    echo json_encode($response);
    exit();
}

// Manejar método POST - Agregar categoría
else if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Obtener datos del formulario
    $nombre = $_POST['nombre'];
    $descripcion = $_POST['descripcion'];
    $imagen = $_POST['imagen']; // Aquí deberías manejar la lógica de subir y guardar la imagen si es necesario

    // Setear datos en el objeto de categoría
    $objCategoria->setNombre($nombre);
    $objCategoria->setDescripcion($descripcion);
    $objCategoria->setImagen($imagen);

    // Llamar al método para agregar la categoría
    if ($objCategoria->agregarCategoria()) {
        $response = array('success' => true, 'message' => 'Categoría agregada correctamente');
    } else {
        $response = array('success' => false, 'message' => 'Error al agregar la categoría');
    }
    echo json_encode($response);
    exit();
}

// Manejar método GET - Listar categorías
else if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    $arrayCategorias = $objCategoria->listarCategorias();
    echo json_encode($arrayCategorias);
    exit();
}

// Manejar método PUT - Actualizar categoría
else if ($_SERVER['REQUEST_METHOD'] == 'PUT') {
    // Obtener datos JSON enviados
    $data = json_decode(file_get_contents('php://input'), true);

    // Obtener el ID de la categoría y otros datos a actualizar
    $id = intval($data['id']);
    $nombre = $data['nombre'];
    $descripcion = $data['descripcion'];
    $imagen = $data['imagen']; // Aquí también deberías manejar la lógica de la imagen si es necesaria

    // Setear datos en el objeto de categoría
    $objCategoria->setId($id);
    $objCategoria->setNombre($nombre);
    $objCategoria->setDescripcion($descripcion);
    $objCategoria->setImagen($imagen);

    // Llamar al método para actualizar la categoría
    if ($objCategoria->actualizarCategoria()) {
        $response = array('success' => true, 'message' => 'Categoría actualizada correctamente');
    } else {
        $response = array('success' => false, 'message' => 'Error al actualizar la categoría');
    }
    echo json_encode($response);
    exit();
}
?>
