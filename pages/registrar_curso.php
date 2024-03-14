<!DOCTYPE html>
<html lang="es">
<?php
$titulo = "registro";
$ruta = "..";
include("../pages/includes/cabecera.php");

?>    

<body>
  
        
    <?php
        include("../pages/includes/menu.php");
        require("../pages/class/crud_curso.php");
        require("../pages/class/crud_carreras.php");
        require("../pages/class/carreras.php");
        require("../pages/class/crud_profesores.php");
        require("../pages/class/profesores.php");
        


        $cc = new CrudCurso();
        $cr = new CrudCarreras();
        $sai = $cr->getCarreras();
       

        $cp = new CrudProfesores();
        $cpro = $cp->getProfesores();


        
    ?>
    <div class="content">
      <section>
        <article>
          <div class="form_registro">
          <form name="frm_registrar_curso" id="frm_registrar_curso" action="ctr_grabar2.php" method="post">
              <input type="hidden" name="txt_accion" id="txt_accion" value="r"/>

              <h2>REGISTRO</h2>
              <input type="text" name="txt_codcurso" id="txt_codcurso" maxlength="5" class="txt" placeholder="Código" >
              <input type="text" name="txt_curso" id="txt_curso" maxlength="40" class="txt" placeholder="Curso">
              <input type="number" name="txt_duracion"  id="txt_duracion" maxlength="1" min="1" max="9" class="txt" placeholder="Meses">
              <input type="number"  name="txt_cst" id="txt_cst" maxlength="8" class="txt" placeholder="Costo">
              <input type="number" name="txt_cre" id="txt_cre" min="1" max="5" class="txt" placeholder="Créditos">
              <select type="text" name="txt_car" id="txt_car" maxlength="8" class="txt">
                <option value=>Seleccione carrera</option>
                    <?php
                     foreach($sai as $carrera) {
                  ?>
                   <option value="<?=$carrera["Cod_carrera"]?>"><?=$carrera["Carrera"]?></option>
                     <?php
                    }
                    ?>
            </select>
              <select type="text" name="txt_pro" id="txt_pro" maxlength="8" class="txt">
                                        <option value="">Seleccione Profesor</option>
                                        <?php
                                            foreach($cpro as $profesores) {
                                        ?>
                                        <option value="<?=$profesores["Cod_profesor"]?>"><?=$profesores["Nombre_completo"]?></option>
                                        <?php
                                            }
                                        ?>
                                    </select>
                                    <tr>
                                <td colspan="2" class="centrar">
                                    <button type="submit" name="btn_grabar2" id="btn_grabar2" class="btn3">GRABAR CAMBIOS</button>
                                </td>
                            </tr>
              

              

            </form>
          </div>

        </article>
      </section>

    </div>

</body>
</html>
