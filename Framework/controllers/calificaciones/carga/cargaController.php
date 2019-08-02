<?php  
/**
 Controlador que gestiona acciones de los alumnos
 @author: Universidad Politecnica - Nerino
 @description: Controladores para la Carga academica
 */


#
class CargaController extends Controller
{

	
	function __construct()
	{
		$this->auth = new AuthValidator();
		$this->validatorAuth($this->auth);

		// if (!$auth->makeAuth()) 
			// $this->localRedirect('login');		
		
		parent::__construct();
		$this->modeln    = "Carga"; 
		$this->path      = "carga";
		$this->routeView = "cargas/carga-academica";
	}

	public function render(){
		$this->view->render($this->routeView);
	}


	public function academicDataMethod()
	{

        if ($this->validatorAuth($this->auth)) {	

        	//$getAcademicData = $this->model->getAcademicData($_SESSION['usuario']['matricula']);
            //var_dump($getAcademicData);
            //$this->view->getAcademicData = $getAcademicData;
 			
            $getAcademicPeriod = $this->model->procesarDatosPeriodo($_SESSION['usuario']['matricula']);
            $this->view->getAcademicPeriod = $getAcademicPeriod;
 			
 			$getAcademicMat = $this->model->procesarDatosMaterias($_SESSION['usuario']['matricula']);
			$this->view->getAcademicMat = $getAcademicMat;
			//var_dump($getAcademicMat);
			
			
			//Nombre del periodo
			$nclave = $this->model->getnClave($_SESSION['usuario']['matricula']);
        	$this->view->nclave = $nclave;			
        	$data = $this->model->getPeriodo($nclave);
			$this->view->data = $data;


            $this->render();
        
        }else{
            $this->localRedirect('login');
        }
  	}
}
?>