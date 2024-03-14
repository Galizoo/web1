<!DOCTYPE html>
<html lang="es">
    <?php
        $titulo = "Editar Curso";
        $ruta = "..";

        include("./includes/cabecera.php");
    ?>
    <body>
        <?php
            if (isset($_GET["codcurso"])) {
                $codcurso = $_GET["codcurso"];

                require("./class/crud_curso.php");
                $cp = new CrudCurso();

                $rs_curso = $cp->BuscarCursosPorCodigo($codcurso);
                

                if (!empty($rs_curso)) {
                    echo "entro";
                    //require("./class/crud_marca.php");
                    //require("./class/crud_categoria.php");

                    //$cm = new CrudMarca();
                    //$cc = new CrudCategoria();

                    //$rs_mar = $cm->getMarca();
                    //$rs_cat = $cc->getCategoria();
                } else {
                    header("location: listar_curso.php");
                }
            } else {
                header("location: listar_alumno.php");
            }
        ?>
        <div>
            <?php
                include("./includes/menu.php");
            ?>
            <div class="content"> 
            <section>
                <div class="centrar">
                    <a href="listar_curso.php" class="btn3">Regresar</a>
                </div>
                <article>
                    <form name="frm_editar_prod" id="frm_editar_prod" action="ctr_grabar2.php" method="post">
                        <input type="hidden" name="txt_accion" id="txt_accion" value="e" />
                        <table>
                            <tr>
                                <td>Código</td>
                                <td><input type="text" name="txt_codcurso" id="txt_codcurso" maxlength="5" class="txt" readonly value="<?=$rs_curso["Cod_curso"]?>" /></td>
                            </tr>
                            <tr>
                                <td>Curso</td>
                                <td><input type="text" name="txt_curso" id="txt_curso" maxlength="40" class="txt" value="<?=$rs_curso["Curso"]?>" /></td>
                            </tr>
                            <tr>
                                <td>Meses</td>
                                <td><input type="number" name="txt_duracion"  id="txt_duracion" maxlength="1" min="1" max="9" class="txt" value="<?=$rs_curso["Duración"]?>" /></td>
                            </tr>
                            <tr>
                                <td>Costo</td>
                                <td><input type="number" name="txt_cst" id="txt_cst" maxlength="8" class="txt" value="<?=$rs_curso["Costo"]?>" /></td>
                            </tr>
                            <tr>
                                <td>Creditos</td>
                                <td><input type="number" name="txt_cre" id="txt_cre" min="1" max="5" class="txt" value="<?=$rs_curso["Creditos"]?>" /></td>
                            </tr>
                            <tr>
                                <td>Profesor</td>
                                <td><input type="text" name="txt_pro" id="txt_pro" maxlength="8" class="txt"  readonly value="<?=$rs_curso["Curso_cod_profesor"]?>" /></td>
                            </tr>
                            <tr>
                                <td>Carrera</td>
                                <td><input type="text" name="txt_car" id="txt_car" maxlength="8" class="txt"  readonly value="<?=$rs_curso["Curso_cod_carrera"]?>" /></td>
                            </tr>
                            </tr>
                            <tr>
                                <td colspan="2" class="centrar">
                                    <button type="submit" name="btn_grabar2" id="btn_grabar2" class="btn3">GRABAR CAMBIOS</button>
                                </td>
                            </tr>
                        </table>

                    </form>
                </article>
            </section>
                                        </div> 
            <?php
                include("./includes/pie.php");
            ?>
        </div>
    </body>
</html>
