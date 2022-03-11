<?php

class ControladorDocumento {

	/*=============================================
	CREAR Documento
	=============================================*/

	static public function ctrCrearDocumento(){

		if(isset($_POST["nuevoDocumento"])){

			if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nuevoDocumento"])){

			   	$tabla = "documento";

			   	$datos = array("asunto"=>$_POST["nuevoDocumento"],
					           "alumno"=>$_POST["alumno"],
                               "fecha"=>$_POST["nuevaFecha"],
							   "nota"=>$_POST["nuevaNota"],
					           "departamento"=>$_POST["nuevoDepartamento"]);

			   	$respuesta = ModeloDocumento::mdlIngresarDocumento($tabla, $datos);

			   	if($respuesta == "ok"){

					echo'<script>

					swal({
						  type: "success",
						  title: "EL Documento ha sido guardado correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
									if (result.value) {

									window.location = "documento";

									}
								})

					</script>';

				}

			}else{

				echo'<script>

					swal({
						  type: "error",
						  title: "¡El Documento no puede ir vacío o llevar caracteres especiales!",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
							if (result.value) {

							window.location = "documento";

							}
						})

			  	</script>';



			}

		}

	}

	/*=============================================
	MOSTRAR 
	=============================================*/

	static public function ctrMostrarDocumento($item, $valor){

		$tabla = "documento";

		$respuesta = ModeloDocumento::mdlMostrarDocumento($tabla, $item, $valor);

		return $respuesta;

	}

	/*=============================================
	EDITAR 
	=============================================*/

	static public function ctrEditarDocumento(){

		if(isset($_POST["editarDocumento"])){

			if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["editarDocumento"])){

			   	$tabla = "documento";

			   	$datos = array("id"=>$_POST["idDocumento"],
			   				   "asunto"=>$_POST["editarDocumento"],
					           "documento"=>$_POST["editarDocumentoId"],
					           "alumno"=>$_POST["editarAlumno"],
					           "fecha"=>$_POST["editarFecha"],
					           "nota"=>$_POST["editarNota"],
					           "departamento"=>$_POST["editarDepartamento"]);

			   	$respuesta = ModeloDocumento::mdlEditarDocumento($tabla, $datos);

			   	if($respuesta == "ok"){

					echo'<script>

					swal({
						  type: "success",
						  title: "El Documento ha sido cambiado correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
									if (result.value) {

									window.location = "documento";

									}
								})

					</script>';

				}

			}else{

				echo'<script>

					swal({
						  type: "error",
						  title: "¡El Documento no puede ir vacío o llevar caracteres especiales!",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
							if (result.value) {

							window.location = "documento";

							}
						})

			  	</script>';



			}

		}

	}

	/*=============================================
	ELIMINAR CLIENTE
	=============================================*/

	static public function ctrEliminarDocumento(){

		if(isset($_GET["idDocumento"])){

			$tabla ="documento";
			$datos = $_GET["idDocumento"];

			$respuesta = ModeloDocumento::mdlEliminarDocumento($tabla, $datos);

			if($respuesta == "ok"){

				echo'<script>

				swal({
					  type: "success",
					  title: "El Documento ha sido borrado correctamente",
					  showConfirmButton: true,
					  confirmButtonText: "Cerrar",
					  closeOnConfirm: false
					  }).then(function(result){
								if (result.value) {

								window.location = "documento";

								}
							})

				</script>';

			}		

		}

	}

}

