<?php

    class controllerGenerarBoleta{


        public function obtenerProformas(){

            include_once("../model/EntityProforma.php");
			$objEntityProformas = new EntityProforma;
			$proformas = $objEntityProformas->obtenerProformas();

            return $proformas;
        }

        public function obtenerMonto($proforma){

            include_once("../model/EntityDetalleProforma.php");
			$objEntityDProforma = new EntityDetalleProforma;
			$num_filas=sizeof($proforma);
            
            $monto=new stdClass();

			for($i=0;$i<$num_filas;$i++){

                
                $total[$i]= $objEntityDProforma->obtenerMonto($proforma[$i][0]);

                $monto->monto[$i]=$total[$i];
                $monto->idproforma[$i]=$proforma[$i][0];

			}

            return $monto;

        }

        public function obtenerproformabuscada($datos){

            
            include_once("../model/EntityProforma.php");
			$objEntityProformas = new EntityProforma;
			$proformas = $objEntityProformas->obtenerProformasBuscadas($datos);

            return $proformas;

        }

        public function obtenerdetalleproforma($idproforma){

            include_once("../model/EntityDetalleProforma.php");
			$objEntityDProforma = new EntityDetalleProforma;
            $deproformas = $objEntityDProforma->obtenerdetalleproforma($idproforma);

            return $deproformas;
        }

        public function insertarboleta($datos){

            include_once("../model/EntityBoleta.php");
            $objEntityBoleta = new EntityBoleta;
            $resultado = $objEntityBoleta->insertarboleta($datos);

            return $resultado;


        }

        public function insertardetalleboleta($datos){

            include_once("../model/EntityDetalleBoleta.php");
            $objEntityDBoleta = new EntityDetalleBoleta;
            $respuesta = $objEntityDBoleta->insertardetalleboleta($datos);

            return $respuesta;

        }

        public function actualizarproforma($idproforma){

            include_once("../model/EntityProforma.php");
            $objEntityProforma = new EntityProforma;
            $resultado = $objEntityProforma->actualizarproforma($idproforma);

            return $resultado;

        }

        public function actualizarstock($idproforma){

            include_once("../model/EntityProductos.php");
            $objEntityProductos = new EntityProductos;
            $resultado = $objEntityProductos->actualizarstock($idproforma);

            return $resultado;

        }

    }


?>