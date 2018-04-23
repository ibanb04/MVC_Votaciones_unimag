<?php
  ob_start();
  
?>

<div class="container-fluid">
  <h3 class=" center">EDITAR USUARIO</h3>
  <div class="container">
    <div class="row">
      <div class="col s12 offset-m1 m10 offset-l2 l8">
        <div class="card-panel grey lighten-5 hoverable">
            <form method="post" action="controller/SERVICES/serv_actualizarUsuario.php" role="form">
               <div class="row">
                   <?php
                      $mvc = new MvcController();
                      $mvc -> updateUsuarioController();
                    ?>
                    <div class="input-field col s12 m6">
                        <select name="rol_id" id="rol_id" required>
                            <?php
                                $mvc -> selectRolSeleccionado();
                            ?>
                        </select>
                    </div>
                    <div class="input-field col s12 m6">
                        <select name="mesa_id" id="mesa_id" required>
                            <?php
                                $mvc -> selectMesaSeleccionado();
                            ?>
                        </select>
                    </div>
                    <div class="input-field col s12 m6">
                        <select name="programa_id" id="programa_id" required>
                            <?php
                                $mvc -> selectProgramaSeleccionado();
                            ?>
                        </select>
                    </div>
               </div>
               
               <br>
                <center>
                    <button type="submit" name="submit" value="submit" class="btn blue waves-effect waves-light">enviar</button>
                </center>
            </form>
        </div>
        </div>
          </div>
            </div>
              </div>

<?php
  ob_end_flush();
?>