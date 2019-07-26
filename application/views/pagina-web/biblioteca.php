<main>
    <div class="row">
        <div class="col m10 s12 izq ">
            <div class="row main">
            <div class="col s12 cuad z-depth-5 animated bounceInDown leer">
                    <h4 class="center-align">COLECCIONES DE LIBROS</h4>
                    <table class="centered highlight">
                        <thead>
                            <tr>
                                <th>Colecciones</th>

                            </tr>
                        </thead>
                        <tbody>
                            <?php if (isset($colecciones)) { ?>
                                <?php foreach ($colecciones as $coleccion) { ?>
                                    <tr>

                                        <td><a href="<?php echo base_url() ?>Biblioteca/VerColeccionUsuario/<?php echo $coleccion['id_coleccion'] ?>"><?php echo $coleccion['nombre'] ?> </a></td>
                                    </tr>
                                <?php }
                        } ?>
                        </tbody>
                    </table>


                </div>
            </div>

        </div>



       