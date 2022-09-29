<?php
	class conecta
	{
		protected function conectaDB()
		{
			mysql_connect("localhost","root","");
			mysql_select_db("licoreria");
		}
		protected function cierraDB()
		{
			mysql_close();
		}
	}

?>