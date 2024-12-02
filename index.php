<?php
require_once "controladores/plantilla.controlador.php";
require_once "controladores/usuarios.controlador.php";
require_once "controladores/departamentos.controlador.php";
require_once "controladores/tareas.controlador.php";
require_once "controladores/productos.controlador.php";
require_once "controladores/categorias.controlador.php";
require_once "controladores/eventos.controlador.php";
require_once "controladores/caja.controlador.php";

require_once "modelos/caja.modelo.php";
require_once "modelos/usuarios.modelo.php";
require_once "modelos/categorias.modelo.php";
require_once "modelos/productos.modelo.php";
require_once "modelos/departamentos.modelo.php";
require_once "modelos/tareas.modelo.php";
require_once "modelos/eventos.modelo.php";
$plantilla = new ControladorPlantilla();
$plantilla -> ctrPlantilla();