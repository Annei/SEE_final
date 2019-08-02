<?php  
/**
 * 
 */
class AuthModel extends Model
{
	
	function __construct()
	{
		parent::__construct();
		$this->table = 'sinTablita:3';
	}

	public function getUser($matricula){

		try{
			
			$query = $this->DB->MYSQLconnect()->prepare("call getUser(:matri);");
			$data = [
				':matri' => $matricula
			];
			$query->execute($data);
				
			return $query->fetch();

		}catch(PDOException $e){
			echo "<br> error ".$e." <br>";
			return null;
		}
	}


	public function getDbfUser($matricula){
		$con = $this->DB->DBFconnect('DALUMN');
		$aux = null;

		if ($con) {
			$numero_registros = dbase_numrecords($con);
			

          for ($i = 1; $i <= $numero_registros; $i++) {

              $fila = dbase_get_record_with_names($con, $i);
               
              if (strcmp($fila["ALUCTR"],$matricula) == 0) {
              		// $aux = $fila;
              		$aux = [
							'matricula' => $fila['ALUCTR'],
							'nombre'    => trim($fila['ALUAPP']).' '.trim($fila['ALUAPM']).' '.trim($fila['ALUNOM']),
							'cumple'    => trim($fila['ALUNAC']),
							'direccion' => trim($fila['ALUTCL']).' '.trim($fila['ALUTNU']).' '.trim($fila['ALUTCO']),
							'cp'        => trim($fila['ALUTCP']),
							'cel'       => trim($fila['ALUTTE1']),
							'tel'       => trim($fila['ALUTTE2']),
							'email'     => trim($fila['ALUTMAI']),
							'curp'      => trim($fila['ALUCUR']),
							'sex'       => (strcmp($fila['ALUSEX'],'1') == 0 ? 'Hombre': 'Mujer')
              		];
              		break;
              }
              
              
          }

          dbase_close($con);
          return $aux;
		}
		return null;

	}

	public function addUser($alumn){
		
		$items = [];
		try{

			$sql = "CALL addAlumno(:matricula,:nombre,:pass,:email,:index);";
			$query = $this->DB->MYSQLconnect()->prepare($sql);
			
			$data = [
				':matricula' => trim($alumn['matricula']),
				':nombre'	 => $alumn['nombre'],
				':pass'      => 'secret',
				':email'     => trim($alumn['matricula']).'@estudiantes.upqroo.edu.mx',
				':index'     => -1,
			];
			
			$query->execute($data);
			
			// $this->DB = null;
			return true;

		}catch(PDOException $e){
			echo "<br> error ".$e." <br>";
			return false;
		}

	}


	/**
	 * AGREGAR UN NUEVO ADMINISTRADOR
	 * @param INT 		$matricula [description]
	 * @param STRING 	$nombre    [description]
	 * @param TEXT 		$pass      ENCRIPTADO
	 * @param EMAIL 	$email     [description]
	 * @param INT 		$carrera   [description]
	 */
	public function addAdmin($matricula, $nombre, $pass, $email,$carrera, $type){
		
		$items = [];
		try{

			$sql = "CALL agregar_admin(:matricula,:nombre,:pass,:email,:carrera, :type);";
			$query = $this->DB->MYSQLconnect()->prepare($sql);
			
			$data = [
				':matricula' => $matricula,
				':nombre'	 => $nombre,
				//':pass'      => $pass,
				':pass'      => password_hash($pass, PASSWORD_DEFAULT),
				':email'     => $email,
				':carrera'   => $carrera,
				':type'      => $type,
			];
			
			$query->execute($data);
			
			// $this->DB = null;
			return true;

		}catch(PDOException $e){
			echo "<br> error ".$e." <br>";
			return false;
		}

	}

	public function cambiaPass($matricula, $pass){
		
		$items = [];
		try{


			$sql = "call cambia_pass(:matricula,:pass);";
			$query = $this->DB->MYSQLconnect()->prepare($sql);
			
			$data = [
				':matricula' 	=> trim($matricula),
				':pass'	 		=> $pass,
			];
			
			$query->execute($data);
			
			// $this->DB = null;
			return true;

		}catch(PDOException $e){
			echo "<br> error ".$e." <br>";
			return false;
		}

	}


}
?>