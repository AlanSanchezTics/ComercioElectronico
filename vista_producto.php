<!DOCTYPE html>
<?php
session_start();
  
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
          $_SESSION['log']=1;
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
                        <a href="#contact">Registrate</a>
                        <?php
          if(isset($nameuser)){
            echo "<a href='#'>Bienvenido ".$nameuser."</a>";
            echo "<a class='ref' onclick='cerrarsesion()' id='nav_a'><b>Cerrar sesion</b></a>"; 
            

          }else{
            echo "<a class='ref' href='#popupingresar' id='nav_a'><b>Iniciar sesion</b></a>";     

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
          <form style="padding-left: 16px;">
                <h5>Cantidad: </h5>


                    <select id="cantidad" name="cantprod">
                    <option value='0'> Seleccione </option>
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


                  </form>
                  <div style="width: 100%;padding-top: 64px; ">
                        <button id="btn-compra"><img style="height: 32px; width: 32px;" src="recursos/paper-bag.png" alt="Comprar"><br>Comprar</button>
                        <button id="btn-carrito"><img style="height: 32px; width: 32px;" src="recursos/shopping-cart.png" alt="Agregar al carrito"><br>Agregar</button>
                    </div>
    </div>
            </div>

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
                <option value="cr">Tarjeta de credito</option>
                <option value="db">Tarjeta de debito</option>
                <option value="ca">Efectivo</option>
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

        </body>
        </html>