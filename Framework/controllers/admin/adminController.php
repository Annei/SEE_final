<?php  
/**
 * 	Controlador que gestiona acciones de los alumnos
 */


#
class AdminController extends Controller
{

	
	function __construct()
	{

		$this->auth = new AuthValidator();
		$this->validatorAuth($this->auth);
		// if (!$auth->makeAuth()) 
			// $this->localRedirect('login');		
		
		parent::__construct();
		$this->modeln    = "Alumno"; 
		$this->path      = "alumno";
		$this->routeView = "admin/datosGeneralesAdmin";
	}

	public function render(){
		$this->view->render($this->routeView);
	}

	public function datosGenerales()
	{
		if ($this->validatorAuth($this->auth)) {
			
		$datos = $this->model->getDbfUser($_SESSION['usuario']['matricula']);
			var_dump($datos);
			$this->view->datos = $datos;
			$this->render();
		}else{
			$this->localRedirect('login');
		}
		
	}


// VICTOR MALVADO
	public function getKardex(){
		echo "Estas buscando informacion del kardex <br>";
		$dbfData = $this->model->kardex(201600110);
		die(var_dump($dbfData));
	}
// JUANILLO Y GLORIA
	public function academicDataMethod()
	{
        //Se manda llamar el metodo para obtener datos get Bla bla bla
        echo 'Hola, soy el método Controller y fui llamado c:    ';
        if ($this->validatorAuth($this->auth)) {
            $getAcademicData = $this->model->getAcademicData($_SESSION['usuario']['matricula']);
            var_dump($getAcademicData);   
            
        }else{
            $this->localRedirect('login');
        }
  	}
//  WAKAI, KWAI, VICTOR ALBORNOZ
public function horario(){
	if ($this->validatorAuth($this->auth)) {
		
	$datos = $this->model->getDbfUser($_SESSION['usuario']['matricula']);
	$dbfData = $this->model->getGrupo($_SESSION['usuario']['matricula']);
	//$periodo = $this->model->getPeriodo(2);
		//var_dump($datos);
		$this->view->dbfData = $dbfData;
		$this->view->datos = $datos;
		$this->render();
	}else{
		$this->localRedirect('login');
	}
	
}
/*public function buscar(){
	echo "Estas buscando los datos de un alumno";
	$dbfData = $this->model->getGrupo($_SESSION['usuario']['matricula']);
	die(var_dump($dbfData));
}*/
public function buscarGrupoActual(){
	$dbfData = $this->model->getGrupoActual('matricula');
	die(var_dump($dbfData));
}
public function buscarclave(){
	echo "Estas buscando la clave del alumno";
	$data = $this->model->getClave($_SESSION['usuario']['matricula']);
	echo $data;
	$neros = $data;
	die(var_dump($data));
}
public function buscarHorario(){
	echo "Estas buscando los datos de un alumno";
	$dbfData = $this->model->getHorarios(3192,2,'B','09A ');
	die(var_dump($dbfData));
}
public function periodo($data){
	echo"Estas buscando los periodos";
	echo ( int )$data;
	$dbfData = $this->model->getPeriodo(3192);
	die(var_dump($dbfData));
}
 public function Carrera(){
	echo"Estas buscando los horarios";
	$dbfData = $this->model->getCarrera(2);
	die(var_dump($dbfData));
}
public function Matter(){
	echo"Estas buscando las materias";
	$dbfData = $this->model->getmatter(3192, 201600057);
	die(var_dump($dbfData));
}
public function MaterNombre(){
	echo"Estas buscando las materias";
	$dbfData = $this->model->getMaterNombre('');
	die(var_dump($dbfData));
}









// UZIEL

public function getcalif()
{
	echo "Estoy buscando las  califiaciones prro <br><br>";
	
	// Obtener el periodo
	$this ->model->getPeriodol(201600088);
	// aqui pasas tambien el periodo en el segundo parametro pero formateado
	$dbf= $this ->model->getcalif(201600088,3192);
	die(var_dump($dbf));
}


# CAMBIAR CONTRASEÑA

public function cambiaPass(){
	#HOLA, NO SE TE OLVIDE QUE DEBEN ENCRIPTAR LA CONTRASEÑA ;)
	$this->model->cambiaPass(201600112,'secret');

}









}
?>