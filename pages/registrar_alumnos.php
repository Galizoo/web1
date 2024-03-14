<!DOCTYPE html>
<html lang="es">
<?php
$titulo = "registro";
$ruta = "..";
include("../pages/includes/cabecera.php");
?>    
<body>
    <?php
    require("./class/conexion.php");
        include("../pages/includes/menu.php");
        require("./class/crud_carreras.php");
        require("./class/crud_sedes.php");
        require("./class/carreras.php");
        require("./class/sedes.php");
        $cp = new Carreras();
        $cm = new CrudCarreras();
        $cs = new Sedes();
        $co = new CrudSedes();
        $rs_mar = $cm->getCarreras();
        $rs_sede = $co->getSedes();
    ?>
    <div class="content">
      <section>
        <article>
          <div class="form_registro">
            <form name="frm_registrar_prod" id="frm_registrar_prod" action="ctr_grabar.php" method="post">
            <input type="hidden" name="txt_accion" id="txt_accion" value="r" />
              <h2>REGISTRO</h1>
              <input type="text" name="txt_codalumno" id="txt_codalumno" maxlength="5" class="txt" placeholder="Código"/>
              <input type="text" name="txt_nombres" id="txt_nombres" maxlength="20" class="txt" placeholder="Nombres"/>
              <input type="text" name="txt_apellidos" id="txt_apellidos" maxlength="40" class="txt" placeholder="Apellidos"/>
              <input type="text" name="txt_dni" id="txt_dni" maxlength="8" class="txt" placeholder="Dni"/>
              <select name="cbo_carrera" id="cbo_carrera" class="cbo">
              <option value="">Seleccione una Carrera</option>
                 <?php
                 foreach($rs_mar as $carreras) {
                    ?>
                <option value="<?=$carreras["Cod_carrera"]?>"><?=$carreras["Carrera"]?></option>
                <?php
                    }
                  ?>
              </select>
              <select name="cbo_sede" id="cbo_sede" class="cbo">
              <option value="">Seleccione una Sede</option>
                 <?php
                 foreach($rs_sede as $sedes) {
                    ?>
                <option value="<?=$sedes["Cod_sede"]?>"><?=$sedes["Nombre_sede"]?></option>
                <?php
                    }
                  ?>
              </select>
              <label for="fechaNacimiento">Fecha de Nacimiento</label>
              <input type="date" id="txt_fecha" name="txt_fecha" class="date">
              <button type="submit" name="btn_grabar" id="btn_grabar" class="btn3">REGISTRAR ALUMNO</button>
            </form>
          </div>
        </article>
      </section>
    </div>
    <?php
  include("../pages/includes/pie.php");
?>
</body>
</html>

