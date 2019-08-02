<?php  
/**
 Controlador que gestiona acciones de los alumnos
 @author: Universidad Politecnica - Nerino
 @description: Controladores para la Carga academica
 */


#
class CargapdfController extends Controller
{

	
	function __construct()
	{
		$this->auth = new AuthValidator();
		$this->validatorAuth($this->auth);

		// if (!$auth->makeAuth()) 
			// $this->localRedirect('login');		
		
		parent::__construct();
		$this->modeln    = "Cargapdf"; 
		$this->path      = "cargapdf";
		$this->routeView = "cargas/carga-academica-pdf";
	}

	public function render(){
		$this->view->render($this->routeView);
	}


	public function academicDataPdf()
	{

        if ($this->validatorAuth($this->auth)) {	

        	//$getAcademicData = $this->model->getAcademicData($_SESSION['usuario']['matricula']);
            //var_dump($getAcademicData);
            //$this->view->getAcademicData = $getAcademicData;
 			
            $getAcademicPeriod = $this->model->procesarDatosPeriodo($_SESSION['usuario']['matricula']);
            $this->view->getAcademicPeriod = $getAcademicPeriod;
 			
 			$getAcademicMat = $this->model->procesarDatosMaterias($_SESSION['usuario']['matricula']);
			$this->view->getAcademicMat = $getAcademicMat;
			
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