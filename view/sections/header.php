<header>
	 <div class="row">
     <!-- Dropdown Structure -->
			<ul id="dropdown1" class="dropdown-content">
			  <li><a href="#!" ><i class="fas fa-user"></i> <?php
								if (isset($_SESSION['LOGIN'])){
		                        		echo $_SESSION['NOMBRE_USUARIO'];
								}else{
									echo 'Sesion no iniciada';
								}
		                    ?>	 </a></li>
			  <li><a href="#!"><i class="fas fa-cog"></i> config</a></li>
			  <li class="divider"></li>
			  <li><a  href="index.php?action=cerrarSesion">salir <i class="fas fa-sign-out-alt"></i></a></li>
			</ul>
			<nav>
			  <div class="nav-wrapper blue darken-2">	
			    <a href="index.php?action=admin" class="brand-logo">&nbsp;&nbsp; <i class="fas fa-universal-access"></i>&nbsp;ADMINISTRADOR</a>
			    <ul class="right hide-on-med-and-down">
			    	<li> </li>
			    	
		                 <li></li>
			      <li><a href="index.php?action=admin"><i class="fas fa-users"></i>&nbsp;USUARIOS</a></li>
			      <li><a href="index.php?action=admin-programas"><i class="fas fa-tasks"></i> PROGRAMAS</a></li>
			      		      
			      <!-- Dropdown Trigger -->
			      <li><a class="dropdown-button " href="#!" data-activates="dropdown1"><i class="fas fa-cog"></i> OPCIONES <i class="fas fa-chevron-down"></i></a></li>
			    </ul>
			  </div>
			</nav>

  </div>

</header>