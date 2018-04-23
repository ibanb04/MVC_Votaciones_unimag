<?php
	  ob_start();
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Administrador</title>
	<link rel="stylesheet" href="view/resources/css/materialize.css">
	<link rel="stylesheet" href="view/resources/css/estilos.css">
	<link rel="stylesheet" href="view/resources/css/material-icons.css">
	<script defer src="view/resources/js/fontawesome-all.js"></script>
	
</head>
<body>

	<?php
		include "sections/header.php";
    ?>
	<br>

	<?php
        $mvc = new MvcController();
        $mvc->rutasController();
    ?>

   

	<script type="text/javascript" src="view/resources/js/jquery-3.3.1.min.js"></script>
	<script type="text/javascript" src="view/resources/js/materialize.js"></script>
	<script type="text/javascript" src="view/resources/js/scriptTemplate.js"></script>


	
	<script type="text/javascript">
		$(document).ready(function(){


		<?php
	        if (isset($_GET["action"])){
	            if($_GET["action"] == "createOk" || $_GET["action"] == "P_createOk"){
	            	echo "Materialize.toast('Se ha creado correctamente', 4000);";
	            }
	            if($_GET["action"] == "updateError" || $_GET["action"] == "P_updateError"){
	            	echo "Materialize.toast(' No se puede actualizar!', 4000);";
	            }
	            if($_GET["action"] == "updateOk" || $_GET["action"] == "P_updateOk"){
	            	echo "Materialize.toast('Se ha actualizado correctamente', 4000);";
	            }
	        }
	        if (isset($_GET["seBorro"])){
	            if($_GET["seBorro"] == "true"){
	            	echo "Materialize.toast('Eliminacion exitosa! ', 4000);";
	            }else if($_GET["seBorro"] == "false"){
	            	echo "Materialize.toast('No se pudo eliminar por que existe una dependencia! ', 4000);";
	            }
	        }
    	?>	
    	});
	</script>

</body>
<?php
		include "sections/footer.php";
    ?>
</html>

<?php
  ob_end_flush();
?>