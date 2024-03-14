<?php
    class CrudSedes extends Conexion {

        public function getSedes() {
            $arr_cat = null;

            $cn = $this->Conectar();

            $cad_sql = "";
            $cad_sql .= "select * ";
            $cad_sql .= "from tb_Sedes ";
            $cad_sql .= "order by Cod_sede asc;";

            $sentencia = $cn->prepare($cad_sql);
            $sentencia->execute();

            $arr_cat = $sentencia->fetchAll(PDO::FETCH_ASSOC);

            $cn = null;

            return $arr_cat;
        }
    }