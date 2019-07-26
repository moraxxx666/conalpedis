<main>
    <div class="row">
        <div class="col m10 s12 izq ">
            <div class="row main">
                <div class="col s12 cuad z-depth-5 animated bounceInDown leer">
                    <h4 class="center-align  animated bounce delay-1s ">MULTIMEDIA</h4>
                    <table class="centered">
                        <thead>
                            <tr>
                                <th>Albums</th>

                            </tr>
                        </thead>
                        <?php if (isset($multimedia)) { ?>
                            <?php foreach ($multimedia as $multi) { ?>
                                <tr>
                                    <td><a href="<?php echo base_url() ?>Multimedia/VerAlbumUsuario/<?php echo $multi['id_album'] ?>"><?php echo $multi['nombre'] ?></a></td>

                                </tr>

                            <?php } ?>
                        <?php } ?>
                    </table>
                </div>
            </div>

        </div>