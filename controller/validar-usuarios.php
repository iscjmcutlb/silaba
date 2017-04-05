<?php

session_start();
include_once '../model/usuarios.php';
$modelo_usuarios = new usuarios();
$nickname = $_POST['user_login'];
$pass = sha1($_POST['pass_login']);
$rs = $modelo_usuarios->validar_empleado($nickname, $pass);
if ($rs->RecordCount() > 0) {
    if ($rs->fields[4] != 'A') {
        session_destroy();
        header("Location:../login.php?r=Usuario Inactivo");
    } else {
        $_SESSION['id_usuario'] = $rs->fields[0];
        $_SESSION['name_user'] = $rs->fields[1] . " " . $rs->fields[2] . " " . $rs->fields[3];
        $_SESSION['tipo_user'] = '1'; // Digito para identificar si es Empleado o Alumno (1: Empleado, 2: Alumno)
        header("Location:../views/silaba.php");
    }
} else {
    $rs = $modelo_usuarios->validar_alumnos($nickname, $pass);
    if ($rs->RecordCount() > 0) {
        if ($rs->fields[4] != 'A') {
            session_destroy();
            header("Location:../login.php?r=Usuario Inactivo");
        } else {
            $_SESSION['id_usuario'] = $rs->fields[0];
            $_SESSION['name_user'] = $rs->fields[1] . " " . $rs->fields[2] . " " . $rs->fields[3];
            $_SESSION['tipo_user'] = '2'; // Digito para identificar si es Empleado o Alumno (1: Empleado, 2: Alumno)
            header("Location:../views/alumnos.php");
        }
    } else {
        session_destroy();
        header("Location:../login.php?r=Usuario y/o Contraseña Incorrectos");
    }
}