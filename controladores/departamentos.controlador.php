<?php

class ControladorDepartamentos {

	/*=============================================
	CREAR Documento
	=============================================*/

	static public function ctrCrearDepartamento(){

		if(isset($_POST["departamento"])){

			if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["departamento"])){

			   	$tabla = "departamentos";

			   	$datos = array(
					           "departamento"=>$_POST["departamento"]);

			   	$respuesta = ModeloDepartamentos::mdlIngresarDepartamentos($tabla, $datos);

			   	if($respuesta == "ok"){

					echo'<script>

					swal({
						  type: "success",
						  title: "EL Departamento ha sido guardado correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
									if (result.value) {

									window.location = "departamentos";

									}
								})

					</script>';

				}

			}else{

				echo'<script>

					swal({
						  type: "error",
						  title: "¡El Departamento no puede ir vacío o llevar caracteres especiales!",
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
	MOSTRAR 
	=============================================*/

	static public function ctrMostrarDepartamentos($item, $valor){

		$tabla = "departamentos";

		$respuesta = ModeloDepartamentos::mdlMostrarDepartamentos($tabla, $item, $valor);

		return $respuesta;

	}

	

	/*=============================================
	ELIMINAR CLIENTE
	=============================================*/

	static public function ctrEliminarDepartamentos(){

		if(isset($_GET["idDepartamento"])){

			$tabla ="departamentos";
			$datos = $_GET["idDepartamento"];

			$respuesta = ModeloDepartamentos::mdlBorrarDepartamentos($tabla, $datos);

			if($respuesta == "ok"){

				echo'<script>

				swal({
					  type: "success",
					  title: "El Departamento ha sido borrado correctamente",
					  showConfirmButton: true,
					  confirmButtonText: "Cerrar",
					  closeOnConfirm: false
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

