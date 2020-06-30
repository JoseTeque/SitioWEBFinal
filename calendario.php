<?php include_once './includes/templates/header.php' ?>


  <section class="seccion contenedor">
    <h2>Calendario de Eventos</h2>

    <?php
      try {

        require_once('includes/funciones/db_conexion.php');
        $sql = " SELECT id_evento,
        nombre_evento,
        fecha_evento,
        hora_evento,
        cat_evento,
        icono,
        nombre_invitado,
        apellido_invitado
        FROM evento  INNER JOIN categoria_evento
        on evento.id_cat_evento=categoria_evento.id_categoria
        INNER JOIN invitados  on invitados.id_invitado=evento.id_invitado ORDER BY id_evento ";
        $resultado = $conn->query($sql);
      } catch (\Exception $e) {
        echo $e->getMessage();
      }

      ?>
      <div class="calendario">

          <?php
            $calendario = array();
            while($eventos = $resultado->fetch_assoc()){

              $fecha = $eventos['fecha_evento'];

              $evento = array(
                'titulo' => $eventos['nombre_evento'],
                'fecha'=> $eventos['fecha_evento'],
                'hora'=> $eventos['hora_evento'],
                'categoria'=> $eventos['cat_evento'],
                'icono' => 'fa'." ".$eventos['icono'],
                'invitado'=> $eventos['nombre_invitado'] . " " .$eventos['apellido_invitado']
              );

              $calendario[$fecha][] = $evento; //AGRUPA LA INFORMACION POR FECHA DE EVENTO

              ?>

           <?php } //while de fetch_assoc ?>

           <?php
              // IMPRIME TODOS LOS EVENTOS
              foreach($calendario as $dia => $lista_eventos){ ?>
                <h3>
                  <i class="fa fa-calendar iconos"></i>
                  <?php
                    setlocale(LC_TIME, 'spanish');
                    echo strftime("%A, %d de %B del %Y", strtotime($dia));
                  ?>
                </h3>
                <div class="calendario-contenedor">
                  <?php foreach($lista_eventos as $eventos){?>
                    <div class="dia">
                      <p class="titulo"><?php echo $eventos['titulo'] ?></p>
                      <p class="hora">
                        <i class="fa fa-clock iconos" aria-hidden="true"></i>
                        <?php echo $eventos['fecha'] ." ".$eventos['hora'] ?>
                      </p>
                      <p class="categoria">
                        <i class="<?php echo $eventos['icono'];?> iconos" aria-hidden="true"></i>
                          <?php echo $eventos['categoria'] ?>
                      </p>
                      <p class="invitado">
                        <i class="fa fa-user iconos" aria-hidden="true"></i>
                          <?php echo $eventos['invitado']?>
                      </p>
                    </div>
                  <?php } //FIN FOREACH EVENTOS ?>
                </div>
              <?php } // FIN FOREACH DIA?>

          <?php
            $conn->close();
          ?>

      </div>
  </section>

<?php include_once './includes/templates/footer.php' ?>

