<?php


class ControladorCaja{

	/*=============================================
	MOSTRAR VENTAS
	=============================================*/

	static public function ctrMostrarCaja($item, $valor){

		$tabla = "ventas";

		$respuesta = ModeloCaja::mdlMostrarCaja($tabla, $item, $valor);

		return $respuesta;

	}




	/*=============================================
	ELIMINAR VENTA
	=============================================*/


	/*=============================================
	RANGO FECHAS
	=============================================*/

	static public function ctrRangoFechasCaja($fechaInicial, $fechaFinal){


		$respuesta = ModeloCaja::mdlRangoFechasCaja($fechaInicial, $fechaFinal);

		return $respuesta;

	}


	/*=============================================
	SUMA TOTAL VENTAS
	=============================================*/

/*	public function ctrSumaTotalVentas(){

		$tabla = "ventas";

		$respuesta = ModeloVentas::mdlSumaTotalVentas($tabla);

		return $respuesta;
	
		

	}
*/
	

}