<?php
	include_once("EntityUsuario.php");
	class strategicModels extends EntityUsuario
	{
		public function darstrategic($entidad,$consulta,$operacion)
		{
			switch($entidad)
			{
				case 'EntityUsuario': switch($operacion)
									  {
									  	case 'identificarExistenciaUsuario': return $this->identificarExistenciaUsuario($consulta);
										case 'obtenerContrasenia': return $this->obtenerContrasenia($consulta);
										case 'actualizarContrasenia': $this->actualizarContrasenia($consulta);
										default: return new Exception("error no existe esta operacion"); 
									  }
				
				default: return new Exception("error no existe esta entidad"); 
			}
			 
		}
		
	}
	
?>