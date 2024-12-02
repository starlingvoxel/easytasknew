<?php

require_once "../controladores/tareas.controlador.php";
require_once "../modelos/tareas.modelo.php";


class AjaxTareas
{

  /*=============================================
  EDITAR PRODUCTO
  =============================================*/

  public $idTarea;
  public $tarea_id;
  public $estado;

  public function ajaxEditarTarea()
  {

    $item = "tarea_id";
    $valor = $this->idTarea;

    $respuesta = ControladorTareas::ctrMostrarTareas($item, $valor);

    echo json_encode($respuesta);
  }

  public function ajaxActualizarEstadoTarea()
  {

    $item =  $this->tarea_id;
    $valor = $this->estado;

     $respuesta = ControladorTareas::ctrActualizarEstado($item, $valor);

    echo $respuesta;
  }
}






/*=============================================
EDITAR tarea
=============================================*/

if (isset($_POST["tarea_id"])) {

  $tarea = new AjaxTareas();
  $tarea->idTarea = $_POST["tarea_id"];
  $tarea->ajaxEditarTarea();
}

if (isset($_POST['estado_update']) && isset($_POST['tarea_id_update'])) {

  $tarea1 = new AjaxTareas();
  $tarea1->tarea_id = $_POST["tarea_id_update"];
  $tarea1->estado = $_POST["estado_update"];
  $tarea1->ajaxActualizarEstadoTarea();
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