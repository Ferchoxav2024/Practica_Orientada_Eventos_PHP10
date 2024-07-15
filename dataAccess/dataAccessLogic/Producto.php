<?php
include ('../dataAccess/conexion/Conexion.php');// Asegúrate de que la ruta sea correcta según tu estructura de archivos

class Producto
{
    // Atributos
    private int $id;
    private string $nombre;
    private string $descripcion;
    private float $precio;
    private string $imagen;
    private int $categoria_id;

    private $connectionDB;

    // Constructor
    public function __construct(ConexionDB $connectionDB)
    {
        $this->connectionDB = $connectionDB->connect();
    }

    // Métodos Get y Set para cada propiedad
    public function setId(int $id): void
    {
        $this->id = $id;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function setNombre(string $nombre): void
    {
        $this->nombre = $nombre;
    }

    public function getNombre(): string
    {
        return $this->nombre;
    }

    public function setDescripcion(string $descripcion): void
    {
        $this->descripcion = $descripcion;
    }

    public function getDescripcion(): string
    {
        return $this->descripcion;
    }

    public function setPrecio(float $precio): void
    {
        $this->precio = $precio;
    }

    public function getPrecio(): float
    {
        return $this->precio;
    }

    public function setImagen(string $imagen): void
    {
        $this->imagen = $imagen;
    }

    public function getImagen(): string
    {
        return $this->imagen;
    }

    public function setCategoriaId(int $categoria_id): void
    {
        $this->categoria_id = $categoria_id;
    }

    public function getCategoriaId(): int
    {
        return $this->categoria_id;
    }

    // Método para agregar un producto
    public function agregarProducto(): bool
    {
        try {
            $sql = "INSERT INTO productos (nombre_producto, descripcion_producto, precio_producto, imagen_producto, categoria_id) VALUES (?, ?, ?, ?, ?)";
            $stmt = $this->connectionDB->prepare($sql);
            $stmt->execute(array($this->getNombre(), $this->getDescripcion(), $this->getPrecio(), $this->getImagen(), $this->getCategoriaId()));
            $count = $stmt->rowCount();
            return $this->affectedColumns($count);
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }

    // Método para listar todos los productos
    public function listarProductos()
    {
        try {
            $sql = "SELECT * FROM productos";
            $stmt = $this->connectionDB->prepare($sql);
            $stmt->execute();
            $stmt->setFetchMode(PDO::FETCH_ASSOC);
            $arrayQuery = $stmt->fetchAll();
            return $arrayQuery;
        } catch (PDOException $e) {
            echo $e->getMessage();
            
        }
        return [];
    }

    // Método para eliminar un producto
    public function eliminarProducto(): bool
    {
        try {
            $sql = "DELETE FROM productos WHERE id=?";
            $stmt = $this->connectionDB->prepare($sql);
            $stmt->execute(array($this->getId()));
            $count = $stmt->rowCount();
            return $this->affectedColumns($count);
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }

    // Método para actualizar un producto
    public function actualizarProducto(): bool
    {
        try {
            $sql = "UPDATE productos SET nombre_producto = ?, descripcion_producto = ?, precio_producto = ?, imagen_producto = ?, categoria_id = ? WHERE id = ?";
            $stmt = $this->connectionDB->prepare($sql);
            $stmt->execute(array($this->getNombre(), $this->getDescripcion(), $this->getPrecio(), $this->getImagen(), $this->getCategoriaId(), $this->getId()));
            $count = $stmt->rowCount();
            return $this->affectedColumns($count);
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }

    // Método auxiliar para verificar columnas afectadas
    public function affectedColumns($numer): bool
    {
        if ($numer<>null && $numer>0) {
            $msm=true;
        } else {
            $msm=false;
        }
        return $msm;
    }
}
?>
