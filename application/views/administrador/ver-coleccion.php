<style>
    .libro {
        border: 1px solid black;
        margin-bottom: 45px;
        margin-right: 25px;
    }

    a.truncate {
        display: block;
        margin: auto;
        padding: 10px;
        color: #2196f3;
        text-decoration: underline blue
    }

    .datos {
        padding: 10px;
    }
</style>
<main>
    <div class="row">
        <div class="col m10 s12 izq ">
            <div class="row main">
                <div class="col s12 cuad z-depth-5 animated bounceInDown leer">
                    <h5 class="center-align"><?php echo strtoupper($coleccion['nombre']) ?></h5>
                    <p class="center-align"><?php echo $coleccion['descripcion'] ?></p>
                    <?php if ($libros != false) { ?>
                        <?php foreach ($libros as $libro) { ?>
                            <div class="col m4 s12 ">
                                <div class="libro z-depth-3   ">
                                    <img class="responsive-img" src="<?php echo base_url() ?>public/pagina-web/imagenes/biblioteca.jpg" alt="">

                                    <div class="div valign-wrapper center-align">
                                        <a class="truncate tooltipped" data-position="bottom" data-tooltip="<?php echo $libro['titulo'] ?>" href="<?php echo $libro['ruta'] ?>"><?php echo $libro['titulo'] ?></a>

                                    </div>
                                    <div class="datos">
                                        <p class="truncate"> <b>Autor: </b> <?php echo $libro['autor'] ?></p>
                                        <p> <b>Fecha: </b> <?php echo $libro['fecha'] ?></p>
                                    </div>

                                </div>

                            </div>

                        <?php }
                } ?>

                </div>
            </div>

        </div>