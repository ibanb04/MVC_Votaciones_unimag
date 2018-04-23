<?php
	require_once (__DIR__."/../../MDB/mdbPrograma.php");
          
	if(isset($_POST['submit'])){
		echo "<br>Se presiono boton sumit";
		$errMsg = '<br>';

		$id = $_POST['id'];
		$nombre = $_POST['nombre'];
		$facultad_id = $_POST['facultad_id'];

        $programa = updatePrograma_mdbPrograma($id, $nombre, $facultad_id);

        if ($programa != 0){
        	header("location: ../../../index.php?action=P_updateOk");  
        }else{
        	header("location: ../../../index.php?action=P_updateError");  
        }
	}

?>