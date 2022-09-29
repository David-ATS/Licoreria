<?php
	class cabeza_singleton
	{
		static private $cabeza = null;
		private function cabeza_singleton($titulo)
		{
			
			?>
			
			<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
			<html xmlns="http://www.w3.org/1999/xhtml">
			<head>
			<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
			<title><?php echo ($titulo) ;?></title>
			</head>
			<p align="center"><strong><?php echo ($titulo) ;?></strong></p>
			<body>
			</body>
			</html>

			
			<?php
			
		}	
		public static function getCabeza($titulo)
		{
			if(self::$cabeza == null)
				self::$cabeza = new cabeza_singleton($titulo);
			return self::$cabeza;
		}
	}
?>

