<?php

require_once "modelos/Usuario.php";

class UsuarioController{
    public function login($email, $password){
        $usuario = new Usuario();
        $usuario->setEmail($email);
        $resultado = $usuario->buscarEmail();

        $contador = 0;
        $contraseñadb = null;
        $idUsuario = null;
        $nombreUsuario = null;
        foreach($resultado as $usuario){
            $contador++;
            if($contador!=0){
                $hashdb = $usuario["password"];
                $idUsuario = $usuario["id"];
                $nombreUsuario = $usuario["nombre"];
            }   
        }
        if($contador!=0){
            if(!password_verify($password,$hashdb)){
                return 0;
            }else{
                session_start();
                $_SESSION["id"]=$idUsuario;
                $_SESSION["nombre"]=$nombreUsuario;
                return 1;
        }
        }
        return $contador;
    }
    public function guardar($nombre, $email, $password){
        $usuario = new Usuario();
        $usuario-> setNombres($nombre);
        $usuario->setEmail($email);
        $usuario->setPassword(password_hash($password,PASSWORD_BCRYPT));
        return $usuario -> guardar();        
    }
}