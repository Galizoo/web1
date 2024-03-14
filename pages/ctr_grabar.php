<?php
    // print_r($_POST);
    // Verificar que se ha enviado los datos del formulario
    // usando el botón Grabar Producto
    if (isset($_POST["btn_grabar"])) {
        require("./class/crud_alumnos.php");
        require("./class/Alumnos.php");

        $cp = new CrudAlumnos();
        $alumnos = new Alumno();

        $alumnos->cod_alumno = $_POST["txt_codalumno"];
        $alumnos->nombres = $_POST["txt_nombres"];
        $alumnos->apellidos = $_POST["txt_apellidos"];
        $alumnos->dni = $_POST["txt_dni"];
        $alumnos->fecha_nacimiento = $_POST["txt_fecha"];
        $alumnos->alumno_cod_carrera = $_POST["cbo_carrera"];
        $alumnos->alumno_cod_sede = $_POST["cbo_sede"];


        $accion = $_POST["txt_accion"];

        if ($accion == "r") {
            $cp->RegistrarAlumnos($alumnos);
        } else if ($accion == "e") {
            $cp->EditarAlumnos($alumnos);
        }

        header("location: listar_alumnos.php");
    }