<?php  
/**
 * 
 */
class AlumnoModel extends Model
{
	
	function __construct()
	{
		parent::__construct();
		$this->table = 'sinTablita:3';
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


	public function getClave($matricula)
    {
        $datos = $this->DB->DBFconnect('DLISTA');
     	  $info = array();
        $aux = 0;

        if($datos){

            $numero_registros = dbase_numrecords($datos);
            for($i = 1; $i <= $numero_registros; $i++){
                $fila = dbase_get_record($datos, $i);
                if(strcmp($fila[1], $matricula) == 0){
                    $info=$fila[0];
                    $aux++;
                }
            }
            return (int)$info;


        }

    }

    // PARTE DE VICTOR RIOS
    /* Retorna los creditos totales del plan de estudios.
	 * La informacion de los creditos totales se encuentra en el DBF DPLANE.
	 * Identifico el plan de estudios del alumno mediante la clave de la carrera
	 * y la clave del plan de estudios que se obtienen del DBF DCALUM en la funcion creditos.
	 * Informacion de las columnas del DBF DPLANE:
	 * CARCVE = clave de la carrera
	 * PLACVE = clave del plan de estudios
	 * PLACRE = creditos del plan de estudios
	 */
	public function creditosTotales($claveCarrera, $clavePlan){
		$datos = $this->DB->DBFconnect("DPLANE");
		if($datos){
			$numero_registros = dbase_numrecords($datos);
			for($i = 1; $i <= $numero_registros; $i++){
				$fila = dbase_get_record_with_names($datos, $i);
				if(strcmp($fila["CARCVE"], $claveCarrera) == 0 && strcmp($fila["PLACVE"], $clavePlan) == 0){
					return $fila['PLACRE']; 
				}
			}
		}
	}
	/* Retorna los creditos acumulados del alumno y los creditos totales del plan de estudios.
	 * La informacion de los creditos acumulados del alumno esta en el DBF DCALUM y retorno
	 * tambien los creditos totales para devolver (posteriormente) toda la informacion del
	 * kardex (necesaria) con un solo metodo.
	 * Informacion de las columnas del DBF DCALUM:
	 * ALUCTR = matricula del alumno
	 * CARCVE = clave de la carrera
	 * PLACVE = clave del plan de estudios
	 * CALCAC = creditos acumulados del alumno
	 */
	public function creditos($matricula){
		$datos = $this->DB->DBFconnect("DCALUM");
		$auxClase = new AlumnoModel;
		if($datos){
			$numero_registros = dbase_numrecords($datos);
			for($i = 1; $i <= $numero_registros; $i++){
				$fila = dbase_get_record_with_names($datos, $i);
				if(strcmp($fila["ALUCTR"], $matricula) == 0){
					$claveCarrera = $fila['CARCVE'];
					$clavePlan = $fila['PLACVE'];
					return $fila['CALCAC'].' de '. $auxClase->creditosTotales($claveCarrera, $clavePlan);
				}
			}
		}
	}
	/* Retorna el nombre de la materia
	 * La informacion del nombre de la materia se obtiene del DBF DMATER
	 * solo retorna el nombre de acuerdo a la clave de la materia
	 * Informacion de las columnas del DBF DMATER:
	 * MATCVE = clave de la materia
	 * MATNOM = nombre de la materia
	 */
	public function materia($claveMateria){
		$datos = $this->DB->DBFconnect("DMATER");
		if($datos){
			$numero_registros = dbase_numrecords($datos);
			for($i = 1; $i <= $numero_registros; $i++){
				$fila = dbase_get_record_with_names($datos, $i);
				if(strcmp($fila["MATCVE"], $claveMateria) == 0){
					return $fila['MATNOM'];
				}
			}
		}
	}
	/* Retorna la fecha del periodo
	 * La informacion de la fecha del periodo se obtiene del DBF DPERIO
	 * solo retorna la fecha de acuerdo a la clave del periodo
	 * Informacion de las columnas del DBF DPERIO:
	 * PDOCVE = clave del periodo
	 * PDODES = descripcion del periodo (fechas)
	 */
	public function periodo($clavePeriodo){
		$datos = $this->DB->DBFconnect("DPERIO");
		if($datos){
			$numero_registros = dbase_numrecords($datos);
			for($i = 1; $i <= $numero_registros; $i++){
				$fila = dbase_get_record_with_names($datos, $i);
				if(strcmp($fila["PDOCVE"], $clavePeriodo) == 0){
					return $fila['PDODES'];
				}
			}
		}
	}
	/* Retorna la informacion necesaria para la vista del kardex.
	 * La informacion de los creditos la obtiene del metodo creditos.
	 * La informacion del kardex la obtiene del DBF DKARDE.
	 * En la posicion 0,0 del array que se retorna se encuentra la informacion de los creditos
	 * posterior a eso (las siguientes posiciones del array) se encuentra la informacion del
	 * kardex, use el segundo for para introducir solo los datos necesarios en el array.
	 * Informacion de los valores del array info (despues de la informacion de los creditos):
	 * claveMat 	= clave de la materia
	 * nombreMat 	= nombre de la materia
	 * calfMat 		= calificacion de la materia
	 * opMat 		= forma en que se paso la materia (en el kardex la columna se llama Op.)
	 * cuatriPri 	= cuatrimestre en el que se curso la primera vez
	 * periodPri 	= clave del periodo en el que se curso la primera vez
	 * cuatriSeg 	= cuatrimestre en el que se curso la segunda vez (si es que reprobo)
	 * periodSeg 	= clave del periodo en el que se curso la segunda vez (si es que reprobo)
	 * especial 	= fecha en que se hizo una evaluacion especial (global)
	 */
	public function kardex($matricula){
		$datos = $this->DB->DBFconnect("DKARDE");
		$info = array();
		$auxClase = new AlumnoModel;
		$info[0]['creditos'] = $auxClase->creditos($matricula);
		if($datos){
			$numero_registros = dbase_numrecords($datos);
			for($i = 1; $i <= $numero_registros; $i++){
				
				$fila = dbase_get_record_with_names($datos, $i);
				if(strcmp($fila["ALUCTR"], $matricula) == 0){
					$aux = [
							'claveMat' 		=> $fila['MATCVE'],
							'nombreMat' 	=> $auxClase->materia($fila['MATCVE']),
							'calfMat'   	=> $fila['KARCAL'],
							'opMat' 		=> $fila['TCACVE'],
							'cuatriPri' 	=> $fila['KARNPE1'],
							'periodPri' 	=> $auxClase->periodo($fila['PDOCVE1']),
							'cuatriSeg' 	=> $fila['KARNPE2'],
							'periodSeg' 	=> $auxClase->periodo($fila['PDOCVE2']),
							'especial'  	=> $fila['KARFEC']
					];
					array_push($info, $aux);  
				}
			}
			return $info;
		}
	}
    // FIN PARTE VICTOR RIOS

    // PARTE DE KWAI
 
	public function getGrupo($matricula){
        $con = $this->DB->DBFconnect('DCALUM');
       $aux = null;
       if ($con) {
           $numero_registros = dbase_numrecords($con);
         for ($i = 1; $i <= $numero_registros; $i++) {
             $fila = dbase_get_record_with_names($con, $i);
             if (strcmp($fila["ALUCTR"],$matricula) == 0) {
                     // $aux = $fila;
                     $aux = [
                           'estudia' => "0".$fila["CARCVE"].$fila["PLACVE"].$fila["CALNPE"].$fila["CALGPO"]
                     ];
                     break;
             }
         }
         dbase_close($con);
         return $aux;
       }
       return null;
   }
 public function getGrupoActual ($matricula)
 {
   $con = $this->DB->DBFconnect('DCALUM');
       $aux = null;
       if ($con) {
           $numero_registros = dbase_numrecords($con);
         for ($i = 1; $i <= $numero_registros; $i++) {
             $fila = dbase_get_record_with_names($con, $i);
             if (strcmp($fila["ALUCTR"],$matricula) == 0) {
                     // $aux = $fila;
                     $aux = [
                           'estudia' => "0".$fila["CALNPE"].$fila["CALGPO"]
                     ];
                     break;
             }
         }
         dbase_close($con);
         return $aux;
       }
       return null;
 }
//  FUNCION REPETIDA
//    public function getClave($matricula)
//    {
//        $datos = $this->DB->DBFconnect('DLISTA');
//           $info = array();
//        $aux = 0;
//        if($datos){
//            $numero_registros = dbase_numrecords($datos);
//            for($i = 1; $i <= $numero_registros; $i++){
//                $fila = dbase_get_record($datos, $i);
//                if(strcmp($fila[1], $matricula) == 0){
//                    $info=$fila[0];
//                    $aux++;
//                }
//            }
//            return (int)$info;
//        }
//    }
   public function getHorarios($matricula,$clave,$letra,$grupo){
       $datos= $this->DB->DBFconnect('DGRUPO');
           $info = array();
       $aux = 0;
       if($datos){
           $numero_registros = dbase_numrecords($datos);
           for($i = 1; $i <= $numero_registros; $i++){
               $fila = dbase_get_record($datos, $i);
               if(strcmp($fila[0], $matricula)==0)
               {
                   if(strcmp($fila[3], $clave)==0)
                   {
                       if(strcmp($fila[4],$letra)==0)
                       {
                           if(strcmp($grupo,$fila[6])==0)
                             {
                                 $Mater = $fila[7];
                                 $grup = $fila[6];
                                 $Lunes = $fila[13];
                                 $Martes = $fila[15];
                                 $Miercoles = $fila[17];
                                 $Jueves = $fila[19];
                                 $Viernes = $fila[21];
                                 $Resultados ="Materia:".$Mater."Grupo".$grup."Lunes:".$Lunes."Martes:".$Martes."Miercoles:".$Miercoles."Jueves:".$Jueves."Viernes:".$Viernes;
                                 array_push($info, $Resultados);
                                 $aux++;
                            }
                       }
                   }
               }
           }
           return $info;
       }
}
public function getPeriodo($clavedeplan)
   {
     $datos = $this->DB->DBFconnect('DPERIO');
           $info = array();
           $aux = 0;
             if($datos){
                 $numero_registros = dbase_numrecords($datos);
                 for($i = 1; $i <= $numero_registros; $i++){
                     $fila = dbase_get_record($datos, $i);
                     if(strcmp($fila[0], $clavedeplan) == 0){
                         $info=$fila[3];
                         $aux++;
                     }
                 }
                 return $info;
             }
   }
   public function getMaterNombre($matricula)
   {
       $datos = $this->DB->DBFconnect('DMATER');
       $info = array();
       $aux = 0;
       if($datos){
           $numero_registros = dbase_numrecords($datos);
           for($i = 1; $i <= $numero_registros; $i++){
               $fila = dbase_get_record($datos, $i);
               if(strcmp($fila[0], $matricula) == 0){
                   $info=$fila[2];
                   $aux++;
               }
           }
           return (int)$info;
       }
   }
   public function getCarrera($Carcb)
   {
       $datos = $this->DB->DBFconnect('DCARRE');
       $carrerabr = array();
       $aux = 0;
       if($datos){
           $numero_registros = dbase_numrecords($datos);
           for($i = 1; $i <= $numero_registros; $i++){
               $fila = dbase_get_record($datos, $i);
               if(strcmp($fila[0], $Carcb) == 0){
                   $carrerabr=$fila[3];
                   $aux++;
               }
           }
           return $carrerabr;
       }
   }
   public function getmatter($Claveplan,$matricula)
   {
       $datos = $this->DB->DBFconnect('DLISTA');
       $matter = array();
       $aux = 0;
       if($datos){
           $numero_registros = dbase_numrecords($datos);
           for($i = 1; $i <= $numero_registros; $i++){
               $fila = dbase_get_record($datos, $i);
               if(strcmp($fila[0], $Claveplan) == 0){
                   if(strcmp($fila[1], $matricula)==0)
                   {
                       $materia1=$fila[2];
                       array_push($matter, $materia1);
                        $aux++;
                   }
               }
           }
           return $matter;
       }
   }

   /* Retorna el estatus del alumno
     * Si encuentra una materia reprobada (calificacion menor a 7)
     * Regresa como estatus irregular, si no encuentra materias reprobadas 
     * Regresa como estatus regular
     * La informacion la obtiene del DBF DKARDE.
     * Informacion de las columnas del DBF DKARDE:
     * aluctr   = matricula del alumno
     * karcal   = calificacion de la materia
     */

   public function status($matricula){

	$datos = $this->DB->DBFconnect("DKARDE");

	if($datos){

		$numero_registros = dbase_numrecords($datos);
		for($i = 1; $i <= $numero_registros; $i++){
			
			$fila = dbase_get_record_with_names($datos, $i);
			if(strcmp($fila["ALUCTR"], $matricula) == 0 && $fila["KARCAL"] < 7){

				return "IRREGULAR";  
			}
		}
		return "REGULAR";
	}
}

	// FIN PARTE WAKAI
	/**
	 * Metodo: procesarDatosPeriodo
	 * Descripcion: En este metodo se obtiene la descripcion de la carrera, 
	 * el periodo en el que ingreso el alumno, la clave de la carrera, la clave del plan,
	 * y se adjuntan los datos generales del alumno, todo en un array.
	 * NOTA: queda pendiente presentar el periodo actual, sin embargo parece inecesario porque ya existe
	 * vista general.
	 * Autor: Gloria Aguilar
	 * Fecha: 14/06/2019** */
	public function procesarDatosPeriodo($matricula)
	{
		$datos              = $this->getAlumnoUltimoCursado($matricula);
		$periodoAlumnoIngre = $this->getPeriodoAlumnoIngreso($datos['plan_clave'],$datos['clave_carrera']);
		$descripcionCarrera = $this->getCarreras($datos['clave_carrera']);
		$datosAlum			= $this->getDbfUser($matricula);
		//$getAcademicPeriod = $this->procesarDatosPeriodo($_SESSION['usuario']['matricula']);
		//$this->view->getAcademicPeriod = $getAcademicPeriod;
		$datos=array_merge($periodoAlumnoIngre,$descripcionCarrera);
		$datosGenerales=array_merge($datos,$datosAlum);
		return $datosGenerales;
		
	}

	/**/
	

	/***
	 * Metodo: getPeriodoAlumnoIngreso
	 * Descripcion: Se obtienen el periodo del alumno cuando ingreso a la institucion
	 * Nota: Parecer ser inecesario pero así se muestra en la vista de Front
	 * Autor: Gloria Aguilar
	 * Fecha: 14/06/2019** */
	 public function getPeriodoAlumnoIngreso($planClave,$carreraClave){
		$con = $this->DB->DBFconnect('DPLANE');
		$aux = null;
		if ($con) {
			$numero_registros = dbase_numrecords($con);
          for ($i = 1; $i <= $numero_registros; $i++) {
              $fila = dbase_get_record_with_names($con, $i);
              if (strcmp($fila["PLACVE"],$planClave) == 0) {
				if (strcmp($fila["CARCVE"],$carreraClave) == 0) {
					$aux = array(
						'plan_inicio'  => $fila['PLACOF'],
						'clave_carrera' => $fila['CARCVE'],
						'plan_clave'    => $fila['PLACVE']
				  );
				  break;
				}
              }              
          }
          dbase_close($con);
          return $aux;
		}
		return null;
	}

	/**
	 * Metodo: getAlumnoUltimoCursado,
	 * Descripcion: Este método obtiene la clave de la carrera, el ultimo cuatrimestre cursado,
	 * y el grupo al que pertenece. Este método servirá para obtener datos de otras tables.
	 * Autor: Gloria Aguilar
	 * Módulo: Carga Alumno
	 * Fecha: 13/06/2019
	 * */
	public function getAlumnoUltimoCursado($matricula){
		$con = $this->DB->DBFconnect('DCALUM');
		$aux = null;
		if ($con) {
			$numero_registros = dbase_numrecords($con);
          for ($i = 1; $i <= $numero_registros; $i++) {
              $fila = dbase_get_record_with_names($con, $i);
              if (strcmp($fila["ALUCTR"],$matricula) == 0) {
              		// $aux = $fila;
              		$aux = array(
							'clave_carrera' => $fila['CARCVE'],
							'plan_clave'    => $fila['PLACVE'],
							'periodo_ingreso' =>$fila['CALING']
					  );
              		break;
              }              
          }
          dbase_close($con);
          return $aux;
		}
		return null;
	}

/***
	 * Metodo: getCarreras
	 * Descripcion: se obtiene el nombre y la descripcion de la carrera
	 * NOTA: parece ser inecesario porque ya existe una vista General y ahí se pueden obtener datos
	 * Autor: Gloria Aguilar
	 * Fecha: 14/06/2019** */
	 public function getCarreras($clave_carrera)
	 {
		 $con = $this->DB->DBFconnect('DCARRE');
		 $aux = null;
		 if ($con) {
			 $numero_registros = dbase_numrecords($con);
		   for ($i = 1; $i <= $numero_registros; $i++) {
			   $fila = dbase_get_record_with_names($con, $i);
				 if (strcmp($fila["CARCVE"],$clave_carrera) == 0) {
					 $aux = array(
						 'carrera_nombre'=> $fila['CARNOM'],
						 'carrera_abre'  => $fila['CARNCO']
				   );
				   break;
				 }            
			   }		
		   dbase_close($con);
		   return $aux;
		 }
		 return null;
	 }
// PARTE DEL LUCIO



/**
	  *Metodo: getPeriodo
	  *Descripcion: Se obtiene el ultimo cuatrimestre que ha cursado el alumno, senecesita obtener el ultimo período
	  *para poder utilizar la función getcalif
	  *Autor: Uziel Mendez
	  *Fecha: 19/06/2019 
*/

	 public function getPeriodol($matricula){
		//Nos conectamos al dbf
		$con = $this->DB->DBFconnect('DLISTA');
		//se inicializa una variable y la hacemos array
		$periodo = [];
	//validamos si entra en la conexión 
		if ($con) {
			$numero_registros = dbase_numrecords($con);
		//obtenemos todos los registros
          for ($i = 1; $i<=$numero_registros; $i++) {
			  
			$fila = dbase_get_record_with_names($con, $i);
			//validamos la matricula con el registro de la tabla 
			  
              if (strcmp($fila["ALUCTR"],$matricula) == 0) {
				 	//PDOCVE = Clave del Periodo	
				$aux = $fila['PDOCVE'];		
				  break;
              }              
		  }
		  return $periodo;
		  //Cerramos conexión
          dbase_close($con);
         
		}
		return null;
	}
	public function getcalif($matricula,$ultimo_p)
	{
				
				//Connexión a los dbf
				$con = $this->DB->DBFconnect('DLISTA');
				//Conexión a los dbf
		
				$conn = $this->DB->DBFConnect("DMATER");
				// inicializción de los arrays 
				$materia = [];
				$aux = [];
				// Validaci[on simple de conexión 
				if($con && $conn )
				{
					//El número de registro  que contiene 
					$numero_registros = dbase_numrecords($con);
					$numero_registross = dbase_numrecords($conn);
		
					
					$filaa = '';
				
					//obtenemos todos los registros
				for($i=1; $i<=$numero_registros;$i++) 	
					{
						//devuelve los registros
							$fila = dbase_get_record_with_names($con, $i);
						
						
		
						// validamos si es concuerda la matrícula y el último período
						if (strcmp($fila["ALUCTR"], $matricula) == 0  && $fila["PDOCVE"] == $ultimo_p ){
						
						//se obtinen los datos específicos 
						//Nombre tiene un # para inicializarlo
							
							$aux = [
								
								'Clave' => $fila['MATCVE'],
								'Nombre'=>'#',
								'Parcial1' =>$fila['LISPA1'],
								'Parcial2' =>$fila['LISPA2'],
								'Parcial3' =>$fila['LISPA3'],
								'Parcial4' =>$fila['LISPA4'],
								'Parcial5' =>$fila['LISPA5']
								
							];
					
						
							array_push($materia,$aux);
							
						
						}
				
							
							
						
					
					}
					//Necesitamos realizar el siguiente proceso para obtener el nombre de la materia
					
					for($s=1; $s <= $numero_registross;$s++) 	
					{
						$filaa = dbase_get_record_with_names($conn, $s);
						
						//Devolverá el tamaño que ocupa la variable 
						for($e=0 ; $e <sizeof($materia); $e++ ){
						
						//comparamos si clave de la materia 
							
						if (strcmp($materia[$e]['Clave'], $filaa['MATCVE']) == 0){
							//lo igualamos Nombre de la materia a nuestra variable
								$materia[$e]['Nombre'] = $filaa['MATNOM'];
							}
						}
					
					}
				
				
					return $materia;
				
					//cerramos la conexión
					dbase_close($con);
				}
				
	 		return null;
	}
// FIN PART DE LUCIO



#CAMBIAR CONTRASEÑA




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