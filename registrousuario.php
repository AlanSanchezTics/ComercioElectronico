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
                                <h4>Usuario: </h4><input name="user" type="text" style="width: 100%;">
                                <h4>Contraseña:</h4> <input name="pass" type="password" style="width: 100%;">
                                <h4>Nombre: </h4><input name="nombre" type="text" style="width: 100%;">
                                <h4>Apellidos: </h4><input name="apellidos" type="text" style="width: 100%;">
                                <h4>Edad: </h4> <input name="age" type="text" style="width: 100%;">
                                <h4>Telefono: </h4> <input name="tel" type="tel" style="width: 100%;">
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