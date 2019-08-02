<?php

class NadminModel extends Model
{
	
	function __construct()
	{
		parent::__construct();
		$this->table = 'sinTablita:3';
	}

	public function getSuper($matricula){

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

	//MI CAMBIO CHIDO
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
							'nombre'    => $fila['ALUAPP'].' '.$fila['ALUAPM'].' '.$fila['ALUNOM'],
							'cumple'    => $fila['ALUNAC'],
							'direccion' => $fila['ALUTCL'].' '.$fila['ALUTNU'].' '.$fila['ALUTCO'],
							'cp'        => $fila['ALUTCP'],
							'cel'       => $fila['ALUTTE1'],
							'tel'       => $fila['ALUTTE2'],
							'email'     => $fila['ALUTMAI'],
							'curp'      => $fila['ALUCUR'],
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


	/**
	 * AGREGAR UN NUEVO ADMINISTRADOR
	 * @param INT 		$matricula [description]
	 * @param STRING 	$nombre    [description]
	 * @param TEXT 		$pass      ENCRIPTADO
	 * @param EMAIL 	$email     [description]
	 * @param INT 		$carrera   [description]
	 */
	public function addAdmin($matricula, $pass, $email,$carrera, $type, $name){
		
		$items = [];
		try{

			//$sql = "CALL agregar_admin(:matricula,:nombre,:pass,:email,:carrera,:type);";
			$sql = "CALL agregar_admin(:matricula,:pass,:email,:carrera,:type,:nombre);";
			$query = $this->DB->MYSQLconnect()->prepare($sql);
			
			$data = [
				':matricula' => $matricula,
				//':pass'      => $pass,
				':pass'      => password_hash($pass, PASSWORD_DEFAULT),
				':email'     => $email,
				':carrera'   => $carrera,
				':type'      => $type,
				':nombre'	 => $name,
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