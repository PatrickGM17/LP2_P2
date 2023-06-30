<?php

require_once "modelos/Programacion.php";
require_once "controladores/LeccionController.php";

class ProgramacionController{
    public function eliminar($programacion_id){ 
        
        $programacion = new Programacion();
        $lc = new LeccionController();

        if($lc->esProgramacionLibre($programacion_id)){            
            return $programacion->eliminar($programacion_id);
        }else{
            return 0;
        }
    }
}