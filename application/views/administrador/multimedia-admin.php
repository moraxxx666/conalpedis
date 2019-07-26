<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Administrador - Multimedia</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">

    <!-- Compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.0/animate.min.css">

    <script src="https://code.jquery.com/jquery-3.4.0.min.js" integrity="sha256-BJeo0qm959uMBGb65z40ejJYGSgR7REI4+CW1fNKwOg=" crossorigin="anonymous"></script>

</head>
<style>
    .container2 {
        width: 90%;
        margin: auto;
    }

    .gestion {
        margin-top: 30px;
    }

    nav .nav-wrapper {
        background: #0d47a1;
    }
</style>

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
        <li><a href="<?php echo site_url() ?>sipbdis-admin">SIPBDIS</a></li>
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

                    <form class="row" method="post" action="<?php echo base_url() ?>Multimedia/AgregarMultimedia" enctype="multipart/form-data">
                        <div class="col s12">
                            <h5 class="center-align">Agregar Fotos</h5>
                        </div>
                        <div class="input-field col s12">
                            <input id="titulo" name="titulo" type="text">
                            <label for="titulo">Titulo de la foto(s)</label>
                        </div>
                        <div class="input-field col s12">
                            <select name="album">
                                <?php foreach ($albums as $album) { ?>
                                    <option value="<?php echo $album['id_album'] ?>"><?php echo $album['nombre'] ?></option>
                                <?php } ?>


                            </select>
                            <label>Seleccione a que album pertenecerá(n) la(s) foto(s)</label>
                        </div>
                        <div class="file-field input-field col s12">
                            <div class="btn">
                                <span>Imágenes</span>
                                <input type="file" multiple name="files[]">
                            </div>
                            <div class="file-path-wrapper">
                                <input class="file-path validate" type="text" placeholder="Seleccione las Imágenes">
                            </div>
                        </div>
                        <div class="input-field col s12">

                            <button class="btn" style="width:100%;" type="submit">Agregar Fotos</button>
                        </div>
                    </form>

                </div>
                <div class="col m6 s12">
                    <div class="row">
                        <div class="col s12">
                            <h5 class="center-align">Gestionar Albums</h5>
                            <div class="col m12 s12">

                                <form class="row" method="post" action=" <?php echo base_url() ?>Multimedia/AgregarAlbum">

                                    <div class="input-field col s12">
                                        <input id="nombreAlbum" name="nombreAlbum" type="text">
                                        <label for="nombreAlbum">Nombre del Album</label>
                                    </div>
                                    <div class="input-field col s12">
                                        <input id="descrAlbum" name="descrAlbum" type="text">
                                        <label for="descrAlbum">Descripción del Album</label>
                                    </div>
                                    <div class="input-field col s12">

                                        <button class="btn" style="width:100%;" type="submit">Agregar Album</button>
                                    </div>
                                </form>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="col s12">
                    <table class="centered">
                        <thead>
                            <tr>
                                <th>Nombre del Album</th>
                                <th>Acción</th>

                            </tr>
                        </thead>

                        <tbody>

                            <?php
                            if ($albums != false) {
                                foreach ($albums as $album) { ?>
                                    <tr>
                                        <td><?php echo $album['nombre'] ?></td>
                                        <td>
                                            <form action="<?php echo base_url() ?>Multimedia/BorrarMultimedia" method="post">
                                                <input type="hidden" value="<?php echo $album['id_album'] ?>" name="id_album">
                                                <button class="btn gestion" type="submit" name href="btn red">BORRAR</button>
                                            </form>

                                            <a class="btn gestion" href="<?php echo base_url() ?>Multimedia/VerAlbum/<?php echo $album['id_album'] ?>">Ver Album</a>
                                        </td>
                                    </tr>
                                <?php }
                        } ?>



                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </main>




    <?php if ($this->session->flashdata('my_data')) { ?>
        <script>
            M.toast({
                html: '<?php echo $this->session->flashdata('my_data'); ?>'
            });
        </script>
    <?php } ?>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var elems = document.querySelectorAll('select');
            var instances = M.FormSelect.init(elems, {});
            var elems2 = document.querySelectorAll('.sidenav');
            var instances = M.Sidenav.init(elems2, {});
        });
    </script>


</body>


</html>