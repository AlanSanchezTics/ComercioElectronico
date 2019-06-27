<!DOCTYPE html>

<?php
  include 'conexion.php';

  if(isset($_POST["login"])){
      if(isset($_POST["usu"]) && isset($_POST["pass"])){
          if(!(empty($_POST["usu"]) && empty($_POST["pass"]))){
              $user = $_POST["usu"];
              $pass = $_POST["pass"];

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
            echo "<a href='#'>Hola ".$_SESSION["nombre"]."</a>";
            echo "<a class='ref' onclick='cerrarsesion()' id='nav_a'><b>Cerrar sesion</b></a>"; 
            

          }else{
            echo "<a class='ref' href='./registrousuario.php'>Registrate</a><a class='ref' href='#popupingresar' id='nav_a'><b>Iniciar sesion</b></a>";     

          }
          
          

          ?>


    <div class="search-container">





    </div>
  </div>

  <div style="margin-top: 80px;" id="home">
    <div style="background-color: #29353D; color: white; height: 100%;  padding-top: 12px;">
      <h1>Novedades</h1>
    </div>
    <div
      style="box-shadow: 0px 16px 16px 0px rgba(0, 0, 0, 0.5);height: 500px; width: 100%; display: block; background-color: #29353D;">


      <?php
include 'conexion.php';
$db=$m->CRM_DB;
$productos= $db->productos;
$data_book=$productos->find();
$ids = array("airpods","gxs10","gxs9","hwip30","samGIX", "IXR", "samX","mi9","mi8", "lgg7");
$i=0;
foreach($data_book as $b){    
    echo "<div id='".$ids[$i]."' class='contenedorbanner' ><img class='bannerimg' src=".$b['url']." alt='Air pods'>";
    echo "<h2 class='texto-imagen'>".$b['descripcion']."</h2></div>";
    $i=$i+1;
    if($i==9){
      break;
    }    
}
?>



    </div>
  </div>
  <div id="v" class="super-contenedor"
    style="min-height:400px; width: 100%; display: block;position: relative; padding-top: 14px;">
    <h1 class="formato-titulo"> Lo Más Vendido </h1>
    <?php
$filter  = [];
$options = ['sort' => ['stock' => 1]];
$data_book=$productos->find($filter, $options);
$i=0;
foreach($data_book as $b){ 
  
  echo "  <div class='contenedor' onclick='cambiarpagina(".$b['clave'].")'>
  <div class='cont-imagen'>
      <img src='".$b['url']."' alt='IOS' style='height: 75%; width: 100%;border-bottom-style: solid;
     border-color:darkgray;border-width: 1px'>  
   <h4 class='formato-centro'>$".$b['costo']."</h4> 
   <p class='formato-centro'>".$b['descripcion']."</p>
   </div>
  </div>
  ";
  $i=$i+1;
  if($i==5){
    break;
  }
}
?>
  </div>


  <div id="v1" class="super-contenedor" style="min-height: 400px; width: 100%; display: block;position: relative;">
    <h1 class="formato-titulo"> SAMSUNG </h1>

    <?php
$squery = array('marca' => 'Samsung');
$data_book=$productos->find($squery);
$i=0;
foreach($data_book as $b){ 
  
  echo "  <div class='contenedor' onclick='cambiarpagina(".$b['clave'].")'>
  <div class='cont-imagen'>
      <img src='".$b['url']."' alt='IOS' style='height: 75%; width: 100%;border-bottom-style: solid;
     border-color:darkgray;border-width: 1px'>  
   <h4 class='formato-centro'>$".$b['costo']."</h4> 
   <p class='formato-centro'>".$b['descripcion']."</p>
   </div>
  </div>
  ";
  $i=$i+1;
  if($i==5){
    break;
  }
}
?>


  </div>



  <div id="v2" class="super-contenedor" style="min-height: 400px; width: 100%; display: block;position: relative;">
    <h1 class="formato-titulo"> Apple </h1>
    <?php
$squery = array('marca' => 'Apple');
$data_book=$productos->find($squery);
$i=0;
foreach($data_book as $b){ 
  
  echo "  <div class='contenedor' onclick='cambiarpagina(".$b['clave'].")'>
  <div class='cont-imagen'>
      <img src='".$b['url']."' alt='IOS' style='height: 75%; width: 100%;border-bottom-style: solid;
     border-color:darkgray;border-width: 1px'>  
   <h4 class='formato-centro'>$".$b['costo']."</h4> 
   <p class='formato-centro'>".$b['descripcion']."</p>
   </div>
  </div>
  ";
  $i=$i+1;
  if($i==5){
    break;
  }
}
?>
  </div>
  <div id="v3" class="super-contenedor" style="min-height: 400px; width: 100%; display: block;position: relative;">
    <h1 class="formato-titulo"> Xiaomi </h1>
    <?php
$squery = array('marca' => 'Xiaomi');
$data_book=$productos->find($squery);
$i=0;
foreach($data_book as $b){ 
  
  echo "  <div class='contenedor' onclick='cambiarpagina(".$b['clave'].")'>
  <div class='cont-imagen'>
      <img src='".$b['url']."' alt='IOS' style='height: 75%; width: 100%;border-bottom-style: solid;
     border-color:darkgray;border-width: 1px'>  
   <h4 class='formato-centro'>$".$b['costo']."</h4> 
   <p class='formato-centro'>".$b['descripcion']."</p>
   </div>
  </div>
  ";
  $i=$i+1;
  if($i==5){
    break;
  }
}
?>
  </div>
  <div id="v4" class="super-contenedor"
    style="min-height: 400px; width: 100%; display: block;position: relative; margin-bottom: 50px">
    <h1 class="formato-titulo"> Lg </h1>
    <?php
$squery = array('marca' => 'Lg');
$data_book=$productos->find($squery);
$i=0;
foreach($data_book as $b){ 
  
  echo "  <div class='contenedor' onclick='cambiarpagina(".$b['clave'].")'>
  <div class='cont-imagen'>
      <img src='".$b['url']."' alt='IOS' style='height: 75%; width: 100%;border-bottom-style: solid;
     border-color:darkgray;border-width: 1px'>  
   <h4 class='formato-centro'>$".$b['costo']."</h4> 
   <p class='formato-centro'>".$b['descripcion']."</p>
   </div>
  </div>
  ";
  $i=$i+1;
  if($i==5){
    break;
  }
}
?>

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



  <script>
    function cerrarsesion() {
      window.location = "logout.php";
    }

    var arr = ["airpods", "gxs10", "gxs9", "hwip30", "samGIX", "IXR", "samX", "mi9", "mi8"];
    var x = 1;
    document.getElementById(arr[0]).style.display = "block";
    var a = setInterval(banner, 4000);
    function banner() {
      if (x == arr.length) {
        x = 0;
        document.getElementById(arr[arr.length - 1]).style.display = "none";
        document.getElementById(arr[x]).style.display = "block";
        x++;
      } else {
        if (x == 0) {
          document.getElementById(arr[x]).style.display = "block";
          x++;
        } else {
          document.getElementById(arr[x - 1]).style.display = "none";
          document.getElementById(arr[x]).style.display = "block";
          x++;
        }

      }
    }
    function cambiarpagina(id) {

      location.href = "vista_producto.php?id=" + id;
    }
  </script>

</body>

</html>