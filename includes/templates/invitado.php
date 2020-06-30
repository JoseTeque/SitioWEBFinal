 <?php
      try {

        require_once('includes/funciones/db_conexion.php');
        $sql = " SELECT * FROM invitados ";
        $resultado = $conn->query($sql);
      } catch (\Exception $e) {
        echo $e->getMessage();
      }
 ?>
 <section class="seccion contenedor contenedor-seccion">
           <h2>Invitados</h2>
           <div class="invitados">
              <?php
                  while($invitados = $resultado->fetch_assoc()){ ?>
                  <div class="invitado">
                      <a class="invitado-info" href="#invitado<?php echo $invitados['id_invitado']; ?>">
                            <img src="./img/<?php echo $invitados['url_imagen']?>" alt="Imagen Invitado">
                            <p><?php echo $invitados['nombre_invitado'] . " ". $invitados['apellido_invitado']  ?></p>
                      </a>
                   </div>
                   <div style="display:none;">
                      <div class="invitado-info" id="invitado<?php echo $invitados['id_invitado']; ?>">
                          <h2><?php echo $invitados['nombre_invitado'] . " ". $invitados['apellido_invitado']  ?></h2>
                          <img src="./img/<?php echo $invitados['url_imagen']?>" alt="Imagen Invitado">
                          <p><?php echo $invitados['descripcion']; ?></p>
                      </div>
                   </div>
              <?php } //while de fetch_assoc ?>
            </div>
  </section>
  <?php
      $conn->close();
    ?>

