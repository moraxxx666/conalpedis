<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Administrador - SIPBDIS</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">

    <!-- Compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.0/animate.min.css">

    <script src="https://code.jquery.com/jquery-3.4.0.min.js" integrity="sha256-BJeo0qm959uMBGb65z40ejJYGSgR7REI4+CW1fNKwOg=" crossorigin="anonymous"></script>

</head>
<style>
    body{
        background: #1565c0;
        color: white;
    }
    td>a{
        color: white;
        text-decoration: underline;
    }
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
                <li><a href="<?php echo site_url() ?>administrador/noticias">Noticias</a></li>
                <li><a href="<?php echo site_url() ?>administrador/multimedia">Multimedia</a></li>
                <li><a href="<?php echo site_url() ?>administrador/biblioteca">Biblioteca</a></li>
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
        <li><a href="<?php echo site_url() ?>administrador/noticias">Noticias</a></li>
        <li><a href="<?php echo site_url() ?>administrador/multimedia">Multimedia</a></li>
        <li><a href="<?php echo site_url() ?>administrador/biblioteca">Biblioteca</a></li>
        <li><a href="<?php echo site_url() ?>administrador/mensajes">Mensajes</a></li>
        <li><a href="<?php echo site_url() ?>administrador/usuarios">Usuarios</a></li>
        <li><a href="<?php echo site_url() ?>administrador/sipbdis">SIPBDIS</a></li>
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
        <div class="container">

            <div class="row">
                <div class="col s12">
                    <?php echo validation_errors(); ?>

                    <?php echo form_open('Sibpdis/BuscarpSibpdis'); ?>
                    <div class="row">
                        <div class="input-field col s12">
                            <input id="usuario" name="usuario" type="text">
                            <label for="usuario">Ingrese el AP PATERNO, AP MATERNO, NRO REGISTRO O CI</label>
                        </div>

                        <div class="input-field col s12">
                            <button style="width:100% " type="submit" class="waves-effect waves-light btn">BUSCAR</button>
                        </div>

                    </div>
                    </form>
                </div>

            </div>


        </div>
        <?php if (isset($registros) && !empty($registros)) { ?>
            <div class="registros container ">
                <table class="responsive-table">
                    <thead>
                        <tr>
                            <th>Nº</th>
                            <th>Nº Registro</th>
                            <th>Ap Paterno</th>
                            <th>Ap Materno</th>
                            <th>Nombres</th>

                            <th>CI</th>

                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $aux = 1;
                        foreach ($registros as $registro) {
                            ?>

                            <tr>
                                <td><?php echo $aux ?></td>
                                <td> <a href="<?php echo base_url() ?>Sibpdis/VerRegistroSibpdis/<?php echo $registro['nro_registro'] ?>"> <?php echo $registro['nro_registro'] ?></a></td>
                                <td><?php echo $registro['ap_paterno'] ?></td>
                                <td><?php echo $registro['ap_materno'] ?></td>
                                <td><?php echo $registro['nombres'] ?></td>
                                <td><?php echo $registro['ci'] ?></td>

                            </tr>

                            <?php $aux++;
                        } ?>
                    </tbody>
                </table>
            </div>
        <?php } ?>

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