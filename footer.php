<footer class="footer">
	<div class="footer-container">
		<img src="<?php echo get_template_directory_uri(); ?>/assets/img/icones/logo-footer.svg" class="footer-logo"/>

		<div class="footer-wrapper">

			<div class="footer-contact">
				<div class="footer-contact--container foter-contact--container-whatsapp">
				<strong>Whatsapp</strong>
				<a href="https://api.whatsapp.com/send?phone=5511933938974">+55 (11) 93393-8974</a>
				</div>

				<div class="footer-contact--container">
				<strong>E-mail:</strong>
				<a href="mailto:contato@saibala.com.br">contato@saibala.com.br</a>
				</div>

				<div class="footer-contact--medias">
					<a target="_blank" href="https://www.instagram.com/saibala_edu/"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/icones/instagram-logo.svg"/></a>

					<a target="_blank" href="https://www.facebook.com/escolasaibala"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/icones/facebook-logo.svg"/></a>

					<a target="_blank" href="https://www.linkedin.com/company/saibalaedu/"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/icones/linkedin-logo.svg"/></a>
				</div>
			</div>

			<div class="footer-content">
				<div class="footer-content--container">
					<strong>Séries e Programas:</strong>
					<ul>
						<li>
							<a href="<?php bloginfo ('url'); ?>/categoria-produto/jornadas/">
								Nossas Series
							</a>
						</li>
					</ul>

				</div>

				<div class="footer-content--container">
					<strong>Sobre:</strong>
					
					<ul>
						<li>
							<a href="#">
								Sobre nós
							</a>
						</li>
					</ul>

				</div>
			</div>
    </div>
	</div>
</footer>

		<!-- -->
		<!-- ================== BEGIN BASE JS ================== -->
		<script src="<?php echo get_template_directory_uri(); ?>/assets/plugins/jquery/jquery-3.4.0.min.js"></script>
		<script src="<?php echo get_template_directory_uri(); ?>/assets/plugins/bootstrap/js/bootstrap.min.js"></script>
		<script src="<?php echo get_template_directory_uri(); ?>/assets/plugins/wow/wow.js"></script>
		<script src="<?php echo get_template_directory_uri(); ?>/assets/plugins/owlcarousel/owl.carousel.min.js"></script>
		<script src="<?php echo get_template_directory_uri(); ?>/assets/plugins/fslightbox/fslightbox.js"></script>
        <script src="https://unpkg.com/masonry-layout@4/dist/masonry.pkgd.min.js"></script>
		<!--[if lt IE 9]>
		<script src="<?php echo get_template_directory_uri(); ?>/assets/crossbrowserjs/html5shiv.js"></script>
		<script src="<?php echo get_template_directory_uri(); ?>/assets/crossbrowserjs/respond.min.js"></script>
		<script src="<?php echo get_template_directory_uri(); ?>/assets/crossbrowserjs/excanvas.min.js"></script>
		<![endif]-->
		<!-- ================== END BASE JS ================== -->
		<!-- ================== BEGIN PAGE LEVEL JS ================== -->
		<script src="<?php echo get_template_directory_uri(); ?>/assets/dist/js/main.js?v=4.7"></script>
		<script type="text/javascript" async src="https://d335luupugsy2.cloudfront.net/js/loader-scripts/b57bc3a6-ff34-4e09-aed6-21c1227559c0-loader.js" ></script>
		<!-- GRUNT LIVERELOAD -->
		<script src="//localhost:35729/livereload.js"></script>
		<?php wp_footer();?>
	</body>
</html>