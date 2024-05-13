
function init(){
   
    $("#ticket_form").on("submit",function(e){
        guardaryeditar(e);	
    });
    
}

$(document).ready(function() {
    $('#tick_descrip').summernote({
        height: 150,
        lang: "es-ES",
        callbacks: {
            onImageUpload: function(image) {
                console.log("Image detect...");
                myimagetreat(image[0]);
            },
            onPaste: function (e) {
                console.log("Text detect...");
            }
        }
    });

    $.post("../../controller/categoria.php?op=combo",function(data, status){
        $('#cat_id').html(data);
    });
    
    $('#cat_id').change(function(){
        cat_id = $(this).val();
        
        $.post("../../controller/subcategoria.php?op=combo", {cat_id : cat_id}, function (data) {
            $('#cats_id').html(data);
        });
    });

    $.post("../../controller/prioridad.php?op=combo",function(data, status){
        $('#prio_id').html(data);
    });

});

function guardaryeditar(e){
    e.preventDefault();
    var formData = new FormData($("#ticket_form")[0]);
    if ($('#tick_descrip').summernote('isEmpty') || $('#tick_titulo').val()==0 || $('#cats_id').val()==0 || $('#cat_id').val()==0 || $('#prio_id').val()==0){
        swal("Advertencia!", "Se Encuentran Campos Vacios!", "warning");
    }else{
        $.ajax({
            url: "../../controller/ticket.php?op=insert",
            type: "POST",
            data: formData,
            contentType: false,
            processData: false,
            success: function(datos){  
                console.log("Respuesta del servidor:", datos);
                $('#tick_titulo').val('');
                $('#tick_descrip').summernote('reset');
                swal("Listo!", "Ticket Registrado Correctamente!", "success");

                data = JSON.parse(data);
                console.log(data[0].tick_id);

                $.post("../../controller/email.php?op=ticket_abierto", {tick_id : data[0].tick_id}, function (data) {

                });

            },
            error: function(xhr, status, error) {
                console.log("Error en la solicitud AJAX:", error);
            }
        }); 
    }
}


init();