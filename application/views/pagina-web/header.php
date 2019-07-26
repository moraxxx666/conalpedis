<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<!doctype html>
<html lang="es">

<head>
	<meta charset="UTF-j8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title><?php echo $titulo ?></title>
	<!-- Compiled and minified CSS -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">

	<!-- Compiled and minified JavaScript -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.0/animate.min.css">
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>


</head>

<style>
	.row .col {
		padding: 0;


	}

	img {
		display: block;
		width: 100%;
		height: 100%;
	}

	.dropdown-content li>a,
	.sidenav li>a {
		color: white !important;
	}

	footer {

		width: 100%;
	}
</style>
<style>
	.izq {}

	.der {}

	.main,
	.enlaces {


		width: 95%;
		margin: auto !important;

	}

	.cuad {

		background: white;
		margin-top: 15px !important;
		text-align: justify;
		padding: 25px !important;
	}

	.cuad1 {
		margin-top: 15px !important;

	}
</style>

<body class="body">

	<div class="fixed-action-btn no-autoinit">
		<a class="btn-floating btn-large blue">
			<i class="large material-icons">accessibility</i>
		</a>
		<ul>
			<li><a class="btn-floating blue darken-4" id="reproducir"><i class="material-icons">hearing</i></a></li>
			<li><a class="btn-floating blue darken-3" id="reducirLetra"><i class="material-icons">remove</i></a></li>
			<li><a class="btn-floating blue darken-2" id="aumentarLetra"><i class="material-icons">add</i></a></li>
			<li><a class="btn-floating blue darken-1" id="pantallaCompleta"><i class="material-icons">personal_video</i></a></li>

		</ul>
	</div>
	<!-- Menu Lateral-->
	<div class="container2">
		<div class="row">
			<div class="col s12">
				<img class="responsive-img" src="<?php echo base_url() ?>public/pagina-web/imagenes/cropped-PRUEBA2.jpg" alt="">
			</div>
			<div class="col s12">
				<nav>
					<div class="nav-wrapper blue darken-4">

						<a href="#" data-target="mobile-demo" class="sidenav-trigger"><i class="material-icons">menu</i></a>
						<ul class="left hide-on-med-and-down">
							<li><a href="<?php echo site_url('inicio'); ?>">Inicio</a> </li>
							<li><a class="dropdown-trigger1 no-autoinit" href="#!" data-target="institucion">Institución<i class="material-icons right">arrow_drop_down</i></a></li>
							<li><a href="<?php echo site_url('Gestion') ?>">Gestión</a></li>
							<li><a class="dropdown-trigger1 no-autoinit" href="#!" data-target="transparencia">Transparencia<i class="material-icons right">arrow_drop_down</i></a></li>

							<li><a href="<?php echo site_url('marco-legal') ?>">Marco Legal</a></li>
							<li><a href="<?php echo site_url('prensa') ?>">Prensa</a></li>
							<li><a class="dropdown-trigger1 no-autoinit" href="#!" data-target="contacto">Contacto<i class="material-icons right">arrow_drop_down</i></a></li>
							<li><a class="dropdown-trigger1 no-autoinit" href="#!" data-target="estadistica">Repositorio de Datos<i class="material-icons right">arrow_drop_down</i></a></li>



						</ul>
					</div>
				</nav>
			</div>

		</div>



		<ul class="sidenav left blue blue darken-4" id="mobile-demo">
			<li><a href="<?php echo site_url('inicio'); ?>">Inicio</a></li>
			<li><a class="dropdown-trigger no-autoinit" href="#!" data-target="institucion1">Institución<i class="material-icons right">arrow_drop_down</i></a></li>
			<li><a href="<?php echo site_url('Gestion') ?>">Gestión</a></li>
			<li><a class="dropdown-trigger no-autoinit" href="#!" data-target="transparencia1">Transparencia<i class="material-icons right">arrow_drop_down</i></a></li>

			<li><a href="<?php echo site_url('marco-legal') ?>">Marco Legal</a></li>
			<li><a href="<?php echo site_url('prensa') ?>">Prensa</a></li>
			<li><a class="dropdown-trigger no-autoinit" href="#!" data-target="contacto1">Contacto<i class="material-icons right">arrow_drop_down</i></a></li>
			<li><a class="dropdown-trigger no-autoinit" href="#!" data-target="estadistica1">Repositorio de Datos<i class="material-icons right">arrow_drop_down</i></a></li>


		</ul>


		<!--Dropdown estadistica-->
		<ul id="estadistica" class="dropdown-content blue darken-4  ">
			<li><a href="<?php echo site_url('estadisticas') ?>">Estadisticas</a></li>
			<li><a href="<?php echo site_url('multimedia') ?>">Multimedia </a></li>



		</ul>
		<ul id="estadistica1" class="dropdown-content blue darken-4  ">
			<li><a href="<?php echo site_url('estadisticas') ?>">Estadisticas</a></li>
			<li><a href="<?php echo site_url('multimedia') ?>">Multimedia </a></li>



		</ul>


		<!--Dropdown Çontacto-->
		<ul id="contacto" class="dropdown-content blue darken-4  ">
			<li><a href="<?php echo site_url('direccion') ?>">Dirección</a></li>
			<!---	<li><a href="<?php echo site_url('formulario-de-contacto') ?>">Formulario de Contacto</a></li>--->



		</ul>
		<ul id="contacto1" class="dropdown-content blue darken-4  ">
			<li><a href="<?php echo site_url('direccion') ?>">Dirección</a></li>
			<!--	<li><a href="<?php echo site_url('formulario-de-contacto') ?>">Formulario de Contacto</a></li> --->



		</ul>
		<!-- Dropdown Institución-->
		<ul id="institucion" class="dropdown-content blue darken-4  ">
			<li><a href="<?php echo site_url('mision-vision'); ?>">Misión y Visión</a></li>
			<li><a href="<?php echo site_url('funcion-institucion'); ?>">Funcion de la Institución</a></li>
			<li><a href="<?php echo site_url('atribuciones-institucionales'); ?>">Atribuciones Institucionales</a></li>
			<li><a href="<?php echo site_url('estructura-organizacional'); ?>">Estructura Organizacional</a></li>
			<li><a href="<?php echo site_url('organigrama-institucional'); ?>">Organigrama Institucional</a></li>
			<li><a href="<?php echo site_url('marco-normativo'); ?>">Marco Normativo Existente de la Institución</a></li>
			<li><a href="<?php echo site_url('trayectoria-mae'); ?>">Trayectoria de la MAE</a></li>

		</ul>


		<ul id="institucion1" class="dropdown-content blue darken-4">
			<li><a href="<?php echo site_url('mision-vision'); ?>">Misión y Visión</a></li>
			<li><a href="<?php echo site_url('funcion-institucion'); ?>">Funcion de la Institución</a></li>
			<li><a href="<?php echo site_url('atribuciones-institucionales'); ?>">Atribuciones Institucionales</a></li>
			<li><a href="<?php echo site_url('estructura-organizacional'); ?>">Estructura Organizacional</a></li>
			<li><a href="<?php echo site_url('organigrama-institucional'); ?>">Organigrama Institucional</a></li>
			<li><a href="<?php echo site_url('marco-normativo'); ?>">Marco Normativo Existente de la Institución</a></li>
			<li><a href="<?php echo site_url('trayectoria-mae'); ?>">Trayectoria de la MAE</a></li>

		</ul>
		<!-- Dropdown Transparencia-->
		<ul id="transparencia" class="dropdown-content blue darken-4">
			<li><a href="<?php echo site_url('nomina-personal') ?>">Nomina del Personal</a></li>
			<li><a href="#!">Convocatoria de Personal</a></li>
			<li><a href="<?php echo base_url() ?>public/pagina-web/transparencia/ESCALA-SALARIAL.pdf" target=”_blank”>Escala Salarial</a></li>
			<li><a href="<?php echo site_url('planificacion') ?>">Planificación</a></li>
			<li><a href="<?php echo site_url('informacion-financiera') ?>">Información Financiera</a></li>
			<li><a target="_blank" href="<?php echo base_url() ?>public/pagina-web/transparencia/viajes-mae.pdf">Viajes de la MAE </a></li>
			<li><a href="<?php echo site_url('formularios') ?>">Formularios</a></li>
			<li><a href="<?php echo site_url('reglamentos-internos') ?>">Reglamentos Internos</a></li>

		</ul>


		<ul id="transparencia1" class="dropdown-content blue darken-4">
			<li><a href="<?php echo site_url('nomina-personal') ?>">Nomina del Personal</a></li>
			<li><a>Convocatoria de Personal</a></li>
			<li><a href="<?php echo base_url() ?>public/pagina-web/transparencia/ESCALA-SALARIAL.pdf" target=”_blank”>Escala Salarial</a></li>
			<li><a href="<?php echo site_url('planificacion') ?>">Planificación</a></li>
			<li><a href="<?php echo site_url('informacion-financiera') ?>">Información Financiera</a></li>
			<li><a target="_blank" href="<?php echo base_url() ?>public/pagina-web/transparencia/viajes-mae.pdf">Viajes de la MAE </a></li>
			<li><a href="<?php echo site_url('formularios') ?>">Formularios</a></li>
			<li><a href="<?php echo site_url('reglamentos-internos') ?>">Reglamentos Internos</a></li>

		</ul>
	</div>



	<script>
		document.addEventListener('DOMContentLoaded', function() {
			var elems = document.querySelectorAll('.fixed-action-btn');
			var instances = M.FloatingActionButton.init(elems, {
				direction: 'top',
				hoverEnabled: false

			});
		
		});
		$("#reproducir").click(reproducirPantalla);
		$("#pantallaCompleta").click(pantallaCompleta);
		$("#aumentarLetra").click(AumentarLetra);
		$("#reducirLetra").click(ReducirLetra);

		var donde = $("*");
		var sizeFuenteOriginal = donde.css('font-size');

		function reproducirPantalla() {
			decir("Bienvenido al Comite nacional de la persona con discapacidad");
			var menu = "Usted se encuentra en,<?php echo $titulo ?>";
			decir(menu);
			decir($(".leer").text());
		}

		function AumentarLetra() {

			var sizeFuenteActual = donde.css('font-size');
			var sizeFuenteActualNum = parseFloat(sizeFuenteActual, 10);
			var sizeFuenteNuevo = sizeFuenteActualNum * 1.2;
			donde.css('font-size', sizeFuenteNuevo);

		}

		function ReducirLetra() {

			var sizeFuenteActual = donde.css('font-size');
			var sizeFuenteActualNum = parseFloat(sizeFuenteActual, 10);
			var sizeFuenteNuevo = sizeFuenteActualNum * 0.8;
			donde.css('font-size', sizeFuenteNuevo);

		}

		function pantallaCompleta() {
			if (document.documentElement.requestFullscreen) {
				document.documentElement.requestFullscreen()
			}
			if (document.documentElement.msRequestFullscreen) {
				document.documentElement.msRequestFullscreen()
			}
			if (document.documentElement.mozRequestFullScreen) {
				document.documentElement.mozRequestFullScreen()
			}
			if (document.documentElement.webkitRequestFullScreen) {
				document.documentElement.webkitRequestFullScreen()
			}
			if (typeof window.ActiveXObject !== "undefined") {
				var wscript = new ActiveXObject("WScript.Shell");
				if (wscript !== null) {
					wscript.SendKeys("{F11}")
				}
			}
		}

		function decir(texto) {
			var utterance = new SpeechSynthesisUtterance();
			utterance.text = texto;
			//utterance.voice = speechSynthesis.getVoices()[11];
			utterance
			speechSynthesis.speak(utterance);
		}
	</script>