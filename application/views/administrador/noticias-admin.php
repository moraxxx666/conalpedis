<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Administrador - Noticias</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">

    <!-- Compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.0/animate.min.css">

    <script src="https://code.jquery.com/jquery-3.4.0.min.js" integrity="sha256-BJeo0qm959uMBGb65z40ejJYGSgR7REI4+CW1fNKwOg=" crossorigin="anonymous"></script>
    <style>
        .boton>a {
            width: 100%;
        }

        .btn-floating {
            margin-left: 5px;
        }

        .material-icons {
            margin-right: 7px;
        }

        .der {
            height: 480px;
            overflow: auto;
        }

        nav .nav-wrapper {
            background: #0d47a1;
        }
    </style>
</head>

<body>
    <!-- Barra de navegacion-->
    <nav>
        <div class="nav-wrapper">
            <a href="#!" class="brand-logo">CONALPEDIS </a>
            <a href="#" data-target="mobile-demo" class="sidenav-trigger"><i class="material-icons">menu</i></a>
            <ul class="right hide-on-med-and-down">
                <li><a href="<?php echo site_url() ?>noticias-admin">Noticias</a></li>
                <li><a href="<?php echo site_url() ?>multimedia-admin">Multimedia</a></li>
                <li><a href="<?php echo site_url() ?>biblioteca-admin">Biblioteca</a></li>
                <!--
                <li><a href="<?php echo site_url() ?>administrador/mensajes">Mensajes</a></li>
                <li><a href="<?php echo site_url() ?>administrador/usuarios">Usuarios</a></li>
                <li><a href="<?php echo site_url() ?>administrador/sipbdis">SIPBDIS</a></li>-->
                <li>
                    <?php echo form_open('Administrador/logout'); ?>
                    <div class="row">

                        <div class="input-field col s12">
                            <button type="submit" class=" btn"><?php echo strtoupper($user->username) ?> Cerrar Sesión</button>
                        </div>

                    </div>
                    </form>

            </ul>
        </div>
    </nav>
    <ul class="sidenav" id="mobile-demo">
        <li><a href="<?php echo site_url() ?>noticias-admin">Noticias</a></li>
        <li><a href="<?php echo site_url() ?>multimedia-admin">Multimedia</a></li>
        <li><a href="<?php echo site_url() ?>biblioteca-admin">Biblioteca</a></li>
        <li><a href="<?php echo site_url() ?>mensajes-admin">Mensajes</a></li>
        <li><a href="<?php echo site_url() ?>usuarios-admin">Usuarios</a></li>
        <li><a href="<?php echo site_url() ?>sipbdis">SIPBDIS</a></li>
        <li>
            <?php echo form_open('Administrador/logout'); ?>
            <div class="row">

                <div class="input-field col s12">
                    <button type="submit" class=" btn"><?php echo strtoupper($user->username) ?> Cerrar Sesión</button>
                </div>

            </div>
            </form>

    </ul>

    <main>
        <div class="container2">
            <div class="row">
                <div class="col m6 s12">
                    <div class="colm6 s12">
                        <h5 class="center-align">Agregar Noticia</h5>
                    </div>
                    <form class="container" method="post" action="<?php echo base_url() ?>Noticias/AgregarNoticia" enctype="multipart/form-data">

                        <div class="input-field col s12">
                            <input name="titulo" id="titulo" type="text" class="validate">
                            <label for="titulo">Título</label>
                        </div>

                        <div class="input-field col s12">
                            <textarea name="cuerpo" id="cuerpo" class="materialize-textarea"></textarea>
                            <label for="cuerpo">Cuerpo</label>
                        </div>

                        <div class="file-field input-field col s12">
                            <div class="btn">
                                <span>Multimedia</span>
                                <input name="files[]" type="file" multiple>
                            </div>
                            <div class=" file-path-wrapper">
                                <input class="file-path validate" type="text" placeholder="Seleccione los archivos multimedia">
                            </div>
                        </div>
                        <div class="col s12">
                            <button name="agregarNoticia" class="btn" style="width:100%; margin-bottom:50px;" type="submit">Agregar Noticia</button>
                        </div>

                    </form>
                </div>
                <div class="col m6 s12 contenedor-noticias">
                    <h5 class="center-align">Noticias Existentes</h5>
                    <?php if ($noticias != false) { ?>
                        <?php foreach ($noticias as $noticia) { ?>
                            <div class="col s12 ">
                                <div class="row">

                                    <div class="col s6"><?php echo $noticia['titulo'] ?></div>
                                    <div class="col s6" id="<?php echo $noticia['id_noticia'] ?>">
                                        <a class="btn-floating btn-large waves-effect waves-light red tooltipped delete" data-position="top " data-tooltip="Eliminar Noticia"><i class="material-icons ">block</i></a>
                                        <a href="<?php echo base_url() ?>Noticias/VerNoticia/<?php echo $noticia['id_noticia'] ?>" data-position="right" data-tooltip="Ver Noticia" class="tooltipped btn-floating btn-large waves-effect waves-light red"><i class="material-icons">computer</i></a>

                                    </div>

                                </div>
                            </div>
                        <?php } ?>
                    <?php } ?>

                </div>
            </div>
        </div>
    </main>


    <script>
        $(document).ready(function() {

            $('.delete').click(function() {
                //Recogemos la id del contenedor padre
                var parent = $(this).parent().attr('id');
                //Recogemos el valor del servicio

                var dataString = 'id=' + parent;

                $.ajax({
                    type: "POST",
                    url: "<?php echo site_url()?>Noticias/BorrarNoticia",
                    data: dataString,
                    success: function() {
                        M.toast({
                            html: 'NOTICIA BORRADA'
                        });
                        setTimeout(function() {
                            window.location.href = "<?php echo site_url() ?>noticias-admin";
                        }, 1000);

                    }
                });
            });
        });
    </script>

    <?php if ($this->session->flashdata('my_data')) { ?>
        <script>
            M.toast({
                html: '<?php echo $this->session->flashdata('my_data'); ?>'
            });
        </script>
    <?php } ?>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var elems = document.querySelectorAll('.sidenav');
            var instances = M.Sidenav.init(elems, {});
            var elems2 = document.querySelectorAll('.tooltipped');
            var instances = M.Tooltip.init(elems2, {});
        });
    </script>
</body>


</html>