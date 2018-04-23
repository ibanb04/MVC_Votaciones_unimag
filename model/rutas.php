<?php
	class Rutas{

		public function rutasModel($rutasModel){

			if ($rutasModel == "login"){
				$module = "view/login.php";
			}
			else if ($rutasModel == "admin" || $rutasModel == "createOk" || $rutasModel == "updateOk" || $rutasModel == "updateError"){
				$module = "view/administrador/gestionar_usuarios.php";
			}
			else if ($rutasModel == "admin-programas" || $rutasModel == "P_createOk" || $rutasModel == "P_updateOk" || $rutasModel == "P_updateError"){
				$module = "view/administrador/gestionar_programas.php";
			}
			
			else if ($rutasModel == "formUsuario"){
				$module = "view/usuario/formulario.php";
			}
			else if ($rutasModel == "editarUsuario"){
				$module = "view/usuario/editar.php";
			}
			else if ($rutasModel == "form-programa"){
				$module = "view/programa/formulario.php";
			}
			else if ($rutasModel == "editar-programa"){
				$module = "view/programa/editar.php";
			}

			else if ($rutasModel == "cerrarSesion"){
				$module = "controller/SERVICES/serv_logout.php";
			}
			else{
				$module = "view/noFound.php";
			}

			return $module;
		}

		public function direccionarTemplateModel($rutasModel){
			if ($rutasModel == 'template'){
				$module = "views/template.php";
			}else{
				$module = "";
			}
			return $module;
		}

	}
?>
