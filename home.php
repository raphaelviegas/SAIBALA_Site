<?php
// Template Name: Home
 get_header();?>

<div id="home">
	
	<section class="principal position-relative bg-yellow">
		<div class="wrap-img">
			<img class="m-auto desk" src="<?php echo get_template_directory_uri(); ?>/assets/img/new-home/bg-01.png" alt="">
			<img class="m-auto mobile" src="<?php echo get_template_directory_uri(); ?>/assets/img/new-home/bg-01-mobile.png" alt="">
		</div>
		<div class="text">
			<div class="container">
				<div class="text-principal">
					<h1 class="wow fadeInLeft">
						<?php echo get_field('titulo-principal'); ?>
					</h1>
					<img class="m-auto desk" src="<?php echo get_template_directory_uri(); ?>/assets/img/new-home/seta-01.svg" alt="">
					<img class="m-auto mobile" src="<?php echo get_template_directory_uri(); ?>/assets/img/new-home/seta-01-mobile.svg" alt="">
				</div>
				<div class="text-adicional">
					<div class="wow fadeIn" data-wow-delay="0.5s">
						<?php echo get_field('texto-principal'); ?>
					</div>
				</div>
			</div>
		</div>
	</section>

	<section class="planejamento position-relative bg-green">
		<div class="wrap-img">
			<img class="m-auto desk" src="<?php echo get_template_directory_uri(); ?>/assets/img/new-home/bg-02.png" alt="">
			<img class="m-auto mobile" src="<?php echo get_template_directory_uri(); ?>/assets/img/new-home/bg-02-mobile.png" alt="">
		</div>
		<div class="text">
			<div class="container">
				<div class="top">
					<div class="legendas">
						<p class="text-01">
							<span class="wow fadeInLeft" data-wow-offset="100">
								<?php echo get_field('titulo-rolagem-02'); ?>
							</span>
						</p>
						<p class="text-02">
							<span class="wow fadeInRight" data-wow-delay=".5s" data-wow-offset="100">
								<?php echo get_field('segundo-titulo-rolagem-02'); ?>
							</span>
						</p>
					</div>
					<div class="imagem">
						<img class="w-100 desk" src="<?php echo get_field('imagem-rolagem-02-desktop'); ?>" alt="">
						<img class="w-100 mobile" src="<?php echo get_field('imagem-rolagem-02-mobile'); ?>" alt="">
					</div>
				</div>
				<div class="bottom">
					<img src="<?php echo get_template_directory_uri(); ?>/assets/img/new-home/seta-02-mobile.svg" class="mobile wow fadeInRightBig"  data-wow-delay="0.5s">
					<p class="wow fadeIn">
						<?php echo get_field('terceiro-titulo-rolagem-02'); ?>
					</p>
					<img src="<?php echo get_template_directory_uri(); ?>/assets/img/new-home/Seta_02.svg" class="seta-02 desk wow fadeInRightBig"  data-wow-delay="0.5s">
				</div>
			</div>
		</div>
	</section>

	<section class="plano position-relative bg-purple">
		<div class="wrap-img">
			<img class="m-auto desk" src="<?php echo get_template_directory_uri(); ?>/assets/img/new-home/bg-03.png" alt="">
			<img class="m-auto mobile" src="<?php echo get_template_directory_uri(); ?>/assets/img/new-home/bg-03-mobile.png" alt="">
		</div>
		<div class="text">
			<div class="container">
				<h2 class="wow fadeIn">
					<?php echo get_field('primeiro-titulo-rolagem-03'); ?>
				</h2>
				<img class="desk wow fadeIn" data-wow-delay=".5s" src="<?php echo get_template_directory_uri(); ?>/assets/img/new-home/seta-03.png" alt="">
				<img class="mobile wow fadeIn" data-wow-delay=".5s" src="<?php echo get_template_directory_uri(); ?>/assets/img/new-home/seta-03-mobile.png" alt="">
				<p class="wow fadeIn" data-wow-delay="1s" >
					<em>
						<?php echo get_field('segundo-titulo-rolagem-03'); ?>
					</em>
				</p>
			</div>
		</div>
	</section>

	<section class="ensinando bg-white">
		<div class="container-980">
			<p>
				<?php echo get_field('primeiro-titulo-rolagem-04'); ?>
			</p>
			<ul>
				<?php if( have_rows('destaques-rolagem-04') ): ?>
					<?php while( have_rows('destaques-rolagem-04') ): the_row(); ?>
						<li class="wow fadeIn">
							<?php echo get_sub_field('svg');?>
							<h2 class="font-<?php if( get_row_index() === 1 ):?>green<?php elseif( get_row_index() === 2 ):?>blue<?php elseif( get_row_index() === 3 ):?>purple<?php elseif( get_row_index() === 4 ):?>green<?php elseif( get_row_index() === 5 ):?>blue<?php elseif( get_row_index() === 6 ):?>purple<?php endif; ?>">
								<?php echo get_sub_field('texto');?>	
							</h2>
						</li>
					<?php endwhile; ?>
				<?php endif; ?>
			</ul>
		</div>
	</section>

	<section class="series bg-white">
		<div class="container-980">
			<div class="destaque wow fadeInRightBig">
				<?php echo get_field('segundo-titulo-rolagem-04'); ?>
			</div>
			<div class="streaming wow fadeIn" data-wow-offset="250">
				<?php echo get_field('texto-rolagem-04'); ?>
			</div>
			<img class="desk" src="<?php echo get_template_directory_uri(); ?>/assets/img/new-home/Seta_03.svg" alt="">
			<img class="mobile" src="<?php echo get_template_directory_uri(); ?>/assets/img/new-home/seta-04-mobile.svg" alt="">
		</div>
	</section>

	<section class="mural bg-white">
		<div class="container">
			<div class="row">
				<?php if( have_rows('mural') ): ?>
					<?php while( have_rows('mural') ): the_row(); ?>
						<?php if( get_row_index() === 1 ):?>
							<div class="col-6 col-md-6 left">
								<?php echo get_field('titulo-mural'); ?>
								<div class="thumb yellow">
									<a href="<?php echo get_sub_field('mural-link'); ?>">
										<img class="desk um" src="<?php echo get_sub_field('mural-imagem-desk'); ?>" alt="">
										<img class="mobile um" src="<?php echo get_sub_field('mural-imagem-mobile'); ?>" alt="">
									</a>
									<div class="box yellow wow fadeIn">
										<a href="<?php echo get_sub_field('mural-link'); ?>" class="bg-yellow">
											<?php echo get_sub_field('mural-texto'); ?>
											<hr>
											<span class="ver-mais">
												ver mais
												<svg xmlns="http://www.w3.org/2000/svg" width="134.224" height="20.458" viewBox="0 0 134.224 20.458">
													<g id="Grupo_1511" data-name="Grupo 1511" transform="translate(0 10.229)">
														<path id="Caminho_685" data-name="Caminho 685" d="M203.952.354,214,10.406h0L203.952,20.458" transform="translate(-80.154 -10.406)" fill="none" stroke="#000" stroke-miterlimit="10" stroke-width="0.5"/>
														<path id="Caminho_536" data-name="Caminho 536" d="M-38.247,0H95.229" transform="translate(38.247)" fill="none" stroke="#000" stroke-width="0.5"/>
													</g>
												</svg>
											</span>
										</a>
									</div>
								</div>
							</div>
						<?php endif; ?>
						<?php if( get_row_index() === 2):?>
							<div class="col-6 col-md-6 right">
								<div class="thumb blue">
									<a href="<?php echo get_sub_field('mural-link'); ?>">
										<img class="desk dois" src="<?php echo get_sub_field('mural-imagem-desk'); ?>" alt="">
										<img class="mobile dois" src="<?php echo get_sub_field('mural-imagem-mobile'); ?>" alt="">
									</a>
									<div class="box blue wow fadeIn" data-wow-delay=".5s">
										<a href="<?php echo get_sub_field('mural-link'); ?>" class="bg-blue">
											<?php echo get_sub_field('mural-texto'); ?>
											<hr>
											<span class="ver-mais">
												ver mais
												<svg xmlns="http://www.w3.org/2000/svg" width="134.224" height="20.458" viewBox="0 0 134.224 20.458">
													<g id="Grupo_1516" data-name="Grupo 1516" transform="translate(0 10.229)">
														<path id="Caminho_686" data-name="Caminho 686" d="M203.952.354,214,10.406h0L203.952,20.458" transform="translate(-80.154 -10.406)" fill="none" stroke="#fff" stroke-miterlimit="10" stroke-width="0.5"/>
														<path id="Caminho_536" data-name="Caminho 536" d="M-38.247,0H95.229" transform="translate(38.247)" fill="none" stroke="#fff" stroke-width="0.5"/>
													</g>
												</svg>
											</span>
										</a>
									</div>
								</div>							
						<?php endif; ?>
						<?php if( get_row_index() === 3):?>
							<div class="thumb purple">
								<a href="<?php echo get_sub_field('mural-link'); ?>">
									<img class="desk tres" src="<?php echo get_sub_field('mural-imagem-desk'); ?>" alt="">
									<img class="mobile tres" src="<?php echo get_sub_field('mural-imagem-mobile'); ?>" alt="">
								</a>
									<div class="box purple wow fadeIn">
										<a href="<?php echo get_sub_field('mural-link'); ?>" class="bg-purple">
											<?php echo get_sub_field('mural-texto'); ?>
											<hr>
											<span class="ver-mais">
												ver mais
												<svg xmlns="http://www.w3.org/2000/svg" width="134.224" height="20.458" viewBox="0 0 134.224 20.458">
													<g id="Grupo_1516" data-name="Grupo 1516" transform="translate(0 10.229)">
														<path id="Caminho_686" data-name="Caminho 686" d="M203.952.354,214,10.406h0L203.952,20.458" transform="translate(-80.154 -10.406)" fill="none" stroke="#fff" stroke-miterlimit="10" stroke-width="0.5"/>
														<path id="Caminho_536" data-name="Caminho 536" d="M-38.247,0H95.229" transform="translate(38.247)" fill="none" stroke="#fff" stroke-width="0.5"/>
													</g>
												</svg>
											</span>
										</a>
									</div>
								</div>
							</div>										
						<?php endif; ?>
						<?php if( get_row_index() === 4):?>
							<div class="col-12 col-md-12">
								<div class="thumb green">
								<a href="<?php echo get_sub_field('mural-link'); ?>">
									<img class="desk quatro" src="<?php echo get_sub_field('mural-imagem-desk'); ?>" alt="">
									<img class="mobile quatro" src="<?php echo get_sub_field('mural-imagem-mobile'); ?>" alt="">
								</a>
									<div class="box green wow fadeIn">
										<a href="<?php echo get_sub_field('mural-link'); ?>" class="bg-green">
											<?php echo get_sub_field('mural-texto'); ?>
											<hr>
											<span class="ver-mais">
												ver mais
												<svg xmlns="http://www.w3.org/2000/svg" width="134.224" height="20.458" viewBox="0 0 134.224 20.458">
													<g id="Grupo_1516" data-name="Grupo 1516" transform="translate(0 10.229)">
														<path id="Caminho_686" data-name="Caminho 686" d="M203.952.354,214,10.406h0L203.952,20.458" transform="translate(-80.154 -10.406)" fill="none" stroke="#fff" stroke-miterlimit="10" stroke-width="0.5"/>
														<path id="Caminho_536" data-name="Caminho 536" d="M-38.247,0H95.229" transform="translate(38.247)" fill="none" stroke="#fff" stroke-width="0.5"/>
													</g>
												</svg>
											</span>
										</a>
									</div>
								</div>
							</div>
						<?php endif; ?>
					<?php endwhile; ?>
				<?php endif; ?>
			</div>
		</div>
	</section>

	<section class="aprendizado bg-blue">
		<div class="container">
			<div class="row">
				<div class="col-8 col-md-8">
					<img class="desk wow fadeIn um" src="<?php echo get_field('primeira-imagem-rolagem-06-desktop'); ?>" alt="">
					<img class="mobile wow fadeIn um" src="<?php echo get_field('primeira-imagem-rolagem-06-mobile'); ?>" alt="">
					<h2 class="desk">
						<?php echo get_field('texto-rolagem-06-01'); ?>
					</h2>
				</div>
				<div class="col-4 col-md-4">
					<img class="desk wow fadeIn dois" data-wow-delay=".5s" src="<?php echo get_field('segunda-imagem-rolagem-06-desktop'); ?>" alt="">
					<img class="mobile wow fadeIn dois" data-wow-delay=".5s" src="<?php echo get_field('segunda-imagem-rolagem-06-mobile'); ?>" alt="">
				</div>
				<div class="col-12">
					<h2 class="mobile">
						<?php echo get_field('texto-rolagem-06-01'); ?>
					</h2>
				</div>
				<div class="col-3 col-md-6">
					<img class="desk wow fadeIn tres" data-wow-delay=".5s" src="<?php echo get_field('terceira-imagem-rolagem-06-desktop'); ?>" alt="">
					<img class="mobile wow fadeIn tres" data-wow-delay=".5s" src="<?php echo get_field('terceira-imagem-rolagem-06-mobile'); ?>" alt="">
				</div>
				<div class="col-9 col-md-6">
					<div class="texto">
						<?php echo get_field('texto-rolagem-06-02'); ?>
					</div>
					<img class="desk wow fadeIn quatro" data-wow-delay=".5s" src="<?php echo get_field('quarta-imagem-rolagem-06-desktop'); ?>" alt="">
					<img class="mobile wow fadeIn quatro" data-wow-delay=".5s" src="<?php echo get_field('quarta-imagem-rolagem-06-mobile'); ?>" alt="">
				</div>
			</div>
		</div>
	</section>

	<section class="teste bg-white">
		<div class="container-980">
			<div class="destaque">
				<h2 class="wow flipInX">
					<?php echo get_field('texto-rolagem-07-01'); ?>
				</h2>
				<hr>
				<p class="wow fadeIn" data-wow-offset="100">
					<?php echo get_field('texto-rolagem-07-02'); ?>
				</p>
				<a href="<?php echo get_field('link-rolagem-07'); ?>" class="btn wow fadeIn" data-wow-offset="100">
					<?php echo get_field('texto-rolagem-07-03'); ?>
				</a>
			</div>
		</div>
	</section>

	<section class="quem-ja-e bg-white">
		<div class="container-980">
			<?php echo get_field('titulo-rolagem-08'); ?>
			<div class="container-fluid">
				<div class="row">
					<?php if( have_rows('depoimentos') ): ?>
						<?php while( have_rows('depoimentos') ): the_row(); ?>
							<?php if( get_row_index() === 1 ):?>
								<div class="col-12 col-md-6 left">
									<div class="depoimento bg-blue wow fadeInLeft" data-wow-offset="100">
										<div>
											<p>
												<?php echo get_sub_field('texto');?>
											</p>
											<div class="thumb">
												<a href="#" class="next">
													<img class="d-none" data-wow-delay=".5s" src="<?php echo get_template_directory_uri(); ?>/assets/img/new-home/next-depoimentos.svg" alt="">
												</a>
												<div class="texto">
													<p class="nome">
														<strong>
															<?php echo get_sub_field('nome');?>
														</strong>
													</p>
													<p class="profissao">
														<?php echo get_sub_field('profissao');?>
													</p>
													<p class="instagram">
														<?php echo get_sub_field('instagram');?>
													</p>
												</div>
												<div class="imagem">
													<img class="d-block" data-wow-delay=".5s" src="<?php echo get_sub_field('imagem');?>" alt="">
												</div>
											</div>
										</div>
									</div>
								</div>
							<?php endif; ?>
							<?php if( get_row_index() === 2 ):?>
								<div class="col-12 col-md-6 right">
									<div class="depoimento bg-purple wow fadeInRight" data-wow-offset="100">
										<div>
											<p>
												<?php echo get_sub_field('texto');?>
											</p>
											<div class="thumb">
												<a href="#" class="next">
													<img class="d-none" data-wow-delay=".5s" src="<?php echo get_template_directory_uri(); ?>/assets/img/new-home/next-depoimentos.svg" alt="">
												</a>
												<div class="imagem">
													<img class="d-block" data-wow-delay=".5s" src="<?php echo get_sub_field('imagem');?>" alt="">
												</div>
												<div class="texto">
													<p class="nome">
														<strong>
															<?php echo get_sub_field('nome');?>
														</strong>
													</p>
													<p class="profissao">
														<?php echo get_sub_field('profissao');?>
													</p>
													<p class="instagram">
														<?php echo get_sub_field('instagram');?>
													</p>
												</div>
											</div>
										</div>
									</div>
							<?php endif; ?>
							<?php if( get_row_index() === 3 ):?>
									<div class="depoimento bg-green wow fadeInRight desk" data-wow-offset="100">
										<div>
											<p>
												<?php echo get_sub_field('texto');?>
											</p>
											<div class="thumb">
												<a href="#" class="next">
													<img class="d-none" data-wow-delay=".5s" src="<?php echo get_template_directory_uri(); ?>/assets/img/new-home/next-depoimentos.svg" alt="">
												</a>
												<div class="imagem">
													<img class="d-block" data-wow-delay=".5s" src="<?php echo get_sub_field('imagem');?>" alt="">
												</div>
												<div class="texto">
													<p class="nome">
														<strong>
															<?php echo get_sub_field('nome');?>
														</strong>
													</p>
													<p class="profissao">
														<?php echo get_sub_field('profissao');?>
													</p>
													<p class="instagram">
														<?php echo get_sub_field('instagram');?>
													</p>
												</div>
											</div>
										</div>
									</div>
								</div>
								<div class="col-12 right">	
									<div class="depoimento bg-green wow fadeInRight mobile" data-wow-offset="100">
										<div>
											<p>
												<?php echo get_sub_field('texto');?>
											</p>
											<div class="thumb">
												<a href="#" class="next">
													<img class="d-none" data-wow-delay=".5s" src="<?php echo get_template_directory_uri(); ?>/assets/img/new-home/next-depoimentos.svg" alt="">
												</a>
												<div class="imagem">
													<img class="d-block" data-wow-delay=".5s" src="<?php echo get_sub_field('imagem');?>" alt="">
												</div>
												<div class="texto">
													<p class="nome">
														<strong>
															<?php echo get_sub_field('nome');?>
														</strong>
													</p>
													<p class="profissao">
														<?php echo get_sub_field('profissao');?>
													</p>
													<p class="instagram">
														<?php echo get_sub_field('instagram');?>
													</p>
												</div>
											</div>
										</div>
									</div>
								</div>
							<?php endif; ?>
						<?php endwhile; ?>
					<?php endif; ?>
				</div>
			</div>
		</div>
	</section>

	<section class="series-programacoes bg-white">
		<div class="container-980">
			<img class="desk" data-wow-delay=".5s" src="<?php echo get_field('imagem-rolagem-09-desktop'); ?>" alt="">
			<img class="mobile" data-wow-delay=".5s" src="<?php echo get_field('imagem-rolagem-09-mobile'); ?>" alt="">

			<div class="destaque wow flipInY">
				<h5>
					<?php echo get_field('titulo-rolagem-09'); ?>
				</h5>
				<a href="<?php echo get_field('link-rolagem-09'); ?>" class="btn">
					<?php echo get_field('texto-botao-rolagem-09'); ?>
				</a>
			</div>
		</div>
	</section>

</div>

<?php get_footer();?>