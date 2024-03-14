<?php
    if(isset($_POST["codalum"])){//si existe codprod
    $codalum = $_POST["codalum"];//capturalo

    require("./class/crud_alumnos.php");

    $cp = new CrudAlumnos();//creamos la instancia 

    $cp->ConsultarAlumnoPorCodigo($codalum); //borra lo que deseamos

    }