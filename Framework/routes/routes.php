<?php  
	// TIPOS ACEPTADOS GET Y POST
/**
 * Rutas Autenticacion de usuarios
 */
	$this->newRoute('login','auth/authController','render');
	$this->newRoute('login','auth/authController','login','POST');
	$this->newRoute('newpass','auth/authController','cambiaPass','POST');
	$this->newRoute('logout','auth/authController','logout');


	$this->newRoute('alumnos/datos','alumno/alumnoController','datosGenerales');

	//$this->newRoute('alumnos/horario','horario/horarioController','buscarHorario');
	//$this->newRoute('alumnos/kardex', 'kardex/kardexController','getKardex');

	$this->newRoute('alumnos/datos','alumno/alumnoController','cambiaPass', 'POST');

	$this->newRoute('addadmin','auth/authController','crear_admin');
	$this->newRoute('administrador/datos','administrador/adminController','datosGeneralesadmin');

	$this->newRoute('super-administrador/datos','super/superController','datosGeneralesSuper');
	$this->newRoute('super-administrador/agregar-administrador','nadmin/nadminController','crear_admin');
	$this->newRoute('super-administrador/agregar-administrador','nadmin/nadminController','crear_admin','POST');

	
	//Feed de Noticias
	$this->newRoute('noticias','notificaciones/notificacionControllerUser','traerNoticia');

	//Crear Noticias
	$this->newRoute('administrador/crearNoticia','notificaciones/notificacionController','crearNoticia');
	$this->newRoute('administrador/crearNoticia','notificaciones/notificacionController','crearNoticia', 'POST');
	//$this->newRoute('super-administrador/crearNoticia','notificaciones/notificacionController','crearNoticia');
	//$this->newRoute('super-administrador/crearNoticia','notificaciones/notificacionController','crearNoticia', 'POST');

	//Editar Noticias (Este en teoria es parte de la misma ruta/vista de admin)
	$this->newRoute('administrador/editarNotificacion','notificaciones/notificacionController','editarNotificacion');
	$this->newRoute('administrador/editarNotificacion','notificaciones/notificacionController','editarNotificacion', 'POST');
	
	$this->newRoute('editarNoticia','notificaciones/notificacionController','editarNotificacion');
	$this->newRoute('admin','admin/adminController','datosGenerales');

	$this->newRoute('carreras','notificaciones/notificacionController','carreras');
	$this->newRoute('alumnos/horario','horario/horarioController','horario2');

	$this->newRoute('alumnos/carga-academica','carga/cargaController','academicDataMethod');
	$this->newRoute('alumnos/SEE_Carga_acádemica_PDF','cargapdf/cargapdfController','academicDataPdf');

	$this->newRoute('alumnos/formatos','formatos/formatosController','formatos');
	$this->newRoute('alumnos/Descargar','formatos/formatosController','Descargar');

	$this->newRoute('administrador/formatos','formatos/formatosAdminController','formatosAdmin');
	$this->newRoute('administrador/upload','formatos/formatosAdminController','carga','POST');
	$this->newRoute('administrador/update','formatos/formatosAdminController','actualizar','POST');

	$this->newRoute('alumnos/kardex','kardex/kardexController','getKardex');
	$this->newRoute('alumnos/kardexPdf', 'kardex/kardexPdfController', 'kardexPdf');
	$this->newRoute('alumnos/calificaciones','calificaciones/calificacionesController','getCalificaciones');


	$this->newRoute('administrador/cargarNoticia','notificaciones/notificacionController','crearNoticia');
	//$this->newRoute('noticias','notificaciones/notificacionControllerUser','traerNoticia');


	// carreras

/*cambiaPass
 *cread_admin

- CAMBIAR CONTRASEÑA
- Crear admin
- Crear Notificaciones

- Ver todas las notificaciones
- Editar Notificaciones 
- traer carreras


 */
?>
