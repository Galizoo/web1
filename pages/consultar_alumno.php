<!DOCTYPE html>
<html lang="es">
    <?php
        $titulo = "Consultar Alumno";
        $ruta = "..";

        include("./includes/cabecera.php");
    ?>
    <body>
        <?php
           

        ?>
        <?php
                include("./includes/menu.php");
            ?>
        <div class="content">
            
            <section>
                <article>
                    <form name="frm_consultar_alum" id="frm_consultar_alum" method="post">
                    <table>
                            <tr>
                                <td>Código a Consultar</td>
                                <td><input type="text" name="txt_codalum" id="txt_codalum" class="txt"/></td>
                            </tr>
                            <tr>
                                <td>Nombres</td>
                                <td><input type="text" name="txt_nombres" id="txt_nombres" class="txt" readonly></td>
                            </tr>
                            <tr>
                                <td>Apellidos</td>
                                <td><input type="text" name="txt_apellidos" id="txt_apellidos" min="1" class="txt" readonly/></td>
                            </tr>
                            <tr>
                                <td>Fecha de Nacimiento</td>
                                <td><input type="text" name="txt_fecha" id="txt_fecha" class="txt" readonly/></td>
                            </tr>
                            <tr>
                                <td>DNI</td>
                                <td><input type="text" name="txt_dni" id="txt_dni" class="txt" readonly/></td>
                            </tr>
                            <tr>
                                <td>Carrera</td>

                                <td><input type="text" name="txt_carrera" id="txt_carrera" class="txt" readonly/></td>
                                
                            </tr>
                            <tr>
                                <td>Sede</td>
                                <td><input type="text" name="txt_sede" id="txt_sede" class="txt" readonly/></td>
                            </tr>
                            <tr>
                                <td colspan="2" class="centrar">
                                    <a href="consultar_alumno.php" id="btn_consultar" class="btn3">Nueva Consulta</a>    
                                </td>
                            </tr>
                        </table>
                    </form>
                </article>
            </section>
        </div>
        <?php
  include("../pages/includes/pie.php");
?>
    </body>
</html>
