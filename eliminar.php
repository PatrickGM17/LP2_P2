<form method="post" action="<?php echo $_SERVER["PHP_SELF"]; ?>">
    <input type="number" name="programacion_id" placeholder="ingrese id de programación"><br>
    <input type="submit" value="enviar">
<form> 

<?php
    if(!empty($_POST)){
        $programacion_id = $_POST["programacion_id"];
        require_once "controladores/ProgramacionController.php";

        $pc = new ProgramacionController();
        $resultado = $pc->eliminar($programacion_id);    

        if($resultado!=0){
            echo "Programacion eliminada";
        }else{
            echo "Error: no han eliminado los datos";
        }
    }   
?>