<?php
  ob_start();
  
?>

<div class="container-fluid">
  <h3 class=" center">EDITAR POGRAMA</h3>
  <div class="container">
    <div class="row">
      <div class="col s12 offset-m1 m10 offset-l2 l8">
        <div class="card-panel grey lighten-5 hoverable">
            <form method="post" action="controller/SERVICES/programa/serv_actualizarPrograma.php" role="form">
               <div class="row">
                   <?php
                      $mvc = new MvcController();
                      $mvc -> updateProgramaController();
                    ?>
                    <div class="input-field col s12 m6">
                        <select name="facultad_id" id="facultad_id" required>
                            <?php
                                $mvc -> selectFacultadSeleccionado();
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