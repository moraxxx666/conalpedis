<main>
    <div class="row">
        <div class="col m10 s12 izq ">
            <div class="row main">
            <div class="col s12 cuad z-depth-5 animated bounceInDown leer">
                    <h4 class="center-align  ">PRENSA</h4>
                    <table class="centered highlight">
                        <thead>
                            <tr>
                                <th>Noticias</th>

                            </tr>
                        </thead>
                        <tbody>
                            <?php if (isset($noticias)) { ?>
                                <?php foreach ($noticias as $noticia) { ?>
                                    <tr>

                                        <td><a href="<?php echo base_url() ?>noticias/VerNoticiaUsuario/<?php echo $noticia['id_noticia'] ?>"><?php echo $noticia['titulo'] ?> (<?php echo $noticia['fecha'] ?>)</a></td>
                                    </tr>
                                <?php }
                        } ?>
                        </tbody>
                    </table>


                </div>
            </div>

        </div>



       