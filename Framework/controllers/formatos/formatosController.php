<?php  
/**
 Controlador que gestiona acciones de los alumnos
 @author: Universidad Politecnica - Gustavo
 @description: Controladores para descarga de formatos
 */


#
class formatosController extends Controller
{

	
	function __construct()
	{
		$this->auth = new AuthValidator();
		$this->validatorAuth($this->auth);

		// if (!$auth->makeAuth()) 
			// $this->localRedirect('login');		
		
		parent::__construct();
		$this->modeln    = "formatos"; 
		$this->path      = "formatos";
		$this->routeView = "formatos/formatos";
	}

	public function render(){
		$this->view->render($this->routeView);
	}


	public function formatos()
	{
        if ($this->validatorAuth($this->auth)) {	

			if($_SESSION['usuario']['type'] == 'admin'){
				$this->localRedirect('administrador/formatos');
			}

			$formatos = $this->model->GetFormatos();
			$this->view->Formatos = $formatos;
			
            $this->render();
        
        }else{
            $this->localRedirect('login');
        }
	}
	
	public function Descargar($file)
	{
		if ($this->validatorAuth($this->auth)) {	

			$this->model->Descargar($file);
			
			$this->localRedirect('alumnos/formatos');
        
        }else{
            $this->localRedirect('login');
        }
	}
}
?>