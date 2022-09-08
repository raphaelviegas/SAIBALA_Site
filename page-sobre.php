<?php

// Template Name: Novo-Sobre

// Hero Image

$hero_image = get_field('hero_image');

// Background Welcome Image

$background_image_01 = get_field('welcome_background_01');
$background_image_02 = get_field('welcome_background_02');

// Methodology Image

$methodology_header_image = get_field('metodologia_header_image');
$methodology_content_03_image = get_field('metodologia_conteudo_03_imagem');

get_header('shop');

?>

<div id="novo-sobre">

  <div class="novo-sobre__hero">
    <div class="novo-sobre__hero-wrapper">

      <div class="novo-sobre__hero-content">
        <div>
          <h1>
            <mark>
              <?php the_field("titulo_principal"); ?>
            </mark>
          </h1>
        </div>

        <div>
          <p>
          <?php the_field("subtitulo_principal"); ?>
          </p>
        </div>
      </div>

      <div class="novo-sobre__hero-img" style="background-image:url('<?php echo $hero_image;?>')">
        
      </div>
      
      
    </div>
  </div>
  <div class="novo-sobre__hero-footer">
    <div
    class="novo-sobre__hero-footer--wrapper">
      <h2><?php the_field("hero_section_footer_titulo"); ?> 
			<span><?php the_field("hero_section_footer_titulo_details"); ?></span>
		</h2>
      <p>
        <?php the_field("hero_section_footer_texto_01"); 	?>
				
      </p>
    <div>
        <?php the_field("hero_section_footer_texto_02"); 	?>
    </div>
 
  
    </div>
  </div>

  <main>
    <section class="novo-sobre__welcome">
      <div class="novo-sobre__welcome-title">
      <h2 >
        <?php the_field("welcome_section_titulo_principal"); ?>
				<span><?php the_field("welcome_section_titulo_principal_details"); ?></span>
      </h2>
      </div>
      
      <div class="novo-sobre__welcome-wrapper">
        <div>
          <img src="<?php echo get_template_directory_uri(); ?>/assets/img/arrow-right-blue.svg" class="novo-sobre__welcome-wrapper--arrow-desk"/>
          <img src="<?php echo get_template_directory_uri(); ?>/assets/img/icones/novo-sobre-arrow-blue.svg" class="novo-sobre__welcome-wrapper--arrow-mob"/>
					<p>
            <?php the_field("welcome_section_header_texto_01"); ?>
						<a href="<?php the_field('welcome_section_header_texto_01_link'); ?>"><?php the_field('welcome_section_header_texto_01_link_text'); ?></a>
          </p>
        </div>

        <div>
        <img src="<?php echo get_template_directory_uri(); ?>/assets/img/arrow-right-blue.svg" class="novo-sobre__welcome-wrapper--arrow-desk"/>
          <img src="<?php echo get_template_directory_uri(); ?>/assets/img/icones/novo-sobre-arrow-blue.svg" class="novo-sobre__welcome-wrapper--arrow-mob"/>
          <p>
            <?php the_field("welcome_section_header_texto_02"); ?>
						<a href="<?php the_field('welcome_section_header_texto_02_link'); ?>"><?php the_field('welcome_section_header_texto_02_link_text'); ?></a>
          </p>
        </div>

        <div>
        <img src="<?php echo get_template_directory_uri(); ?>/assets/img/arrow-right-blue.svg" class="novo-sobre__welcome-wrapper--arrow-desk"/>
          <img src="<?php echo get_template_directory_uri(); ?>/assets/img/icones/novo-sobre-arrow-blue.svg" class="novo-sobre__welcome-wrapper--arrow-mob"/>
					<p>
            <?php the_field("welcome_section_header_texto_03"); ?>
						<a href="<?php the_field('welcome_section_header_texto_03_link'); ?>"><?php the_field('welcome_section_header_texto_03_link_text'); ?></a>
          </p>
        </div>
      </div>

      <div class="novo-sobre__welcome-bg novo-sobre__welcome-bg--first" >
        <div class="novo-sobre__welcome-bg--01"
        style=" background-image:linear-gradient(0deg, rgba(255, 255, 0, 0.3), rgba(255, 255, 0, 0.3)),url('<?php echo $background_image_01;?>');">

        </div>
        <div class="novo-sobre__welcome-bg--content novo-sobre__welcome-bg--content--01">
          <h3>
            <?php the_field("welcome_background_01_text_first"); ?> <span> <?php the_field("welcome_background_01_text_first_details"); ?></span>

						<?php the_field("welcome_background_01_text_last"); ?> <span> <?php the_field("welcome_background_01_text_last_details"); ?> </span>
						
          </h3>
        </div>
        
      </div>

      <div class="novo-sobre__welcome-content">
       
          <?php the_field("welcome_content_text_01"); ?>
      
      </div>

      <div class="novo-sobre__welcome-bg novo-sobre__welcome-bg--last ">

        <div  class="novo-sobre__welcome-bg--02"
        style=" background-image: linear-gradient(0deg, rgba(49, 150, 255, 0.5), rgba(49, 150, 255, 0.5)),  url('<?php echo $background_image_02;?>');">
        </div>

        <div class="novo-sobre__welcome-bg--content novo-sobre__welcome-bg--content--02">
          <h3>
            <?php the_field("welcome_background_02_text"); ?>
						<q> <?php the_field("welcome_background_02_text_mid"); ?></q>
						<?php the_field("welcome_background_02_text_end"); ?>

          </h3>
        </div>
       
      </div>

      <div class="novo-sobre__welcome-content">
        <p>
          <?php the_field("welcome_content_text_03"); ?> <a href="<?php the_field("welcome_section_header_texto_03_link"); ?>"><?php the_field("welcome_section_header_texto_03_link_text"); ?></a>
        </p>
      </div>
    </section>

    <section class="novo-sobre__methodology">
      <div class="novo-sobre__methodology-header">
        <h2>
          <?php the_field("metodologia_titulo_principal") ?>
        </h2>

        <div class="novo-sobre__methodology-header__container"> 
          <div>
            <h3>
              <?php the_field("metodologia_subtitulo_01") ?>
            </h3>
            <p>
              <?php the_field("metodologia_header_texto") ?>
            </p>
          </div>

          <img src="<?php echo $methodology_header_image;?>" />
          
        </div>
        <h3>
          <?php the_field("metodologia_subtitulo_02") ?>
        </h3>
      </div>

      <div class="novo-sobre__methodology-content">
        
          <div class="novo-sobre__methodology-content--container">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/img/novo-sobre-circulo-metodologia.png"
            class="novo-sobre__methodology-content--container-roda--01"/>
            <img src="<?php echo get_template_directory_uri(); ?>/assets/img/novo-sobre-eye-icon.png" class="novo-sobre__methodology-content--container-icon--01"/>
            <div>
              <h4>
              <?php the_field("metodologia_conteudo_01_titulo_01") ?>
              </h4>
                <p>
                  <?php the_field("metodologia_conteudo_01_texto_01") ?>
                </p>
            </div>
           
          </div> 
          
          <div class="novo-sobre__methodology-content--container">
            <div>
              <h4>
              <?php the_field("metodologia_conteudo_01_titulo_02") ?>
              </h4>
                <p>
                  <?php the_field("metodologia_conteudo_01_texto_02") ?>
             
                </p>
            </div>
            <img src="<?php echo get_template_directory_uri(); ?>/assets/img/novo-sobre-circulo-metodologia.png" class="novo-sobre__methodology-content--container-roda--02"/>
            <img src="<?php echo get_template_directory_uri(); ?>/assets/img/novo-sobre-ferramentas-icon.png" class="novo-sobre__methodology-content--container-icon--02"/>
          </div> 

          <div class="novo-sobre__methodology-content--container">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/img/novo-sobre-circulo-metodologia.png" class="novo-sobre__methodology-content--container-roda--03"/>
            <img src="<?php echo get_template_directory_uri(); ?>/assets/img/novo-sobre-microscopio-icon.png" class="novo-sobre__methodology-content--container-icon--03"/>
            <div>
              <h4>
                <?php the_field("metodologia_conteudo_01_titulo_03") ?>
              </h4>
                <p>
                  <?php the_field("metodologia_conteudo_01_texto_03") ?>
                  
                </p>
            </div>
            
          </div>
      </div>

      <div class="novo-sobre__methodology-content--02">

        <img src="<?php echo get_template_directory_uri(); ?>/assets/img/novo-sobre-pilar.png" class="novo-sobre__methodology-content--02-img"/>
        
        <div class="novo-sobre__methodology-content--02-container">
          <div class="novo-sobre__methodology-content--02-container-01">
            <h4>
              <?php the_field("metodologia_conteudo_02_titulo_01") ?>
            </h4>
            <p>
              <?php the_field("metodologia_conteudo_02_texto_03") ?>
            
            </p>
          </div>

          <div class="novo-sobre__methodology-content--02-container-02">
            <h4>
              <?php the_field("metodologia_conteudo_02_titulo_02") ?>
            </h4>
            <p>
              <?php the_field("metodologia_conteudo_02_texto_03") ?>
           
            </p>
          </div>

          <div class="novo-sobre__methodology-content--02-container-03">
            <h4><?php the_field("metodologia_conteudo_02_titulo_03") ?></h4>
            <p>
              <?php the_field("metodologia_conteudo_02_texto_03") ?>
            
            </p>
          </div>


        </div>
      </div>

      <div class="novo-sobre__methodology-content--03">
        <h2>
          <?php the_field("metodologia_conteudo_subtitulo_03") ?>
        </h2>

        <img src="<?php echo $methodology_content_03_image;?>" class="novo-sobre__methodology-content--03-img" />
        
      </div>
    </section>

    <section class="novo-sobre__form">
      <div class="novo-sobre__form-content">
     
          <?php the_field("form_section_text_01"); ?>
		

      </div>

      <div class="novo-sobre__form-formField">
        <div class="novo-sobre__form-formField__header">
          <h2>
            Vamos continuar esse papo num lugar mais reservado?
          </h2>
          <p>(no caso, a sua caixa de entrada)</p>
        </div>

          <div class="novo-sobre__form-formField__container">
            <?php echo do_shortcode('[contact-form-7 id="3773" title="Sobre"]')?>
          </div>
      </div>
    </section>
  </main>

  

</div>

<?php
get_footer();
?> 
