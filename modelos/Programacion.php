<?php

require_once "Conn.php";

class Programacion{
    private $inicio;
    private $tipo;
    private $Profesor_id;

    public function setInicio($inicio){
        $this->inicio = $inicio;
    }

    public function getInicio(){
        return $this->inicio;
    }

    public function setTipo($tipo){
        $this->tipo = $tipo;
    }

    public function getTipo(){
        return $this->tipo;
    }

    public function setProfesorId($Profesor_id){
        $this->Profesor_id = $Profesor_id;
    }

    public function getProfesorId(){
        return $this->Profesor_id;
    }

    public function eliminar($id){
        $conn = new Conn();
        $conexion = $conn->conectar();
        $sql = "DELETE FROM programacion WHERE id = $id";
        $resultado = $conexion->exec($sql);
        $conn->cerrar();
        return $resultado;
    }
}