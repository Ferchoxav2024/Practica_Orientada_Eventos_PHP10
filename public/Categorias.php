<?php
include("Estudiante.php");
#clase
class Categorias
{

#Atributos
private string $nombre_categorias;
private string $descripcion_categorias;
private string $imagen_categorias;

#constructor
function __construct(string $nombre_categorias, string $descripcion_categorias, string $imagen_categorias){
    $this->nombre_categorias = $nombre_categorias;
    $this->descripcion_categorias = $descripcion_categorias;
    $this->imagen_categorias = $imagen_categorias;

}
public function imprimir():void{
    echo"Nombre: $this->nombre_categorias <br>";
    echo"Descripcion: $this->descripcion_categorias <br>";
    echo"Imagen: $this->imagen_categorias <br>";
}

#get y set
public function setNombreCategoria(string $nombre_categorias):void{
    $this->nombre_categorias = $nombre_categorias;
    }
public function getNombreCategorias():string{
    return $this->nombre_categorias;

}

public function setDescripcion(string $descripcion_categorias):void{
    $this->descripcion_categorias = $descripcion_categorias;
    }
public function getDescripcion():string{
    return $this->descripcion_categorias;
    }

public function setimagenCategorias(string $imagen_categorias):void{
    $this->imagen_categorias = $imagen_categorias;
    }
#Metodos
public function imprimir2($nombre_categorias, $descripcion_categorias,$imagen_categorias):string{
    $this->imprimir();
    return "El nombre de la categoria es: $nombre_categorias, <br> Descripcion: $descripcion_categorias <br> <img src='$imagen_categorias' alt='Imagen de la categoría' style='width:200px; height:auto;'>";
}
}


?>