<?php
session_start();
if(!isset($_SESSION['id_usuario']) || !isset($_SESSION['name_user']) || !isset($_SESSION['tipo_user'])){
    header("Location:../controller/terminar-sesion.php");
}