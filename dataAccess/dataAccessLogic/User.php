<?php
#include file

include ('../dataAccess/conexion/Conexion.php');

class Usuario
{
    #atributos
    private string $cedula;
    private string $firstName;
    private string $lastName;
    private string $email;
    private string $password;
    private string $telefono;
    private string $perfil;

    private $connectionDB;

#constructor  
    public function __construct(ConexionDB $connectionDB)
    {
        $this->connectionDB = $connectionDB->connect();
    }

    // Métodos Get y Set para cada propiedad
    public function setCedula(string $cedula): void
    {
        $this->cedula = $cedula;
    }

    public function getCedula(): string
    {
        return $this->cedula;
    }

    public function setFirstName(string $firstName): void
    {
        $this->firstName = $firstName;
    }

    public function getFirstName(): string
    {
        return $this->firstName;
    }

    public function setLastName(string $lastName): void
    {
        $this->lastName = $lastName;
    }

    public function getLastName(): string
    {
        return $this->lastName;
    }

    public function setEmail(string $email): void
    {
        $this->email = $email;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function setPassword(string $password): void
    {
        $this->password = $password;
    }

    public function getPassword(): string
    {
        return $this->password;
    }

    public function setTelefono(string $telefono): void
    {
        $this->telefono = $telefono;
    }

    public function getTelefono(): string
    {
        return $this->telefono;
    }

    public function setPerfil(string $perfil): void
    {
        $this->perfil = $perfil;
    }

    public function getPerfil(): string
    {
        return $this->perfil;
    }
    #metodos
    #añadir usuario
    public function registrarUsuario(): bool
    {
        try {
        $sql="INSERT INTO usuarios (cedula, firstName, lastName, email, password, telefono, perfil) VALUES (?, ?, ?, ?, ?, ?, ?)";
        $stmt=$this->connectionDB->prepare($sql);
        $stmt->execute(array($this->getCedula(), $this->getFirstName(), $this->getLastName(), $this->getEmail(), $this->getPassword(), $this->getTelefono(), $this->getPerfil()));
        $count =$stmt->rowCount();
        return $this->affectedColumns($count);
        } catch (PDOException $e) { 
            echo $e->getMessage();
            return false;
        }
    }
    #listar usuarios
    public function listarUsuario()
    {
        try {
            $sql= "SELECT * FROM usuarios";
            $stmt= $this->connectionDB->prepare($sql);
            $stmt->execute();
            $stmt->setFetchMode(PDO::FETCH_ASSOC);
            $arrayQuery=$stmt->fetchAll();
            return $arrayQuery;
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
        return [];

    }


    //borrarusuario
    public function eliminarUsuario():bool
    {
        try {
            $sql= "DELETE FROM usuarios WHERE cedula=?";
            $stmt= $this->connectionDB->prepare($sql);
            $stmt->execute(array($this->getCedula()));
            $count=$stmt->rowCount();
            return $this->affectedColumns($count);
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }

    public function editarUsuario(){
        try {
        
            $sql="UPDATE usuarios SET firstName = ?, lastName = ?, password = ?, telefono = ?, perfil = ? WHERE cedula = ?";
            $stmt=$this->connectionDB->prepare($sql);
            $stmt->execute(array($this->getFirstName(),$this->getLastName(),$this->getPassword(), $this->getTelefono(),$this->getPerfil(),$this->getCedula()));
            $count=$stmt->rowCount();
            return $this->affectedColumns($count);
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }
    public function affectedColumns($numer): bool
    {
        if ($numer<>null && $numer>0) {
            $msm=true;
        } else {
            $msm=false;
        }
        return $msm;
    }

    public function login(string $email, string $password)
{
    try {
        $sql = "SELECT * FROM usuarios WHERE email = ? AND password = ?";
        $stmt = $this->connectionDB->prepare($sql);
        $stmt->execute(array($email, $password));
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
        return $user;
    } catch (PDOException $e) {
        echo $e->getMessage();
        return false;
    }
}

}

?>