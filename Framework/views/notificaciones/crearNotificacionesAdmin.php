
<!--
*  profile.html 
*  @version: 1.0.0
*  @author: Universidad Politecnica - Noticias
*  @description: PERFIL ALUMNO
    Vista de admin para modulo de noticias con Backend de Raul Funcionando.
-->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="<?php echo constant('URL'); ?>/public/css/style.css">
    <link rel="stylesheet" href="<?php echo constant('URL'); ?>/public/fontawesome/css/all.css">
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
    <script src="<?php echo constant('URL'); ?>public/js/modals.js"></script>
    <!-- <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous"> -->
    <title>SEE - Noticias</title>
    <link rel="shortcut icon" href="">
</head>
<body>
    <div class="main flex">
        <div class="column noticias full">
            <div class="row-responsive body">
                    <div class="column align-center justify-center menu" tabindex="0">
                            <div class="smartphone-menu-trigger"></div>
                            <div class="white-space-24"></div>
        
                            <div class="responsive-img item-left justify-center align-center logo">
                                <img src="<?php echo constant('URL'); ?>/public/img/upqroo-newlogo@2x.png" alt="responsive img" title="responsive img" class="cover-img "/>
                            </div>
        
                            <div class="white-space-32"></div>
                            <!-- <div class="white-space-16"></div> -->
                            
                            <div class="column main align-center auto">
                                <div class="menu-options">
                                

                            <a href="<?php echo constant('URL'); ?>administrador/formatos" class="item-left">
                                <div class="row justify-center align-start">
                                    <div class="column icon align-center"><i class="fa fa-file-upload"></i></div>
                                    <div class="column full">
                                        <h4 class="color-white weight-regular font-small">Formatos</h4>
                                    </div>
                                </div>
                            </a>
                            
                            <a href="<?php echo constant('URL'); ?>administrador/crearNoticia" class="item-left">
                                <div class="row justify-center">
                                    <div class="column icon align-center"><i class="fa fa-newspaper"></i></div>
                                    <div class="column full">
                                        <h4 class="color-white weight-regular font-small">Noticias</h4>
                                    </div>
                                </div>
                            </a>

                               
                            <a href="<?php echo constant('URL'); ?>logout" class="item-left">
                                <div class="row justify-center">
                                    <div class="column icon align-center"><i class="fa fa-sign-out"></i></div>
                                    <div class="column full">
                                        <h4 class="color-white weight-regular font-small">Cerrar Sesion</h4>
                                    </div>
                                </div>
                            </a>
                                </div>
                            </div>
                    </div>  
            <div class="column full">
        <div class="column align-center">
        <div class="row-responsive full">
                <div class="row-responsive justify-center header-tittle align-center" style="background-image: url(<?php echo constant('URL'); ?>public/img/new-footer-blue.png)">
                    <div class="column container-data align-start header-content">
                        <div class="row auto">
                            <div class="column auto">
                                <h1 class="color-white weight-bold">Noticias</h1>
                            </div>  
                        </div>
                    </div>
                </div>
            </div> <!--/.header title-->
            <div class="white-space-24"></div>
            <div class="container-data">   
                <div class="row full">

                <div class="grid full">

                        <div class="item photo admin">
                          
                        <form class="content column justify-center align-center" method="POST" action="crearNoticia" id="crearNoticiaForm" >
                                <input type="text" name="titulo" placeholder="Titulo de la Noticia" class="input input-news font-tiny" required>
                                <div class="white-space-8"></div>
                                <textarea class="text-admin" rows="2"  placeholder="Escriba el contenido de la Noticia aqui..." name="cuerpo" ></textarea>
                                <div class="white-space-8"></div>
                                <div class="row full">
                                    <div class="icons full">
                                        <div class="row">
                                            <input type="file" name="imagen" id="imageUpload">
                                        </div>
                                        <div class="white-space-8"></div>
                                        <div class="row justify-between">
                                        <label for="carreras">Carrera</label>
                                        <select class="select input-border" name="carreras" id="adminCarreras" form="crearNoticiaForm">
                                            <option value="0">Todas</option>
                                            <option value="1">Ing. en Software</option>
                                            <option value="2">Ing. en Biotecnologia</option>
                                            <option value="3">Ing. en Financiera</option>
                                            <option value="4">Ing. en Biomédica</option>
                                            <option value="5">Lic. en Gestión y Admin de PyMEs</option>
                                            <option value="6">Lic. en Terapia Física</option>
                                        </select>
                                        </div>
                                        <div class="white-space-8"></div>
                                        <div class="row justify-end">
                                        <button type="submit"  class="btn btn-form-admin bg-darkBlue font-regular weight-bold color-white">Publicar</button>
                                        </div>
                                      
                                        <div class="white-space-8"></div>
                                    </div>

                                </div>
                            </form>
                            <div class="white-space-8"></div>
                        </div>

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
    // $boxsize=$_REQUEST[$noticia[0]];

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
                
                    <!-- <div class="item photo">
                        <div class="content">
                            <div class="title">
                                <div class="row full">
                                    <div class="column">
                                        <div class="responsive-img item-left justify-center align-center">
                                            <img src="https://media1.tenor.com/images/c8d13a4636c548e962d8d4fdb0eaa169/tenor.gif?itemid=12217236" alt="responsive img" title="responsive img" class="cover-img profile-logo"/>
                                        </div>
                                    </div>
                                    <div class="column justify-start">
                                        <h3>Atento Aviso!</h3>
                                        <p class="font-regular color-darkgray">19/06/2019</p>
                                        <a href="javascript:void(0)" onclick="openModal('modal-noticia-edit')">
                                            <i class="fas fa-pen-square font-large icon-edit color-lightBlue"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <img class="photothumb" src="https://scontent.fisj1-1.fna.fbcdn.net/v/t1.0-9/64226913_2412280082164423_28791059865665536_n.jpg?_nc_cat=109&_nc_ht=scontent.fisj1-1.fna&oh=a21acb2f68c32e33fb5c4a9f36a2bc72&oe=5DC0565D">
                            <div class="desc">
                                <div class="white-space-24"></div>
                                <p>Últimas fichas para las carreras de Ing. Financiera y Biotecnología. Se les sugiere si van a realizar su pago sea en la recaudadora de rentas de su elección para que puedan generar su factura el mismo día que pagarían..</p>
                            </div>
                        </div>
                    </div>
                    

                    <div class="item photo">
                        <div class="content">
                        <div class="title">
                            <div class="row full">
                                    <div class="column">
                                    <div class="responsive-img item-left justify-center align-center">
                                            <img src="https://i.pinimg.com/originals/16/e6/eb/16e6ebdf1b5e4e0b02988e1aade0126e.gif" alt="responsive img" title="responsive img" class="cover-img profile-logo"/>
                                        </div>
                                    </div>
                                    <div class="column justify-start">
                                        <h3>Atento Aviso!</h3>
                                        <p class="font-regular color-darkgray">19/06/2019</p>
                                        <i class="fas fa-pen-square font-large icon-edit color-lightBlue"></i>
                                    </div>
                                </div>
                        </div>
                        <img class="photothumb" src="https://www.elfinanciero.com.mx/uploads/2019/03/09/48db71587d1552173153_standard_desktop_medium_retina.jpeg">
                        <div class="desc">
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce facilisis fringilla laoreet. Mauris mattis enim ut felis consectetur, vitae lacinia enim auctor. Aenean vitae fermentum odio. Lorem ipsum dolor sit amet,  .</p>
                        </div>
                        </div>
                    </div>

                    <div class="item photo">
                        <div class="content">
                        <div class="title">
                            <div class="row full">
                                    <div class="column">
                                    <div class="responsive-img item-left justify-center align-center">
                                            <img src="https://data.whicdn.com/images/307199872/original.gif" alt="responsive img" title="responsive img" class="cover-img profile-logo"/>
                                        </div>
                                    </div>
                                    <div class="column justify-start">
                                        <h3>Atento Aviso!</h3>
                                        <p class="font-regular color-darkgray">19/06/2019</p>
                                        <i class="fas fa-pen-square font-large icon-edit color-lightBlue"></i>
                                    </div>
                                </div>
                        </div>
                        <img class="photothumb" src="https://www.revistagenteqroo.com/wp-content/uploads/2018/02/20e548c87a852617549a586273a873ca33b46d7c.jpg">
                        <div class="desc">
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce facilisis fringilla laoreet. Mauris mattis enim ut felis consectetur, vitae lacinia enim auctor. Aenean vitae fermentum odio. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed dictum non orci ut dignissim. Fusce fermentum felis aliquam, mattis nibh ut, faucibus leo. Sed lectus libero, volutpat at eros quis, venenatis tempus neque. Nulla vel .</p>
                        </div>
                        </div>
                    </div>

                    <div class="item photo">
                            <div class="content">
                            <div class="title">
                                <div class="row full">
                                        <div class="column">
                                        <div class="responsive-img item-left justify-center align-center">
                                                <img src="https://data.whicdn.com/images/301735863/original.gif" alt="responsive img" title="responsive img" class="cover-img profile-logo"/>
                                            </div>
                                        </div>
                                        <div class="column justify-start">
                                            <h3>Atento Aviso!</h3>
                                            <p class="font-regular color-darkgray">19/06/2019</p>
                                        </div>
                                    </div>
                            </div>
                            
                            <div class="desc">
                                    <div class="white-space-24"></div>
                                <p>
                                    Ya no contamos con fichas de Terapia Física. Favor de ya no realizar depósitos.</p>
                                    <div class="white-space-24"></div>
                                
                            </div>
                            </div>
                        </div>

                        <div class="item photo">
                                <div class="content">
                                <div class="title">
                                    <div class="row full">
                                            <div class="column">
                                            <div class="responsive-img item-left justify-center align-center">
                                                    <img src="https://data.whicdn.com/images/307199872/original.gif" alt="responsive img" title="responsive img" class="cover-img profile-logo"/>
                                                </div>
                                            </div>
                                            <div class="column justify-start">
                                                <h3>Atento Aviso!</h3>
                                                <p class="font-regular color-darkgray">19/06/2019</p>
                                            </div>
                                        </div>
                                </div>
                                <img class="photothumb" src="https://scontent.fisj1-1.fna.fbcdn.net/v/t1.0-9/64580039_2398150590244039_4921419990160113664_n.jpg?_nc_cat=101&_nc_ht=scontent.fisj1-1.fna&oh=41e35e6672f98e543312ec011c4ca660&oe=5D7B5BDC">
                                
                                </div>
                            </div>
                            
                        <div class="item photo">
                                <div class="content">
                                <div class="title">
                                    <div class="row full">
                                            <div class="column">
                                            <div class="responsive-img item-left justify-center align-center">
                                                    <img src="https://data.whicdn.com/images/307199872/original.gif" alt="responsive img" title="responsive img" class="cover-img profile-logo"/>
                                                </div>
                                            </div>
                                            <div class="column justify-start">
                                                <h3>Atento Aviso!</h3>
                                                <p class="font-regular color-darkgray">19/06/2019</p>
                                            </div>
                                        </div>
                                </div>
                                <img class="photothumb" src="https://scontent.fisj1-1.fna.fbcdn.net/v/t1.0-9/62253469_2391768077548957_2948766082615214080_n.jpg?_nc_cat=108&_nc_ht=scontent.fisj1-1.fna&oh=5cb2c6d295fd087be23ff93bb0d46796&oe=5D7D7272">                                
                                </div>
                            </div> -->
                </div>
                <div class="column column-notices">
                        <div class="content-notice">
                                
                                    <h3>Noticias recientes</h3>
                                    <div class="white-space-8"></div>
                                    <hr>
                                    <div class="white-space-8"></div>

                                <div class="news">
                                
                                
                                <?php 
                            $i=0;
                            foreach (array_reverse($this->data) as $noticia) {
                                echo '<div class="row full filtroCajas '.$noticia[5].'">
                                        <div class="column">
                                        <div class="responsive-img item-left justify-center align-center">
                                        <img src="'.constant('URL').'imagenesNoticias/'.$noticia[3].'" alt="responsive img" title="responsive img" class="cover-img profile-logo-mini"/>
                                        </div>
                                        </div>
                                        <div class="column justify-center">
                                        <h3 class="font-regular">' . $noticia[1] . '!</h3>
                                        <p class="font-small color-darkgray">19/06/2019</p>
                                        </div>
                                        </div>
                                        <div class="white-space-8">
                                        </div>';
                                    $i++;
                                    if($i == 20){
                                        break;
                                    }
                                    }       
                            ?>
                                    <div class="filters">
                                        <h3>Filtrar por carrera</h3>
                                        <div class="white-space-8"></div>
                                        <hr>
                                        <div class="white-space-8"></div>

                                        <select class="selectFilter">
                                            <option value="0">todas</option>
                                            <option value="1">Ing. en Software</option>
                                            <option value="2">Ing. en Biotecnología</option>
                                            <option value="3">Ing. en Financiera</option>
                                            <option value="4">Ing. en Biomédica</option>
                                            <option value="5">Lic. en Gestión y Admin de PyMEs</option>
                                            <option value="6">Lic. en Terapia Física</option>

                                        </select>
                                         </div>

                                         <script>
                                         $('.selectFilter').on('change', function() {
                                             
                                            

                                             if(this.value == 0){
                                                $(".filtroCajas.1").show();
                                                $(".filtroCajas.2").show();
                                                $(".filtroCajas.3").show();
                                                $(".filtroCajas.4").show();
                                                $(".filtroCajas.5").show();
                                                $(".filtroCajas.6").show();
                                                
                                             }

                                             if(this.value == 1){

                                                $(".filtroCajas.1").show();
                                                $(".filtroCajas.2").show();
                                                $(".filtroCajas.3").show();
                                                $(".filtroCajas.4").show();
                                                $(".filtroCajas.5").show();
                                                $(".filtroCajas.6").show();
                                
                                                    
                                                $(".filtroCajas.2").hide();
                                                $(".filtroCajas.3").hide();
                                                $(".filtroCajas.4").hide();
                                                $(".filtroCajas.5").hide();
                                                $(".filtroCajas.6").hide();
                                                }

                                                if(this.value == 2){

                                                    $(".filtroCajas.1").show();
                                                $(".filtroCajas.2").show();
                                                $(".filtroCajas.3").show();
                                                $(".filtroCajas.4").show();
                                                $(".filtroCajas.5").show();
                                                $(".filtroCajas.6").show();
                                                    
                                                    $(".filtroCajas.1").hide();
                                                    $(".filtroCajas.3").hide();
                                                    $(".filtroCajas.4").hide();
                                                    $(".filtroCajas.5").hide();
                                                    $(".filtroCajas.6").hide();
                                                    
                                                }

                                                if(this.value == 3){

                                                    $(".filtroCajas.1").show();
                                                $(".filtroCajas.2").show();
                                                $(".filtroCajas.3").show();
                                                $(".filtroCajas.4").show();
                                                $(".filtroCajas.5").show();
                                                $(".filtroCajas.6").show();
                                                  
                                                    
                                                    $(".filtroCajas.2").hide();
                                                    $(".filtroCajas.4").hide();
                                                    $(".filtroCajas.5").hide();
                                                    $(".filtroCajas.6").hide();
                                                    $(".filtroCajas.1").hide();
                                 
                                                }

                                                if(this.value == 4){

                                                    $(".filtroCajas.1").show();
                                                $(".filtroCajas.2").show();
                                                $(".filtroCajas.3").show();
                                                $(".filtroCajas.4").show();
                                                $(".filtroCajas.5").show();
                                                $(".filtroCajas.6").show();
                                       
                                                    $(".filtroCajas.1").hide();
                                                    $(".filtroCajas.2").hide();
                                                    $(".filtroCajas.3").hide();
                                                    $(".filtroCajas.5").hide();
                                                    $(".filtroCajas.6").hide();
                                                }

                                                if(this.value == 5){

                                                    $(".filtroCajas.1").show();
                                                $(".filtroCajas.2").show();
                                                $(".filtroCajas.3").show();
                                                $(".filtroCajas.4").show();
                                                $(".filtroCajas.5").show();
                                                $(".filtroCajas.6").show();
 
                                                    $(".filtroCajas.2").hide();
                                                    $(".filtroCajas.3").hide();
                                                    $(".filtroCajas.4").hide();
                                                    $(".filtroCajas.1").hide();
                                                    $(".filtroCajas.6").hide();
                                                }

                                                if(this.value == 6){

                                                    $(".filtroCajas.1").show();
                                                $(".filtroCajas.2").show();
                                                $(".filtroCajas.3").show();
                                                $(".filtroCajas.4").show();
                                                $(".filtroCajas.5").show();
                                                $(".filtroCajas.6").show();
                                                    $(".filtroCajas.2").hide();
                                                    $(".filtroCajas.3").hide();
                                                    $(".filtroCajas.4").hide();
                                                    $(".filtroCajas.5").hide();
                                                    $(".filtroCajas.1").hide();
                                                }

                                             
                                             
                                             });
                                            
                                         
                                         </script>

                                         
                                    
                                </div>
                                </div>
                            </div>
                </div>
                <div class="white-space-64"></div>
                </div>
                </div> 

                <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery.imagesloaded/4.1.1/imagesloaded.pkgd.min.js'></script>
            
                <script  src="<?php echo constant('URL'); ?>/public/js/mansory.js"></script>
                </div>
                            
                

                </div>
            </div>
        </div>
    </div>
    
</body>
</html>


