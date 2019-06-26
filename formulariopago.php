<?php
        include 'conexion.php';
        session_name("sessionWeb");
        session_start();
        if($_SESSION["id"]){
                $db=$m->CRM_DB;
                $colection = $db->usuarios;
                $usuario = array(
                        "_id" => $_SESSION["id"]
                );
                $result = $colection->find($usuario);
                foreach ($result as $campo) {
                        $carrito = $campo["carrito"];
                }
                $total = ($carrito['total']*1.16)+200;
        }
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Sales Cellphones (Home)</title>
    <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1"/>
</head>
        <body style="background-color: #E9EAEA;">

<div style="box-shadow: 2px 4px 4px 2px rgba(0,0,0,0.8); width:30%; height:auto;padding: 32px;margin: 5% auto;background-color: white;">
        <img src="imagenes/pagar.png" alt="Pago" style="float: right; width:150px; height:150px;border-radius: 100%;">
    <h1> Realizar pago </h1>
    <h3>Total a pagar: </h3> 
    <h2>$ <?php echo $total; ?></h2>
    <form action="" method="">
    <h3>Tipo de Tarjeta: </h3>
    <select name="Tipo de tarjeta" style="width: 30%;">
        <option value="Credito">Credito</option>
        <option value="Debito">Debito</option>
    </select>
    <h3>Nombre y apellidos del propietario: </h3>
    <input type="text" style="width: 100%;">
    <div style="width: 100%; height: 18px; background-color:#29353D; margin-top: 32px;"></div>
    <h3>Numero de tarjeta: </h3>
    <img src="imagenes/tarjeta.jpg" alt="Tarjeta" style="float: right; width:220px; height:150px;">
    <input type="text" size="1" maxlength="4">
    <input type="text" size="1" maxlength="4">
    <input type="text" size="1" maxlength="4">
    <input type="text" size="1" maxlength="4">
    <h3>Fecha de vencimiento: </h3>
    <input type="date" name="" id="">
    <h3>Codigo de seguridad: </h3>
    <input type="text" size="2" maxlength="3"><br><br>
    <input type="submit"  style="width: 150px; height: 50px;margin: auto; background-color: #29353D; color: white; font-size: 24px;">
</form>

</div>


        </body>
</html>