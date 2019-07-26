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
    body {
        background: #1565c0;
    }


    .tb {
        margin-top: 25px;
        overflow: auto;
        background: #0d47a1;
        height: 750px !important;
    }

    .tbs {
        background: #0d47a1;
        color: white !important;
    }

    .tab>a {
        color: white !important;
    }

    .container2 {
        width: 95%;

        margin: auto;
    }

    nav .nav-wrapper {
        background: #0d47a1;
    }
    p{
        border: 1px solid black;
        background: #1565c0;
        padding: 15px;
        color: white;
    }
    td,
    th {
        color: white;
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
        </li>

    </ul>

    <main>
        <div class="container2">
            <div class="row">
                <div class="col s12">
                    <ul class="tabs tbs">
                        <li class="tab col s3"><a href="#test1">DATOS PERSONALES</a></li>
                        <li class="tab col s3"><a href="#test2">DISCAPACIDAD</a></li>
                        <li class="tab col s3"><a href="#test3">DATOS EXTRA</a></li>
                        <li class="tab col s3"><a href="#test4">BENEFICIOS</a></li>

                    </ul>
                </div>
                <div id="test1" class="col s12 tb">
                    <div class="container2">
                        <div class="row">
                            <div class="col s12">
                                <p class="center-align"> <b>Nº de Registro: </b><?php echo $registro->nro_registro?></p>
                            </div>
                            <div class="col s12">
                                <div class="row">
                                    <div class="col s12 m4 ">
                                        <p class="center-align"> <b>Apellido Paterno: </b><?php echo $registro->ap_paterno ?></p>
                                    </div>
                                    <div class="col s12 m4 ">
                                        <p class="center-align"> <b>Apellido Materno: </b><?php echo $registro->ap_materno ?></p>
                                    </div>
                                    <div class="col s12 m4 ">
                                        <p class="center-align"> <b>Nombres: </b><?php echo $registro->nombres ?></p>
                                    </div>

                                </div>
                            </div>
                            <div class="col s12">
                                <div class="row">
                                    <div class="col s12 m4">
                                        <p class="center-align"> <b>Fecha de Nacimiento: </b><?php echo $registro->fecha_nacimiento ?></p>
                                    </div>
                                    <div class="col s12 m4">
                                        <p class="center-align"> <b>Edad: </b><?php echo $edad ?></p>
                                    </div>

                                    <div class="col s12 m4">
                                        <p class="center-align"> <b>Departamento: </b><?php echo $registro->departamento ?></p>
                                    </div>

                                </div>
                            </div>
                            <div class="col s12">
                                <div class="row">
                                    <div class="col s12 m4">
                                        <p class="center-align"> <b>Estado Civil: </b><?php echo $estado_civil ?></p>
                                    </div>
                                    <div class="col s12 m4">
                                        <p class="center-align"> <b>Sexo: </b><?php echo $sexo ?></p>
                                    </div>
                                    <div class="col s12 m4">
                                        <p class="center-align"> <b>Oficio: </b><?php echo $oficio ?></p>
                                    </div>
                                </div>
                            </div>
                            <div class="col s12">
                                <div class="col s12 m6">
                                    <p class="center-align"> <b>Carnet de Identidad: </b><?php echo $registro->ci ?></p>
                                </div>
                                <div class="col s12 m6">
                                    <p class="center-align"> <b>Expedido en: </b><?php echo $registro->expedido ?></p>
                                </div>
                            </div>
                            <div class="col s12">
                                <div class="col s12 m6">
                                    <p class="center-align"> <b>Teléfono: </b><?php echo $telefono ?> - <?php echo $telefono2  ?> </p>
                                </div>
                                <div class="col s12 m6">
                                    <p class="center-align"> <b>Dirección: </b><?php echo $direccion ?></p>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <div id="test2" class="col s12 tb">
                    <div class="container2">
                        <div class="row">
                            <div class="col s12">
                                <div class="row">
                                    <div class="col  s12 m4">
                                        <p class="center-align"> <b>Tipo de Discapacidad: </b><?php echo $registro->tipo_discapacidad ?></p>
                                    </div>
                                    <div class="col  s12 m4">
                                        <p class="center-align"> <b>Porcentaje de Discapacidad: </b><?php echo $registro->porcentaje ?>%</p>
                                    </div>
                                    <div class="col  s12 m4">
                                        <p class="center-align"> <b>Grado: </b><?php echo $grado ?></p>
                                    </div>
                                </div>
                            </div>
                            <div class="col s12">
                                <div class="row">
                                    <div class="col s12 m4">
                                        <p class="center-align"> <b>Fecha de Registro: </b><?php echo $registro->fecha_registro ?></p>
                                    </div>
                                    <div class="col s12 m4">
                                        <p class="center-align"> <b>Institucion: </b><?php echo $registro->institucion ?></p>
                                    </div>

                                    <div class="col s12 m4">
                                        <p class="center-align"> <b>Carnetizado: </b><?php echo $carnetizado ?></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="test3" class="col s12 tb">
                    <div class="container2 ">
                        <div class="row">
                            <div class="col s12">
                                <div class="row">
                                    <div class="col s12 m6">
                                        <p class="center-align"> <b>Vive Con: </b><?php echo $vive_con ?></p>
                                    </div>
                                    <div class="col s12 m6">
                                        <p class="center-align"> <b>Vivienda: </b><?php echo $vivienda ?></p>
                                    </div>
                                </div>
                            </div>
                            <div class="col s12">
                                <div class="row">
                                    <div class="col s12 m6">
                                        <p class="center-align"> <b>Recibe Educación: </b><?php echo $educacion ?></p>
                                    </div>

                                    <div class="col s12 m6">
                                        <p class="center-align"> <b>Sabe leer y Escribir: </b><?php echo $leen_escriben ?></p>
                                    </div>
                                </div>
                            </div>
                            <div class="col s12">
                                <div class="row">

                                    <div class="col s12 m6">
                                        <p class="center-align"> <b>Seguro de Salud: </b><?php echo $seguro ?></p>
                                    </div>
                                    <div class="col s12 m6">
                                        <p class="center-align"> <b>Recibe Rehabilitación: </b><?php echo $rehabilitacion ?></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="test4" class="col s12 tb"></div>

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
            //var elems = document.querySelectorAll('.tabs');
            //var instances = M.FormSelect.init(elems, {});
            var elems2 = document.querySelectorAll('.sidenav');
            var instances = M.Sidenav.init(elems2, {});
            var el = document.querySelectorAll('.tbs');
            var instance = M.Tabs.init(el, {
                swipeable: true
            });
        });
    </script>


</body>


</html>