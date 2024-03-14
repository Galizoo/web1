<?php
    if(isset($_GET["codcurso"]))//si existe codprod
    $codcurso = $_GET["codcurso"];//capturalo

    require("./class/crud_curso.php");

    $cp = new CrudCurso();//creamos la instancia 

    $cp->BorrarCursos($codcurso); //borra lo que deseamos


    header("location: listar_curso.php");//llamamos nuevamente al listar producto