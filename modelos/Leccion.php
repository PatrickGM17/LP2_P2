<?php

require_once "Conn.php";

class Leccion{
    private $numero;
    private $status;
    private $comentario_estudiante;
    private $comentario_profesor;
    private $Estudiante_id;
    private $Programacion_id;

    public function setNumero($numero){
        $this->numero = $numero;
    }

    public function getNumero(){
        return $this->numero;
    }

    public function setStatus($status){
        $this->status = $status;
    }

    public function getstatus(){
        return $this->status;
    }

    public function setComentarioEstudiante($comentario_estudiante){
        $this->comentario_estudiante = $comentario_estudiante;
    }

    public function getComentarioEstudiante(){
        return $this->comentario_estudiante;
    }

    public function setComentarioProfesor($comentario_profesor){
        $this->comentario_profesor = $comentario_profesor;
    }

    public function getComentarioProfesor(){
        return $this->comentario_profesor;
    }

    public function setEstudianteId($Estudiante_id){
        $this->Estudiante_id = $Estudiante_id;
    }

    public function getEstudianteId(){
        return $this->Estudiante_id;
    }

    public function setProgramacionId($Programacion_id){
        $this->Programacion_id = $Programacion_id;
    }

    public function getProgramacionId(){
        return $this->Programacion_id;
    }

    public function ProgramacionLibre($Programacion_id){
        $conn = new Conn();
        $conexion = $conn->conectar();
        $sql = "SELECT * FROM leccion WHERE Programacion_id=$Programacion_id";
        $resultado = $conexion->query($sql);
        $conn->cerrar();
        return $resultado;
    }

    public function guardar(){
        $conn = new Conn();
        $conexion = $conn->conectar();
        $sql = "INSERT INTO leccion(numero, status, comentario_estudiante, comentario_profesor, Estudiante_id, Programacion_id) 
                VALUES('".$this->numero."', '".$this->status."', 'null', 'null', ".$this->Estudiante_id.", ".$this->Programacion_id.")";
        $resultado = $conexion->exec($sql);
        $conn->cerrar();
        return $resultado;
    }
}