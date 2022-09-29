<?php
	
	include_once("controllerGenerarProforma.php");
	
	if(isset($_GET['i']))
	{
		$serie = $_GET['i'];
		$lista=json_decode($_GET['json'],true);

		include_once("controllerGenerarProforma.php");
		$objcgp=new controllerGenerarProforma;
		
		$resultado = $objcgp->insertardetalleproforma($serie,$lista);
		
		if($resultado==true)
		{
			echo "ok";
		}
		else if($resultado == false)
		{
			echo "error";
		}
		
		
	}
	else if(isset($_GET['jsondatos']))
	{
		$datos=json_decode($_GET['jsondatos'],true);
		//for($i=0;$i<sizeof($datos);$i++){
		//	echo $datos[$i]['cliente'];
		//}
		include_once("controllerGenerarProforma.php");
		$objcgp=new controllerGenerarProforma;
		$resultado = $objcgp->insertarproforma($datos);
		if($resultado==true)
		{
			echo "ok";
		}
		else
		{
			echo "error";
		}
	}
	
	else if(isset($_POST['jdatos'])){

		$datos=json_decode($_POST['jdatos'],true);

		//echo $datos[0]['tipo'];
		include_once("controllerGenerarBoleta.php");
		$objcgb=new controllerGenerarBoleta;
		$proformas = $objcgb->obtenerproformabuscada($datos);
		$monto = $objcgb -> obtenerMonto($proformas);
		
		$num_filas = sizeof($proformas);
		$arraydatos=[];
		for($i=0;$i<$num_filas;$i++){

			for($j=0;$j<sizeof($monto);$j++){

				if($proformas[$i]['idproforma']==$monto->idproforma[$j]){

					$miarray=array("idproforma"=>$proformas[$i]['idproforma'],"serie"=>$proformas[$i]['serie'],"cliente"=>$proformas[$i]['cliente'],"estado"=>$proformas[$i]['estado'],"fecha"=>$proformas[$i]['fecha'],"hora"=>$proformas[$i]['hora'],"monto"=>$monto->monto[$i]);
					array_push($arraydatos,$miarray);

				}

			}
          	
		}

		echo json_encode($arraydatos);		
	}
	
?>