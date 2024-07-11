<?php

include ('Conexion.php');

class Categoria{
    private $conexion;
    public function __construct(ConexionDB $conexionDB)
    {
        $this->conexion = $conexionDB->conectar();      
    }
    public function listarCategorias()
    {
        try {
            $sql= "SELECT * FROM categorias";
            $stmt= $this->conexion->query($sql);
            return $stmt->fetchAll();
        } catch (PDOException $e) {
            echo $e->getMessage();
        }

    }
    public function ingresarCategoria(){
        try {
        $nombre_categoria = 'Manis';
        $descripcion_categoria = 'Son buenos y deliciosos';
        $stm= $this->conexion->prepare("INSERT INTO categorias (nombre_categoria,descripcion_categoria) values (?,?)");
        $stm->execute(array($nombre_categoria,$descripcion_categoria));
        $count=$stm->rowCount();
        echo "{this->columnasAfectadadas($count)}";
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
    }

    public function eliminarCategoria(){
        try {
            $id= 28;
            $stm= $this->conexion->prepare("DELETE FROM categorias WHERE id=?");
            $stm->execute(array($id));
            $count=$stm->rowCount();
            echo "{this->columnasAfectadas($count)}";
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function modificarCategoria(){
        try {
            $nombre_categoria="Pasteles";
            $descripcion_categoria="Son buenos y deliciosos para comer en la casa";
            $id= 37;

            $stm= $this->conexion->prepare("UPDATE categorias SET nombre_categoria=?, descripcion_categoria=? WHERE id=?");
            $stm->execute(array($nombre_categoria,$descripcion_categoria,$id));
            $count=$stm->rowCount();
            echo "{this->columnasAfectadas($count)}";
        } catch (\Throwable $th) {
            //throw $th;
        }
    }
    public function columnasAfectadas($count): String{
        if ($count<>null && $count>0) {
            $msm="Operacion realizada correctamente";
        } else {
            $msm="Error, revise la conexion con su DB";
        }
        return $msm;
    }
}
?>