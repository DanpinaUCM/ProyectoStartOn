
<?php
require_once ("../includes/config.php");
require_once ("../logica/SA_Empresa.php");
 ?>

<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="css/common.css">
	<title>Start On</title>
	<meta charset="utf-8">
</head>
<body>
	<div id="container">
		<?php require("common/header.php")?>
		<div class="row">
			<?php
				$SA = SA_Empresa::getInstance();
				$ListOfEmp = $SA->getAllElements();
				foreach($ListOfEmp as $value){
					echo '<div id= "card">';     //hay que hacer el css card en comon para la lista
						echo '<img src = '. $value->getImagenPerfil() .'alt = "Foto de perfil" style="width:100%">';
						echo ' <p> '. $value->getNombre(). '</p>';
						echo '<p> '. $value->getFase(). '</p>';
						echo '<p> '. $value->getLocalizacion(). '</p>';
						echo '<p> '. $value->getCartaPresentacion(). '</p>';
					echo'</div>';
				}
			?>
		</div>
		<?php require("common/footer.php")?>
	</div>
</body>
