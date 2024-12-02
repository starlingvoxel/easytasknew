<?php

require_once "../controladores/eventos.controlador.php";
require_once "../modelos/eventos.modelo.php";




class AjaxEventos
{
    // Propiedades para los datos de evento
    public $idEvento;
    public $estado;

    // Método para obtener un evento específico
    public function ajaxMostrarEvento()
    {
        $item = null;
        $valor = null;

        $respuesta = ControladorEventos::ctrMostrarEvento($item, $valor);

        echo json_encode($respuesta);
    }
    public function ajaxEditarEvento()
    {
        $item = "id_evento";
        $valor = $this->idEvento;
    

        $respuesta = ControladorEventos::ctrMostrarEvento($item, $valor);

        echo json_encode($respuesta);
    }
    // Método para actualizar el estado de un evento

}

/*===============================
   ACCIONES PARA EVENTOS
=================================*/

// Mostrar evento específico
if (isset($_POST["obtenerEventos"])) {
    $evento = new AjaxEventos();
    
    $evento->ajaxMostrarEvento();
}
/*=============================================
EDITAR EVENTO
=============================================*/

if (isset($_POST["id_evento"])) {

    $eventoEditar = new AjaxEventos();
    $eventoEditar->idEvento = $_POST["id_evento"];
    $eventoEditar->ajaxEditarEvento();
  }

