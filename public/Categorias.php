<?php
#clase
class Categorias
{

#Atributos
public string $nombre_categorias;
public string $descripcion_categorias;
public string $imagen_categorias;


#Metodos
public function imprimir($nombre_categorias, $descripcion_categorias,$imagen_categorias):string{
    return "El nombre de la categoria es: $nombre_categorias, <br> Descripcion: $descripcion_categorias <br> <img src='$imagen_categorias' alt='Imagen de la categoría' style='width:200px; height:auto;'>";
}
}


?>