<?php
  ob_start();
  $mvc = new MvcController();
?>
<div class="container">
	  <h3 class=" center">NUEVO PROGRAMA</h3>
	<div class="row">
		<div class="col s12 offset-m1 m10 offset-l2 l8">
			<div class="card-panel grey lighten-5 hoverable">
	            <form method="post"  action="controller/SERVICES/programa/serv_crearPrograma.php" role="form">
	            	<div class="row">
		            	
		            	<div class="input-field col s12 m6">
		            		<input type="text" name="nombre" id="nombre" required>
		            		<label for="nombre">Nombre</label>
		            	</div>
		            	
		            	<div class="input-field col s12 m6">
		            		<select name="facultad_id" id="facultad_id" required>
		            			<option value="" disabled selected>Seleccione una facultad</option>
		            			<?php
				                    $mvc -> selectFacultadController();
				                ?>
		            		</select>
		            	</div>

	            	</div>
	            	<div class="center">
	            		<button class="btn waves-effect waves-light blue" name="submit">Guardar</button>
	            	</div>
				</form>

	          	<?php
	            	if(isset($_GET["action"])){
	            	  	if($_GET["action"] == "ok"){
		    	            echo '<br><div class="card-panel green">Registro exitoso!!</div>' ;
		              	}
		            }
	          	?>
				
			</div>
		</div>
	</div>
</div>
