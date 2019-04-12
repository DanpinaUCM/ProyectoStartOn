<?php require_once ("includes/config.php"); ?>
<!DOCTYPE html>
<html>
    <link rel="stylesheet" type="text/css" href="vista/css/common.css">
    <meta charset="utf-8">
<head>
	<title>Start On</title>
</head>
<body>
	<div class="container">
		<?php require ("vista/common/indexHeader.php")?>
		<div class="row">
			<div class="titulo">
				Start On
			</div>

			<?php
			if(isset($_SESSION['login'])){
				if($_SESSION['login']){
				if (isset($_SESSION['id_usuario'])) {
					$id = $_SESSION['id_usuario'];
				}else{
					$id = $_SESSION['id_empresa'];
				}
				echo "Bienvenido, Agente " . $_SESSION['nombre'];
				}
			}
			?>

		</div>
		<div class="row">
			<?php if (isset($_SESSION['login'])) {
				if(!$_SESSION['login']){
				echo "<div class=\"column\"><a href=\"vista/usr_signup.php\" >Registro de usuarios</a></div>
					<div class=\"column\"><a href=\"vista/emp_signup.php\">Registro de empresas</a></div>";
				}
			} ?>

		</div>
		<?php require ("vista/common/footer.php")?>
	</div>
</body>
</html>
