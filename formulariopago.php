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
        <meta name="viewport" content="width=device-width, initial-scale=1" />
</head>

<body style="background-color: #E9EAEA;">

        <div
                style="box-shadow: 2px 4px 4px 2px rgba(0,0,0,0.8); width:30%; height:auto;padding: 32px;margin: 5% auto;background-color: white;">
                <img src="imagenes/pagar.png" alt="Pago"
                        style="float: right; width:150px; height:150px;border-radius: 100%;">
                <h1> Realizar pago </h1>
                <h3>Total a pagar: </h3>
                <h2>$ <?php echo $total; ?></h2>
                <form action="venta.php" method="POST">
                        <input type="hidden" name="cobrar">
                        <h3>Tipo de Tarjeta: </h3>
                        <select name="Tipo" style="width: 30%;">
                                <option value="Credito">Credito</option>
                                <option value="Debito">Debito</option>
                        </select>
                        <h3>Nombre y apellidos del propietario: </h3>
                        <input name="nombre" type="text" style="width: 100%;" required>
                        <div style="width: 100%; height: 18px; background-color:#29353D; margin-top: 32px;"></div>
                        <h3>Numero de tarjeta: </h3>
                        <img src="imagenes/tarjeta.jpg" alt="Tarjeta" style="float: right; width:220px; height:150px;">
                        <input name="t1" type="text" class="number" size="1" maxlength="4" required>
                        <input name="t2" type="text" class="number" size="1" maxlength="4" required>
                        <input name="t3" type="text" class="number" size="1" maxlength="4" required>
                        <input name="t4" type="text" class="number" size="1" maxlength="4" required>
                        <h3>Fecha de vencimiento: </h3>
                        <input type="text" name="day" class="number" size="1" maxlength="2" required> / <input type="text" name="year" class="number" size="1" maxlength="2" required>
                        <h3>Codigo de seguridad: </h3>
                        <input type="text" class="number" size="2" maxlength="3" name="cvv" required><br><br>
                        <input type="submit"
                                style="width: 150px; height: 50px;margin: auto; background-color: #29353D; color: white; font-size: 24px;">
                </form>

        </div>


</body>
<script
  src="https://code.jquery.com/jquery-3.4.1.min.js"
  integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
  crossorigin="anonymous"></script>
<script>
        $(document).ready(function () {
                $('.number').keypress(function (e) {
                        if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
                                return false;
                        }
                });
        });
</script>

</html>