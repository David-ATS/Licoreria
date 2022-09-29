<?php
	include_once("../shared/formularioGeneral.php");
	
	class formMenuPrincipal extends formularioGeneral
	{
		
		public function formMenuPrincipalShow($privilegios)
		{
			$this->cabezaShow("MENU PRINCIPAL");
			$numeroPrivilegios = sizeof($privilegios);
			///echo ($numeroPrivilegios);
			
			for($i=0;$i<$numeroPrivilegios;$i++)
			{
			?>
				<!-- CSS -->
				<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
				<link rel="stylesheet" href="../css/style.css">
				<!-- CSS -->
				<table class="form-box2">
				  <tr>
					<td>
					<form action="<?php echo($privilegios[$i]['path']);?>" method="post">
						<input type="submit" name="<?php echo($privilegios[$i]['btn']);?>" id="<?php echo($privilegios[$i]['btn']);?>" value="<?php echo($privilegios[$i]['label']);?>" />
					</form>
					</td>
				  </tr>
                <?php	
			}
			?>
              	</table>
            <?php          
            $this->piePaginaShow();
      	}
    }
?>
