<div class="col m2 s12 der ">

	<div class="row enlaces">
		<div class="col s12 cuad1">
			<a href="http://sistemasibpdis.conalpedis.gob.bo/conalpedis/personasc/listadop"><img class="responsive-img " style="width:100%" src="<?php echo base_url() ?>public/pagina-web/imagenes/parte-derecha/SIBPDISB.jpg" alt=""></a>
		</div>
		<div class="col s12 cuad1">
			<a href="<?php echo base_url() ?>biblioteca"><img class="responsive-img" style="width:100%" src="<?php echo base_url() ?>public/pagina-web/imagenes/parte-derecha/biblio.jpg" alt=""></a>
		</div>
		<div class="col s12 cuad1">
			<a href="<?php echo base_url() ?>ong"><img class="responsive-img" style="width:100%" src="<?php echo base_url() ?>public/pagina-web/imagenes/parte-derecha/ONGS.jpg" alt=""></a>
		</div>
		<div class="col s12 cuad1">
			<a href="http://cumpl.conalpedis.gob.bo/"><img class="responsive-img" style="width:100%" src="<?php echo base_url() ?>public/pagina-web/imagenes/parte-derecha/INSERCION.jpg" alt=""></a>
		</div>
		<div class="col s12 cuad1">
			<a href="<?php echo base_url() ?>public/pagina-web/informacion-financiera/acta-de-los-42-puntos.pdf"> <img class="responsive-img" style="width:100%" src="<?php echo base_url() ?>public/pagina-web/imagenes/parte-derecha/acta.jpg" alt=""></a>
		</div>
	</div>


</div>

</div>
</main>
<footer class="page-footer  blue darken-4">
	<div class="container">
		<div class="row">
			<div class="col l6 s12">
				<h5 class="white-text">CONALPEDIS</h5>
				<div class="row">
					<div class="col ">
						<a href="https://www.facebook.com/conalpedis.bolivia" target="_blank"> <img src="<?php echo base_url() ?>public/pagina-web/imagenes/facebook2.png" alt="" style="width:50px"></a>
					</div>
					<div class="col ">
						<a href="https://twitter.com/conalpedis_bol" target="_blank"> <img src="<?php echo base_url() ?>public/pagina-web/imagenes/twitter2.png" alt="" style="width:50px"></a>
					</div>
					<div class="col ">
						<a href="https://www.youtube.com/channel/UC8UOZxnFxg51BMxfb24aOdg" target="_blank"> <img src="<?php echo base_url() ?>public/pagina-web/imagenes/youtube2.png" alt="" style="width:50px"></a>
					</div>
				</div>

			</div>
			<div class="col l6  s12">
				<h5 class="white-text">Información</h5>
				<ul>
					<li>
						<p>Teléfono: (591 -2) 2203762</p>
					</li>
					<li>
						<p>Teléfono - Fax: (591 -2) 2126327 </p>
					</li>
					<li>
						<p>Teléfono: (591 -2) 2203762</p>
					</li>
					<li>
						<p>Correo Electrónico: conalpedis@conalpedis.gob.bo</p>
					</li>
					<li>
						<p>Dirección: Calle Loayza entre Camacho y Mercado, Edificio Mariscal de Ayacucho, piso 11, Oficina 1101
							La Paz, Bolivia</p>
					</li>


				</ul>
			</div>
		</div>
	</div>
	<div class="footer-copyright">
		<div class="container ">
			<p class="center-align"> © 2019 Copyright CONALPEDIS. Todos los derechos reservados </p>

		</div>
	</div>
</footer>
<script>
	$(document).ready(function() {
		M.AutoInit();
		let elems = document.querySelectorAll('.dropdown-trigger');
		let elems2 = document.querySelectorAll('.dropdown-trigger1');
		let options = {

			constrain_width: false,
			coverTrigger: false,
			hover: false,
			closeOnClick: true
		};
		let options2 = {
			constrain_width: false,
			coverTrigger: false,
			hover: true,
			closeOnClick: true
		};
		let instances = M.Dropdown.init(elems, options);
		let instances2 = M.Dropdown.init(elems2, options2);
	});
</script>
</body>

</html>