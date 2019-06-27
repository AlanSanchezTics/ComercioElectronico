<?php
        if(isset($_POST["registro"])){
                $usuario = $_POST["usuario"];
                $password = $_POST["password"];
                $nombre = $_POST["nombre"];
                $apellidos = $_POST["apellidos"];
                $edad = $_POST["edad"];
                $telefono = $_POST["telefono"];
                $direccion = array(
                        'alias' => "DEFAULT",
                        'estado' => $_POST["estado"],
                        'municipio' => $_POST["municipio"],
                        'colonia' => $_POST["colonia"],
                        'calle' => $_POST["calle"]." ".$_POST["numero"],
                        'cp' => (int)$_POST["cp"]
                );

                include 'conexion.php';

                $db=$m->CRM_DB;
                $colection = $db->usuarios;
                $user = array(
                        'usuario' =>$usuario
                );
                $result = $colection -> find($user);
                foreach ($result as $campo) {
                        echo "<script type='text/javascript'>alert('El usuario ya existe');</script>";
                        exit;
                }
                $inputUsuario = array(
                        'carrito' =>array(
                                'total' => (int)0,
                                'productos' => array()),
                        'direcciones' => $direccion,
                        'usuario' => $usuario,
                        'password' => $password,
                        'tipo' => 'CLIENTE',
                        'nombre' =>$nombre,
                        'apellido' => $apellidos,
                        'edad' => (int)$edad,
                        'telefono' => $telefono
                );
                $result = $colection -> insertOne($inputUsuario);
                echo "<script type='text/javascript'>alert('Usuario Registrado con exito.');window.location = 'index.php';</script>";
        }
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Sales Cellphones (Home)</title>
    <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1"/>
        <link rel="stylesheet" type="text/css" href="css/estilo_general.css">  
        <link rel="stylesheet" type="text/css" href="css/estilo_2.css">
</head>
        <body>
                <div class="topnav">
                        <a href="index.php"><b>INICIO</b></a>
                        <a href="acerca_de.html">Acerca de</a>
                        <a href="contacto.html">Contacto</a>
                        <a class="active" href="registrousuario.html">Registrate</a>
                        </div>
                        <h2 style="padding-top:10%;width: 100%;text-align: center;" >Ingresa tus datos</h2>
        <div style="padding:32px;margin-left: auto;margin-right: auto; box-shadow: 2px 4px 4px 2px rgba(0, 0, 0, 0.8); width: 30%; height: 50%; margin-bottom: 64px;">
                        <form action="registrousuario.php" method="POST">
                                <input type="hidden" name="registro">
                                <h4>Usuario: </h4><input name="usuario" type="text" style="width: 100%;">
                                <h4>Contraseña:</h4> <input name="password" type="password" style="width: 100%;">
                                <h4>Nombre: </h4><input name="nombre" type="text" style="width: 100%;">
                                <h4>Apellidos: </h4><input name="apellidos" type="text" style="width: 100%;">
                                <h4>Edad: </h4> <input name="edad" type="text" style="width: 100%;">
                                <h4>Telefono: </h4> <input name="telefono" type="tel" style="width: 100%;">
                                <h4>Direccion: </h4>
                                <h5>Estado: </h5><input name="estado" type="text" style="width: 100%;">
                                <h5>Municipio: </h5><input name="municipio" type="text" style="width: 100%;">
                                <h5>Colonia: </h5><input name="colonia" type="text" style="width: 100%;">
                                <h5>Calle: </h5><input name="calle" type="text" style="width: 100%;">
                                <h5>Numero: </h5><input name="numero" type="text" style="width: 64px;;">
                                <h5>Codigo Postal: </h5><input name="cp" type="text">
                                <br><br><input type="submit" style="width: 150px; height: 50px;margin: 10%; background-color: #29353D; color: white; font-size: 24px;">
                        </form>
        </div>
        </body>

</html>