<?php
    require("conexion.php");

    class CrudAlumnos extends Conexion {

        // Listar ALUMNOS
        public function ListarAlumnos() {
            $arr_prod = null;

            $cn = $this->Conectar();

            $query = "";


            $query .= "select a.Cod_alumno, a.Nombres, a.Apellidos, c.Carrera,s.Nombre_sede ";
            $query .= "from tb_alumnos a inner join tb_carreras c ON a.alumno_cod_carrera = c.Cod_carrera "; 
            $query .= "inner join tb_sedes s on a.Alumno_cod_sede = s.Cod_sede order by Cod_alumno asc;";

            $sentencia = $cn->prepare($query);
            $sentencia->execute();

            echo "<table class='tabla1'>";
            echo "<tr><th>CÓDIGO</th><th>ALUMNO</th><th>APELLIDOS</th><th>CARRERA</th><th>SEDE</th><th colspan='3'>ACCIÓN</th></tr>";

            while ($arr_prod = $sentencia->fetch(PDO::FETCH_ASSOC)) {
                echo "<tr>";
                echo "<td class='codalum'>".$arr_prod["Cod_alumno"]."</td>";
                echo "<td class='nombre'>".$arr_prod["Nombres"]."</td>";
                echo "<td>".$arr_prod["Apellidos"]."</td>";
                echo "<td>".$arr_prod["Carrera"]."</td>";
                echo "<td>".$arr_prod["Nombre_sede"]."</td>";
                echo "<td><a href='#' class='btn1'>Editar</a></td>";
                echo "<td><a href='#' class='btn2'>Borrar</a></td>";
                echo "</tr>";
            }
            // tr (Filas) , td (Columnas), th (Campo de encabezado)

            echo "</table>";

            $cn = null;
        }

        // Buscar producto por código
        public function BuscarAlumnosPorCodigo($codalum) {
            $prod = null;

            $cn = $this->Conectar();

            $cad_sql = "";
            $cad_sql .= "select * ";
            $cad_sql .= "from tb_alumnos ";
            $cad_sql .= "where Cod_alumno = :codalum;";

            $snt = $cn->prepare($cad_sql);

            $snt->bindParam(":codalum", $codalum, PDO::PARAM_STR, 5);

            $snt->execute();

            $prod = $snt->fetch(PDO::FETCH_ASSOC);

            $cn = null;

            return $prod;
        }

        // Registrar ALUMNOS
        public function RegistrarAlumnos(Alumno $alumnos) {
            try {
                $cn = $this->Conectar();

                $cad_sql = "";
                $cad_sql .= "insert into tb_alumnos ";
                $cad_sql .= "values (:cod_alumno, :nombres, :apellidos, :dni, :fecha_nacimiento, :alumno_cod_carrera, :alumno_cod_sede);";

                $snt = $cn->prepare($cad_sql);
                

                // Agregar los valores a cada parámetro
                $snt->bindParam(":cod_alumno", $alumnos->cod_alumno, PDO::PARAM_STR, 5);
                $snt->bindParam(":nombres", $alumnos->nombres, PDO::PARAM_STR, 20);
                $snt->bindParam(":apellidos", $alumnos->apellidos, PDO::PARAM_STR, 30);
                $snt->bindParam(":dni", $alumnos->dni, PDO::PARAM_STR,8);
                $snt->bindParam(":fecha_nacimiento", $alumnos->fecha_nacimiento, PDO::PARAM_STR, 8);
                $snt->bindParam(":alumno_cod_carrera", $alumnos->alumno_cod_carrera, PDO::PARAM_STR, 5);
                $snt->bindParam(":alumno_cod_sede", $alumnos->alumno_cod_sede, PDO::PARAM_STR, 5);

                $snt->execute();

                $cn = null;
            } catch (PDOException $e) {
                echo $e->getMessage();
            }
        }

        // Editar ALUMNOS
        public function EditarAlumnos(Alumno $alumnos) {
            try {
                $cn = $this->Conectar();

                $cad_sql = "";
                $cad_sql .= "update tb_alumnos ";
                $cad_sql .= "set Nombres = :nombres, Apellidos = :apellidos, ";
                $cad_sql .= "Dni = :dni, Fecha_nacimiento = :fecha, Alumno_cod_sede = :alumno_cod_sede, ";
                $cad_sql .= "alumno_cod_carrera = :alumno_codigo_carrera  ";
                $cad_sql .= "where Cod_alumno = :cod_alumno;";


                

                $snt = $cn->prepare($cad_sql);

                // Agregar los valores a cada parámetro
                $snt->bindParam(":cod_alumno", $alumnos->cod_alumno, PDO::PARAM_STR, 5);
                $snt->bindParam(":nombres", $alumnos->nombres, PDO::PARAM_STR, 15);
                $snt->bindParam(":apellidos", $alumnos->apellidos, PDO::PARAM_STR, 15);
                $snt->bindParam(":dni", $alumnos->dni, PDO::PARAM_STR, 8);
                $snt->bindParam(":fecha", $alumnos->fecha_nacimiento, PDO::PARAM_STR, 8);
                $snt->bindParam(":alumno_codigo_carrera", $alumnos->alumno_cod_carrera, PDO::PARAM_STR, 5);
                $snt->bindParam(":alumno_cod_sede", $alumnos->alumno_cod_sede, PDO::PARAM_STR, 5);

                $snt->execute();

                $cn = null;
            } catch (PDOException $e) {
                echo $e->getMessage();
            }
        }

        // Borrar ALUMNOS
        public function BorrarAlumnos($codalum) {
            try {
                $cn = $this->Conectar();

                $cad_sql = "";
                $cad_sql .= "delete from tb_alumnos ";
                $cad_sql .= "where Cod_alumno = :cod_alumno;";

                $snt = $cn->prepare($cad_sql);

                // Agregar los valores a cada parámetro
                $snt->bindParam(":cod_alumno", $codalum, PDO::PARAM_STR, 5);

                $snt->execute();

                $cn = null;
            } catch (PDOException $e) {
                echo $e->getMessage();
            }
        }

        public function ConsultarAlumnoPorCodigo($codalum) {
            $prod = null;

            $cn = $this->Conectar();

            $cad_sql = "";
            //$cad_sql .= "select * ";
            //$cad_sql .= "from tb_producto ";
            //$cad_sql .= "where codigo_producto = :codprod;";

            $cad_sql .= "select ";
            $cad_sql .= "tb1.Nombres, tb1.Apellidos, tb1.Fecha_nacimiento, tb1.Dni,tb3.Nombre_sede, tb2.Carrera from tb_alumnos tb1 inner join tb_carreras tb2 ";
            $cad_sql .= "on(tb1.Alumno_cod_carrera = tb2.Cod_carrera) inner join tb_sedes tb3 ";
            $cad_sql .= "on(tb1.Alumno_cod_sede = tb3.Cod_sede) ";
            $cad_sql .= "where tb1.Cod_alumno = :codalum;";

            $snt = $cn->prepare($cad_sql);

            $snt->bindParam(":codalum", $codalum, PDO::PARAM_STR, 5);

            $snt->execute();
            $num_reg = $snt->rowCount();
            if($num_reg > 0){

                $alum["datos"][] = $snt->fetch(PDO::FETCH_ASSOC);
            } else{
                $alum["datos"]["Error"] = "No hay datos";
            }
            $cn = null;
            //Conversion a formao Json
            echo json_encode($alum, JSON_FORCE_OBJECT);
            
        }
    }