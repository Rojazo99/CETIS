<?php

require_once "controladores/plantilla.controlador.php";
require_once "controladores/usuarios.controlador.php";
require_once "controladores/clientes.controlador.php";
require_once "controladores/documento.controlador.php";
require_once "controladores/reportes.controlador.php";
require_once "controladores/departamentos.controlador.php";

require_once "modelos/usuarios.modelo.php";
require_once "modelos/clientes.modelo.php";
require_once "modelos/documento.modelo.php";
require_once "modelos/reportes.modelo.php";
require_once "modelos/departamentos.modelo.php";


$plantilla = new ControladorPlantilla();
$plantilla -> ctrPlantilla();