<h1>Inicio de Sesion</h1>
<form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="post">
    <input type="text" name="email" placeholder="Ingrese email"><br>
    <input type="password" name="password" placeholder="Ingrese password"><br>
    <input type="submit" value="ingresar"><br>
</form>
<?php
    //echo password_hash("123456",PASSWORD_DEFAULT);//
    
    if(!empty($_POST)){
        $email = trim ($_POST["email"]);
        $password = trim ($_POST["password"]);
        $errores = 0;

        if($email==""){
            echo "Ingrese email<br>";
            $errores ++;
        }

        if($password==""){
            echo "Ingrese contraseña<br>";
            $errores ++;
        }
        
        if($errores==0){
           
        require_once "controladores/UsuarioController.php";

        

        $lc = new UsuarioController();
        $resultado = $lc->login($email, $password);
        
        if($resultado!=0){
            header("location: bienvenido.php");
        }else{
            echo "usuario y/o contraseña incorrectos";
        }
        }
    }
?>