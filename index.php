<?php include_once './includes/templates/header.php' ?>
  <!--===============================
    SECCION  LA MEJOR CONFERENCIA
     =============================-->
     <section class="seccion contenedor">
       <h2>La Mejor Conferencia de Diseño Web en Español</h2>
       <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Corrupti aut sapiente reiciendis mollitia quam ea qui vero explicabo. Error placeat culpa quibusdam deserunt obcaecati, dolorum dolores sint veniam recusandae reprehenderit!</p>
     </section>

     <!--===============================
        SECCION PROGRAMA
        =============================-->
    <section class="programa">
      <div class="contenedor-video">
        <video autoplay loop poster="./img/bg-talleres.jpg">
          <source src="./video/video.mp4" type="video/mp4">
          <source src="./video/video.webm" type="video/webm">
          <source src="./video/video.ogv" type="video/ogg">
        </video>
      </div> <!--Contenedor Video-->
      <div class="contenido-programa">
        <div class="contenedor">
          <div class="programa-evento">
            <h2>Programa del Evento</h2>

                <?php
                try {

                  require_once('includes/funciones/db_conexion.php');
                  $sql = " SELECT *  FROM  categoria_evento";
                  $resultadoCat = $conn->query($sql);
                } catch (\Exception $e) {
                  echo $e->getMessage();
                }
                ?>

            <nav class="menu-programa">
              <?php while($cat = $resultadoCat->fetch_assoc()) {?>
                <a href="#<?php echo strtolower($cat['cat_evento']) ?>"><i class="fas <?php echo $cat['icono'] ?> icono-programa"></i><?php echo $cat['cat_evento'] ?></a>
              <?php } ?>
            </nav>

            <?php
                try {
                  require_once('includes/funciones/db_conexion.php');
                  $sql = " SELECT id_evento, nombre_evento, fecha_evento, hora_evento, cat_evento, icono, nombre_invitado, apellido_invitado FROM evento  INNER JOIN categoria_evento on evento.id_cat_evento=categoria_evento.id_categoria INNER JOIN invitados  on invitados.id_invitado=evento.id_invitado WHERE evento.id_cat_evento = 1  ORDER BY id_evento  LIMIT 2;
                  SELECT id_evento, nombre_evento, fecha_evento, hora_evento, cat_evento, icono, nombre_invitado, apellido_invitado FROM evento  INNER JOIN categoria_evento on evento.id_cat_evento=categoria_evento.id_categoria INNER JOIN invitados  on invitados.id_invitado=evento.id_invitado WHERE evento.id_cat_evento = 2  ORDER BY id_evento  LIMIT 2;
                  SELECT id_evento, nombre_evento, fecha_evento, hora_evento, cat_evento, icono, nombre_invitado, apellido_invitado FROM evento  INNER JOIN categoria_evento on evento.id_cat_evento=categoria_evento.id_categoria INNER JOIN invitados  on invitados.id_invitado=evento.id_invitado WHERE evento.id_cat_evento = 3  ORDER BY id_evento  LIMIT 2;";
                } catch (\Exception $e) {
                  echo $e->getMessage();
                }
                ?>
            <?php $conn->multi_query($sql); ?>
            <?php
              do {
                  $resultado = $conn->store_result();
                  $row = $resultado->fetch_all(MYSQLI_ASSOC); ?>

                <?php $i = 0; ?>
                <?php foreach($row as $evento): ?>
                <?php if($i % 2 == 0) { ?>
                  <div id="<?php echo strtolower($evento['cat_evento'])?>" class="info-cursos ocultar">
                <?php } ?>

                        <div class="detalle-evento">
                          <h3><?php echo utf8_decode($evento['nombre_evento']) ?></h3>
                          <p><i class="far fa-clock icono-programa"></i><?php echo $evento['hora_evento'] ?></p>
                          <p><i class="fas fa-calendar icono-programa"></i><?php echo $evento['fecha_evento'] ?> </p>
                          <p><i class="fas fa-user icono-programa"></i><?php echo $evento['nombre_invitado'] ." " . $evento['apellido_invitado']  ?> </p>
                        </div>

                  <?php if($i % 2 == 1) { ?>
                      <div class="ver-todos">
                        <a href="./calendario.php" class="button">Ver Todos</a>
                      </div><!--Ver todos-->

                  </div><!--conferencias-->
                  <?php } ?>

                    <?php $i++; ?>
                <?php endforeach; ?>
                <?php $resultado->free(); ?>

            <?php } while ($conn->more_results() && $conn->next_result()); ?>

          </div><!--Programa Evento-->
        </div><!--Contenedor-->
      </div><!--Contenido Programa-->
    </section>

    <!--===============================
      NUESTROS INVITADOS
       =============================-->
    <?php include_once './includes/templates/invitado.php' ?>

     <!--===============================
      CONTADOR
       =============================-->
    <div class="contador parallax">
      <div class="contenedor">
        <ul class="resumen-evento">
          <li><p class="numero">0</p>Invitados</li>
          <li><p class="numero">0</p>Talleres</li>
          <li><p class="numero">0</p>Días</li>
          <li><p class="numero">0</p>Conferencia</li>
        </ul>
      </div>
    </div>

     <!--===============================
      Lista de Precio
       =============================-->
    <section class="precios seccion">
      <h2>Precios</h2>
      <div class="contenedor">
        <ul class="lista-precios">
          <li>
            <div class="tabla-precio">
              <h3>Pase por dia (Viernes)</h3>
              <p class="numero">$30</p>
              <ul>
                <li>Bocadillos gratis</li>
                <li>Todas las conferencias</li>
                <li>Todos los talleres</li>
              </ul>
              <a href="#" class="button hollow">Comprar</a>
            </div><!--tabla precios-->
          </li>
          <li>
            <div class="tabla-precio">
              <h3>Todos los dias</h3>
              <p class="numero">$50</p>
              <ul>
                <li>Bocadillos gratis</li>
                <li>Todas las conferencias</li>
                <li>Todos los talleres</li>
              </ul>
              <a href="#" class="button">Comprar</a>
            </div><!--tabla precios-->
          </li>
          <li >
            <div class="tabla-precio">
              <h3>Pase por 2 dias (Viernes y Sabado)</h3>
              <p class="numero">$45</p>
              <ul>
                <li>Bocadillos gratis</li>
                <li>Todas las conferencias</li>
                <li>Todos los talleres</li>
              </ul>
              <a href="#" class="button hollow">Comprar</a>
            </div><!--tabla precios-->
          </li>
        </ul>
      </div>
    </section>

    <!--===============================
      MAPA
       =============================-->
    <div id="map" class="map"></div>

    <!--===============================
      TESTIMONIALES
    =============================-->
    <section class="seccion">
      <h2>Testimoniales</h2>
      <div class="testimoniales contenedor">
        <div class="testimonial">
          <blockquote class="contenido-testimonial">
            <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Reprehenderit voluptatibus molestiae qui eveniet maxime facilis dolor similique sed! Sapiente, laboriosam quidem quo non facere, officia adipisci nihil hic unde nostrum animi sint porro quas facilis,</p>
            <footer class="footer-testimoniales">
              <img src="./img/testimonial.jpg" alt="Imagen Testimonial">
              <cite>Jose Guerra Pinto
                <span>Diseñador WEB en @Freelance</span>
              </cite>
            </footer>
          </blockquote>
        </div>
        <div class="testimonial">
          <blockquote class="contenido-testimonial">
            <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Reprehenderit voluptatibus molestiae qui eveniet maxime facilis dolor similique sed! Sapiente, laboriosam quidem quo non facere, officia adipisci nihil hic unde nostrum animi sint porro quas facilis,</p>
            <footer class="footer-testimoniales" >
              <img src="./img/testimonial.jpg" alt="Imagen Testimonial">
              <cite>Jose Guerra Pinto <span>Diseñador WEB en @Freelance</span></cite>
            </footer>
          </blockquote>
        </div>
        <div class="testimonial">
          <blockquote class="contenido-testimonial">
            <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Reprehenderit voluptatibus molestiae qui eveniet maxime facilis dolor similique sed! Sapiente, laboriosam quidem quo non facere, officia adipisci nihil hic unde nostrum animi sint porro quas facilis,</p>
            <footer class="footer-testimoniales" >
              <img src="./img/testimonial.jpg" alt="Imagen Testimonial">
              <cite>Jose Guerra Pinto  <span>Diseñador WEB en @Freelance</span></cite>
            </footer>
          </blockquote>
        </div>
      </div>
    </section>

    <!--===============================
      NEWSLETTERS
       =============================-->
    <div class="newsletter parallax">
      <div class="contenido contenedor">
        <p>Registrate al newsletters:</p>
        <h3>gdlWebCamp</h3>
        <a href="#" class="button transparente">Registro</a>
      </div>
    </div>

    <!--===============================
    TIEMPO DE INICIO
    =============================-->
    <section class="seccion">
      <h2>Faltan</h2>
      <div class="cuenta-regresiva contenedor">
        <ul class="tiempo-inicio">
          <li><p id="dias" class="numero"></p>dias</li>
          <li><p id="horas" class="numero"></p>horas</li>
          <li><p id="minutos" class="numero"></p>minutos</li>
          <li><p id="segundos" class="numero"></p>segundos</li>
        </ul>
      </div>
    </section>

    <?php include_once './includes/templates/footer.php' ?>
