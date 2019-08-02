<?php  
/**
 * 	Controlador que gestiona acciones de los alumnos
 */


#
class NadminController extends Controller
{

	
	function __construct()
	{

		$this->auth = new AuthValidator();
		$this->validatorAuth($this->auth);
		// if (!$auth->makeAuth()) 
			// $this->localRedirect('login');		
		
		parent::__construct();
		$this->modeln    = "Nadmin"; 
		$this->path      = "nadmin";
		$this->routeView = "superadministradores/nuevoadmin";
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

public function crear_admin(){

	$this->render();
	
	if(isset($_POST['mat'])){

	$matricula = $_POST['mat'];
	$pass = $_POST['pas'];
	$email = $_POST['ema'];
	$carrera = $_POST['car'];
	$type = 'admin';
	$name = $_POST['nom'];

	$this->model->addAdmin($matricula, $pass, $email, $carrera, $type, $name);

	//$this->model->addAdmin(20160023,'123','prueba1@weds','adds','admin');
	}
}

}
?>