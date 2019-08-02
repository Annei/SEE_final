<?php  
/**
 * 	Controlador que gestiona el kardex
 */
#
class KardexPdfController extends Controller
{
	function __construct()
	{
		$this->auth = new AuthValidator();
		$this->validatorAuth($this->auth);
		// if (!$auth->makeAuth()) 
			// $this->localRedirect('login');		
		
		parent::__construct();
		$this->modeln    = "Kardex"; 
		$this->path      = "kardex";
		$this->routeView = "kardex/kardex-pdf";
	}
	public function render(){
		$this->view->render($this->routeView);
	}
	public function kardexPdf(){
		if ($this->validatorAuth($this->auth)) {
			$datos = $this->model->kardex($_SESSION['usuario']['matricula']);
			$creditos = $this->model->creditos($_SESSION['usuario']['matricula']);
			$porcentaje = $this->model->porcentaje($_SESSION['usuario']['matricula']);
			$promedio = $this->model->promedio($_SESSION['usuario']['matricula']);
			$materias = $this->model->getMateriasTotales(2, 'B');
			#$dbfData = $this->model->getMateriasKardex(2,'B');
			#$materias_pendientes = $this->model->materiasPendientes();
			//die(var_dump($datos));
			//die(var_dump($materias));
			$this->view->creditos = $creditos;
			$this->view->porcentaje = $porcentaje;
			$this->view->datos = $datos;
			$this->view->promedio = $promedio;
			$this->render();
		}else{
			$this->localRedirect('login');
		}
	}
}
?>
© 2019 GitHub, Inc.