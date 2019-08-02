<?php  
/**
 * 	Controlador que gestiona acciones de los alumnos
 */
#
class HorarioController extends Controller
{
	function __construct()
	{

		$this->auth = new AuthValidator();
		$this->validatorAuth($this->auth);
		


		// if (!$auth->makeAuth()) 
			// $this->localRedirect('login');		
		
		parent::__construct();
		$this->modeln    = "Horario"; 
		$this->path      = "horario";
		$this->routeView = "horario/horario2";
	}

	public function render(){
		$this->view->render($this->routeView);

	}

	public function horario(){
		if ($this->validatorAuth($this->auth)) {
			
		$datos = $this->model->getDbfUser($_SESSION['usuario']['matricula']);
		//$dbfData = $this->model->getGrupo($_SESSION['usuario']['matricula']);

		$getAcademicPeriod = $this->model->procesarDatosPeriodo($_SESSION['usuario']['matricula']);
		$this->view->getAcademicPeriod = $getAcademicPeriod;
		 
		 $getAcademicMat = $this->model->procesarDatosMaterias($_SESSION['usuario']['matricula']);
		$this->view->vector = $getAcademicMat;
		var_dump($this->view->vector);
		
		//Nombre del periodo
		$nclave = $this->model->getClave($_SESSION['usuario']['matricula']);
		$this->view->nclave = $nclave;			
		$data = $this->model->getPeriodo($nclave);
		$this->view->data = $data;     
		$this->view->datos = $datos;
		$this->render();
		
		

		$this->horario2();
		}else{
			$this->localRedirect('login');
		}
		

	}
	public function horario2(){
		if ($this->validatorAuth($this->auth)) {
			
		$datos = $this->model->getDbfUser($_SESSION['usuario']['matricula']);
		//$dbfData = $this->model->getGrupo($_SESSION['usuario']['matricula']);

		$getAcademicPeriod = $this->model->procesarDatosPeriodo($_SESSION['usuario']['matricula']);
		$this->view->getAcademicPeriod = $getAcademicPeriod;
		 
		 $acade = $this->model->procesarDatosMaterias($_SESSION['usuario']['matricula']);
		$this->view->vector = $acade;







		$dias = [
			0 => "lunes",
			1 => "martes",
			2 => "miercoles",
			3 => "jueves",
			4 => "viernes"
		];

		$horas = [];

		$hI = 700;
		$hI2 = 700;
		$k = 0;
		//Validando horas y dias en un nuevo array.
		//echo sizeof($acade);
		foreach ($acade as $mat){
			$horas[$k]["grupo"] = trim($mat["grupo"]);
			$horas[$k]["clave"] = trim($mat["clave_materia"]);
			$horas[$k]["nombreMat"] = trim($mat["nombre_mater"]);
			$horas[$k]["creditos"] = trim($mat["cr"]);
			$horas[$k]["nombre"] = "sin nombre";

			for ($i = 0; $i < 5; $i++){
				if(strcmp(trim($mat[$dias[$i]]),"") == 0){ 
					$horas[$k][$dias[$i]][0] = -1;
					$horas[$k][$dias[$i]][1] = -1;
					//Modulos
					$horas[$k][$dias[$i]][2] = -1;
				}
				else{
					//$horas[$k][$dias[$i]] = str_split(trim($mat[$dias[$i]],4));
					$horas[$k][$dias[$i]][0] =substr(trim($mat[$dias[$i]]), 0, 4);
					$horas[$k][$dias[$i]][1] =substr(trim($mat[$dias[$i]]), 4, 8);

					$horaInicio = new DateTime($horas[$k][$dias[$i]][0]);
					$horaTermino = new DateTime($horas[$k][$dias[$i]][1]);

					$interval = $horaInicio->diff($horaTermino);
					$h =  ((int)$interval->format('%H'));
					$m = ((int)$interval->format('%i'));
					$modulos = (($h * 60) + $m)/50;
					$horas[$k][$dias[$i]][2] = $modulos;
				}


			}
			$k++;

		}
		/*echo "<pre>";
		print_r($horas);
		echo "</pre>:c";
		*/
		$matutino = 1;
		for($i = 0; $i < sizeof($horas); $i++){
			//7 por el numero de clases.
			for($k = 0; $k < 5;$k++){
				if($horas[$i][$dias[$k]][0] != -1 && $horas[$i][$dias[$k]][0] < 1400 )
				{
					//echo "wacha aqui" . $horas[$i][$dias[$k]][0] . "<br>";
					$matutino = 0;
					break;

				}
			}
			/*if($matutino==1){
				break;
			}*/
		}
		$plus = 0;
		$auxiliar = [
			'lunes' => array(),
			'martes' => array(),
			'miercoles' => array(),
			'jueves' => array(),
			'viernes' => array(),
		];
		/*if($matutino){
			$auxiliar = [
				0700 => '',
				0750 => '',
				0840 => '',
				0940 => '',
				1030 => '',
				1120 => '',
				1210 => '',
				
			];

		}
		else{
			$auxiliar = [
				1400 => '',
				1450 => '',
				1500 => '',
				1600 => '',
				1650 => '',
				1740 => '',
				1830 => '',
				
			];

		}*/
		//hI
		
			for($f = 0; $f < sizeof($horas); $f++){
				
				for($k = 0; $k < 5;$k++){
					//modulos
					$m = $horas[$f][$dias[$k]][2];
					if ($m == 3.2){
						$m = 3;
					}
					if ($m == 2.2){
						$m = 2;
					}
					//echo "<br>Moulos".$m."<br>";
					if($m > 1 && $horas[$f][$dias[$k]][2] != -1){
						$horaInicial= (string)$horas[$f][$dias[$k]][0];
					
						
						//echo "<br>###MODULOOOS#### ". $m;
						for($j = 0; $j < $m; $j++){

							

							//echo "<br>###REPITIENDO#### ". $j;
							$minutoAnadir 			= 50;
							$segundos_horaInicial	= strtotime($horaInicial);
							$segundos_minutoAnadir	= $minutoAnadir*60;
							$nuevaHora = date("H:i",$segundos_horaInicial+$segundos_minutoAnadir);
							$horaInicial = $nuevaHora;
							//echo "<br> ####". $nuevaHora;
							// hacer un split formato 12:10

							$hsplit = substr(trim((string)$nuevaHora), 1, 2);
							$msplit = substr(trim((string)$nuevaHora), 3, 4);
						


							$h =  $hsplit;
							$minu = $msplit;
							

							if(($h == 9 && $minu == 30) || ($h == 16 && $minu == 40)){
								$minutoAnadir 			= 10;
								$segundos_horaInicial	= strtotime($horaInicial);
								$segundos_minutoAnadir	= $minutoAnadir*60;
								$nuevaHora2 = date("H:i",$segundos_horaInicial+$segundos_minutoAnadir);
								$horaInicial 			= $nuevaHora2;
							}
							

							$ax = [
								'hora' => 	$horaInicial,
								'nombre' => $horas[$f]['nombreMat'],
								'claves' => $horas[$f]['clave'],
								'modulos' => $m,
							];
							
							$nuevaHora;
							//array_push($auxiliar[$dias[$k]],$ax);
							$auxiliar[$dias[$k]][$horaInicial] = $ax;
							//echo "<br>".$horas[$f]['clave'];

						}
						


					}
					elseif($horas[$f][$dias[$k]][0] != -1){
						$horaInicial= (string)$horas[$f][$dias[$k]][0];
						$minutoAnadir 			= 50;
						$segundos_horaInicial	= strtotime($horaInicial);
						$segundos_minutoAnadir	= $minutoAnadir*60;
						$nuevaHora = date("H:i",$segundos_horaInicial+$segundos_minutoAnadir);
						$horaInicial = $nuevaHora;

						$ax = [
							'hora' => $horaInicial,
							'nombre' => $horas[$f]['nombreMat'],
							'claves' => $horas[$f]['clave'],
							'modulos' => $m,
							
						];
						//array_push($auxiliar[$dias[$k]],$ax);
						$auxiliar[$dias[$k]][$horaInicial] = $ax;
						//echo "<br>".$horas[$f]['clave'];
					}
					//echo "<br>".$horas[$f]['clave'];
				
				}
			}
//5 > 9 ? v:f ;
		
		/*echo "<pre>";
		print_r($auxiliar);
		echo "</pre>";
		*/
		$this->view->horario = $auxiliar;
		$this->view->turno = $matutino;

				//Nombre del periodo
				$nclave = $this->model->getClave($_SESSION['usuario']['matricula']);
				$this->view->nclave = $nclave;			
				$data = $this->model->getPeriodo($nclave);
				$this->view->data = $data;     
				$this->view->datos = $datos;
		$this->render();
	/*$horaInicio = new DateTime('07:00:00');
		$horaTermino = new DateTime('08:40:00');

		$interval = $horaInicio->diff($horaTermino);
		$h =  ((int)$interval->format('%H'));
		$m = ((int)$interval->format('%i'));
		echo (($h * 60) + $m)/50;
		echo $interval->format('%H horas %i minutos %s seconds');
		*/



		
		}else{
			$this->localRedirect('login');
		}
		

	}

}



?>



