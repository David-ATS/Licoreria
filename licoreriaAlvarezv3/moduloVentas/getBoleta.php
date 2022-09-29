<?php

    if(isset($_POST['idproforma'])){

        $idproforma = $_POST['idproforma'];
        include_once("controllerGenerarBoleta.php");
        $objcgb=new controllerGenerarBoleta;
        $dproformas = $objcgb->obtenerdetalleproforma($idproforma);

        echo json_encode($dproformas);
       
    }

    if(isset($_POST['jsonboleta'])){

        $datos = json_decode($_POST['jsonboleta'],true);
        include_once("controllerGenerarBoleta.php");
        $objcgb=new controllerGenerarBoleta;
        $resultado = $objcgb->insertarboleta($datos);

        if($resultado==true){

            echo "ok";
        }
        else{

            echo "error";
        }
    }

    if(isset($_POST['jsondetalleboleta'])){

        $datos = json_decode($_POST['jsondetalleboleta'],true);
        include_once("controllerGenerarBoleta.php");
        $objcgb=new controllerGenerarBoleta;
        $resultado = $objcgb->insertardetalleboleta($datos);
        if($resultado==true){

            echo "ok";
        }
        else{

            echo "error";
        }
    }

    if(isset($_POST['idproformaActualizar'])){

        $idproforma = $_POST['idproformaActualizar'];
        include_once("controllerGenerarBoleta.php");
        $objcgb=new controllerGenerarBoleta;
        $resultado = $objcgb->actualizarproforma($idproforma);
        if($resultado==true){

            echo "ok";
        }
        else{

            echo "error";
        }
    }

    

?>