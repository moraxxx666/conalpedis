<main>
    <div class="row">
        <div class="col m10 s12 izq ">
            <div class="row main">
                <div class="col s12 cuad z-depth-5 animated bounceInDown leer">
                    <div class="container">
                        <h3 class="center-align"><?php echo $noticia['titulo'] ?></h3>
                        <p class="left-align">Publicado el : <?php echo $noticia['fecha'] ?></p>
                        <div class="row">
                            <?php foreach ($fotos as $foto) { ?>

                                <div class="col m6 s12 ">
                                    <img class="materialboxed center-align" src="<?php echo $foto['ruta'] ?>">
                                </div>

                            <?php } ?>
                        </div>
                    </div>
                    <div class="cuerpo">
                        <pre>
          <?php echo $noticia['cuerpo']; ?>
        </pre>
                    </div>


                </div>
            </div>

        </div>