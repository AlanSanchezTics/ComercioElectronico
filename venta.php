<?php
    if(isset($_POST["cobrar"])){
        include 'conexion.php';
        session_name("sessionWeb");
        session_start();
        $db=$m->CRM_DB;
        $colection = $db->usuarios;
        $usuario = array(
            "_id" => $_SESSION["id"]
        );
        $result = $colection->find($usuario);
        foreach ($result as $campo) {
            $direccion = $campo["direcciones"];
            $productos = $campo["carrito"]["productos"];
            $total = $campo["carrito"]["total"];
        }
        foreach ($productos as $campo) {
            $idprod = array(
                "_id" => $campo["_id"]
            );
            $cantidad = $campo["cantidad"];

            $colection = $db->productos;
            $result = $colection ->find($idprod);
            foreach ($result as $key) {
                $stock = $key["stock"];
            }
            if($cantidad <= $stock){
                $colection->updateOne(
                    $idprod,['$set' =>[
                        'stock'=> (int)($stock-$cantidad)
                        ]
                    ]
                );
            }else{
                echo "<script type='text/javascript'>alert('Error en la venta');</script>";
                exit;
            }
        }
        $colection = $db->ventas;
        $result = $colection -> insertOne([
            'folio' => (int)rand(1,1000),
            'cliente' => $_SESSION["id"],
            'fecha' => date('YYYY-MM-DD'),
            'metPago' => "TARJETA",
            'status' => 'COMPLETADA',
            'guia' => rand(100000000,999999999),
            'total' => (float)($total),
            'direccion' => $direccion,
            'productos' => $productos
        ]);
        
        $colection = $db->usuarios;
        $result=$colection->updateOne(
            $usuario,['$set' =>[
                'carrito'=>[
                    'total' => (int)0,
                    'productos' => array()
                    ]
                ]
            ]
        );

        $colection = $db->ventas;
        $cliente = array(
            'cliente' => $_SESSION["id"]
        );
        $result = $colection ->find($cliente);
        foreach ($result as $campo) {
            $guia = $campo["guia"];
        }
        echo "<script type='text/javascript'>alert('Venta realizada con exito. No de guia: ".$guia."');window.location = 'index.php';</script>";
    }
?>