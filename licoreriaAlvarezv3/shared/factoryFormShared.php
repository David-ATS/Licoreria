<?php
include_once("formMensajeSistema.php");
include_once("cabeza_singleton.php");
 class factoryFormShared
 {
 	public static function create($tipo,$titulo)
	{
		switch ($tipo)
		{
			case 'cabeza': return cabeza_singleton::getCabeza($titulo);
			case 'formMensajeSistema':return new formMensajeSistema();
			default: return new Exception("error el modelo no existe");
		}
					
	}
	
	public function getTipo()
	{
	 	return get_class($this);
	} 
 }

?>