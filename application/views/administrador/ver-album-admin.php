<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?php echo $album['nombre'] ?></title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">

    <!-- Compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.0/animate.min.css">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.4.0.min.js" integrity="sha256-BJeo0qm959uMBGb65z40ejJYGSgR7REI4+CW1fNKwOg=" crossorigin="anonymous"></script>
    <style>
        body {}

        img {
            width: 100%;
        }

        .row {

            padding: 20px;
        }

        .foto {
            width: 100%;
            border: 1px solid black;    
            margin-bottom: 15px;

        }

        .container2 {
            width: 95%;
            margin: auto;
        }

        div[class^='col-'] {
            border: 5px solid white;
        }

        p {
            display: block;
            margin: auto;
        }

        .valign-wrapper {
            height: 60px;
        }
    </style>
</head>

<body>


    <main>


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
        });
    </script>
</body>

</html>