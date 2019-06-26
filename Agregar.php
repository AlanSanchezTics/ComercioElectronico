<?php
    if(isset($_POST["clave"])){
        $clave = $_POST["clave"];
        $cantidad = $_POST["cantprod"];
        include 'conexion.php';

        $db=$m->CRM_DB;
        $colection = $db->productos;
        $produto = array('clave' => $clave);
        $result = $colection->find($produto);
        foreach ($result as $campo) {
            $costo = $campo["costo"];
            $id = $campo["_id"];
            $stock = $campo["stock"];
            $articulo = array(
                '_id' => $id,
                'cantidad' => $cantidad,
                'subtotal' => ($costo*$cantidad)
            );
        }
        session_name("sessionWeb");
        session_start();
        $colection = $db->usuarios;
        $usuario = array('_id' => $_SESSION["id"]);
        $result = $colection->find($usuario);
        foreach ($result as $campo) {
            $carrito = $campo['carrito']["productos"];
        }
        $carrito[] = $articulo;
        $total = 0;
        foreach ($carrito as $campo) {
            $total = $total+$campo["subtotal"];
        }
        
        $result=$colection->updateOne(
            $usuario,['$set' =>[
                'carrito'=>[
                    'total' => $total,
                    'productos' => $carrito
                    ]
                ]
            ]
        );
        if(($result->getMatchedCount()) > 0){
            echo "<script type='text/javascript'>alert('Articulo en el carrito');window.location = 'vista_producto.php?id={$clave}';</script>";
        }
    }
?>