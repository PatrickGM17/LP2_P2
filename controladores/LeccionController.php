<?php

require_once "modelos/Leccion.php";

class LeccionController{
    public function esProgramacionLibre($programacion_id){
        $respuesta = false;
        $leccion = new Leccion();
        $resultado = $leccion->ProgramacionLibre($programacion_id);
        
        $contador = 0;
        foreach($resultado as $item){
            $contador++;
        }

        if($contador==0){
            return true;
        }else {
            return false;
        }        
    }

    public function guardar($numero, $id_estudiante, $id_programacion){
        $leccion = new Leccion();
        $leccion->setNumero($numero);
        $leccion->setStatus("programado");
        $leccion->setEstudianteId($id_estudiante);
        $leccion->setProgramacionId($id_programacion);
        if($this->esProgramacionLibre($id_programacion)){
            return $leccion->guardar();
        }else{
            return 0;
        }
    }
}