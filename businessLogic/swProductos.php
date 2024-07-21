<?php
include ('../dataAccess/dataAccessLogic/Producto.php');

//1. Estos metodos detectan lo que hacen el front end----------------------------------------------------------------------

// Manejar método DELETE - Eliminar producto.           Estos metodos detectan lo que hacen el front end
if ($_SERVER['REQUEST_METHOD'] == 'DELETE') {
    // Obtener el ID del producto a eliminar
    $id = intval($_GET['id']);
    //Creamos el objConexion y lo conectamos a ConexionDB
    $objConexion = new ConexionDB();
    $objProducto = new Producto($objConexion);
    //Se le asigna la ID que va a detectar detectar del frontend
    $objProducto->setId($id);
    //Eliminarproducto es un metodo creado en Producto.php
    if ($objProducto->eliminarProducto()) {
        $response = array('success' => true, 'message' => 'Producto eliminado correctamente');
    } else {
        $response = array('success' => false, 'message' => 'Error al eliminar el producto');
    }
    //Mensaje en la consola
    echo json_encode($response);
    //Se sale si no es la funcion que se va a utilizar
    exit();
}

// Cuando es de agregar es el metodo POST- Agregar producto.
else if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $directorio="imagenes/";
    //Agarra el nombre de la imagen
    $nombreArchivo=$_FILES['imagen_producto']['name'];
    //Crea una variable temporal, donde va a agarrar la ruta temporal que tiene la imagen en cualquier momento
    //Crea otra variable que sera la definita en la db
    $rutaTemporal=$_FILES['imagen_producto']['tmp_name'];

    $rutaDefinitiva=$directorio.$nombreArchivo;

   
    //!file_exists sintaxis de php en visual cod
    if(!file_exists($directorio)){
        mkdir($directorio,0777);
    }

    move_uploaded_file($rutaTemporal,$rutaDefinitiva);


// 2. Obtener datos del formulario que se obtienen en el frontend
    $nombre_producto = $_POST['nombre_producto'];
    $descripcion_producto = $_POST['descripcion_producto'];
    $precio_producto = $_POST['precio_producto'];
    $imagen_producto = $rutaDefinitiva; // Aquí deberías manejar la lógica de subir y guardar la imagen si es necesario
    $categoria_id = $_POST['categoria_id'];

    

    // Instancia de conexión a la base de datos
    $objConexion = new ConexionDB();
    $objProducto = new Producto($objConexion);

    // Setear datos se guardan en el objeto de producto, sirve para insertar
    $objProducto->setNombre($nombre_producto);
    $objProducto->setDescripcion($descripcion_producto);
    $objProducto->setPrecio($precio_producto);
    $objProducto->setImagen($imagen_producto);
    $objProducto->setCategoriaId($categoria_id);

    // Agregar el producto
    if ($objProducto->agregarProducto()) {
        $response = array('success' => true, 'message' => 'Producto agregado correctamente');
    } else {
        $response = array('success' => false, 'message' => 'Error al agregar el producto');
    }
    echo json_encode($response);
    exit();
}


//Es lo del 2. paso de lo anterior
// Manejar método GET - Listar productos
else if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    $objConexion = new ConexionDB();
    $objProducto = new Producto($objConexion);
    $array = $objProducto->listarProductos();
    echo json_encode($array);
    exit();
}

// Manejar método PUT - Actualizar producto
else if ($_SERVER['REQUEST_METHOD'] == 'PUT') {
    // Obtener datos JSON enviados
    $data = json_decode(file_get_contents('php://input'), true);

    // Obtener el ID del producto y otros datos a actualizar
    $id = intval($data['id']);
    $nombre_producto = $data['nombre_producto'];
    $descripcion_producto = $data['descripcion_producto'];
    $precio_producto = $data['precio_producto'];
    $imagen_producto = $data['imagen_producto']; // Aquí también deberías manejar la lógica de la imagen si es necesaria
    $categoria_id = $data['categoria_id'];

    $objConexion = new ConexionDB();
    $objProducto = new Producto($objConexion);

    // Setear datos en el objeto de producto
    $objProducto->setId($id);
    $objProducto->setNombre($nombre_producto);
    $objProducto->setDescripcion($descripcion_producto);
    $objProducto->setPrecio($precio_producto);
    $objProducto->setImagen($imagen_producto);
    $objProducto->setCategoriaId($categoria_id);

    // Actualizar el producto
    if ($objProducto->actualizarProducto()) {
        $response = array('success' => true, 'message' => 'Producto actualizado correctamente');
    } else {
        $response = array('success' => false, 'message' => 'Error al actualizar el producto');
    }
    echo json_encode($response);
    exit();
}

// Manejar método GET con ID - Obtener un producto específico
else if ($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['id'])) {
    $id = intval($_GET['id']);
    $objConexion = new ConexionDB();
    $objProducto = new Producto($objConexion);
    $objProducto->setId($id);
    $producto = $objProducto->listarProductos();
    echo json_encode($producto[0]);
    exit();
}

?>