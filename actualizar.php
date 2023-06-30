<?php
    $id = $_REQUEST["id"];

    require_once "controladores/UsuarioController.php";    
    $uc = new UsuarioController();
    $resultado = $uc->mostrarPorId($id);  
            
    foreach($resultado as $usuario){
        $username = $usuario["username"];
        $password = $usuario["password"];
        $apellidos = $usuario["apellidos"];
        $nombres = $usuario["nombres"];
        $tipo = $usuario["tipo"];
        $id_escuela = $usuario["id_escuela"];
        $email = $usuario["email"];
    }       
?>
<h1>Actualizar de Usuario</h1>
<form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="post">
    <input type="number" name="username" value="<?php echo $username;?>" placeholder="Ingrese username"><br>
    <input type="password" name="password" value="<?php echo $password;?>" placeholder="Ingrese password"><br>
    <input type="text" name="nombres" value="<?php echo $nombres;?>" placeholder="Ingrese nombres"><br>
    <input type="text" name="apellidos" value="<?php echo $apellidos;?>" placeholder="Ingrese apellidos"><br>
    <input type="text" name="tipo" value="<?php echo $tipo;?>" placeholder="Ingrese tipo"><br>
    <input type="number" name="id_escuela" value="<?php echo $id_escuela;?>" placeholder="Ingrese escuela"><br>
    <input type="text" name="email" value="<?php echo $email;?>" placeholder="Ingrese email"><br>
    <input type="hidden" name="id" value="<?php echo $id; ?>" />
    <input type="submit" value="Actualizar"><br>
</form>
<?php
    if(!empty($_POST)){
        $id = $_POST["id"];
        $username = $_POST["username"];
        $password = $_POST["password"];
        $apellidos = $_POST["apellidos"];
        $nombres = $_POST["nombres"];
        $tipo = $_POST["tipo"];
        $id_escuela = $_POST["id_escuela"];
        $email = $_POST["email"];

        require_once "controladores/UsuarioController.php";

        $uc = new UsuarioController();
        $resultado = $uc->actualizar($id, $username, $password, $apellidos, $nombres, $tipo, $id_escuela, $email);
     
        if($resultado!=0){
            header("location: mostrar.php");
        }else{
            echo "Error: no han actualizado los datos";
        }            
           
    }
?>