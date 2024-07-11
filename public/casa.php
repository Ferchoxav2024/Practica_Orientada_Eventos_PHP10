<?php
//include ('vercategorias.php');
include ('../dataAccess/dataAccessLogic/User.php');

// Add User
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nameUser = $_POST['nameUser'];
    $lastnameUser = $_POST['lastnameUser'];
    $photoUser = $_POST['photoUser'];
    
    // Assuming you have a class named ConexionDB and User
    $objConexion = new ConexionDB();
    $objUser = new User($objConexion);

    $objUser->setFirstName($firstName);
    $objUser->setLastnameUser($lastnameUser);
    $objUser->setPhotoUser($photoUser);
    
    $objUser->addUser();

    exit;
}

//$conexionDB = new ConexionDB();
//$categoria = new Categoria($conexionDB);   

#ingresar categorias
//$categoria->ingresarCategoria();
#Eliminar categorias
//$categoria->eliminarCategoria();

#Actualizar categorias
//$categoria->modificarCategoria();

//$categorias = $categoria->listarCategorias();
//foreach ($categorias as $categoria) {
//    echo "<li>{$categoria['nombre_categoria']}</li>";
//}


//$conexionDB->cerrarConexion();

//Obtener y mostrar las categorias
//$categorias = $categoria->listarCategorias();

//echo "<h2>Categorias</h2>";
//echo "<ul>";

//foreach ($categorias as $categoria) {
//    echo "<li>{$categoria['nombre_categoria']}</li>";
//}
//echo "</ul>";








//include("Categorias.php");
#instanciar una clase que es crea un objeto
//$p1 = new Categorias("pollofrito","Saberico","/img/hamburguesa.jpg");
//p2 = new Categorias("Carnefrita","Estaduro","/img/hamburguesa.jpg");
//$p1->imprimir();
//$p2->imprimir();

//$p1->setNombreCategoria("Papas");
//$p1->nombre="Papas";
//$p1->imprimir();

//$e1=new Estudiante("Fernando","Gomez","Andres");
//$e1->imprimir();





//$objCategoria= new Categorias;
//$nombrecategoriaObj1=$objCategoria->$nombre_categorias="Hamburguesas Clasicas";
//$descripcioncategoriasObj1=$objCategoria->descripcion_categorias= "Carne de res jugosa a la parrilla, servida en un pan brioche tostado con lechuga fresca, tomate maduro, cebolla morada y pepinillos crujientes. Acompañada de queso cheddar derretido y una salsa especial de la casa.";
//$imagencategoriasObj1 = $objCategoria->imagen_categorias = "/img/hamburguesa.jpg";
//echo $objCategoria->imprimir($nombrecategoriaObj1,$descripcioncategoriasObj1,$imagencategoriasObj1);
#segundo objeto





?>

