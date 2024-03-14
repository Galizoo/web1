<!DOCTYPE html>
<html lang="es">
<?php
$titulo = "Listado";
$ruta = "..";
include("../pages/includes/cabecera.php");
?>    
<body>
    <?php
        include("../pages/includes/menu.php");
        require("../pages/class/crud_alumnos.php");
        $ca = new CrudAlumnos();
    ?>
    <h1 class="content"></h1>
    <div class="cajas">
      
      <div class="caja1">
          <h3>Registrar</h3>
          <p>Pulsando el boton registrar se le redirigira a un formulario de registro</p>
      </div>
      <div class="caja2">
      <h3>Editar</h3>
          <p>Pulsando el boton editar , podra editar los datos de un alumno</p>
      </div>
      <div class="caja3">
      <h3>Borrar</h3>
          <p>Pulsando el boton Borrar, podra eliminar los datos de un alumno</p>
      </div>
    </div>
    <div>
      <div class="reg"> 
            <button><a href="registrar_alumnos.php">Registrar Alumnos</a></button>
            <button><a href="consultar_alumno.php">Consultar Alumnos</a></button>
            </div>
      <section>
        <article>
              <?php
                $ca->ListarAlumnos();
              ?>
        </article>
      </section>
    </div>
    <?php
  include("../pages/includes/pie.php");
?>
</body>
</html>

