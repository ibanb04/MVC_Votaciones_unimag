<?php

class MvcController{

	public function pagina(){
		 session_start();
		 // session_destroy();
		if(!isset($_SESSION["LOGIN"])){
			echo "No has iniciado sesion";
			header("location: view/login.php");
			// include (__DIR__ ."/../view/usuario/login.php");
			exit();
		}else{
				// header("location: index.php?action=admin");
			if ($_SESSION["LOGIN"]){
				include (__DIR__ ."/../view/template.php");
				// include (__DIR__ ."/../view/template.php");
				// if ($_SESSION["ROL_USUARIO"] == 1){
				// 	include (__DIR__ ."/../index.php");
				// }else{
				// 	include (__DIR__ ."/../index.php");
				// }
			}
		}
	}

	public function rutasController(){
		
		if (isset($_GET["action"])){
			$rutasController = $_GET["action"];
		}else{
			$rutasController = "login";
		}	
		$respuesta = Rutas::rutasModel($rutasController);

		include $respuesta;
	}

	public function selectRolController(){
    	require_once(__DIR__."/../model/DAO/RolDAO.php");

        $dao = new RolDAO();
        $ArrayRoles = $dao->obtenerRoles();

        foreach ($ArrayRoles as $indice => $valor) {
           	echo '<option value="'.$ArrayRoles[$indice]->getid().'">'.$ArrayRoles[$indice]->getrol().'</option>';
        }
    }

    public function selectProgramaController(){
    	require_once(__DIR__."/../model/DAO/ProgramaDAO.php");

        $dao = new ProgramaDAO();
        $ArrayProgramas = $dao->obtenerProgramas();

        foreach ($ArrayProgramas as $indice => $valor) {
           	echo '<option value="'.$ArrayProgramas[$indice]->getid().'">'.$ArrayProgramas[$indice]->getnombre().'</option>';
        }
    }

    public function selectFacultadController(){
    	require_once(__DIR__."/../model/DAO/FacultadDAO.php");

        $dao = new FacultadDAO();
        $ArrayFacultades = $dao->obtenerFacultades();

        foreach ($ArrayFacultades as $indice => $valor) {
           	echo '<option value="'.$ArrayFacultades[$indice]->getid().'">'.$ArrayFacultades[$indice]->getnombre().'</option>';
        }
    }

    public function selectMesaController(){
    	require_once(__DIR__."/../model/DAO/MesaDAO.php");

        $dao = new MesaDAO();
        $ArrayMesas = $dao->obtenerMesas();

        foreach ($ArrayMesas as $indice => $valor) {
           	echo '<option value="'.$ArrayMesas[$indice]->getid().'"> Mesa Número'.$ArrayMesas[$indice]->getid().'</option>';
        }
    }


    public function tablaProgramasController(){
		require_once "MDB/mdbPrograma.php";

		$respuesta = obtenerProgramas('programa');

		foreach ($respuesta as $indice => $valor) {
			echo '<tr>
					<td>'.$respuesta[$indice]->getid().'</td>
					<td>'.$respuesta[$indice]->getnombre().'</td>
					<td>'.$respuesta[$indice]->getObjectFacultad()->getnombre().'</td>
					<td><a href="index.php?action=editar-programa&id='.$respuesta[$indice]->getid().'" class="btn green">editar</a></td>
					<td><a href="index.php?action=admin-programas&idBorrar='.$respuesta[$indice]->getid().'" class="btn red btnDelete">borrar</a></td>	
				  </tr>';
		}
	}

	public function deleteProgramaController(){
	
		require_once "MDB/mdbPrograma.php";

		if (isset($_GET["idBorrar"])){
			$idBorrar = $_GET["idBorrar"];
			
			$dao = new ProgramaDAO();
	        $respuesta= $dao->deletePrograma_ProgramaDAO('programa', 'id',$idBorrar);

	        echo "<br>enController respuesta ".$respuesta;

			// $respuesta = Datos::borrarUsuarioModel($idBorrar, "usuario");

			if ($respuesta != 0){
				header("location: index.php?action=admin-programas&seBorro=true");
			
			}else{
				header("location: index.php?action=admin-programas&seBorro=false");
			}

		}
	}

		public function updateProgramaController(){
		require_once "MDB/mdbPrograma.php";
		require_once (__DIR__."/../model/DAO/ProgramaDAO.php");

		if (isset($_GET["id"])){
			$idprograma = $_GET["id"];

			$dao = new ProgramaDAO();
			$programa = buscarPrograma('programa', 'id', $idprograma);

			echo '<h5> Codigo del programa: '.$programa->getid().'</h5><br>
					<input class="hide" type="number" name="id" id="id" value="'.$programa->getid().'" required>
		            	

		            	<div class="input-field col s12 m6">
		            		<input type="text" name="nombre" id="nombre" value="'.$programa->getnombre().'" required>
		            		<label for="nombre">Nombre</label>
		            	</div>';

		}

	}



    public function tablaUsuariosController(){
		require_once "MDB/mdbUsuario.php";

		$respuesta = obtenerUsuarios('usuario');

		foreach ($respuesta as $indice => $valor) {
			echo '<tr>
					<td>'.$respuesta[$indice]->getcodigo().'</td>
					<td>'.$respuesta[$indice]->getnombre1().'</td>
					<td>'.$respuesta[$indice]->getnombre2().'</td>
					<td>'.$respuesta[$indice]->getapellido1().'</td>
					<td>'.$respuesta[$indice]->getapellido2().'</td>
					<td>'.$respuesta[$indice]->getpassword().'</td>
					<td>'.$respuesta[$indice]->getObjectRol()->getrol().'</td>
					<td>'.$respuesta[$indice]->getObjectPrograma()->getnombre().'</td>
					<td>'.$respuesta[$indice]->getmesa_id().'</td>
					<td><a href="index.php?action=editarUsuario&id='.$respuesta[$indice]->getcodigo().'" class="btn green">editar</a></td>
					<td><a href="index.php?action=admin&idBorrar='.$respuesta[$indice]->getcodigo().'" class="btn red btnDelete">borrar</a></td>	
				  </tr>';
		}
	}


	public function deleteUsuarioController(){
	
		require_once "MDB/mdbUsuario.php";

		if (isset($_GET["idBorrar"])){
			$idBorrar = $_GET["idBorrar"];
			
			$dao = new UsuarioDAO();
	        $respuesta= $dao->deleteUsuario_UsuarioDAO('usuario', 'codigo',$idBorrar);

	        echo "<br>enController respuesta ".$respuesta;

			// $respuesta = Datos::borrarUsuarioModel($idBorrar, "usuario");

			if ($respuesta != 0){
				header("location: index.php?action=admin&seBorro=true");
			
			}else{
				header("location: index.php?action=admin&seBorro=false");
			}

		}
	}





	public function updateUsuarioController(){
		require_once "MDB/mdbUsuario.php";
		require_once (__DIR__."/../model/DAO/UsuarioDAO.php");

		if (isset($_GET["id"])){
			$codigo = $_GET["id"];

			$dao = new UsuarioDAO();
			$user = buscarUsuario('usuario', 'codigo', $codigo);

			echo '<h5> CODIGO: '.$user->getcodigo().'</h5><br>
					<input class="hide" type="number" name="codigo" id="codigo" value="'.$user->getcodigo().'" required>
		            	<div class="input-field col s12 m6">
		            		<input type="password" name="password" id="password"  value="'.$user->getpassword().'" required>
		            		<label for="password">Contraseña</label>
		            	</div>

		            	<div class="input-field col s12 m6">
		            		<input type="text" name="nombre1" id="nombre1" value="'.$user->getnombre1().'" required>
		            		<label for="nombre1">Primer Nombre</label>
		            	</div>

		            	<div class="input-field col s12 m6">
		            		<input type="text" name="nombre2" id="nombre2" value="'.$user->getnombre2().'" required>
		            		<label for="nombre2">Segundo Nombre</label>
		            	</div>

		            	<div class="input-field col s12 m6">
		            		<input type="text" name="apellido1" id="apellido1" value="'.$user->getapellido1().'" required>
		            		<label for="apellido1">Primer Apellido</label>
		            	</div>

		            	<div class="input-field col s12 m6">
		            		<input type="text" name="apellido2" id="apellido2" value="'.$user->getapellido2().'" required>
		            		<label for="apellido2">Segundo Apellido</label>
		            	</div>';

		}

	}

	public function obtenerProgramaController(){
		require_once "MDB/mdbPrograma.php";
		require_once (__DIR__."/../model/DAO/ProgramaDAO.php");

		if (isset($_GET["id"])){
			$id = $_GET["id"];

			$dao = new ProgramaDAO();
			$programa = buscarPrograma('programa', 'id', $id);
			return $programa;
		}
		return null;
	}

	public function obtenerUsuarioController(){
		require_once "MDB/mdbUsuario.php";
		require_once (__DIR__."/../model/DAO/UsuarioDAO.php");

		if (isset($_GET["id"])){
			$codigo = $_GET["id"];

			$dao = new UsuarioDAO();
			$user = buscarUsuario('usuario', 'codigo', $codigo);
			return $user;
		}
		return null;
	}

	public function selectRolSeleccionado(){

		require_once(__DIR__."/../model/DAO/RolDAO.php");

		$user = $this->obtenerUsuarioController();
        $dao = new RolDAO();
        $ArrayRoles = $dao->obtenerRoles();

        foreach ($ArrayRoles as $indice => $valor) {
        	if ($ArrayRoles[$indice]->getid() == $user->getrol_id()){
        			echo '<option value="'.$ArrayRoles[$indice]->getid().'" selected>'.$ArrayRoles[$indice]->getrol().'</option>';
        	}else{
           		echo '<option value="'.$ArrayRoles[$indice]->getid().'">'.$ArrayRoles[$indice]->getrol().'</option>';
        	}
        }
	}

		public function selectFacultadSeleccionado(){

		require_once(__DIR__."/../model/DAO/FacultadDAO.php");

		$programa = $this->obtenerProgramaController();
        $dao = new FacultadDAO();
        $ArrayFacultades = $dao->obtenerFacultades();

        foreach ($ArrayFacultades as $indice => $valor) {
        	if ($ArrayFacultades[$indice]->getid() == $programa->getfacultad_id()){
        			echo '<option value="'.$ArrayFacultades[$indice]->getid().'" selected>'.$ArrayFacultades[$indice]->getnombre().'</option>';
        	}else{
           		echo '<option value="'.$ArrayFacultades[$indice]->getid().'">'.$ArrayFacultades[$indice]->getnombre().'</option>';
        	}
        }
	}

	public function selectMesaSeleccionado(){

		require_once(__DIR__."/../model/DAO/MesaDAO.php");

		$user = $this->obtenerUsuarioController();
        $dao = new MesaDAO();
        $ArrayRoles = $dao->obtenerMesas();

        foreach ($ArrayRoles as $indice => $valor) {
        	if ($ArrayRoles[$indice]->getid() == $user->getmesa_id()){
        			echo '<option value="'.$ArrayRoles[$indice]->getid().'" selected>Mesa '.$ArrayRoles[$indice]->getid().'</option>';
        	}else{
           		echo '<option value="'.$ArrayRoles[$indice]->getid().'">Mesa '.$ArrayRoles[$indice]->getid().'</option>';
        	}
        }
	}

	public function selectProgramaSeleccionado(){

		require_once(__DIR__."/../model/DAO/ProgramaDAO.php");

		$user = $this->obtenerUsuarioController();
        $dao = new ProgramaDAO();
        $ArrayRoles = $dao->obtenerProgramas();

        foreach ($ArrayRoles as $indice => $valor) {
        	if ($ArrayRoles[$indice]->getid() == $user->getprograma_id()){
        			echo '<option value="'.$ArrayRoles[$indice]->getid().'" selected>'.$ArrayRoles[$indice]->getnombre().'</option>';
        	}else{
           		echo '<option value="'.$ArrayRoles[$indice]->getid().'">'.$ArrayRoles[$indice]->getnombre().'</option>';
        	}
        }
	}



}