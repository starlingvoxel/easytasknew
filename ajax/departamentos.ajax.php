<?php


require_once "../controladores/departamentos.controlador.php";
require_once "../modelos/departamentos.modelo.php";

class AjaxDepartamentos{

  /*=============================================
  EDITAR PRODUCTO
  =============================================*/ 

  public $idDepartamento;
  public $traerDepartamentos;
  public $nombreDepartamento;

  public function ajaxEditarDepartamento(){

    if($this->traerDepartamentos == "ok"){

      $item = null;
      $valor = null;
      $orden = "id";

      $respuesta = ControladorDepartamentos::ctrMostrarDepartamentos($item, $valor,
        $orden);

      echo json_encode($respuesta);


    }else if($this->nombreDepartamento != ""){

      $item = "descripcion";
      $valor = $this->nombreDepartamento;
      $orden = "id";

      $respuesta = ControladorDepartamentos::ctrMostrarDepartamentos($item, $valor,
        $orden);

      echo json_encode($respuesta);

    }else{

      $item = "departamento_id";
      $valor = $this->idDepartamento;
      

      $respuesta = ControladorDepartamentos::ctrMostrarDepartamentos($item, $valor);

      echo json_encode($respuesta);

    }

  }

}



/*=============================================
EDITAR PRODUCTO
=============================================*/ 

if(isset($_POST["idDepartamento"])){

  $editarDepartamento = new AjaxDepartamentos();
  $editarDepartamento -> idDepartamento = $_POST["idDepartamento"];
  $editarDepartamento -> ajaxEditarDepartamento();

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




