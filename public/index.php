<?php
include("Categorias.php");
#instanciar una clase que es crea un objeto

$objCategoria= new Categorias;
$nombrecategoriaObj1=$objCategoria->$nombre_categorias="Hamburguesas Clasicas";
$descripcioncategoriasObj1=$objCategoria->descripcion_categorias= "Carne de res jugosa a la parrilla, servida en un pan brioche tostado con lechuga fresca, tomate maduro, cebolla morada y pepinillos crujientes. Acompañada de queso cheddar derretido y una salsa especial de la casa.";
$imagencategoriasObj1 = $objCategoria->imagen_categorias = "/img/hamburguesa.jpg";
echo $objCategoria->imprimir($nombrecategoriaObj1,$descripcioncategoriasObj1,$imagencategoriasObj1);
#segundo objeto

?>

