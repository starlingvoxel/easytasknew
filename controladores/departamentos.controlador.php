<?php

class ControladorDepartamentos{

	/*=============================================
	CREAR departamentoS
	=============================================*/

	static public function ctrCrearDepartamento(){
		
		if(isset($_POST["nuevoDepartamento"])){

			if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nuevoDepartamento"])){

				$tabla = "departamento";

				$datos = $_POST["nuevoDepartamento"];
				
				
				$respuesta = ModeloDepartamentos::mdlIngresarDepartamento($tabla, $datos);
			
				if($respuesta == "ok"){

					echo'<script>

					swal.fire({
						icon: "success",
						title: "Guardado correctamente",
						showConfirmButton: true,
						confirmButtonText: "Cerrar",
						allowOutsideClick: false,
						timer: 2000, // Redirige después de 3 segundos
						timerProgressBar: true
					}).then(function(result) {
						// Si el usuario presiona el botón de confirmación
						if (result.value) {
							window.location = "departamento";
						}
					});
				
					// Redirección automática sin necesidad de hacer clic en "Cerrar"
					setTimeout(function() {
						window.location = "departamento";
					}, 2000); // Redirige automáticamente después de 3 segundos (3000 milisegundos) 
								</script>';


				}	


			}else{

				echo '<script>

					swal.fire({

						type: "error",
						icon: "error",
						title: "¡El usuario no puede ir vacío o llevar caracteres especiales!",
						showConfirmButton: true,
						confirmButtonText: "Cerrar"

					}).then(function(result){

						if(result.value){
						
							window.location = "usuarios";

						}

					});
				

				</script>';

			


			}

		}

	}

	/*=============================================
	MOSTRAR departamentoS
	=============================================*/

	static public function ctrMostrarDepartamentos($item, $valor){

		$tabla = "departamento";

		$respuesta = ModeloDepartamentos::mdlMostrarDepartamento($tabla, $item, $valor);

		return $respuesta;
	
	}

	/*=============================================
	EDITAR departamento
	=============================================*/

	static public function ctrEditardepartamento(){
		
		if(isset($_POST["editarDepartamento"])){
			
			if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["editarDepartamento"])){
				
				$tabla = "departamento";

				$datos = array("departamento"=>$_POST["editarDepartamento"],
							   "id"=>$_POST["idDepartamento"]);
	
				$respuesta = Modelodepartamentos::mdlEditardepartamento($tabla, $datos);
			
				if($respuesta == "ok"){

					echo'<script>

				   swal.fire({
        icon: "success",
        title: "Guardado correctamente",
        showConfirmButton: true,
        confirmButtonText: "Cerrar",
		allowOutsideClick: false,
        timer: 2000, // Redirige después de 3 segundos
        timerProgressBar: true
    }).then(function(result) {
        // Si el usuario presiona el botón de confirmación
        if (result.value) {
            window.location = "departamento";
        }
    });

    // Redirección automática sin necesidad de hacer clic en "Cerrar"
    setTimeout(function() {
        window.location = "departamento";
    }, 2000); // Redirige automáticamente después de 3 segundos (3000 milisegundos) 
				</script>';

				}


			}else{

				echo'<script>

					swal.fire({
						  type: "error",
						  title: "Error",
						  icon: "success",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
									if (result.value) {

									window.location = "departamentos";

									}
								})

					</script>';

			}

		}

	}

	/*=============================================
	BORRAR departamento
	=============================================*/

	static public function ctrBorrardepartamento(){
		
		if(isset($_GET["departamento_id"])){

			$tabla ="departamento";
			$datos = $_GET["departamento_id"];
	
			$respuesta = ModeloDepartamentos::mdlBorrarDepartamento($tabla, $datos);
			
			if($respuesta == "ok"){

				echo'<script>

					swal.fire({
						  type: "success",
						  icon: "success",
						  title: "La categoría ha sido borrada correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
									if (result.value) {

									window.location = "departamentos";

									}
								})

					</script>';
			}
		}
		
	}
}
