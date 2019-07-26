<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?php echo $noticia['titulo'] ?></title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">

    <!-- Compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.0/animate.min.css">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.4.0.min.js" integrity="sha256-BJeo0qm959uMBGb65z40ejJYGSgR7REI4+CW1fNKwOg=" crossorigin="anonymous"></script>
    <style>
        img {
            width: 100%;
            margin-top: 15px;
        }

        main{

        }
        .cuerpo{
            width:95%;
            margin: auto;
        }

        pre {
            text-align: justify;
            font-family: Arial, Helvetica, sans-serif;
            white-space: pre-wrap;
            word-wrap: break-word;
        }
    </style>
</head>

<body>


    <main>
        <div class="container">
            <h3 class="center-align"><?php echo $noticia['titulo'] ?></h3>
            <p class="left-align">Publicado el : <?php echo $noticia['fecha']?></p>
            <div class="row">
                <?php foreach ($fotos as $foto) { ?>

                    <div class="col m6 s12 ">
                        <img class="materialboxed center-align" src="<?php echo $foto['ruta'] ?>">
                    </div>

                <?php } ?>
            </div>
        </div>
        <div class="cuerpo">
            <pre>
          <?php echo $noticia['cuerpo']; ?>
        </pre>
        </div>
    </main>




    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var elems = document.querySelectorAll('.materialboxed');
            var instances = M.Materialbox.init(elems, {});

        });
    </script>
</body>

</html>