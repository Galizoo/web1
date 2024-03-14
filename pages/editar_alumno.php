<!DOCTYPE html>
<html lang="es">
    <?php
        $titulo = "Editar Alumno";
        $ruta = "..";

        include("./includes/cabecera.php");
    ?>
    <body>
        <?php
            if (isset($_GET["codalum"])) {
                $codalum = $_GET["codalum"];

                require("./class/crud_alumnos.php");
                $cp = new CrudAlumnos();

                $rs_prod = $cp->BuscarAlumnosPorCodigo($codalum);

                if (!empty($rs_prod)) {
                    require("./class/crud_carreras.php");
                    require("./class/crud_sedes.php");
                    //require("./class/crud_categoria.php");

                    $cm = new CrudCarreras();
                    //$cc = new CrudCategoria();

                    $rs_mar = $cm->getCarreras();



                    

                  
                    $co = new CrudSedes();
                    $rs_sede = $co->getSedes();
                    //$rs_cat = $cc->getCategoria();
                } else {
                    header("location: listar_alumnos.php");
                }
            } else {
                header("location: listar_alumnos.php");
            }
        ?>
        <div>
            <?php
                include("./includes/menu.php");
            ?>
            <div class="entrada">
                <h1>Editar Datos de Alumno</h1>
               
                <p>En este apartado podras editar los datos de un Alumno en caso se haya cometido algun error al momento del registro</p>
                <p>Todos los datos son editables a excepcion del codigo de Alumno ya que este no puede cambiar y para el cambio</p>
                <p>debe notificarse a la seccion de informes y direccion en la sede central.</p>
            </div>
            <section>
                <div class="content">

                <article>
                    <form name="frm_editar_prod" id="frm_editar_prod" action="ctr_grabar.php" method="post">
                        <input type="hidden" name="txt_accion" id="txt_accion" value="e" />
                        <table>
                            <tr>
                                <td>Código</td>
                                <td><input type="text" name="txt_codalumno" id="txt_codalumno" maxlength="5" class="txt" readonly value="<?=$rs_prod["Cod_alumno"]?>" /></td>
                            </tr>
                            <tr>
                                <td>Nombres</td>
                                <td><input type="text" name="txt_nombres" id="txt_nombres" maxlength="40" class="txt" value="<?=$rs_prod["Nombres"]?>" /></td>
                            </tr>
                            <tr>
                                <td>Apellidos</td>
                                <td><input type="text" name="txt_apellidos" id="txt_apellidos" min="1" max="200" class="txt" value="<?=$rs_prod["Apellidos"]?>" /></td>
                            </tr>
                            <tr>
                                <td>Dni</td>
                                <td><input type="text" name="txt_dni" id="txt_dni" maxlength="8" class="txt" value="<?=$rs_prod["Dni"]?>" /></td>
                            </tr>
                            <tr>
                                <td>Fecha de Nacimiento</td>
                                <td><input type="date" name="txt_fecha" id="txt_fecha" maxlength="8" class="txt" value="<?=$rs_prod["Fecha_nacimiento"]?>" /></td>
                            </tr>
                            <tr>
                                <td>Carrera</td>
                                <td>
                                    <select name="cbo_carrera" id="cbo_carrera" class="cbo">
                                        <option value="">Seleccione una Carrera</option>
                                        <?php
                                            foreach($rs_mar as $carrera) {
                                        ?>
                                        <option value="<?=$carrera["Cod_carrera"]?>"><?=$carrera["Carrera"]?></option>
                                        <?php
                                            }
                                        ?>
                                
                                    </select>
                                </td>    
                            </tr>
                            <tr>
                                <td>Sedes</td>
                                <td>
                                    <select name="cbo_sede" id="cbo_sede" class="cbo">
                                        <option value="">Seleccione una Sede</option>
                                        <?php
                                            foreach($rs_sede as $sede) {
                                        ?>
                                        <option value="<?=$sede["Cod_sede"]?>"><?=$sede["Nombre_sede"]?></option>
                                        <?php
                                            }
                                        ?>
                                    </select>
                                </td>
                            </tr>
                                
                            
                            
                            <tr>
                                <td colspan="2" class="centrar">
                                    <button type="submit" name="btn_grabar" id="btn_grabar" class="btn3">GRABAR CAMBIOS</button>
                                </td>
                            </tr>
                        </table>

                    </form>
                </article>
            </section>
            </div>

        </div>
        <?php
  include("../pages/includes/pie.php");
?>
    </body>
</html>
