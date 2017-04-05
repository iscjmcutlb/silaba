function cambio_municipio_localidad(dato) {
    var url = "../controller/ctr-resgistro-aspirantes.php";
    if (dato == 'M') {
        $.ajax({
            type: "POST",
            url: url,
            data: "val=" + $("#slc-edo").val() + "&type=" + dato + "&opc=1",
            cache: false,
            beforeSend: function () {
                $("#ModalCargando").modal("show");
            },
            success: function (data) {
                $("#ModalCargando").modal("hide");
                $("#id-muni-loca").html(data);
            }
        });
    } else {
        $.ajax({
            type: "POST",
            url: url,
            data: "val=" + $("#slc-municipio").val() + "&type=" + dato + "&opc=1",
            cache: false,
            beforeSend: function () {
                $("#ModalCargando").modal("show");
            },
            success: function (data) {
                $("#ModalCargando").modal("hide");
                $("#div-loca").html(data);
            }
        });
    }
}

function get_slc_esc_edo() {
    var url = "../controller/ctr-resgistro-aspirantes.php";
    $.ajax({
        type: "POST",
        url: url,
        data: "slc-edo-esc=" + $("#slc-edo-esc").val() + "&opc=2",
        cache: false,
        beforeSend: function () {
            $("#ModalCargando").modal("show");
        },
        success: function (data) {
            $("#ModalCargando").modal("hide");
            $("#div-slc-mun-bachi").html(data);
        }
    });
}

function get_slc_esc_mun() {
    var url = "../controller/ctr-resgistro-aspirantes.php";
    $.ajax({
        type: "POST",
        url: url,
        data: "slc-municipio-esc=" + $("#slc-municipio-esc").val() + "&opc=3",
        cache: false,
        beforeSend: function () {
            $("#ModalCargando").modal("show");
        },
        success: function (data) {
            $("#ModalCargando").modal("hide");
            $("#div-loca-bachillerato").html(data);
        }
    });
}

function get_slc_esc_loc() {
    var url = "../controller/ctr-resgistro-aspirantes.php";
    $.ajax({
        type: "POST",
        url: url,
        data: "slc-localidad-esc=" + $("#slc-localidad-esc").val() + "&opc=4",
        cache: false,
        beforeSend: function () {
            $("#ModalCargando").modal("show");
        },
        success: function (data) {
            $("#ModalCargando").modal("hide");
            $("#slc-bachillerato").html(data);
        }
    });
}

function confirm_send_aspirantes() {
    $("#ModalConfirmation").modal("show");
}

function send_insert_aspirante() {
    $("#ModalConfirmation").modal("hide");
    var url = "../controller/ctr-resgistro-aspirantes.php";
    $.ajax({
        type: "POST",
        url: url,
        data: $("#form-reg-aspirantes").serialize() + "&opc=5",
        cache: false,
        beforeSend: function () {
            $("#ModalCargando").modal("show");
        },
        success: function (data) {
            $("#ModalCargando").modal("hide");
            $("#contenedor-gral").html(data);
        }
    });
}

function get_pdf_preficha(registro){
    var url = "../controller/ctr-resgistro-aspirantes.php";
    $.ajax({
        type: "POST",
        url: url,
        data: "registro=" + registro + "&opc=6",
        cache: false,
        success: function (data) {
            $("#modal-pdf").html(data);
        }
    });
}