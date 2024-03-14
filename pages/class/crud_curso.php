<?php
    require("conexion.php");

    class CrudCurso extends Conexion {

        // Listar ALUMNOS
        public function ListarCursos() {
            $arr_prod = null;

            $cn = $this->Conectar();

            $query = "";
            //$query .= "select * ";
            //$query .= "from tb_alumnos ";
            //$query .= "order by cod_alumno asc;";


            $query .= "select a.Cod_curso, a.curso, a.Costo,a.Duración,a.Creditos, c.Nombre_completo,s.Carrera ";
            $query .= "from tb_cursos a inner join tb_profesores c ON a.Curso_cod_profesor = c.Cod_profesor "; 
            $query .= "inner join tb_carreras s on a.Curso_cod_carrera = s.Cod_carrera order by Cod_curso asc;";



            $sentencia = $cn->prepare($query);
            $sentencia->execute();
            echo "<table class='tabla1'>";
            echo "<tr><th>CÓDIGO</th><th>CURSO</th><th style='padding-left: 10px;'>COSTO</th><th style='padding-left: 10px;'>MESES</th><th style='padding-left: 10px;'>CRÉDITOS</th><th>PROFESOR</th><th>CARRERA</th><th colspan='3'>ACCIÓN</th></tr>";

            while ($arr_prod = $sentencia->fetch(PDO::FETCH_ASSOC)) {
                echo "<tr>";
                echo "<td class='codcurso'>".$arr_prod["Cod_curso"]."</td>";
                echo "<td class='curso'>".$arr_prod["curso"]."</td>";
                echo "<td>".$arr_prod["Costo"]."</td>";
                echo "<td>".$arr_prod["Duración"]."</td>";
                echo "<td>".$arr_prod["Creditos"]."</td>";
                echo "<td>".$arr_prod["Nombre_completo"]."</td>";
                echo "<td>".$arr_prod["Carrera"]."</td>";
                echo "<td><a href='#' class='btn4'>Editar</a></td>";
                echo "<td><a href='#' class='btn5'>Borrar</a></td>";
                echo "</tr>";
            }
            // tr (Filas) , td (Columnas), th (Campo de encabezado)

            echo "</table>";

            $cn = null;
        }

        // Buscar producto por código
        public function BuscarCursosPorCodigo($codcurso) {
            $curso = null;

            $cn = $this->Conectar();

            $cad_sql = "";
            $cad_sql .= "select * ";
            $cad_sql .= "from tb_cursos ";
            $cad_sql .= "where Cod_curso = :codcurso" ;
            
            

            $snt = $cn->prepare($cad_sql);

            $snt->bindParam(":codcurso", $codcurso, PDO::PARAM_STR, 5);

            $snt->execute();

            $curso = $snt->fetch(PDO::FETCH_ASSOC);

            $cn = null;

            return $curso;
        }

        // Registrar curso
        public function RegistrarCursos(Curso $cursos) {
            try {
                $cn = $this->Conectar();
                //NOTA: EL orden de insercion de datos debe ser la misma que el orden de la tabla
                $cad_sql = "";
                $cad_sql .= "insert into tb_cursos ";
                $cad_sql .= "values (:cod_curso, :curso, :duracion, :costo, :creditos, :curso_cod_carrera, :curso_cod_profesor);";

                $snt = $cn->prepare($cad_sql);
                header("location: listar_alumnos.php");

                // Agregar los valores a cada parámetro
                $snt->bindParam(":cod_curso", $cursos->cod_curso, PDO::PARAM_STR, 5);
                $snt->bindParam(":curso", $cursos->curso, PDO::PARAM_STR, 15);
                $snt->bindParam(":duracion", $cursos->duracion, PDO::PARAM_INT, 15);
                $snt->bindParam(":costo", $cursos->costo, PDO::PARAM_INT,8);
                $snt->bindParam(":creditos", $cursos->creditos, PDO::PARAM_INT, 8);
                $snt->bindParam(":curso_cod_profesor", $cursos->curso_cod_profesor, PDO::PARAM_STR, 5);
                $snt->bindParam(":curso_cod_carrera", $cursos->curso_cod_carrera, PDO::PARAM_STR, 5);

                $snt->execute();

                $cn = null;
            } catch (PDOException $e) {
                echo $e->getMessage();
            }
        }

        // Editar ALUMNOS
        public function EditarCursos(Curso $cursos) {
            try {
                $cn = $this->Conectar();

                $cad_sql = "";
                $cad_sql .= "update tb_cursos ";
                $cad_sql .= "set Curso = :curso, Duración = :duracion, ";
                $cad_sql .= "Costo = :costo, Creditos = :creditos, ";
                $cad_sql .= "Curso_cod_carrera = :curso_cod_carrera, ";
                $cad_sql .= "Curso_cod_profesor = :curso_cod_profesor ";
                $cad_sql .= "where Cod_curso = :cod_curso;";


                

                $snt = $cn->prepare($cad_sql);

                // Agregar los valores a cada parámetro
                $snt->bindParam(":cod_curso", $cursos->cod_curso, PDO::PARAM_STR, 5);
                $snt->bindParam(":curso", $cursos->curso, PDO::PARAM_STR, 15);
                $snt->bindParam(":duracion", $cursos->duracion, PDO::PARAM_STR, 15);
                $snt->bindParam(":costo", $cursos->costo, PDO::PARAM_STR,8);
                $snt->bindParam(":creditos", $cursos->creditos, PDO::PARAM_STR, 8);
                $snt->bindParam(":curso_cod_profesor", $cursos->curso_cod_profesor, PDO::PARAM_STR, 5);
                $snt->bindParam(":curso_cod_carrera", $cursos->curso_cod_carrera, PDO::PARAM_STR, 5);


                $snt->execute();

                $cn = null;
            } catch (PDOException $e) {
                echo $e->getMessage();
            }
        }

        // Borrar ALUMNOS
        public function BorrarCursos($codcurso) {
            try {
                $cn = $this->Conectar();

                $cad_sql = "";
                $cad_sql .= "delete from tb_cursos ";
                $cad_sql .= "WHERE Cod_curso = :cod_curso;";


                $snt = $cn->prepare($cad_sql);

                // Agregar los valores a cada parámetro
                $snt->bindParam(":cod_curso", $codcurso, PDO::PARAM_STR, 5);

                $snt->execute();

                $cn = null;
            } catch (PDOException $e) {
                echo $e->getMessage();
            }
        }
    }