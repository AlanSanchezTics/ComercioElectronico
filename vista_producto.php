<!DOCTYPE html>
<?php
    include 'conexion.php';

    if(isset($_POST["login"])){
        if(isset($_POST["usuario"]) && isset($_POST["contraseña"])){
            if(!(empty($_POST["usuario"]) && empty($_POST["contraseña"]))){
                $user = $_POST["usuario"];
                $pass = $_POST["contraseña"];
  
                $db=$m->CRM_DB;
                $colection = $db->usuarios;
  
                $usuario = array(
                    'usuario' => $user,
                    'password' => $pass,
                    'tipo' => "CLIENTE"
                );
  
                $result = $colection->find($usuario);
                foreach ($result as $campo) {
                    if(sizeof($campo) > 0){
                        session_name("sessionWeb");
                        session_start();
                        $_SESSION["id"] = $campo["_id"];
                        $_SESSION["nombre"] = $campo["nombre"];
                        echo "<script type='text/javascript'>alert('Bienvenido ".$_SESSION["nombre"]."');</script>";
                    }else{
                        echo "<script type='text/javascript'>alert('Usuario inexistente');</script>";
                    }
                }
            }else{
                echo "<script type='text/javascript'>alert('Los campos no deben estar vacios');</script>";
            }
        }
    }else{
        session_name("sessionWeb");
        session_start();
    }
?>
<html lang="en">

<head>
  <title>Sales Cellphones (Home)</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <link rel="stylesheet" type="text/css" href="css/estilo_general.css">
  <link rel="stylesheet" type="text/css" href="css/estilo_2.css">
</head>

<body>
  <div class="topnav">
    <a class="active" href="index.php"><b>INICIO</b></a>
    <a href="./acerca_de.html">Acerca de</a>
    <a href="./contacto.html">Contacto</a>
    <?php
          if(isset($_SESSION["id"])){
            echo "<a href='#'>hola ".$_SESSION["nombre"]."</a>";
            echo "<a class='ref' href='logout.php' id='nav_a'><b>Cerrar sesion</b></a>"; 
            

          }else{
            echo "<a class='ref' href='./registrousuario.php'>Registrate</a> <a class='ref' href='#popupingresar' id='nav_a'><b>Iniciar sesion</b></a>";     

          }
          
          

          ?>
  </div>



  <div class="container-description">

    <?php

include 'conexion.php';
$db=$m->CRM_DB;
$productos= $db->productos;
$squery = array('clave' => $_GET['id']);
$data_book=$productos->find($squery);
$i=0;
foreach($data_book as $b){ 
  echo "
  <div class='descrip-producto'>
<div class='imag-container'>
<img src='".$b['url']."' alt='Celular'>
<div class = 'container-carac' >
<h1> Caracteristicas </h1>
<h2>Marca: </h2><h4>".$b['marca']."</h4>
<h2>Sistema Operativo: </h2><h4>".$b['so']."</h4>
<h2>Memoria: </h2><h4>".$b['memoria']."</h4>
</div>
<div class='descripcion-'>
    <h1>Descripcion: </h1>
    <h3>".$b['marca']." ".$b['descripcion']." ".$b['so']." ".$b['memoria']."</h3>
</div>
</div>   

<div class='pagos-container'>
<h2 class='contenido-pagos-container'>".$b['descripcion']."</h2>
<h1 class='contenido-pagos-container'>".$b['costo']."</h1>
  ";
 }
?>

    <form style="padding-left: 16px;">
      <h5> Seleccione Color: </h5>
      <select id="color" name="tipocolor">
        <option value="au">Blanco</option>
        <option value="ca">Azul</option>
        <option value="usa">Negro</option>
      </select>
    </form>
    <form action="Agregar.php" method="POST"  style="padding-left: 16px;">
    <input type="hidden" name="clave" value="<?php echo $_GET["id"]; ?>">
      <h5>Cantidad: </h5>


      <select id="cantidad" name="cantprod">
        <?php


$squery = array('clave' => $_GET['id']);
$data_book=$productos->find($squery);
$i=1;

foreach($data_book as $b){
while($i<=$b['stock']){
    echo "<option value=".$i.">".$i."</option>";
    $i=$i+1;
    } 
 }

                    
                   ?>
      </select>


    <div style="width: 100%;padding-top: 64px; ">
      <button type="submit" id="btn-carrito" style="width: 90%;"><img style="height: 32px; width: 32px;" src="recursos/shopping-cart.png"
          alt="Agregar al carrito"><br>Agregar al carrito</button>
    </div>
  </form>
  </div>
  </div>

  </div>

  <?php
  if(isset($_SESSION["id"]) && !empty($_SESSION["id"])){
    $db=$m->CRM_DB;
    $colection = $db->usuarios;

    $usuario = array(
      "_id" => $_SESSION["id"]
    );
    $result = $colection->find($usuario);
    foreach ($result as $campo) {
      $totalArt = sizeof($campo["carrito"]["productos"]);
      $productos = $campo["carrito"]["productos"];
      $total = $campo["carrito"]["total"];
    }
    echo '
    <div class="btn-carrito">
      <a href="#popup"><button><img src="recursos/shopping-cart.png" alt="Carrito de compra">
          <div>'.$totalArt.'</div>
        </button></a>
    </div>
    ';
  }
?>

<div class="modal-wrapper" id="popup">
  <div class="popup-contenedor">
    <div class="header-carrito"><img style="height: 32px; width: 32px;" src="recursos/shopping-cart.png"
        alt="carrito de compra"></div>
    <div class="scroll-campo">
      <?php
        if(isset($productos)){
          $colection = $db->productos;

          foreach ($productos as $campo) {
            $produto = array(
              '_id' => $campo["_id"]
            );
            $result = $colection->find($produto);
            foreach ($result as $values) {
              echo '
              <div class="card-scroll">
                <img style="height: 80px; width: 100px;" src="'.$values['url'].'" alt="xx">
                <span style="padding-left: 16px; font-size: 32px;">'.$values['descripcion'].'</span>
                <p>Color: blanco</p>
                <span>Cantidad: '.$campo['cantidad'].'</span>
                <span style="float: right; font-size: 24px;">$'.$campo['subtotal'].'</span>
              </div>';
            }
          }
        }
      ?>
    </div>
    <div style="padding: 16px">
      <table>
        <tr>
          <td>Productos (<?php echo $totalArt; ?>): </td>
          <td>$ <?php echo $total; ?> </td>
        </tr>
        <tr>
          <td>Envio: </td>
          <td>$ 200.00 </td>
        </tr>
        <tr>
          <td>Impuesto: </td>
          <td> $ <?php echo ($total * 0.16);?> </td>
        </tr>
        <tr>
          <td>
            <h2>Total: </h2>
          </td>
          <td>
            <h2> $ <?php echo (($total * 1.16)+200); ?> </h2>
          </td>
        </tr>
      </table>
      <button onclick="window.location = './formulariopago.php'" class="popup-button">Comprar</button>
    </div>
    <a class="popup-cerrar" href="#">x</a>
  </div>
</div>

  <div class="modal-wrapper" id="popupingresar">
    <div class="popupingresar-contenedor">
      <h2>Iniciar sesion</h2>
      <div class=""><img style="height: 32px; width: 32px;" src="imagenes/login.png" alt="Inicio de sesion"></div>


      <form method="POST" action="index.php" style="width: 100%">
        <input type="hidden" name="login">
        <h3>Correo o usuario</h3>
        <input name="usu" type="text" style="width: 70%">
        <h3>Contraseña</h3>
        <input type="password" name="pass" style="width: 70%">

        <br><br>

        <input class="popup-button" type="submit" value="Ingresar"></button>
      </form>
    </div>
    <a class="popup-cerrar" href="#">x</a>
  </div>











  </div>

</body>

</html>