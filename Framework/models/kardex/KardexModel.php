<?php
class KardexModel extends Model
{
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
		$auxClase = new KardexModel;
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
	public function porcentaje($matricula){
		$datos = $this->DB->DBFconnect("DCALUM");
		$auxClase = new KardexModel;
		if($datos){
			$numero_registros = dbase_numrecords($datos);
			for($i = 1; $i <= $numero_registros; $i++){
				$fila = dbase_get_record_with_names($datos, $i);
				if(strcmp($fila["ALUCTR"], $matricula) == 0){
					$claveCarrera = $fila['CARCVE'];
					$clavePlan = $fila['PLACVE'];
					$creditos =  $fila['CALCAC'];
					if ($creditos == ""){
						$creditos =  0;
					}
					$creditos_total = $auxClase->creditosTotales($claveCarrera, $clavePlan);
					if ($creditos_total == 0){
						$porcentaje = 0;
					}
					else{
						$porcentaje = $creditos * 100 / $creditos_total;
					}
					return round($porcentaje, 2);
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
	public function promedio($matricula){
		$datos = $this->DB->DBFconnect("DKARDE");
		$info = array();
		$auxClase = new KardexModel;
		$calificaciones = 0;
		$num_materias = 1;
		if($datos){
			$numero_registros = dbase_numrecords($datos);
			for($i = 1; $i <= $numero_registros; $i++){
				$fila = dbase_get_record_with_names($datos, $i);
				if(strcmp($fila["ALUCTR"], $matricula) == 0){
					$calificaciones = $calificaciones + $fila['KARCAL'];
					$num_materias = $num_materias + 1;
				}
			}
			$promedio = $calificaciones / $num_materias;
			return round($promedio, 2);
		}
	}
	public function getMateriasKardex($claveCarrera,$clavePeriodo){
		$con = $this->DB->DBFconnect('DGRUPO');
		$aux = 0;
		$Materias = array();
		if ($con) {
			$numero_registros = dbase_numrecords($con);
		    for ($i = 1; $i <= $numero_registros; $i++) {
				$fila = dbase_get_record_with_names($con, $i);
		        if(strcmp($fila['CARCVE'],$claveCarrera)==0){
					if(strcmp($fila['PLACVE'],$clavePeriodo)==0){
						$ClavePla = $fila['PDOCVE'];
						$ClaveCarr = $fila['CARCVE'];
						$ClavePer = $fila['PLACVE'];
						$Materr = $fila['MATCVE'];
						array_push($Materias,$Materr);
						
					} 
				}              
		    }
	        dbase_close($con);
			return $Materias;
		}
		return null;
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
		$auxClase = new KardexModel;
		
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
	public function getMateriasTotales($claveCarrera,$clavePeriodo){
		$con = $this->DB->DBFconnect('DGRUPO');
		$aux = 0;
		$materias = array();
		if ($con) {
			$numero_registros = dbase_numrecords($con);
          for ($i = 1; $i <= $numero_registros; $i++) {
			  $fila = dbase_get_record_with_names($con, $i);
              if(strcmp($fila['CARCVE'],$claveCarrera)==0){
					if(strcmp($fila['PLACVE'],$clavePeriodo)==0){
 						$clavmater =$fila['MATCVE'];
 						array_push($materias, $clavmater);
					}
				 }              
          }
          dbase_close($con);
		  return $materias;
		
		}
		return null;
		
	}
	/* Retorna las materias con calificacion menor a 7 (reprobadas)
     * La informacion la obtiene del DBF DKARDE.
     * Informacion de las columnas del DBF DKARDE:
     * claveMat     = clave de la materia
     * nombreMat    = nombre de la materia
     */
    public function materiasReprobadas($matricula){
        $datos = $this->DB->DBFconnect("DKARDE");
        $info = array();
        $auxClase = new KardexModel;
        if($datos){
            $numero_registros = dbase_numrecords($datos);
            for($i = 1; $i <= $numero_registros; $i++){
                
                $fila = dbase_get_record_with_names($datos, $i);
                if(strcmp($fila["ALUCTR"], $matricula) == 0 && $fila["KARCAL"] < 7){
                    $aux = [
                            'claveMat'      => $fila['MATCVE'],
                            'nombreMat'     => $auxClase->materia($fila['MATCVE'])
                    ];
                    array_push($info, $aux);  
                }
            }
            return $info;
        }
    }
     /* Retorna las materias que ya ha cursado el alumno
     * La informacion la obtiene del DBF DKARDE.
     * Informacion de las columnas del DBF DKARDE:
     * aluctr   = matricula del alumno
     * matcve   = clave de la materia
     */
    public function materiasCursadas($matricula){
        $datos = $this->DB->DBFconnect("DKARDE");
        $materias = array();
        
        if($datos){
            $numero_registros = dbase_numrecords($datos);
            for($i = 1; $i <= $numero_registros; $i++){
                
                $fila = dbase_get_record_with_names($datos, $i);
                
                if(strcmp($fila["ALUCTR"], $matricula) == 0){
                    array_push($materias, $fila['MATCVE']);
                } 
            }
            return $materias;
        }
    }
    /* Retorna las materias que no ha cursado o ha reprobado el alumno
     * La informacion la obtiene del DBF DRETIC y de los metodos
     * materiasReprobadas y materiasCursadas.
     * Lo que se hace primero es ejecutar el metodo materiasReprobadas para 
     * agregar al array que sera devuelto las materias que el alumno reprobo,
     * despues se ejecuta el metodo materias cursadas para guardar en otro array
     * las materias que el alumno ya curso y asi puedan compararse con las
     * materias que incluye el plan de estudios.
     * Tambien se hace uso del metodo materias para obtener el nombre de estas.
     * Informacion de las columnas del DBF DRETIC:
     * carcve   = clave de la carrera
     * placve   = clave del plan de estudios
     * espcve   = valor especial de algunas materias (por si cambiaron algo en el plan)
     * matcve   = clave de la materia
     */
    public function materiasNCursadas($matricula, $claveCarrera, $clavePlan){
        $datos = $this->DB->DBFconnect("DRETIC");
        $auxClase = new KardexModel;
        $info = $auxClase->materiasReprobadas($matricula);
        $materias = $auxClase->materiasCursadas($matricula);
        
        if($datos){
            $numero_registros = dbase_numrecords($datos);
            for($i = 1; $i <= $numero_registros; $i++){
                $aux2 = 0;
                
                $fila = dbase_get_record_with_names($datos, $i);
                if(strcmp($fila["CARCVE"], $claveCarrera) == 0 && strcmp($fila["PLACVE"], $clavePlan) == 0 && $fila["ESPCVE"] == 0){
                    for($j = 0; $j < count($materias); $j++){
                        if(strcmp($fila['MATCVE'], $materias[$j]) == 0){
                            break;
                            
                        } elseif($j == count($materias) - 1){
                            $aux2 = 1;
                        }
                    }
                    if($aux2 == 1){
                        $aux = [
                            'claveMat'      => $fila['MATCVE'],
                            'nombreMat'     => $auxClase->materia($fila['MATCVE'])
                        ];
                        array_push($info, $aux);
                    }
                }
            }
            return $info;
        }
    }
    /* Obtiene la matricula y datos del plan de estudios del alumno
     * para poder ejecutar el metodo materiasNCursadas
     * La informacion la obtiene del DBF CALUM.
     * Informacion de las columnas del DBF CALUM:
     * aluctr   = matricula del alumno
     * carcve   = clave de la carrera
     * placve   = clave del plan de estudios
     */
    public function materiasFaltantes($matricula){
        $datos = $this->DB->DBFconnect("DCALUM");
        $auxClase = new KardexModel;
        if($datos){
            $numero_registros = dbase_numrecords($datos);
            for($i = 1; $i <= $numero_registros; $i++){
                
                $fila = dbase_get_record_with_names($datos, $i);
                if(strcmp($fila["ALUCTR"], $matricula) == 0){
                    return $auxClase->materiasNCursadas($fila['ALUCTR'], $fila['CARCVE'], $fila['PLACVE']);
                }
            }
        }
    }
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
}
?>