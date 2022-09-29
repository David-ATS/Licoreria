<?php
	//include_once("../model/EntityProductos.php");
	include_once("controllerGenerarProforma.php");
	
	if(isset($_GET['q']))
	{
		//echo "ok";
		$descripcion=$_GET['q'];
		if(strlen($descripcion)==0){
			$objcontroller = new controllerGenerarProforma;
			$productos = $objcontroller->obtenerProductos();
			echo (json_encode($productos));
		}
		else
		{
			$objcontroller = new controllerGenerarProforma;
			$productos = $objcontroller->obtenerproductobuscado($descripcion);
			echo (json_encode($productos));
		}
		
		
	}

	if(isset($_POST['arrayProductos'])){

        $arrayRecibido=json_decode($_POST["arrayProductos"], true );
		include_once("controllerGestionarProducto.php");
		$objcontrollerGestionarProducto = new controllerGestionarProducto;
		$resultado = $objcontrollerGestionarProducto->guardarproducto($arrayRecibido[0],$arrayRecibido[3],$arrayRecibido[2],$arrayRecibido[1]);
        if($resultado == true){
			echo "ok";
		}else{
			echo "error";
		}
    

    }
    
    if(isset($_POST['arrayProductosActualizar'])){

        $arrayRecibido=json_decode($_POST["arrayProductosActualizar"], true );
		include_once("controllerGestionarProducto.php");
		$objcontrollerGestionarProducto = new controllerGestionarProducto;
		$resultado = $objcontrollerGestionarProducto->editarproducto($arrayRecibido[0],$arrayRecibido[3],$arrayRecibido[2],$arrayRecibido[1]);
        if($resultado == true){
			echo "ok";
		}else{
			echo "error";
		}


        //$objEntityProductos = new EntityProductos;
       // $objEntityProductos->editarProducto($arrayRecibido[0],$arrayRecibido[3],$arrayRecibido[2],$arrayRecibido[1]);

        //echo "Se actualizado el producto";

    }


	if(isset($_POST['idActualizar'])){

        $idproforma = $_POST['idActualizar'];
        include_once("controllerGenerarBoleta.php");
        $objcgb=new controllerGenerarBoleta;
        $resultado = $objcgb->actualizarstock($idproforma);

        if($resultado==true){

            echo "ok";
        }
        else{

            echo "error";
        }
    }
	

?>
