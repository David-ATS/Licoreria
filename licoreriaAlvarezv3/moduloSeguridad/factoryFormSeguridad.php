<?php
include_once("formCambiarContrasenia.php");
 class factoryFormSeguridad
 {
 	public static function create($tipo)
	{
		switch ($tipo)
		{
			case 'formCambiarContrasenia': return new formCambiarContrasenia();
			default:return new Exception("error el modelo no existe");
		}
					
	}
	
	public function getTipo()
	{
	 	return get_class($this);
	} 
 }

?>