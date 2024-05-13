
$(document).on("click", "#btnactualizar", function() {
    var pass = $("#usu_nuevo_pass").val();
    var correo = $("#usu_nuevo_correo").val();

    if (pass.length > 0) {
        var usu_id = $('user_idx').val();
        $.post("../../controller/usuario.php?op=cambiarcontraseña", {usu_id: usu_id, usu_pass: pass}, function(data) {
            swal("Listo!", "Se cambió la contraseña correctamente!", "success");
            console.log(data);
            
            $("#usu_nuevo_pass").val('');

            $("#usu_pass").val(pass);
        })
    }
    else if (correo.length > 0) {
        var usu_id = $('user_idx').val();
        $.post("../../controller/usuario.php?op=cambiarcorreo", {usu_id: usu_id, usu_correo: correo}, function(data) {
            swal("Listo!", "Se cambió el correo correctamente!", "success");
            console.log(data);

            $("#usu_nuevo_correo").val('');

            $("#usu_correo").val(correo);
        })
    }
    else{
        swal("Error!", " Llena alguno de los campos a cambiar! ", "error");
    }
});
