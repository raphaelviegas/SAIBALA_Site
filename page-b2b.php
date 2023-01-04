<?php
// Template Name: B2B
get_header('shop');
?>

<section class="header__b2b">
   <div class="container">
      <div class="header__left">
         <h2>Garanta<br> retorno com<br> <strong>Investimentos<br> em T&D</strong></h2>
      </div>
      <div class="header__right">
         <h2>E crie <strong>planos<br> de desenvolvimento<br> assertivos</strong></h2>
      </div>
      <div class="header__cta">
         <a href="#">Entre em contato</a>
      </div>
      <div class="header__last">
         <h2><strong>Aprendizado direcionado<br> ao contexto real e prático<br> de cada colaborador.</strong></h2>
      </div>
   </div>
</section>

<section class="causas__b2b">
   <div class="container">
      <div class="causas__title">
         <div class="causas__title-left">
            <h2 class="text-center"><strong>A PRINCIPAL CAUSA</strong> DE<br> TREINAMENTOS INEFETIVOS<br> É A <strong>FALTA DE MOTIVAÇÃO DO<br> COLABORADOR.</strong></h2>
         </div>
         <div class="causas__title-arrow">
            <img src="<?= get_template_directory_uri(); ?>/assets/img/seta-causas.jpg">
         </div>
         <div class="causas__title-right">
            <h3>APRENDIZADO<br> PRECISA SER<br> ENVOLVENTE.</h3>
         </div>
      </div>
      <div class="causas__subtitle">
         <p>as séries de aprendizado da saibalá trazem mais<br> resultado porque são construídas a partir de:</p>
      </div>
   </div>
   <ul>
      <li>
         <div class="container">
            <h4>ROTEIROS PRECISOS DO PONTO DE VISTA DIDÁTICO</h4>
         </div>
      </li>
      <li>
         <div class="container">
            <h4>FANTÁSTICOS DO PONTO DE VISTA NARRATIVO.</h4>
         </div>
      </li>
      <li>
         <div class="container">
            <h4>E SE APROPRIAM DA EXPERIÊNCIA PRÁTICA<br> DE QUEM JÁ SE DESTACOU NO MERCADO.</h4>
         </div>
      </li>
   </ul>
</section>


<section class="treinamentos">
   <div class="container">
      <h2>TREINAMENTOS <br>EFETIVOS QUE <br>GERAM RETORNO!</h2>
      <div class="treinamentos__video">
         <iframe src="https://player.vimeo.com/video/694931092?h=336207a7d7&color=FFFF00&title=0&byline=0&portrait=0" width="100%" height="360" frameborder="0" allow="autoplay; fullscreen; picture-in-picture" allowfullscreen></iframe>
      </div>  
   </div>
   <div class="treinamentos__mapa">
      <a href="#">Veja nosso mapa<br> de conteúdo</a>
   </div>

   <div class="bons__treinamenentos">
      <div class="container">
         <div class="imagem__treinamento">
            <img src="<?= get_template_directory_uri(); ?>/assets/img/bg-azul-treinamentos.jpg" alt="Treinamentos Saibalá">
         </div>         
         <h4>BONS <strong>TREINAMENTOS</strong><br> SÓ O <strong>SEGUNDO PASSO</strong></h4>
      </div>      
   </div>

   <div class="bons__treinamenentos verde">      
      <div class="container">
         <h4>PRIMEIRO PRECISAMOS DE <br><strong>PDIS BEM CONSTRUÍDOS</strong></h4>
         <div class="imagem__treinamento">
            <img src="<?= get_template_directory_uri(); ?>/assets/img/bg-verde-treinamentos.jpg" alt="Treinamentos Saibalá">
         </div>         
      </div>      
   </div>
</section>

<section class="plano__desenvolvimento">
   <div class="container">
      <h2 class="text-center">
         muitas vezes os <strong>próprios plano de<br>
         desenvolvimento dos colaboradores</strong><br>
         não são assertivos porque não se<br>
         conhece com profundidade os gaps<br>
         dos colaboradores e os times.
      </h2>
   </div>
</section>

<div class="title__gaps">
   <h2>COMO MAPEAR OS <br>GAPS EM ESCALA?</h2>
</div>
<div class="title__quantitativo">
   <h2>E COMO TORNAR <br>ISSO QUANTITATIVO?</h2>
</div>

<section class="rh">
   <div class="container">
      <img src="<?= get_template_directory_uri(); ?>/assets/img/seta-rh.bmp" alt="Treinamentos Saibalá" class="seta">
      <h2>TRANSFORME-SE EM RH 4.0 A <br>PARTIR DO PEOPLE ANALITYCS:</h2>

      <div class="rh__content">
         <img src="<?= get_template_directory_uri(); ?>/assets/img/cabeca-rh.bmp" alt="Treinamentos Saibalá">
         <div class="rh__text">
            <h3>Self</h3>
            <p>Self é o único assessment <br>
            que mapeia competências e<br>
            comportamentos através<br>
            através da tomada de decisão.</p>
         </div>
      </div>
   </div>
</section>

<?php
get_footer();
?>
