<?php

require_once "../controladores/tareas.controlador.php";
require_once "../modelos/tareas.modelo.php";


class AjaxActualizarTareaEstado
{

  /*=============================================
  EDITAR PRODUCTO
  =============================================*/

  public $idTarea;

  public function ajaxActualizarEstado()
  {

    $item = "tarea_id";
    $valor = $this->idTarea;

    $respuesta = ControladorTareas::ctrMostrarTareas($item, $valor);

    echo json_encode($respuesta);
  }
}

if (isset($_POST['estado']) && isset($_POST['tarea_id'])) {
  $valor = $_POST['estado'];
  $item = $_POST['tarea_id'];
  $respuesta = ControladorTareas::ctrActualizarEstado($item, $valor);

    echo json_encode($respuesta1);
}


/*=============================================
EDITAR PRODUCTO
=============================================*/

/*=============================================
EDITAR CATEGORÍA
=============================================*/

if (isset($_POST["tarea_id"])) {

  $tarea = new AjaxTareas();
  $tarea->idTarea = $_POST["tarea_id"];
  $tarea->ajaxActualizarEstado();
}


/*=============================================
TRAER PRODUCTO


if(isset($_POST["traerProductos"])){

  $traerProductos = new AjaxProductos();
  $traerProductos -> traerProductos = $_POST["traerProductos"];
  $traerProductos -> ajaxEditarProducto();

}

/*=============================================
TRAER PRODUCTO


if(isset($_POST["nombreProducto"])){

  $traerProductos = new AjaxProductos();
  $traerProductos -> nombreProducto = $_POST["nombreProducto"];
  $traerProductos -> ajaxEditarProducto();

}

=============================================*/