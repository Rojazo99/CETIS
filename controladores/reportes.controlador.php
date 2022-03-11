<?php

class ControladorReportes {


	/*=============================================
	MOSTRAR 
	=============================================*/

	static public function ctrMostrarReporte($item, $valor){

		$tabla = "documento";

		$respuesta = ModeloReportes::mdlMostrarReportes($tabla, $item, $valor);

		return $respuesta;

	}


	/*=============================================
	ELIMINAR CLIENTE
	=============================================*/

	static public function ctrEliminarReportes(){

		if(isset($_GET["idDocumento"])){

			$tabla ="documento";
			$datos = $_GET["idDocumento"];

			$respuesta = ModeloReportes::mdlEliminarReportes($tabla, $datos);

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

								window.location = "reportes";

								}
							})

				</script>';

			}		

		}

	}

}

