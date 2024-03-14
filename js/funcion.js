
$(function() {

    $(".btn1").click(function(e) {
        let codalum = $(this).closest("tr").children(".codalum").text();
        location.href = "editar_alumno.php?codalum=" + codalum;
    });
    //BOTON BORRAR ALUMNO
    $(".btn2").click(function(e) {
        let codalum = $(this).closest("tr").children(".codalum").text();
        let nombre =$(this).closest("tr").children(".nombre").text();
        let mensaje ="";
        mensaje += "¿Seguro de borrar a este Alumno?/n";
        mensaje += "Codigo: "+ codalum + "("+ nombre + ")";
        if(confirm(mensaje))
            location.href = "ctr_borrar.php?codalum=" + codalum;
    });
    $(".btnv").click(function(e) {
        
        location.href = "../pages/consultar_alumno.php";
    });
    //Consultar Alumnos
    $("#frm_consultar_alum #txt_codalum").focusout(function(e){
        let codalum = $(this).val();
        if (codalum != ""){
            $.ajax({
                url: "ctr_consultar.php",
                type: "post",
                data: {codalum: codalum},
                success: function(resultado){
                    let rp = JSON.parse(resultado);
                    if (rp.datos["Error"]){
                        alert("El codigo " + codalum + " NO EXISTE")
                    } else {
                        $("#txt_nombres").val(rp.datos[0].Nombres);
                        $("#txt_apellidos").val(rp.datos[0].Apellidos);
                        $("#txt_fecha").val(rp.datos[0].Fecha_nacimiento);
                        $("#txt_dni").val(rp.datos[0].Dni);
                        $("#txt_carrera").val(rp.datos[0].Carrera);
                        $("#txt_sede").val(rp.datos[0].Nombre_sede);
                    
                    }
                }
            });
        }
        
    });
$(".btn4").click(function(e) {
    let codcurso = $(this).closest("tr").children(".codcurso").text();
    location.href = "editar_curso.php?codcurso=" + codcurso;
});
//borrar curso
$(".btn5").click(function(i) {
    let codcurso = $(this).closest("tr").children(".codcurso").text();
    let curso = $(this).closest("tr").children(".curso").text();

    let mensaje = "¿Seguro de borrar el curso cabron?\n";
    mensaje += "Código: " + codcurso + " (" + curso + ")";
    if (confirm(mensaje)) {
        location.href = "ctr_borrar2.php?codcurso=" + codcurso  ;
    }
});


});