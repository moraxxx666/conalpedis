<main>
    <div class="row">
        <div class="col m10 s12 izq ">
            <div class="row main">
                <div class="col s12 cuad3  animated  bounceInDown ">

                    <div class="slider">
                        <ul class="slides">
                            <li>
                                <img class="responsive-img" src="<?php echo base_url() ?>public/pagina-web/imagenes/carusel/1.jpg">
                                <div class="caption center-align">
                                    <h3></h3>
                                    <h5 class="light grey-text text-lighten-3"></h5>
                                </div>
                            </li>
                            <li>
                                <img class="responsive-img" src="<?php echo base_url() ?>public/pagina-web/imagenes/carusel/2.jpg">
                                <div class="caption left-align">
                                    <h3></h3>
                                    <h5 class="light grey-text text-lighten-3"></h5>
                                </div>
                            </li>
                            <li>
                                <img class="responsive-img" src="<?php echo base_url() ?>public/pagina-web/imagenes/carusel/3.jpg">
                                <div class="caption right-align">
                                    <h3></h3>
                                    <h5 class="light grey-text text-lighten-3"></h5>
                                </div>
                            </li>
                            <li>
                                <img class="responsive-img" src="<?php echo base_url() ?>public/pagina-web/imagenes/carusel/4.jpg">
                                <div class="caption center-align">
                                    <h3></h3>
                                    <h5 class="light grey-text text-lighten-3"></h5>
                                </div>
                            </li>
                            <li>
                                <img class="responsive-img" src="<?php echo base_url() ?>public/pagina-web/imagenes/carusel/5.jpg">
                                <div class="caption center-align">
                                    <h3></h3>
                                    <h5 class="light grey-text text-lighten-3"></h5>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col s12 cuad z-depth-5 animated bounceInDown delay-1s leer">
                    <h3 class="center-align">Noticias Recientes</h3>
                    <div class="col s12 ">
                        <?php if ( isset($noticias) && $noticias != false) { ?>
                            <?php foreach ($noticias as $noticia) { ?>
                                <div class="card horizontal  blue darken-1 z-depth-5">
                                    <div class="card-image  ">
                                        <img class="responsive-img" src="<?php echo $noticia['ruta'] ?>" width="100px">
                                    </div>
                                    <div class="card-stacked">
                                        <div class="card-content  white-text text-darken-1">
                                            <p class="center-align"><?php echo $noticia['titulo'] ?></p>
                                            <p class="">Publicado: <?php echo $noticia['fecha'] ?></p>
                                        </div>
                                        <div class="card-action">
                                            <a href="<?php echo base_url() ?>Noticias/VerNoticiaUsuario/<?php echo $noticia['id_noticia'] ?>" class="white-text">Ver Noticia</a>
                                        </div>
                                    </div>
                                </div>
                            <?php }
                    } ?>

                    </div>
                </div>

            </div>

        </div>






        <script>
            
            document.addEventListener('DOMContentLoaded', function() {
                var elems = document.querySelectorAll('.slider');
                var instances = M.Slider.init(elems, {

                });
            });
        </script>