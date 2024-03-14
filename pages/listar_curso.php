<!DOCTYPE html>
<html lang="es">
<?php
$titulo = "Listado cursos";
$ruta = "..";
include("../pages/includes/cabecera.php");

?>    
<body>
        
    <?php
    
        include("../pages/includes/menu.php");

        require("../pages/class/crud_curso.php");
       
        $ca = new CrudCurso();
    ?>
    
    <div class="content">
      <section>
    
    <div class="reg">
      <button><a href="registrar_curso.php">Registrar Cursos</a></button>
      </div>
        <article>
              <?php
                $ca->ListarCursos();
              ?>
        </article>
      </section>

    </div>
    <?php
  include("../pages/includes/pie.php");
?>

</body>
</html>

