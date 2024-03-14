<?php
if (isset($_POST["btn_grabar2"])) {

    require("./class/crud_curso.php");
    require("./class/curso.php");
    require("./class/crud_profesores.php");
    require("./class/carreras.php");
    require("./class/crud_carreras.php");




    $cp = new CrudCurso();

    $cursos = new Curso();

    


    $cursos->cod_curso = $_POST["txt_codcurso"];

    $cursos->curso = $_POST["txt_curso"];

    $cursos->duración = $_POST["txt_duracion"];

    $cursos->costo = $_POST["txt_cst"];

    $cursos->creditos = $_POST["txt_cre"];

    $cursos->curso_cod_profesor = $_POST["txt_pro"];

    $cursos->curso_cod_carrera = $_POST["txt_car"];

  





    $accion = $_POST["txt_accion"];



    if ($accion == "r") {

        $cp->RegistrarCursos($cursos);

    } else if ($accion == "e") {

        $cp->EditarCursos($cursos);

    }



    header("location: listar_curso.php");

}