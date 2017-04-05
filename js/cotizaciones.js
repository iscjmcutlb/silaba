function registrar_cotizacion() {
    var url = "../controlador/ctr-cotizaciones.php";
    $.ajax({
        type: "POST",
        url: url,
        data: $("#form_cotizacion").serialize() + "&opc=1",
        cache: false,
        beforeSend: function () {
            $("#ModalCargando").modal("show");
        },
        success: function (data) {
            $("#ModalCargando").modal("hide");
            $("#contenedor_gral").html(data);
        }
    });
}

function agregar_muestra_cotizacion(ctz) {
    var url = "../controlador/ctr-cotizaciones.php";
    $.ajax({
        type: "POST",
        url: url,
        data: "ctz=" + ctz + "&opc=2",
        cache: false,
        success: function (data) {
            $("#respuesta_post").html(data);
        }
    });
}

function SeleccionarMuestrasDeterminaciones(Tipo) {
    var Estado = $("#CheckPD-" + Tipo).prop("checked") ? true : false;
    if (Estado == true) {
        $(".CheckDet-" + Tipo).prop("checked", "checked");
    } else if (Estado == false) {
        $(".CheckDet-" + Tipo).prop("checked", "");
    }
}
function  AbiriDeterminaciones(ID) {
    $("#" + ID).toggle();
}
function QuitarMarcaPadreDeterminaciones(ID, Clase) {
    var Estado = $("#" + ID).prop("checked") ? true : false;
    if (Estado == false) {
        var chechsnumero = document.getElementsByClassName(Clase);
        ValorTotal = chechsnumero.length - 1;
        var cont = 0;
        for (var x = 0; x < chechsnumero.length; x++) {
            if (chechsnumero[x].checked) {
                cont++;
            }
        }
        if (ValorTotal == cont) {
            $("#" + ID).prop("checked", "checked");
        }

    } else {
        $("#" + ID).prop("checked", "");
    }
}

function registrar_detalle_ctz() {
    var i = 0;
    $("input:checkbox:checked").each(function () {
        i++;
    });
    if (i == 0) {
        alert("No se han agregado analitos.");
    } else {
        var url = "../controlador/ctr-cotizaciones.php";
        $.ajax({
            type: "POST",
            url: url,
            data: $("#fomr_det_ctz").serialize() + "&opc=3",
            cache: false,
            beforeSend: function () {
                $("#myModal").modal('hide');
                $("#ModalCargando").modal("show");
            },
            success: function (data) {
                $("#ModalCargando").modal("hide");
                $("#table_body").html(data);
            }
        });
    }
}

function eliminar_muestras(Id, ctz) {
    var r = confirm("¿Desea eliminar la muestra?");
    if (r == true) {
        var url = "../controlador/ctr-cotizaciones.php";
        $.ajax({
            type: "POST",
            url: url,
            data: "mc=" + Id + "&ctz=" + ctz + "&opc=4",
            cache: false,
            beforeSend: function () {
                $("#ModalCargando").modal("show");
            },
            success: function (data) {
                $("#table_body").html(data);
                $("#ModalCargando").modal("hide");
            }
        });
    }
}

function show_modal_add_cte() {
    var url = "../controlador/ctr-cotizaciones.php";
    $.ajax({
        type: "POST",
        url: url,
        data: "opc=5",
        cache: false,
        success: function (data) {
            $("#respuesta_post").html(data);
        }
    });
}

function RegistrarCte() {
    var url = "../controlador/ctr-cotizaciones.php";
    $.ajax({
        type: "POST",
        url: url,
        data: $("#formAddCte").serialize() + "&opc=6",
        cache: false,
        beforeSend: function () {
            $("#ModaladdCte").modal('hide');
            $("#ModalCargando").modal("show");
        },
        success: function (data) {
            $("#ModalCargando").modal("hide");
            $("#cte-slc").html(data);
        }
    });
}

function show_modal_add_tm() {
    var url = "../controlador/ctr-cotizaciones.php";
    $.ajax({
        type: "POST",
        url: url,
        data: "opc=7",
        cache: false,
        success: function (data) {
            $("#post-modal").html(data);
        }
    });
}

function add_tipo_muestra() {
    var url = "../controlador/ctr-cotizaciones.php";
    $.ajax({
        type: "POST",
        url: url,
        data: $("#form-TM").serialize() + "&opc=8",
        cache: false,
        beforeSend: function () {
            $("#modal-TM").modal('hide');
            $("#ModalCargando").modal("show");
        },
        success: function (data) {
            $("#ModalCargando").modal("hide");
            $("#tipo_muestra").html(data);
        }
    });
}

function actualizar_cotizacion() {
    var url = "../controlador/ctr-cotizaciones.php";
    $.ajax({
        type: "POST",
        url: url,
        data: "opc=9",
        cache: false,
        beforeSend: function () {
            $("#ModalCargando").modal("show");
        },
        success: function (data) {
            $("#ModalCargando").modal("hide");
            $("#contenedor_gral").html(data);
        }
    });
}

function enviar_actualizar_cotizacion() {
    var url = "../controlador/ctr-cotizaciones.php";
    $.ajax({
        type: "POST",
        url: url,
        data: $("#form_cotizacion_update").serialize() + "&opc=10",
        cache: false,
        beforeSend: function () {
            $("#ModalCargando").modal("show");
        },
        success: function (data) {
            $("#ModalCargando").modal("hide");
            $("#contenedor_gral").html(data);
        }
    });
}

function eliminar_cotizacion(ctz) {
    var url = "../controlador/ctr-cotizaciones.php";
    $.ajax({
        type: "POST",
        url: url,
        data: "ctz_eliminar=" + ctz + "&opc=11",
        cache: false,
        beforeSend: function () {
            $("#ModalCargando").modal("show");
        },
        success: function (data) {
            $("#ModalCargando").modal("hide");
            $("#respuesta_post").html(data);
        }
    });
}

function slc2() {
    $(".select2").select2();
}