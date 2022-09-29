<?php

    include_once("conexion_singleton.php");
    class EntityBoleta
    {
        public function insertarboleta($datos)
        {
            $serie = $datos[0]['serie'];
			$cliente = $datos[0]['cliente'];
			$fecha=$datos[0]['fecha'];
			$hora=$datos[0]['hora'];
            $tipo=$datos[0]['tipo'];

            conexion_singleton::getInstancia();
            $SQL = "INSERT INTO `boleta`(`serie`, `fecha`, `hora`, `cliente`, `tipopago`, `estado`) 
                    VALUES ('$serie','$fecha','$hora','$cliente','$tipo',0)";
            $resultado = mysql_query($SQL);
            
            return $resultado;
            
        }
    }    

?>