<?php

    include_once("conexion_singleton.php");
    class EntityDetalleBoleta
    {
        public function insertardetalleboleta($datos)
        {
            $serie = $datos[0]['serie'];
            $sql = "select idboleta from boleta where serie = '$serie'";
			conexion_singleton::getInstancia();
			$resultado = mysql_query($sql);
			$idboleta = mysql_result($resultado,0);
			
			$idproforma = $datos[0]['idproforma'];
			$monto = $datos[0]['monto'];
			
			$insert = "insert into detalleboleta (idboleta,total,idproforma) values($idboleta,$monto,$idproforma)";
			$respuesta = mysql_query($insert);
				
			
			return $respuesta;
            
        }
    }    

?>