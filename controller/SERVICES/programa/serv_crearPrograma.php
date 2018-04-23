<?php
	require_once (__DIR__."/../../MDB/mdbPrograma.php");
          
	if(isset($_POST['submit'])){
		echo "<br>Se presiono boton sumit";
		$errMsg = '<br>';

		$nombre = $_POST['nombre'];
		$facultad_id = $_POST['facultad_id'];

        $Programa = insertPrograma_mdbPrograma($nombre,$facultad_id);

        if ($Programa != 0){
        	header("location: ../../../index.php?action=P_createOk");  

        }else{
        	echo $Programa;
        }
	}

?>