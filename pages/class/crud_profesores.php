<?php

    class CrudProfesores extends Conexion {

 

        public function getProfesores() {

            $arr_pro = null;

 

            $cn = $this->Conectar();

 

            $cad_sql = "";

            $cad_sql .= "select * ";

            $cad_sql .= "from tb_profesores ";

            $cad_sql .= "order by Cod_profesor asc;";

 

            $sentencia = $cn->prepare($cad_sql);

            $sentencia->execute();

 

            $arr_pro = $sentencia->fetchAll(PDO::FETCH_ASSOC);

 

            $cn = null;

 

            return $arr_pro;

        }

    }