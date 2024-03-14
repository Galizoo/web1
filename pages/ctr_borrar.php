<?php
    if(isset($_GET["codalum"]))//si existe codprod
    $codalum = $_GET["codalum"];//capturalo

    require("./class/crud_alumnos.php");

    $cp = new CrudAlumnos();//creamos la instancia 

    $cp->BorrarAlumnos($codalum); //borra lo que deseamos


    header("location: listar_alumnos.php");//llamamos nuevamente al listar producto