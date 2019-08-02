

<?php 

/*
Modulo de Noticias - Controlador para el Admin
Raul Navarrete Novelo
 */


class NotificacionController extends Controller
{
	
	function __construct()
	{
		$this->auth = new AuthValidator();
		$this->validatorAuth($this->auth);
		// if (!$auth->makeAuth()) 
			// $this->localRedirect('login');		
		
		parent::__construct();
		$this->modeln    = "Notificacion"; 
		$this->path      = "notificacion";
		$this->routeView = "notificaciones/crearNotificacionesAdmin";
	}

	public function render(){
		$this->view->render($this->routeView);
	}


/**
 * CREA LA NOTIFICAICON LA IMAGEN VA SERIALIZADA
 * @return [type] [description]
 */
	public function crearNoticia(){
		// $texto, $imagen, $carrera, $matricula
		// La imagen va serializada
		//NOTICIA - IMAGEN - CARRERA - MATRICULA
		$this->view->data = $this->model->getNoticia();

		if (isset($_POST['titulo'])) {

			$this->model->crearNotificacion($_POST['titulo'],$_POST['cuerpo'],$_POST["imagen"],$_POST["carreras"],201600321);
			$this->model->SubirArchivo('C:/Users/Annei Arriola/Pictures/'.$_POST["imagen"],$_POST["imagen"]); 
			//
			//
			//C:\Users\Annei Arriola\Pictures
			unset($_POST["titulo"]);
			unset($_POST["cuerpo"]);
			unset($_POST["imagen"]);
			unset($_POST["carreras"]);
			header("Refresh:0");
		}
		


		if($_SESSION['usuario']['type'] == 'admin') {
			$this->render();

		} elseif ($_SESSION['usuario']['type'] == 'superadmin') {
			$this->render();
		} else {
			$this->localRedirect('noticias');
		}
		
		
	}


	public function traerNoticia(){
		
		$lastNoticia = $this->model->getNoticia();
		$this->render();
		
		

	}

	public function editarNotificacion(){

		$lastNoticia = $this->model->getNoticia();
		$this->view->data = $this->model->getNoticia();
		$this->model->editNoticia($_POST['tituloEdit'],$_POST['cuerpoEdit'],$_POST["imagenEdit"],NULL,$_GET["id"]);
		echo $this->model->getNoticia()[4];
		$this->localRedirect('administrador/cargarNoticia');
	}

	public function carreras(){
		$carreras = $this->model->getCarreras();

		echo "<pre>";
		print_r($carreras);
		echo "</pre> xd";

	}


}

?>