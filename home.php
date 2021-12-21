<?php
// Template Name: Home
 get_header();?>

<div id="home">
	
	<section class="intro">
		<div class='align' style="z-index:2;">
			<div class="container">
				<div class="row">
					<div class="col-md-4">
						<h1>Existem infinitos caminhos para o sucesso. <b>encontrar o seu.</b></h1>
						<a href="https://saibala.com.br/categoria-produto/cursos/" class="btn btn-secondary">Comece aqui</a>
					</div>
					<div class="col-md-8">
						<?php if(!wp_is_mobile()){?>
						<video loop muted autoplay width="100%" height="420">
						  <source src="<?php echo get_template_directory_uri(); ?>/assets/video.mp4" type="video/mp4">
						  Your browser does not support the video tag.
						</video>
						<?php } else {
							?>
							
							<?php
						}?>
					</div>
				</div>
			</div>
		</div>
		<?php if(!wp_is_mobile()){?>
		<img class='w-100' src="<?php echo get_template_directory_uri(); ?>/assets/img/homeBanner.png"/>
		<?php }?>
	</section>

	<section class="features">
		<div class="container">
			<div class="row">
				<div class="col-md-4">
					<div class="box">
						<h2>Aprenda com os melhores</h2>
						<div class="image"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/ico1.png"/>
						</div>
						<p>O conteúdo que você procura, apresentado pelos melhores profissionais, com olhar orientado aos desafios do dia-a-dia. Na Saibalá, você aprende em primeira mão as soluções originais de especialistas com carreiras de sucesso no mercado criativo.</p>
					</div>
				</div>
				<div class="col-md-4">
					<div class="box">
						<h2>Conheça histórias inspiradoras  </h2>
						<div class="image"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/ico2.png"/>
						</div>
						<p>Quando o roteiro é bem contado, a gente não quer perder um capítulo. Desenvolvidas com tratamento narrativo e fotográfico de alto nível, nossas vídeo-aulas são engajadoras como sua série favorita. Assista quando e como você quiser.</p>
					</div>
				</div>
				<div class="col-md-4">
					<div class="box">
						<h2>Construa relações para a vida </h2>
						<div class="image"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/ico3.png"/>
						</div>
						<p>A Saibalá é uma comunidade viva, onde você vai conhecer pessoas com os mesmos interesses que você, trocar referências, compartilhar projetos e criar contatos de trabalho que podem mudar a sua carreira.</p>
					</div>
				</div>
			</div>
		</div>
	</section>

	<section class="video">
		<div class="container">
			<div class="video">
				<div style="padding:56.25% 0 0 0;position:relative;"><iframe
				src="https://player.vimeo.com/video/536870710?badge=0&amp;autopause=0&amp;player_i
				d=0&amp;app_id=58479" frameborder="0" allow="autoplay; fullscreen; picture-in-picture"
				allowfullscreen style="position:absolute;top:0;left:0;width:100%;height:100%;" title="Saibalá
				Manifesto"></iframe></div><script src="https://player.vimeo.com/api/player.js"></script>

			</div>
			<div class="text-center">
				<div class="box">
					<p>Uma nova visão de futuro,</p>
					<h3>UMA NOVA VERSÃO DE VOCÊ</h3>
				</div>
			</div>
		</div>
	</section>

	<section class="cta">
		<div class="container">
			<div class="col-md-10 offset-md-1">
				<div class="box">
					<h3>Aproveite o melhor que a Saibalá tem a oferecer e receba acesso ao <b>pacote completo dos nossos cursos.</b></h3>
					<a href="https://saibala.com.br/categoria-produto/cursos/" class="btn btn-warning">Comece!</a>
				</div>
			</div>
		</div>
	</section>

	<section class="cursos">
		<div class="container">
			<div class="text-center">
				<h3>Categoria de cursos</h3>
			</div>
			<div class="tabs">
				<?php
					$terms = get_terms( array(
					    'taxonomy' => 'product_cat',
					    'hide_empty' => true,
					) );
					foreach ($terms as $term) {
						$name = $term->name;
						$id = $term->term_id;
						$link = get_term_link($id,'product_cat');
						echo "<a href='".$link."'>".$name."</a>";
					}
				?>
			</div>
			<div class="tabs-content">
				<div class="tab active" id="t1">
					<div class="owl-carousel">
						<?php if( have_rows('cursos_em_destaque') ): ?>
						    <?php while( have_rows('cursos_em_destaque') ): the_row(); 
						        $id = get_sub_field('curso')[0];
						        $meta = get_post_meta($id);
						        $course = get_post($course_id);
						        $author_id = $course->post_author;
						        $lessons = count(learndash_get_lesson_list($id));
						        $product = get_posts(array(
								   // more args here        
									'post_type' => 'product',
									'meta_query' => array(
									  // meta query takes an array of arrays, watch out for this!
									  array(
									     'key'     => '_related_course',
									     'value'   => $id,
									     'compare' => 'LIKE'
									  )
									)
								))[0]->ID;

						        ?>
								<div class="item">
									<?php
										if(get_sub_field('embed')){
											the_sub_field('embed');
										} else {
											echo get_post_meta($product,'video',true);
										}
									?>
									<div class="nav">
										<a href="<?php echo get_the_permalink($product);?>"><?php echo get_the_title($id);?></a>
										<span class='nivel'> <i class='fa fa-bars'></i> <?php echo $lessons;?> lições</span>
										<!--<span class='heart'> <i class='fal fa-heart'></i> 248</span>-->
									</div>
								</div>
						    <?php endwhile; ?>
						<?php endif; ?>
					</div>
				</div>
			</div>
		</div>
	</section>

	<section class="professores">
		<div class="container">
			<div class="text-center">
				<h3>Conheça alguns de nossos profissionais</h3>
			</div>
			<?php if(wp_is_mobile()){
				?>
				<div class="owl-carousel">
				<?php
			} else {?>
			<div class="list row">
			<?php } ?>
					<?php 
						$args = array(
						    'post_type'  => 'professores', 
						    'showposts'=> 12,
						    'orderby' => 'rand'
						);
						$projetos = new WP_Query($args);
						while ($projetos->have_posts()) : $projetos->the_post();
							if(wp_is_mobile()){
								?>
								<div class="box">
									<img src="<?php echo get_the_post_thumbnail_url(get_the_id(),'large');?>" />
									<div class="info">
										<h4><?php the_title();?></h4>
										<p><?php the_field('especialidade');?></p>
									</div>
								</div>
								<?php
							} else {
						?>

							<div class="col-md-3">
								<div class="box">
									<img src="<?php echo get_the_post_thumbnail_url(get_the_id(),'large');?>" />
									<div class="info">
										<h4><?php the_title();?></h4>
										<p><?php the_field('especialidade');?></p>
									</div>
								</div>
							</div>

						<?php
							}
						endwhile; 
						$projetos = null; 
						$projetos = $temp; 
						wp_reset_postdata();
						?>
				
			</div>
		</div>
	</section>

	<section class="depoimentos">
		<div class="container-fluid">
			<div class="text-center">
				<h3>Veja o que nossos alunos falam</h3>
				<div class="owl-carousel">
					<div class='item'>
						<div class="row">
							<div class="col-md-4">
								<img src="<?php echo get_template_directory_uri(); ?>/assets/img/user1.jpg"/>
							</div>
							<div class="col-md-8">
								<h4>Pedro Zandonadi</h4>
								<p>"Deliciosas essas aulas, gostaria muito de ter esse cara como meu professor
								na faculdade, muito doido mas um baita profissional com trabalhos fantásticos. Sensacional.
								Mudou minha percepção em relação aos projetos gráficos e a maneira de como lidar em
								situações específicas de trabalho. Excelente!"</p>
							</div>
						</div>
					</div>
					<div class='item'>
						<div class="row">
							<div class="col-md-4">
								<img src="<?php echo get_template_directory_uri(); ?>/assets/img/user2.jpg"/>
							</div>
							<div class="col-md-8">
								<h4>Rafael Teles</h4>
								<p>"O melhor curso da minha vida, sem exagero."</p>
							</div>
						</div>
					</div>
					<div class='item'>
						<div class="row">
							<div class="col-md-4">
								<img src="<?php echo get_template_directory_uri(); ?>/assets/img/user3.jpg"/>
							</div>
							<div class="col-md-8">
								<h4>Alex Xavier</h4>
								<p>: "Pra mim, fazer curso online era coisa de outro mundo, mais ai que me
								surpreendi, pelo fato que aprendo em um ambiente calmo e em silêncio. O que é tudo o que
								um desenhista precisa para estar em concentração máxima.
								Cada aula me fez ver que se eu insistir no meu talento não haverá barreira para trabalhar
								com o que eu mais amo, que é desenhar.
								Agradeço a cada um que faz parte dessa equipe, agradeço ao Professor Leandro Spett.
								Obrigado Saibalá!!! "</p>
							</div>
						</div>
					</div>
					<div class='item'>
						<div class="row">
							<div class="col-md-4">
								<img src="<?php echo get_template_directory_uri(); ?>/assets/img/user4.jpg"/>
							</div>
							<div class="col-md-8">
								<h4>Luciana Oliveira</h4>
								<p>"Achei ótimo! não tinha ideia de como era feita a criação de uma coleção de
								moda e todo o processo que a envolve até a passarela. Ronaldo é um artista. Está de
								parabéns pelo trabalho.
								Gostei muito. Tinha várias ideias enquanto assistia às aulas e tive vontade de montar minha
								própria coleção. As dicas foram ótimas e tudo muito profissional.</p>
							</div>
						</div>
					</div>
					<div class='item'>
						<div class="row">
							<div class="col-md-4">
								<img src="<?php echo get_template_directory_uri(); ?>/assets/img/user5.jpg"/>
							</div>
							<div class="col-md-8">
								<h4>Renato Vono</h4>
								<p>: "Gustavo Piqueira sabe descrever com maestria os processos no Design.
								Consegue desconstruir mitos de processo profissionais em apenas algumas palavras.
								Viceral, intuitivo, prático e simples. Parabéns parceiro, mestre e professor, AFUDÊ!"</p>
							</div>
						</div>
					</div>
					<div class='item'>
						<div class="row">
							<div class="col-md-4">
								<img src="<?php echo get_template_directory_uri(); ?>/assets/img/user6.jpg"/>
							</div>
							<div class="col-md-8">
								<h4>Santos Cuba</h4>
								<p>"Incrível, altamente instrutivo, ótimo, maravilhoso!
								Gostaria de dar os parabéns a todos que fizeram parte da criação e desenvolvimento deste
								curso. O curso me ajudou muito e de certa forma me deu uma direção (norte). Estou muito
								contente de ter feito parte do curso, Obrigado Gian Franco Rocchiccioli e parabéns você é
								um mestre e tanto!”</p>
							</div>
						</div>
					</div>
					<div class='item'>
						<div class="row">
							<div class="col-md-4">
								<img src="<?php echo get_template_directory_uri(); ?>/assets/img/user7.jpg"/>
							</div>
							<div class="col-md-8">
								<h4>Maya Cristina</h4>
								<p>"Um dos melhores cursos que já vi na minha vida! Abra sua mente, mude suas
								idéias, faça diferente, esse curso é isso, tira você da linha, mude seus paradigmas, ajuda na
								sua criatividade, André é muito bom e divertido. Parabéns Saibalá</p>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
<!--
	<section class="depoimentos d-none">
		<div class="container-fluid">
			<div class="text-center">
				<h3>Veja o que os professores  falam</h3>
				<div class="owl-carousel">
					<div class='item'>
						<div class="row">
							<div class="col-md-4">
								<img src="<?php echo get_template_directory_uri(); ?>/assets/img/user.png"/>
							</div>
							<div class="col-md-8">
								<h4>Fulaninho de Tal</h4>
								<p>“Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit.</p>
							</div>
						</div>
					</div>
					<div class='item'>
						<div class="row">
							<div class="col-md-4">
								<img src="<?php echo get_template_directory_uri(); ?>/assets/img/user.png"/>
							</div>
							<div class="col-md-8">
								<h4>Fulaninho de Tal</h4>
								<p>“Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit.</p>
							</div>
						</div>
					</div>
					<div class='item'>
						<div class="row">
							<div class="col-md-4">
								<img src="<?php echo get_template_directory_uri(); ?>/assets/img/user.png"/>
							</div>
							<div class="col-md-8">
								<h4>Fulaninho de Tal</h4>
								<p>“Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit.</p>
							</div>
						</div>
					</div>
					<div class='item'>
						<div class="row">
							<div class="col-md-4">
								<img src="<?php echo get_template_directory_uri(); ?>/assets/img/user.png"/>
							</div>
							<div class="col-md-8">
								<h4>Fulaninho de Tal</h4>
								<p>“Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit.</p>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

	<section class="timeline">
		<div class="container">
			<h3>Conheça a nossa história</h3>
			<div class="row">
				<div class="col-md-4">
					<div class="box box-1">
						<h4>Janeiro 2015</h4>
						<p>Lançamento da primeira versão da plataforma Saibalá com foco em áreas criativas</p>
					</div>
				</div>
				<div class="col-md-4">
					<div class="box box-2">
						<h4>Mes x 2016</h4>
						<p>Atingimos 50.ooo alunos, com taxa de conclusão de cursos 90% (média da indústria 33%)</p>
					</div>
				</div>
				<div class="col-md-4">
					<div class="box box-3">
						<h4>Maio 2016</h4>
						<p>Inicio de parcerias com grandes empresas para desenvolvimento de seus treinamentos corporativos. </p>
						<img src="<?php echo get_template_directory_uri(); ?>/assets/img/timelinelogos.png"/>
					</div>
				</div>
				<div class="col-md-4">
					<div class="box box-4">
						<h4>Junho 2019</h4>
						<p>Realizamos um projeto junto ao Tesouro Nacional e Ministerio da fazenda para público alvo de 100 milhões de brasileiros</p>
					</div>
				</div>
				<div class="col-md-4">
					<div class="box box-5">
						<h4>Maio 2017</h4>
						<p>Fomos convidados para construir iniciativas educacionais para algumas das mais importantes instituições de ensino do país </p>
						<ul>
							<li><a href="#"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/logo1.png"/></a></li>
							<li><a href="#"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/logo2.png"/></a></li>
							<li><a href="#" class='arrow'><i class='fa fa-angle-right'></i></a></li>
						</ul>
					</div>
				</div>
				<div class="col-md-4">
				</div>
				<div class="col-md-4">
					<div class="box box-6">
						<h4>Fevereiro 2020</h4>
						<p>Rebranding da Saibalá e novo posicionamento</p>
						<a href="#" class='arrow'><i class='fa fa-angle-right'></i></a>
					</div>
				</div>
				<div class="col-md-4 offset-md-4">
					<div class="box box-7">
						<h4>JULHO 2020</h4>
						<p>Inicio do projeto Transformation Experts</p>
					</div>
				</div>
			</div>
		</div>
	</section>

	<section class="futuro">
		<div class="container">
			<h3>Hoje</h3>
			<div class="row">
				<div class="col-md-4">
					<div class='box-numbers'>
						<b class='mt-3'>Número de alunos:</b>
						<span>>150k</span>
					</div>
				</div>
				<div class="col-md-4">
					<div class='box-numbers'>
						<b>Projetos de alunos compartilhados:</b>
						<span>>1.100</span>
					</div>
				</div>
				<div class="col-md-4">
					<div class='box-numbers'>
						<b>Taxa média de conclusão de cursos:</b>
						<span>>89%</span>
					</div>
				</div>
			</div>
			<h3>Futuro</h3>
			<div class="row">
				<div class='col-md-6'>
					<p>Com a velocidade de mudanças de mundo e do mercado não prometeremos um projeto específico, mas prometemos alguns valores. A Saibalá com suas iniciativas lutará pelo:</p>
				</div>
			</div>
			<div class='row'>
				<div class='col-md-4'>
					<div class='box-feature'>
						<img src="<?php echo get_template_directory_uri(); ?>/assets/img/icoFuture1.png"/>
						<h4>Life long learning</h4>
						<p>Aprender, desaprender e aprender de novo.</p>
					</div>
				</div>
				<div class='col-md-4'>
					<div class='box-feature'>
						<img src="<?php echo get_template_directory_uri(); ?>/assets/img/icoFuture2.png"/>
						<h4>Conexões profissionais</h4>
						<p>Aproximar alunos, profissionais, referências e o mercado - juntos somos sempre mais fortes.</p>
					</div>
				</div>
				<div class='col-md-4'>
					<div class='box-feature'>
						<img src="<?php echo get_template_directory_uri(); ?>/assets/img/icoFuture3.png"/>
						<h4>Autonomia no desenvolvimento</h4>
						<p>Todos tomarão as rédeas de sua formação. Não haverão duas trajetórias iguais.</p>
					</div>
				</div>
			</div>
		</div>
	</section>

	<section class="projetos">
		<div class="container">
			<h3>Projetos ambiciosos</h3>
			<div class="projetoVideo">
				<div class="title">
					<h4>PAT <span>O Game Changer do empreendedor</span></h4>
				</div>
				<iframe width="100%" height="500" src="https://www.youtube.com/embed/SnbjRxhG4aQ" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
			</div>
			<div class="projetoVideo">
				<div class="title">
					<h4>Realidade virtual para educação básica:</h4>
				</div>
				<iframe width="100%" height="500" src="https://www.youtube.com/embed/SnbjRxhG4aQ" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
			</div>
		</div>
	</section>
-->
	<section class="form">
		<div class="container">
			<h3>Fale conosco:</h3>
			<form class="submitForm">
				<div class="alert alert-success d-none">Mensagem enviada com sucesso</div>
				<div class="row">
					<div class="col-md-2 p-0"><label>E-mail</label></div>
					<div class="col-md-4 p-0"><input type="email" required name='email'/></div>
					<div class="col-md-2 p-0"><label>Assunto</label></div>
					<div class="col-md-4 p-0"><input type="text" name='assunto' required/></div>
					<div class="col-md-12 p-0">
						<textarea name='msg' required rows="10"/></textarea>
					</div>
					<div class="text-right col-12 p-0">
						<button class='btn btn-warning'>Enviar</button>
					</div>
				</div>
			</form>
		</div>
	</section>

</div>

<?php get_footer();?>