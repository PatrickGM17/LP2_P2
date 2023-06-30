<?php   
    require_once "controladores/UsuarioController.php";

    $uc = new UsuarioController();
    $resultado = $uc->mostrar();

        ?>
        <table border="1">
            <tr>
               <th>id</th> 
               <th>Username</th>
               <th>Nombres</th>
               <th>Apellidos</th> 
               <th>tipo</th>
               <th>escuela</th>
               <th>email</th>
               <th>&nbsp</th>
               <th>&nbsp</th>
            <tr>
        <?php
        foreach($resultado as $usuario){
            echo "<tr>
                    <td>".$usuario["id"]."</td>
                    <td>".$usuario["username"]."</td>
                    <td>".$usuario["nombres"]."</td>
                    <td>".$usuario["apellidos"]."</td>
                    <td>".$usuario["tipo"]."</td>
                    <td>".$usuario["id_escuela"]."</td>
                    <td>".$usuario["email"]."</td>
                    <td><a href='actualizar.php?id=".$usuario["id"]."'>Actualizar</a></td>
                    <td><a href='eliminar.php?id=".$usuario["id"]."'>Eliminar</a></td>
                  </tr>";
        }
        ?>
        </table>
