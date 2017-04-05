function show_upload(){
    $("#ModalCargando").modal('show');
}

function hidden_upload(){
    $("#ModalCargando").modal('hide');
}

function enviar_comentario() {
    var url = "../controller/enviar-comentario-contacto.php";
    $.ajax({
        type: "POST",
        url: url,
        data: $("#form-contacto").serialize(),
        beforeSend: function () {
            show_upload();
        },
        success: function (data) {
            hidden_upload();
            $("#respuesta").html(data);
        }
    });
}
function enviar_comentario_MAU() {
    var url = "../controller/enviar-comentario-carreras.php";
    $.ajax({
        type: "POST",
        url: url,
        data: $("#form-contacto").serialize() + "&opc=1",
        beforeSend: function () {
            show_upload();
        },
        success: function (data) {
            hidden_upload();
            $("#response-email").html(data);
        }
    });
}
function enviar_comentario_MEE() {
    var url = "../controller/enviar-comentario-carreras.php";
    $.ajax({
        type: "POST",
        url: url,
        data: $("#form-contacto").serialize() + "&opc=2",
        beforeSend: function () {
            show_upload();
        },
        success: function (data) {
            hidden_upload();
            $("#response-email").html(data);
        }
    });
}
function enviar_comentario_Admon() {
    var url = "../controller/enviar-comentario-carreras.php";
    $.ajax({
        type: "POST",
        url: url,
        data: $("#form-contacto").serialize() + "&opc=3",
        beforeSend: function () {
            show_upload();
        },
        success: function (data) {
            hidden_upload();
            $("#response-email").html(data);
        }
    });
}