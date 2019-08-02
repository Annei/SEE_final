<?php  
/**
 * 	Controlador que gestiona acciones de los alumnos
 */


#
class SuperController extends Controller
{

	
	function __construct()
	{

		$this->auth = new AuthValidator();
		$this->validatorAuth($this->auth);
		// if (!$auth->makeAuth()) 
			// $this->localRedirect('login');		
		
		parent::__construct();
		$this->modeln    = "Super"; 
		$this->path      = "super";
		$this->routeView = "superadministradores/superadmin";
	}

	public function render(){
		$this->view->render($this->routeView);
	}

	public function datosGeneralesSuper()
	{
		if ($this->validatorAuth($this->auth)) {
			
		$datos = $this->model->getSuper($_SESSION['usuario']['matricula']);
			$this->view->datos = $datos;
			//var_dump($datos);
			$this->render();
		}else{
			$this->localRedirect('login');
		}
		
	}


public function cambiaPass(){
	#HOLA, NO SE TE OLVIDE QUE DEBEN ENCRIPTAR LA CONTRASEÑA ;)
	$this->model->cambiaPass(201600112,'secret');
}

}
?>