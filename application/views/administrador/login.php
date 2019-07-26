<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<!doctype html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login Administrador</title>
    <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">

    <!-- Compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.0/animate.min.css">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="<?php echo base_url() ?>public/admin/estilos/login.css">


</head>

<body>
    <div class="">
        <h4 class="center-align">Inicio Sesión Administrador</h4 class="center-align">
        <?php echo validation_errors(); ?>

        <?php echo form_open('Administrador/login'); ?>
        <div class="row">
            <div class="input-field col s12">
                <input id="usuario" name="usuario" type="text" value="<?php echo set_value('Username'); ?>">
                <label for="usuario">Usuario</label>
            </div>
            <div class="input-field col s12">
                <input id="contrasena" type="password" name="contrasena" value="<?php echo set_value('Password'); ?>">
                <label for="contrasena">Contraseña</label>
            </div>
            <div class="input-field col s12">
                <button type="submit" class="waves-effect waves-light btn">Iniciar Sesión</button>
            </div>

        </div>
        </form>
    </div>
    <?php if (isset($mostrar_alert) && $mostrar_alert == true) { ?>
        <script>
            M.toast({
                html: '<?php echo $mensaje;?>'
            });
        </script>
    <?php } ?>




</body>

</html>