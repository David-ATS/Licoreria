<?php
	class conexion_singleton
	{
		static private $instancia = null;
		private function conexion_singleton()
		{
			mysql_connect('localhost','root','');
			mysql_select_db('licoreria');	
		}	
		public static function getInstancia()
		{
			if(self::$instancia == null)
				self::$instancia = new conexion_singleton();
			return self::$instancia;
		}
	}
?>