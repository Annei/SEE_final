<?php  
/**
 Controlador que gestiona acciones de los alumnos
 @author: Universidad Politecnica - Gustavo
 @description: Controladores para descarga de formatos
 */
#
class formatosAdminController extends Controller
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
		$this->routeView = "formatos/formatos-admin";
	}
	public function render(){
		$this->view->render($this->routeView);
	}
	public function formatosAdmin()
	{
        if ($this->validatorAuth($this->auth)) {	
			if($_SESSION['usuario']['type'] == 'alumno'){
				$this->localRedirect('alumnos/formatos');
			}
			$formatos = $this->model->GetFormatos();
			$this->view->Formatos = $formatos;
			$this->render();
			
        
        }else{
            $this->localRedirect('login');
        }
	  }
	  public function carga()
	  {
		if ($this->validatorAuth($this->auth)) {	
			if($_SESSION['usuario']['type'] == 'alumno'){
				$this->localRedirect('alumnos/formatos');
			}
			if (!empty($_FILES)) {
				$this->model->SubirArchivo($_FILES['file']['tmp_name'],$_FILES['file']['name'],$_POST['name_file'] . '.' . explode('.',$_FILES['file']['name'])[1]);
			}      
        }else{
            $this->localRedirect('login');
		}
	  }
	  public function actualizar()
	  {
		if ($this->validatorAuth($this->auth)) {	
			if($_SESSION['usuario']['type'] == 'alumno'){
				$this->localRedirect('alumnos/formatos');
			}
			if (!empty($_FILES)) {
				$this->model->ActualizarArchivo($_FILES['file']['tmp_name'],$_FILES['file']['name'],$_POST['name_file'] . '.' . explode('.',$_FILES['file']['name'])[1],$_POST['name_file_old']);
			}      
        }else{
            $this->localRedirect('login');
		}
	  }
	
}
?>