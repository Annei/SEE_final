<!--
*  kardex.html 
*  @version: 1.0.0
*  @author: Universidad Politecnica - Jazmin Pool, kath
*  @description: KARDEX DEL ALUMNO
*  @date: 09/06/2019
-->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="<?php echo constant('URL'); ?>public/css/style.css">
    <!-- <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous"> -->
    <link rel="stylesheet" href="<?php echo constant('URL'); ?>public/fontawesome/css/all.css">
    <title>Agregar Noticias</title>
    <link rel="shortcut icon" href="">
</head>
<body>
    <div class="main flex">
        <div class="column kardex full">
            <div class="row-responsive">
                <div class="column align-center justify-center menu" tabindex="0">
                        <div class="smartphone-menu-trigger"></div>
                        <div class="white-space-24"></div>
    
                        <div class="responsive-img item-left justify-center align-center logo">
                            <img src="<?php echo constant('URL'); ?>public/img/upqroo-newlogo@2x.png" alt="responsive img" title="responsive img" class="cover-img "/>
                        </div>
    
                        <div class="white-space-32"></div>
                        <!-- <div class="white-space-16"></div> -->
                        
                        <div class="column main align-center auto">
                            <div class="menu-options">
                                <a href="profile.html" class="item-left">
                                    <div class="row justify-center align-start">
                                        <div class="column icon align-center"><i class="fa fa-user"></i></div>
                                        <div class = "column full">
                                            <h4 class="color-white weight-regular font-small">Datos generales</h4>
                                        </div>
                                    </div>
                                </a>
                                
                                <a href="carga-academica.html" class="item-left">
                                    <div class="row justify-center">
                                            <div class="column icon align-center"><i class="fa fa-university"></i></div>
                                        <div class = "column full">
                                            <h4 class="color-white weight-regular font-small">Carga académica</h4>
                                        </div>                        
                                    </div>
                                </a>
    
                                <a href="calificaciones.html" class="item-left">
                                    <div class="row justify-center">
                                            <div class="column icon align-center"><i class="fa fa-star"></i></div> 
                                        <div class = "column full">
                                            <h4 class="color-white weight-regular font-small">Calificaciones</h4>
                                        </div>
                                    </div>
                                </a>
    
                                <a href="kardex.html" class="item-left">
                                    <div class="row justify-center">
                                        <div class="column icon align-center"><i class="fa fa-book-user"></i></div>
                                        <div class="column full">
                                            <h4 class="color-white weight-regular font-small">Kardex</h4>
                                        </div>
                                    </div>
                                </a>
    
                                <a href="horario.html" class="item-left">
                                    <div class="row justify-center">
                                        <div class="column icon align-center"><i class="fa fa-calendar-alt"></i></div>
                                        <div class = "column full">
                                            <h4 class="color-white weight-regular font-small">Horario</h4>
                                        </div>
                                    </div>
                                </a>
    
                                <a href="noticias" class="item-left">
                                    <div class="row justify-center">
                                        <div class="column icon align-center"><i class="fa fa-newspaper"></i></div>
                                        <div class = "column full">
                                            <h4 class="color-white weight-regular font-small">Noticias</h4>
                                        </div>
                                    </div>
                                </a>
    
                                <a href="formatos.html" class="item-left">
                                    <div class="row justify-center">
                                        <div class="column icon align-center"><i class="fa fa-file-download"></i></div>
                                        <div class = "column full">
                                            <h4 class="color-white weight-regular font-small">Formatos</h4>
                                        </div>
                                    </div>
                                </a>
    
                                <a href="" class="item-left">
                                    <div class="row justify-center">
                                        <div class="column icon align-center"><i class="fa fa-mail-bulk"></i></div>
                                        <div class = "column full">
                                            <h4 class="color-white weight-regular font-small">Correo Institucional</h4>
                                        </div>
                                    </div>
                                </a>
    
                                <a href="login.html" class="item-left">
                                    <div class="row item-left justify-center">
                                        <div class="column icon align-center"><i class="fa fa-sign-out"></i></div>
                                        <div class = "column full">
                                            <h4 class="color-white weight-regular font-small">Cerrar Sesión</h4>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                </div>  
                <div class="column align-center body">
                        <div class="row-responsive justify-center header-tittle align-center" style="background-image: url(<?php echo constant('URL'); ?>public/img/new-footer-blue.png)">
                            <div class="container-data align-center header-content justify-between">
                                <div class="row auto">
                                    <div class="column auto justify-center">
                                        <h1 class="color-white weight-bold">Noticias</h1>
                                    </div>  
                                </div>
                                <div class="row auto">
                                        <button type="submit" class="btn btn-admin bg-darkBlue color-white font-regular weight-semi">
                                            <i class="fas fa-print icon-btn"></i>
                                            Imprimir kardex
                                        </button>
                                </div>
                            </div>
                        </div>
                    
                    <div class="white-space-24"></div>

                    <div class="row-responsive container-data">
                        <div class="column full">
                        
						<div class="row-responsive container-cards">
						<?php 


$i = 0;
$modal = "'modal-noticia-edit'";
$URL = constant('URL');
$saveIds = '';



foreach (array_reverse($this->data) as $noticia) {
    $tituloCurrent = $noticia[1];
    echo '
                <div class="modal modal-confirm column justify-center align-center hidden  wow animated" data-wow-duration=".7s" id="modal-noticia-edit">
                                <div class="container modal-content align-center column" >
                                    <div class="row-responsive justify-center header-tittle align-center header-tittle-modal" style="background-image: url('.$URL.'public/img/new-footer-blue.png)">
                                        <div class="container-data header-content justify-center">
                                            <div class="row auto">
                                                <div class="column auto align-center">
                                                    <h3 class="color-white weight-bold font-double">Editar Noticia</h3>
                                                </div>  
                                            </div>
                                            <div class="row auto">
                                                <a href="javascript:void(0)" id="close-modal" onclick="closeModal('.$modal.');">
                                                    <i class="fas fa-times"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="upload-summary column">
                                        <div class="white-space-24"></div>
                                        <form id="formId" class="content column justify-center align-center" method="POST" action="editarNotificacion" >
                                            <input type="text" name="tituloEdit" placeholder="'.$tituloCurrent.'" class="input" required>
                                            <div class="white-space-24"></div>
                                            <textarea name="cuerpoEdit" class="text-admin" rows="8"  placeholder="Niggers" >
                                            </textarea>
                                            <div class="white-space-24"></div>
                                            <input type="file" name="imagenEdit" class="input" required>
                                            <div class="white-space-24"></div>
                                            <button type="submit" id="submit-all" class="btn btn-admin btn-radius btn-large btn-darkBlue bg-darkBlue font-regular weight-bold color-white">
                                                Guardar Cambios
                                            </button>
                                        </form>
                                    </div>
                                <div class="white-space-32"></div>
                                </div>
                            </div>

                <div class="item photo filtroCajas '.$noticia[5].'" id='.$noticia[4].'>
                <div class="content">
                    <div class="title">
                        <div class="row full">
                            <div class="column">
                                <div class="responsive-img item-left justify-center align-center">
                                    <img src="https://media1.tenor.com/images/c8d13a4636c548e962d8d4fdb0eaa169/tenor.gif?itemid=12217236" alt="responsive img" title="responsive img" class="cover-img profile-logo"/>
                                </div>
                            </div>
                            <div class="column justify-start">
                                <h3>'. $noticia[1] .'</h3>
                                <p class="font-regular color-darkgray">'. $noticia[6] .'</p>
                                
                                <a id="'.$noticia[0].'" href="javascript:void(0)" onclick="openModal('.$modal.');pasarId(this.id);">
                                
                                    <i class="fas fa-pen-square font-large icon-edit color-lightBlue noticiaParaEditar"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                    <img class="photothumb" src="'.constant('URL').'imagenesNoticias/'.$noticia[3].'">
                    <div class="desc">
                        <div class="white-space-24"></div>
                        <p>'. $noticia[2] .'</p>
                    </div>
                </div>
            </div>             
    
    ';

    $i++;
}

//$("#formId").attr("action", "editarNotificacion".concat(x));
//window.location.hash = x;

echo '<script>
var varTo;
function pasarId(x) {
    console.log(x);
    
    varTo = x;
    
    $("#formId").attr("action", "editarNotificacion?id="+x);
    return varTo;
    
  };
</script>';





?>

							<div class="column card-data justify-center card-margin">
                                    <div class="row">
                                        <div class="column align-start justify-center">
                                            <div class="white-space-16"></div>
                                        </div>
                                        <div class="column align-end justify-center auto">
                                        </div>
                                    </div>
                                </div>

                                <div class="column card-data justify-center">
                                    <div class="row">
                                        <div class="column align-start justify-center">
                                            <div class="white-space-16"></div>
                                        </div>
                                        <div class="column align-end justify-center auto">
                                        </div>
                                    </div>
                                </div>

                                <div class="column card-data justify-center card-margin">
                                    <div class="row">
                                        <div class="column align-start justify-center">
                                            <div class="white-space-16"></div>
                                        </div>
                                        <div class="column align-end justify-center auto">
                                        </div>
                                    </div>
                                </div>

                                <div class="column card-data justify-center">
                                    <div class="row">
                                        <div class="column align-start justify-center">
                                            <div class="white-space-16"></div>
                                        </div>
                                        <div class="column align-end justify-center auto">
                                        </div>
                                    </div>
                                </div>
								
                                
                            </div>

						<?php 
                                
								// var_dump ($this->data[0]);

								/*
								1 - Titulo
								2 - Imagen
								3 - Status
								4 - Carrera 
								5 - Creacion
								6 - Matricula creador
								7 - Nombre Creador


								*/

								print_r ($noticiasArray[0][1]);

								print_r ($noticiasArray[0][2]);

								print_r ($noticiasArray[0][5]);

								print_r ($noticiasArray[0][7]);


								
							
                                
                                ?>

								<h1>Aqui se leen las noticias</h1>

                            <div class="white-space-24"></div>

                            <div class="row">
                                <div class="column full">

                            </div> <!--/.tabla kardex-->                            


                        </div>
                    </div> <!--/.content-->
                    
                </div>
            </div> <!--/.row-responsive-->
        </div> <!--/.column kardex-->

    </div> <!--/.main flex-->
    
</body>
</html>