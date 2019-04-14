
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
  <?php require("common/header.php")?>
	<div id="container">
	<?php
    echo '<div class="row" >';
      echo "
        <button >Localizacion</button>
        <button >Profesion</button>
        <button >Sector</button>
        <button >Edad</button>";

      echo ' </div>';

		echo '<div class="row">';

        $orden = "";
        $ordenacion = "Edad";
        echo $ordenacion;
        $cerrarDiv = false;
				$SA = SA_Empresa::getInstance();
				$ListOfEmp = $SA->getAllElements($ordenacion);
  				foreach($ListOfEmp as $value) {

            if($orden != $value->getPasiones()) {
              $orden = $value->getPasiones();
              if( $cerrarDiv == true) {
                  echo '</div>';
              }
              echo '<div class ="row">';
              echo '<h2 style="text-align:left;">'. $orden . '</h2>';
              $cerrarDiv = true;
            }
            echo '<div id= "card">';     //hay que hacer el css card en comon para la lista
                echo '<a href ="/ProyectoStartOn/vista/perfEmp.php" ><img src= "/ProyectoStartOn/'.$value->getImagenPerfil().'"  style="width:100%"></a>';
              echo'</div>';
				}
      echo '</div>';
			?>

	</div>
</body>