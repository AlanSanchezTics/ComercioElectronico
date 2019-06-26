<!DOCTYPE html>

<?php
session_start();
$_SESSION['log']=0;
  
  if(isset($_POST['usu']) && isset($_POST['pass'])){
    if(empty($_POST['usu']) || empty($_POST['pass'])){
      echo "hay uno o 2 vacios";
    }else{
      include 'conexion.php';
      $isusu=0;
      $ispass=0;
$db=$m->CRM_DB;
$usuarios= $db->usuarios;

$squery = array('usuario' => $_POST['usu']);
$data_book=$usuarios->find($squery);

foreach($data_book as $b){
$isusu=1;
      }

      if($isusu==1){
        $squery = array('password' => $_POST['pass']);
        $data_book=$usuarios->find($squery);

        foreach($data_book as $b){
          $ispass=1;
          $nameuser=$b['nombre'];
        }
        if($ispass==1){
          
          echo "<script type='text/javascript'>alert('Loggeado Correctamente');</script>";
        }else{
          echo "<script type='text/javascript'>alert('La contraseña No Coincide');</script>";
        }
        
      }else{
        echo "<script type='text/javascript'>alert('Usuario no existente');</script>";
      } 
      
    }
  }
  ?>
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
          <a class="active" href="index.php"><b>INICIO</b></a>
          <a href="#about">Acerca de</a>
          <a href="#contact">Contacto</a>
          <a class="ref" href="#popupregistrate">Registrate</a>
          <?php
          if(isset($nameuser)){
            echo "<a href='#'>Bienvenido ".$nameuser."</a>";
            echo "<a class='ref' onclick='cerrarsesion()' id='nav_a'><b>Cerrar sesion</b></a>"; 
            

          }else{
            echo "<a class='ref' href='#popupingresar' id='nav_a'><b>Iniciar sesion</b></a>";     

          }
          
          

          ?>

          
          <div class="search-container">

          
  
            
            
          </div>
        </div>
        
        <div style="margin-top: 80px;" id="home">
          <div style="background-color: #29353D; color: white; height: 100%;  padding-top: 12px;"><h1>Novedades</h1></div>
          <div style="box-shadow: 0px 16px 16px 0px rgba(0, 0, 0, 0.5);height: 500px; width: 100%; display: block; background-color: #29353D;">


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
    <div id="v" class="super-contenedor" style="min-height:400px; width: 100%; display: block;position: relative; padding-top: 14px;">
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
            <div id="v4" class="super-contenedor" style="min-height: 400px; width: 100%; display: block;position: relative; margin-bottom: 50px">
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

        <div class="btn-carrito">
            <a href="#popup"><button><img src="recursos/shopping-cart.png" alt="Carrito de compra"> <div>2</div></button></a>
           </div>

           <div class="modal-wrapper" id="popup">
              <div class="popup-contenedor">
                 <div class="header-carrito"><img style="height: 32px; width: 32px;" src="recursos/shopping-cart.png" alt="carrito de compra"></div>
                 <div class="scroll-campo">
                     <div class="card-scroll">
                          <img style="height: 80px; width: 100px;" src="recursos/lg_g7.jpg" alt="xx">
                          <span style="padding-left: 16px; font-size: 32px;">Nombre del producto</span>
                          <p>Color: blanco</p>
                          <span>Cantidad: 1</span>
                          <span style="float: right; font-size: 24px;">$ 200.00</span>
                     </div>
                     <div class="card-scroll">
                          <img style="height: 80px; width: 100px;" src="recursos/samsung_x.jpg" alt="xx">
                          <span style="padding-left: 16px; font-size: 32px;">Nombre del producto</span>
                          <p>Color: blanco</p>
                          <span>Cantidad: 1</span>
                          <span style="float: right; font-size: 24px;">$ 200.00</span>
                     </div>
          
                 </div> 
                 <div style="float: right; position:relative; right: 0px; bottom: 0px; width: 300px;">
                      <h2>Tipo de pago: </h2>
                  <select id="pago" name="tipopago">
                          <option value="tarcr">Tarjeta de credito</option>
                          <option value="tardb">Tarjeta de debito</option>
                          <option value="cash">Efectivo</option>
                          </select>
                      </div>
                 <div style="padding: 16px">
                      <table>
                          <tr>
                              <td>Productos (2): </td>
                              <td>$ 350.00 </td>
                          </tr>
                          <tr>
                              <td>Envio: </td>
                              <td>$ 50.00 </td>
                          </tr>
                          <tr>
                              <td>Impuesto: </td>
                              <td> $ 10.00 </td>
                          </tr>
                          <tr>
                              <td><h2>Total: </h2></td> 
                              <td><h2> $ 410.00 </h2></td>
                          </tr>
                      </table>
                      <button class="popup-button" >Comprar</button>
                  </div>
                  <a class="popup-cerrar" href="#">x</a>
              </div>
          </div>
          


          <div class="modal-wrapper" id="popupingresar">
            <div class="popupingresar-contenedor">
              <h2>Iniciar sesion</h2> 
              <div class=""><img style="height: 32px; width: 32px;" src="imagenes/login.png" alt="Inicio de sesion"></div>
               
              
        <form method="POST" action="index.php" style="width: 100%">
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
          function cerrarsesion(){
            alert("Sesion Cerrada Correctamente");
            window.location="index.php";
            
          }

            var arr = ["airpods","gxs10","gxs9","hwip30","samGIX", "IXR", "samX","mi9","mi8"];
            var x = 1;
            document.getElementById(arr[0]).style.display = "block";
            var a = setInterval(banner, 4000);
            function banner() {
              if(x == arr.length) {
                x = 0;
              document.getElementById(arr[arr.length-1]).style.display = "none";
              document.getElementById(arr[x]).style.display = "block";
              x++;
              } else {
                if(x == 0){
                  document.getElementById(arr[x]).style.display = "block";
                  x++;
                }else{ 
                  document.getElementById(arr[x-1]).style.display = "none";
                document.getElementById(arr[x]).style.display = "block";
              x++;
                }
                  
              }
            }
              function cambiarpagina(id) {
              
               location.href = "vista_producto.php?id="+id;
              }
            </script>
            
</body>
</html>