<?php
include_once '../model/alumnos.php';
include_once '../model/catalogo_derechos_educativos.php';
$modelo_alumnos = new alumnos();
$modelo_derechosEducativos = new catalogo_derechos_educativos();
$ape_pat = utf8_encode($_POST['ape_pat']);
$ape_mat = utf8_encode($_POST['ape_mat']);
$nombre = utf8_encode($_POST['name_alumno']);
$curp = utf8_encode($_POST['curp']);
$array_curp = str_split($curp);
$email = utf8_encode($_POST['email']);
$tel_personal = utf8_encode($_POST['tel_p']);
$tel_familiar1 = utf8_encode($_POST['tel_f1']);
$tel_familiar2 = utf8_encode($_POST['tel_f2']);
$id_estado_civil = utf8_encode($_POST['edo_civil']);
$id_localidad = utf8_encode($_POST['slc-localidad']);
$calle = utf8_encode($_POST['calle']);
$numero_ext = utf8_encode($_POST['num_ext']);
$numero_int = utf8_encode($_POST['num_int']);
$cp = utf8_encode(trim($_POST['cp']));
$id_escuela = utf8_encode($_POST['slc-esc']);
$promedio = utf8_encode($_POST['promedio']);
$id_carrera = utf8_encode($_POST['slc_carrera']);
$slc_date_ex = explode("-", $_POST['slc-date-ex']);
$edo_nacimiento = $array_curp[11] . $array_curp[12];
$fechacurp = $array_curp[4] . $array_curp[5] . "-" . $array_curp[6] . $array_curp[7] . "-" . $array_curp[8] . $array_curp[9];
$fecha_nacimiento = date("Y-m-d", strtotime($fechacurp));
$genero = $array_curp[10];
$no_examen = $slc_date_ex[0];
$id_perido_examen = $slc_date_ex[1];
$rs = $modelo_alumnos->validar_curp($curp);
if ($rs->RecordCount() == 0) {
    include_once '../tools/PHPMailer/class.phpmailer.php';
    include_once '../tools/PHPMailer/class.smtp.php';
    $registro = $modelo_alumnos->insert_aspirante($id_carrera, $id_escuela, $nombre, $ape_pat, $ape_mat, $curp, $email, $id_localidad, $edo_nacimiento, $calle, $numero_int, $numero_ext, $cp, $tel_personal, $tel_familiar1, $tel_familiar2, $fecha_nacimiento, $genero, $id_estado_civil, $no_examen, $id_perido_examen);
    $data_alumno = $modelo_alumnos->get_data_aspirantes_pdf($registro);
    $mail = new PHPMailer();
    $mail->Mailer = "smtp";
    $mail->isSMTP();
    $mail->CharSet = "UTF-8";
    $mail->SMTPDebug = 0;
    $mail->SMTPAuth = true;
    $mail->SMTPDebug = 0;
    $mail->SMTPSecure = "ssl";
    $mail->Host = "smtp.gmail.com";
    //$mail->Host = "smtp-relay.gmail.com";
    $mail->Username = "silaba@utlajabajio.edu.mx";
    $mail->Password = "A5&9%gWN";
    $mail->Port = 465;
    $mail->From = "silaba@utlajabajio.edu.mx";
    $mail->FromName = "Sistema Integral Laja Bajío";
    $mail->addAddress($data_alumno->fields[4]);
    $mail->IsHTML(true);
    $mail->Subject = "Registro de Pre Ficha";
    $body = "<h3>En horabuena</h3><br>";
    $body .= "<p>Has completado el pre-registro para realizar el examen de colocación en la <b>Universidad Tecnológica Laja Bajío</b> para mayores informes consulta el anexo.</p>";
    $mail->Body = $body;
    include_once '../format-pdf/preficha-saved.php';
    $mail->AddAttachment("../format-pdf/" . $data_alumno->fields[3] . "preficha.pdf", $data_alumno->fields[3] . "preficha.pdf");
    if (!$mail->Send()) {
        ?>
        <div class="row">
            <div class="col-md-12">
                <div class="box box-success">
                    <div class="box-body">
                        <div class="alert alert-warning alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            <h4><i class="icon fa fa-ban"></i> Registro Exitoso</h4>
                            <p>No pudimos enviar el formato al correo: <b><?= $rs->fields[$data_alumno->fields[4]]; ?></b></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script>
            get_pdf_preficha(<?= $registro ?>);
        </script>
        <?php
        include_once '../ctr-views/form-registro.php';
    } else {
        ?>
        <div class="row">
            <div class="col-md-12">
                <div class="box box-success">
                    <div class="box-body">
                        <div class="alert alert-success alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            <h4><i class="icon fa fa-ban"></i> Registro Exitoso</h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script>
            get_pdf_preficha(<?= $registro ?>);
        </script>
        <?php
        include_once '../ctr-views/form-registro.php';
    }
    unlink("../format-pdf/" . $data_alumno->fields[3] . "preficha.pdf");
} else {
    if ($rs->fields[27] != 1 && $rs->fields[27] != 2 && $rs->fields[27] != 7) {//
        $data_alumno = $modelo_alumnos->get_data_aspirantes_pdf($rs->fields[0]);
        if ($data_alumno->fields[5] < date("Y-m-d")) {
            $registro = $modelo_alumnos->insert_aspirante($id_carrera, $id_escuela, $nombre, $ape_pat, $ape_mat, $curp, $email, $id_localidad, $edo_nacimiento, $calle, $numero_int, $numero_ext, $cp, $tel_personal, $tel_familiar1, $tel_familiar2, $fecha_nacimiento, $genero, $id_estado_civil, $no_examen, $id_perido_examen);
            ?>
            <div class="row">
                <div class="col-md-12">
                    <div class="box box-success">
                        <div class="box-body">
                            <div class="alert alert-success alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                <h4><i class="icon fa fa-ban"></i> Registro Exitoso</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <script>
                get_pdf_preficha(<?= $registro ?>);
            </script>
            <?php
            include_once '../ctr-views/form-registro.php';
        } else {
            ?>
            <div class="row">
                <div class="col-md-12">
                    <div class="box box-warning">
                        <div class="box-body">
                            <div class="alert alert-success alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                <h4><i class="icon fa fa-ban"></i> Registro Existente</h4>
                                <p>Aún tienes un examen de admisión pendiente.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <script>
                get_pdf_preficha(<?= $rs->fields[0]; ?>);
            </script>
            <?php
            include_once '../ctr-views/form-registro.php';
        }
    } else {
        ?>
        <div class="row">
            <div class="col-md-12">
                <div class="box box-success">
                    <div class="box-body">
                        <div class="alert alert-success alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            <h4><i class="icon fa fa-ban"></i> Eres alumno de la Universidad Tecnológica Laja Bajío.</h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php
        include_once '../ctr-views/form-registro.php';
    }
}
