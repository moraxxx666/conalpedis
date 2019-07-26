<style>
.foto{
    margin-right: 25px;
    margin-bottom: 20px;
    border: 1px solid black;
}
</style>
<main>
    <div class="row">
        <div class="col m10 s12 izq ">
            <div class="row main">
                <div class="col s12 cuad z-depth-5 animated bounceInDown leer">
                    <div class="container2">
                        <div class="row">
                            <div class="col s12">
                                <h5 class="center-align"><?php echo strtoupper($album['nombre']) ?></h5>
                            </div>
                            <div class="col s12">
                                <p class="center-align"><?php echo $album['descripcion'] ?></p>
                            </div>
                        </div>
                        <div class="row">

                            <?php if ($fotos != false) { ?>
                                <?php foreach ($fotos as $foto) { ?>
                                    <div class="col m4 s12 ">
                                        <div class="foto z-depth-3  ">
                                            <img class="responsive-img materialboxed " src="<?php echo $foto['ruta'] ?>" alt="">
                                            <div class="div valign-wrapper center-align">
                                                <p class=""><?php echo $foto['titulo'] ?></p>
                                            </div>

                                        </div>

                                    </div>

                                <?php }
                        } ?>

                        </div>
                    </div>
                </div>
            </div>

        </div>