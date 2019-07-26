<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?php echo $coleccion['nombre'] ?></title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">

    <!-- Compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.0/animate.min.css">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.4.0.min.js" integrity="sha256-BJeo0qm959uMBGb65z40ejJYGSgR7REI4+CW1fNKwOg=" crossorigin="anonymous"></script>
    <style>
        body {}

        .row {}

        .libro {
            border: 1px solid black;
            margin-bottom: 45px;
        }

        img {
            width: 100%;
        }

        .valign-wrapper {}

        a {
            display: block;
            margin: auto;
            color: #2196f3;
            text-decoration: underline blue
        }

        .datos {

            padding: 15px;
        }
    </style>
</head>

<body>


    <main>


        <div class="container">
            <div class="row">
                <div class="col s12">
                    <h5 class="center-align"><?php echo strtoupper($coleccion['nombre']) ?></h5>
                </div>
                <div class="col  s12">
                    <p class="center-align"><?php echo $coleccion['descripcion'] ?></p>
                </div>
            </div>
            <div class="row">

                <?php if ($libros != false) { ?>
                    <?php foreach ($libros as $libro) { ?>
                        <div class="col m4 s12 ">
                            <div class="libro z-depth-3   " >
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



    </main>




    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var elems = document.querySelectorAll('.slider');
            var instances = M.Slider.init(elems, {});
            var elems2 = document.querySelectorAll('.carousel');
            var instances = M.Carousel.init(elems2, {
                fullWidth: true,
                indicators: true
            });
            var elems3 = document.querySelectorAll('.materialboxed');
            var instances = M.Materialbox.init(elems3, {});
            var elems4 = document.querySelectorAll('.tooltipped');
            var instances = M.Tooltip.init(elems4, {});
        });
    </script>
</body>

</html>