<?php

require_once "Conn.php";

class Usuario{
    private $nombre;
    private $email;
    private $password;
    
    public function mostrar(){
        $conn = new Conn();
        $conexion = $conn->conectar();
        $sql = "SELECT * FROM usuario";
        $resultado = $conexion->query($sql);
        $conn->cerrar();
        return $resultado;
    }

    public function mostrarPorId($id){
        $conn = new Conn();
        $conexion = $conn->conectar();
        $sql = "SELECT * FROM usuario WHERE id=$id";
        $resultado = $conexion->query($sql);
        $conn->cerrar();
        return $resultado;
    }

    public function guardar(){
        $conn = new Conn();
        $conexion = $conn->conectar();
        $sql = "INSERT INTO estudiante(nombre, email, password) 
                VALUES('".$this->nombre."','".$this->email."','".$this->password."')";
        $resultado = $conexion->exec($sql);
        $conn->cerrar();
        return $resultado;
    }

    public function actualizar($id){
        $conn = new Conn();
        $conexion = $conn->conectar();
        $sql = "UPDATE usuario
                SET username='".$this->username."', password='".$this->password."', apellidos='".$this->apellidos."', nombres='".$this->nombres."', tipo='".$this->tipo."', id_escuela=".$this->id_escuela.", email='".$this->email."' 
                WHERE id = $id";
        $resultado = $conexion->exec($sql);
        $conn->cerrar();
        return $resultado;
    }

    public function buscarEmail(){
        $conn = new Conn();
        $conexion = $conn->conectar();
        $sql = "SELECT * FROM estudiante WHERE email='".$this->email."'";
        $resultado = $conexion->query($sql);
        $conn->cerrar();
        return $resultado;
    }

    public function eliminar($id){
        $conn = new Conn();
        $conexion = $conn->conectar();
        $sql = "DELETE FROM usuario WHERE id = $id";
        $resultado = $conexion->exec($sql);
        $conn->cerrar();
        return $resultado;
    }

    public function setNombres($nombre){
        $this->nombre = $nombre;
    }

    public function setEmail($email){
        $this->email = $email;
    }

    public function setPassword($password){
        $this->password = $password;
    }

}