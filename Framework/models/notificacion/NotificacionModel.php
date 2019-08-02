<?php  
/**
 * Raul Navarrete
 * Modelo Modulo de Noticias
 */
class NotificacionModel extends Model
{
	
	function __construct(){
		parent::__construct();
		$this->table = 'sinTablita:3';
	}

		# FUNCIONES
		public function ConectarFTP(){
			//Permite conectarse al Servidor FTP
			$id_ftp=ftp_connect("127.0.0.1"); //Obtiene un manejador del Servidor FTP
			ftp_login($id_ftp,"administrador",""); //Se loguea al Servidor FTP
			ftp_pasv($id_ftp,true); //Establece el modo de conexión
			return $id_ftp; //Devuelve el manejador a la función
		}
	
		public function SubirArchivo($archivo_local,$archivo_remoto){
			//Sube archivo de la maquina Cliente al Servidor (Comando PUT)
			$id_ftp=$this->ConectarFTP(); //Obtiene un manejador y se conecta al Servidor FTP 
			ftp_put($id_ftp,$archivo_remoto,$archivo_local,FTP_BINARY);
			//Sube un archivo al Servidor FTP en modo Binario
			ftp_quit($id_ftp); //Cierra la conexion FTP
		}
	
		public function ObtenerRuta(){
			//Abriene ruta del directorio del Servidor FTP (Comando PWD)
			$id_ftp=$this->ConectarFTP(); //Obtiene un manejador y se conecta al Servidor FTP 
			$Directorio=ftp_pwd($id_ftp); //Devuelve ruta actual p.e. "/home/willy"
			ftp_quit($id_ftp); //Cierra la conexion FTP
			return $Directorio; //Devuelve la ruta a la función
		}
	
		public function Descargar($file){
			
			//Obriene ruta del directorio del Servidor FTP (Comando PWD)
			$id_ftp=$this->ConectarFTP(); //Obtiene un manejador y se conecta al Servidor FTP 
			ftp_get($id_ftp, $file, $file, FTP_BINARY); // Descarga el $server_file y lo guarda en $local_file
			ftp_quit($id_ftp); //Cierra la conexion FTP
		}
	


	public function crearNotificacion($title,$texto, $imagen, $carrera, $matricula){
		try{

			$sql = "CALL crear_notificacion(:title,:texto,:imagen,:carrera,:matricula);";
			$query = $this->DB->MYSQLconnect()->prepare($sql);
			
			$data = [
				':title'		=> $title,
				':texto' 		=> $texto,
				':imagen'	 	=> $imagen,
				':carrera'      => $carrera,
				':matricula'    => $matricula
			];
			
			$query->execute($data);
			
			// $this->DB = null;
			return true;

		}catch(PDOException $e){
			echo "<br> error ".$e." <br>";
			return false;
		}
	}


	public function getNoticia(){
		// traer_notificaciones
		
		try{
			
			$query = $this->DB->MYSQLconnect()->prepare("call traer_notificaciones();");
			
			$query->execute();
			
			$aux = [];	
			foreach ($query as $q) {

				array_push($aux,$q);
			}
		

			return $aux;

		}catch(PDOException $e){
			echo "<br> error ".$e." <br>";
			return null;
		}


	}

	/**
	 * [editNoticia description]
	 * @param  string $texto     [description]
	 * @param  string $image     path
	 * @param  int $carrera   [description]
	 * @param  [int] $idNoticia [description]
	 * @return [type]            [description]
	 */
	public function editNoticia($title,$texto, $image, $carrera, $idNoticia){
		try{


			$sql = "CALL editar_notificacion(:title,:texto,:imagen,:carrera,:id)";
			$query = $this->DB->MYSQLconnect()->prepare($sql);
			
			$data = [
				':title'	=> $title,
				':texto' 	=> $texto,
				':imagen' 	=> $image,
				':carrera' 	=> $carrera,
				':id' 		=> $idNoticia,
				
			];
			
			$query->execute($data);
			
			// $this->DB = null;
			return true;

		}catch(PDOException $e){
			echo "<br> error ".$e." <br>";
			return false;
		}

	}



	public function getCarreras(){
		$con = $this->DB->DBFconnect('DCARRE');
		$car = [];

		if ($con) {
			$numero_registros = dbase_numrecords($con);
			

          	for ($i = 1; $i <= $numero_registros; $i++) {

	              $fila = dbase_get_record_with_names($con, $i);
	               
	              $aux = [
	              	'clave' 	=>$fila['CARCVE'],
	              	'nombre' 	=>$fila['CARNOM'],
	              	'nombre2' 	=>$fila['CARNCO'],
	              ];
	              array_push($car,$aux);
              
              
          	}

          dbase_close($con);
          return $car;
		}
		return null;

	}
	




}
?>