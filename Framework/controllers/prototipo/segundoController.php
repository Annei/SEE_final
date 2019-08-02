<?php  
/**
 * 	Controlador Segundo prototipo rutas
 */


#
class SegundoController extends Controller
{

	
	function __construct()
	{

		$this->auth = new AuthValidator();
		$this->validatorAuth($this->auth);
		// if (!$auth->makeAuth()) 
			// $this->localRedirect('login');		
		
		parent::__construct();
		$this->modeln    = "Horario";//HorarioModel 
		$this->path      = "horario";//models/horario
		$this->routeView = "sinvista";
	}

	public function render(){
		$this->view->render($this->routeView);
	}

    // HORARIO
    // VICTOR ALBORNOZ

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
    // retorna clave de la carrera y grupo actual
	public function buscar(){
		echo "Estas buscando los datos de un alumno";
		$dbfData = $this->model->getGrupo($_SESSION['usuario']['matricula']);
		var_dump($dbfData);
    }
    
    // solo busca el grupo actual, individualmente
	public function buscarGrupoActual(){
		$dbfData = $this->model->getGrupoActual('matricula');
		var_dump($dbfData);
    }
    // solo busca la clave
	public function buscarclave(){
        echo "Estas buscando la clave del alumno";
        $data = $this->model->getClave($_SESSION['usuario']['matricula']);
        echo $data;
        $neros = $data;
        var_dump($data);
    }
    // clave de plan de estudios, clave carrera, clave complementaria,clave de grupo actual
    // retorna el horario actual
    public function buscarHorario(){
        echo "Estas buscando los datos de un alumno";
        $data = $this->model->getHorarios(3192,2,'B','09A ');
        var_dump($data);
        echo "####<br>";
        $i = 0;
        for($i = 0; $i < 6; $i++){

            $data[$i]['nom'] = "nom";
            echo $data[$i]['materia']."<br>";
            echo $data[$i]['grupo']."<br>";
            echo $data[$i]['lunes']."<br>";
            echo $data[$i]['martes']."<br>";
            echo $data[$i]['miercoles']."<br>";
            echo $data[$i]['jueves']."<br>";
            echo $data[$i]['viernes']."<br>";
            echo $data[$i]['nom']."<br>";
        }
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
    //smater
    public function MaterNombre(){
        echo"Estas buscando las materias";
        $dbfData = $this->model->getMaterNombre('SII');
        die(var_dump($dbfData));
    }


    // FIN VICTOR ALBORNOZ
    // FIN HORARIO
    
	

}
?>