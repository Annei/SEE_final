<?php  
/**
 *@author: Universidad Politecnica - Gustavo
 *@description: Modelo para los formatos
 */
class FormatosModel extends Model
{
	
	function __construct()
	{
        parent::__construct();
        
        # FUNCIONES FTP 
        # CONSTANTES 
        # Cambie estos datos por los de su Servidor FTP
        //define("SERVER","127.0.0.1"); //IP o Nombre del Servidor
        //define("PORT",14147); //Puerto
        //define("USERFTP","admin"); //Nombre de Usuario
        //define("PASSWORDFTP",""); //Contraseña de acceso
        //define("PASV",true); //Activa modo pasivo
	}
    # FUNCIONES
    public function ConectarFTP(){
        //Permite conectarse al Servidor FTP
        $id_ftp=ftp_connect("127.0.0.1"); //Obtiene un manejador del Servidor FTP
        ftp_login($id_ftp,"adminformatos",""); //Se loguea al Servidor FTP
        ftp_pasv($id_ftp,true); //Establece el modo de conexión
        return $id_ftp; //Devuelve el manejador a la función
    }
    public function SubirArchivo($archivo_local,$archivo_remoto,$rename){
        //Sube archivo de la maquina Cliente al Servidor (Comando PUT)
        $id_ftp=$this->ConectarFTP(); //Obtiene un manejador y se conecta al Servidor FTP 
        ftp_put($id_ftp,$archivo_remoto,$archivo_local,FTP_BINARY);
        ftp_rename($id_ftp, $archivo_remoto, $rename);
        ftp_quit($id_ftp); //Cierra la conexion FTP
        //Sube un archivo al Servidor FTP en modo Binario
    }
    public function ActualizarArchivo($archivo_local,$archivo_remoto,$rename,$old_name){
        //Sube archivo de la maquina Cliente al Servidor (Comando PUT)
        $id_ftp=$this->ConectarFTP(); //Obtiene un manejador y se conecta al Servidor FTP 
        ftp_delete($id_ftp, $old_name);
        ftp_put($id_ftp,$archivo_remoto,$archivo_local,FTP_BINARY);
        ftp_rename($id_ftp, $archivo_remoto, $rename);
        ftp_quit($id_ftp); //Cierra la conexion FTP
        //Sube un archivo al Servidor FTP en modo Binario
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
     /**
	 * Metodo: getFormatos
	 * Descripcion: Se obtinen los formatos alojados en el servidor
	 * Autor: Gustavo Martinez
	 * Fecha: 14/06/2019 **/
	public function GetFormatos(){
        
        $id_ftp= $this->ConectarFTP();
        $ruta = $this->ObtenerRuta();
        $lista=ftp_nlist($id_ftp,$ruta);
        $lista = array_reverse($lista);
        return $lista;
    }
}
?>