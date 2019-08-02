<div class="smartphone-menu-trigger"></div>
                        <div class="white-space-24"></div>
    
                        <div class="responsive-img item-left justify-center align-center logo">
                            <img src="<?php echo constant('URL'); ?>/public/img/upqroonew.png" alt="responsive img" title="responsive img" class="cover-img "/>
                        </div>
    
                        <div class="white-space-32"></div>
                        <!-- <div class="white-space-16"></div> -->
                        
                        <div class="column main align-center auto">
                            <div class="menu-options">
                                <a href="<?php echo constant('URL'); ?>alumnos/datos" class="item-left" onclick="func();">
                                    <div class="row justify-center align-start">
                                        <div class="column icon align-center"><i class="fa fa-user"></i></div>
                                        <div class = "column full">
                                            <h4 class="color-white weight-regular font-small">Datos generales</h4>
                                        </div>
                                    </div>
                                </a>
                                
                                <a href="<?php echo constant('URL'); ?>alumnos/carga-academica" class="item-left" onclick="func();">
                                    <div class="row justify-center">
                                            <div class="column icon align-center"><i class="fa fa-university"></i></div>
                                        <div class = "column full">
                                            <h4 class="color-white weight-regular font-small">Carga académica</h4>
                                        </div>                        
                                    </div>
                                </a>
    
                                <a href="<?php echo constant('URL'); ?>alumnos/calificaciones" class="item-left" id="btn" onclick="func();">
                                    <div class="row justify-center">
                                            <div class="column icon align-center"><i class="fa fa-star"></i></div> 
                                        <div class = "column full">
                                            <h4 class="color-white weight-regular font-small">Calificaciones</h4>
                                        </div>
                                    </div>
                                </a>
    
                                <a href="<?php echo constant('URL'); ?>alumnos/kardex" class="item-left" id="btn" onclick="func();">
                                    <div class="row justify-center">
                                        <div class="column icon align-center"><i class="fa fa-book-user"></i></div>
                                        <div class="column full">
                                            <h4 class="color-white weight-regular font-small">Kardex</h4>
                                        </div>
                                    </div>
                                </a>
    
                                <a href="<?php echo constant('URL'); ?>alumnos/horario" class="item-left" id="btn" onclick="func();">
                                    <div class="row justify-center">
                                        <div class="column icon align-center"><i class="fa fa-calendar-alt"></i></div>
                                        <div class = "column full">
                                            <h4 class="color-white weight-regular font-small">Horario</h4>
                                        </div>
                                    </div>
                                </a>
    
                                <a href="<?php echo constant('URL'); ?>noticias" class="item-left" onclick="func();">
                                    <div class="row justify-center">
                                        <div class="column icon align-center"><i class="fa fa-newspaper"></i></div>
                                        <div class = "column full">
                                            <h4 class="color-white weight-regular font-small">Noticias</h4>
                                        </div>
                                    </div>
                                </a>
    
                                <a href="<?php echo constant('URL'); ?>alumnos/formatos" class="item-left" id="btn" onclick="func();">
                                    <div class="row justify-center">
                                        <div class="column icon align-center"><i class="fa fa-file-download"></i></div>
                                        <div class = "column full">
                                            <h4 class="color-white weight-regular font-small">Formatos</h4>
                                        </div>
                                    </div>
                                </a>
    
                                <a href="<?php echo constant('URL'); ?>xd" class="item-left" onclick="func();">
                                    <div class="row justify-center">
                                        <div class="column icon align-center"><i class="fas fa-chalkboard-teacher"></i></div>
                                        <div class = "column full">
                                            <h4 class="color-white weight-regular font-small">Evaluación Docente</h4>
                                        </div>
                                    </div>
                                </a>
    
                                <a href="<?php echo constant('URL'); ?>logout" class="item-left" >
                                    <div class="row item-left justify-center">
                                        <div class="column icon align-center"><i class="fa fa-sign-out"></i></div>
                                        <div class = "column full">
                                            <h4 class="color-white weight-regular font-small">Cerrar Sesión</h4>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <?php
                        include './views/alerts/Headers.php';
                        ?>
                        <script>
                        // seleccionamos el enlace 
                        function func() {
                        //alert("Hello! I am an alert box!");
                        swal({
                            title: "Cargando datos",
                            text: "Espere porfavor.....",
                            //imageUrl: './public/img/cargando.gif',
                            imageAlt: 'Custom image',
                            timer: 15000
                            });
                            }
                        </script>
                        
