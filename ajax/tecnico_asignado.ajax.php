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

    $respuesta = ControladorTareas::ctrMostrarTareasTecnico($item, $valor);

    echo json_encode($respuesta);
  }
  public function ajaxObtenerTareasPorTecnico() {

    // Llamamos al controlador que a su vez llama al modelo
    $respuesta = ControladorTareas::ctrMostrarCantidadTareasTecnico();
  
    // Devolvemos la respuesta en formato JSON
    echo json_encode($respuesta);
  }
  public function ajaxObtenerDatosDonut() {
    // Aquí llamamos al controlador que a su vez llama al modelo
    $respuesta = ControladorTareas::ctrObtenerDatosParaDonut();
    
    // Devolvemos la respuesta en formato JSON
    echo json_encode($respuesta);
  }

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
  $tarea->ajaxEditarTarea();
}

// Comprobar si se hizo una solicitud POST para obtener las tareas por técnico
if (isset($_POST["obtener_tareas_tecnicos"])) {
  $tareas = new AjaxTareas();
  $tareas->ajaxObtenerTareasPorTecnico();
}

if (isset($_POST["obtener_datos_donut"])) {
  $tareas = new AjaxTareas();
  $tareas->ajaxObtenerDatosDonut();
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