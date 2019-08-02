<?php  
/**
 * 
 */

class AuthController extends Controller
{
	
	function __construct()
	{

		$this->auth = new AuthValidator();
		

		parent::__construct();
		
		$this->modeln    = "Auth";	
		$this->path      = "auth";	//dentro de carpeta
		$this->routeView = "auth/login";
	}

	public function render(){
		if ($this->auth->makeAuth()) {
			echo "Existe";
			switch ($_SESSION['usuario']['type']) {
				case 'alumno':
					$this->localRedirect('alumnos/datos');
					break;
				case 'admin':
				//echo "eres admin";
					$this->localRedirect('administador/datos');
					break;
				case 'superadmin':
					$this->localRedirect('super-administrador/datos');
					break;
				
				default:
					echo "No existe ese tipo de usuario";
					break;
			}
		}else {
			// echo "no existe";
			$this->view->render($this->routeView);
			
		}	
	}

	public function login(){

		if (isset($_POST['matricula']) && isset($_POST['pass'])) {
			$matricula = $_POST['matricula'];
			$pass      = $_POST['pass'];

			if (filter_var($matricula, FILTER_VALIDATE_INT) && !strcmp($pass, '') == 0) {
				

				$user = $this->model->getUser($matricula);
				$admin = $this->model->getUser($matricula);
				// el usuario esta en ddbb MYSQL
				if ($user) {
					// echo "Estas en mysql <br>";
					if (strcmp($user['pass'],$pass) == 0 || password_verify($pass, $admin['pass'])) {
						
						$_SESSION["usuario"]=[
							'matricula'  => $user['matricula'],
							'nombre'	 => $user['nombre'],
							'index'      => $user['indexx'],	
							'type'       => $user['type'],
							# Datos que pueden tener o no
							'email'      => $user['email'], 
							'email_pass' => $user['email_pass'],
							#solo los admin tienen este campo (en esta tabla MYSQL)
							'carrera'    => $user['carrera'],
						];
						$alumn = $this->model->getDbfUser($matricula);
						$admin = $this->model->getUser($matricula);
						$superAdmin = $this->model->getUser($matricula);

						switch ($_SESSION['usuario']['type']) {
							case 'alumno':
								$mat = $alumn['matricula'];
								$this->localRedirect('alumnos/datos');
								break;
							case 'admin':
								//echo "eres admin";
								$this->localRedirect('administrador/datos');
								break;
							case 'superadmin':
								$mate = $superAdmin['matricula'];	

								$this->localRedirect('super-administrador/datos');
								
								// $this->view->alumn = $alumn;
								// $this->view->render('alumnos/datosGenerales');
								break;
							
							default:
								echo "No existe ese tipo de usuario";
								break;
						}

					}else{
					//	echo "credenciales invalidas";
						$this->view->error = "Credenciales invalidas :c 1";
						$this->render();
					}
				}else {
					$alumn = $this->model->getDbfUser($matricula);
					$admin = $this->model->getDbfUser($matricula);
					$superAdmin = $this->model->getDbfUser($matricula);

					if ($alumn) {
						// var_dump($alumn);
						// crear registro en mysql
						echo "<br>Crear registro";
						if ($this->model->addUser($alumn)) {
							$_SESSION["usuario"]=[
								'matricula'  => trim($alumn['matricula']),
								'index'      => -1,
								'type'       => 'alumno',
								# Datos que pueden tener o no
								'email'      => trim($alumn['matricula']).'@upqroo.edu.com', 
								'email_pass' => 'secret2',
								#solo los admin tienen este campo (en esta tabla MYSQL)
								'carrera'    => '--',
							];

							switch ($_SESSION['usuario']['type']) {
							case 'alumno':
								$mat = $alumn['matricula'];
								$this->localRedirect('alumnos/datos');
								break;
							case 'admin':
							//echo "eres admin";
								$mate = $admin['matricula'];
								$this->localRedirect('administrador/datos');
									// $this->view->alumn = $alumn;
									// $this->view->render('alumnos/datosGenerales');
								break;
							case 'superadmin':
							//echo "eres Super admin";
								$mate = $superAdmin['matricula'];
								$this->localRedirect('super-administrador/datos');
								// $this->view->alumn = $alumn;
								// $this->view->render('alumnos/datosGenerales');
								break;
							
							default:
								echo "No existe ese tipo de usuario";
								break;
						}
						}else {
							echo "<br>No se pudo crear usuario";
						}

					}else{
						// echo "credenciales invalidas usuario no existe";
						//include './views/alerts/Headers.php';
						//echo '<script language="javascript" src="/SEE/framework/public/jquery/Warning.js"></script>';
						$this->view->error = "Credenciales invalidas :c 2";
						$this->render();
					}
				}
				
				// print_r($_SESSION["usuario"]);
				// print_r($user);
				// unset($_SESSION["usuario"]);
			}

			
		}else{

			$this->localRedirect('login');
		}
		// se pueden mandar errores, get


	}

	public function cambiaPass(){
	echo $matricula = $_POST['matricula']; 
	#HOLA, NO SE TE OLVIDE QUE DEBEN ENCRIPTAR LA CONTRASEÑA ;)
	$this->model->cambiaPass($matricula, 'secret');
	$this->localRedirect('login');
	}


	public function logout()
	{
		if (isset($_SESSION['usuario'])) {
			unset($_SESSION['usuario']);
		}
		$this->localRedirect('login');
	}

}
?>