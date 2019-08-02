<?php  
/**
 * 	Controlador que gestiona el kardex
 */


#
class CalificacionesController extends Controller
{
	function __construct()
	{

		$this->auth = new AuthValidator();
		$this->validatorAuth($this->auth);
		// if (!$auth->makeAuth()) 
			// $this->localRedirect('login');		
		
		parent::__construct();
		$this->modeln    = "calificaciones"; 
		$this->path      = "calificaciones";
		$this->routeView = "calificaciones/calificaciones";
	}

	public function render(){
		$this->view->render($this->routeView);
	}

	public function getCalificaciones(){
		if ($this->validatorAuth($this->auth)) {
			//$datos = $this->model->calificaciones($_SESSION['usuario']['matricula']);
			$clave = $this->model->getClave($_SESSION['usuario']['matricula']);
			$periodo = $this->model->getPeriodo($clave);
			$calificaciones = $this->model->getcalif($_SESSION['usuario']['matricula'], $clave);
			$claveGrupo = $this->model->getGrupo($_SESSION['usuario']['matricula']);
			$numeroGrupo = $this->model->getNumeroGrupo($_SESSION['usuario']['matricula']);
			$carrera = $this->model->getCarrera($numeroGrupo);
			$mapaCurricular = $this->model->procesarDatosPeriodo($_SESSION['usuario']['matricula']);
			$cuatrimestre = $this->model->cuatrimestre($_SESSION['usuario']['matricula']);
			//$nose = $this->model->getClave($_SESSION['usuario']['matricula']);
			//$materias = $this->model->getMateriasKardex(2, 'B');
			//die(var_dump($clave));
			//die(var_dump($periodo));
			//die(var_dump($calificaciones));
			//die(var_dump($grupoActual));
			//die(var_dump($claveGrupo));
			//die(var_dump($materias));
			//die(var_dump($clave));
			$this->view->cuatrimestre = $cuatrimestre;
			$this->view->periodo = $periodo;
			$this->view->carrera = $carrera;
			$this->view->claveGrupo = $claveGrupo;
			$this->view->calificaciones = $calificaciones;
			$this->view->mapaCurricular = $mapaCurricular;
			//$this->view->datos = $datos;
			$this->render();
		}else{
			$this->localRedirect('login');
		}
	}
}
?>
