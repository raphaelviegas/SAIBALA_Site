<?php
/**
 * Display single product reviews (comments)
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product-reviews.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 4.3.0
 */

defined( 'ABSPATH' ) || exit;

global $product;

?>

<div id="reviews" class="woocommerce-Reviews">
   <div id="review_form_wrapper">
      <div id="review_form">
         <div id="respond" class="comment-respond">
            <form action="https://quintadastilias.com/wp-comments-post.php" method="post" id="commentform" class="comment-form">
               <p class="comment-notes"><span id="email-notes">O seu endereço de email não será publicado.</span> Campos obrigatórios marcados com <span class="required">*</span></p>
               <div class="comment-form-rating">
                  <label for="rating">A sua classificação</label>
                  <select name="rating" id="rating" required="" style="display: none;">
                     <option value="">Taxa…</option>
                     <option value="5">Perfeito</option>
                     <option value="4">Bom</option>
                     <option value="3">Razoável</option>
                     <option value="2">Nada mal</option>
                     <option value="1">Muito fraca</option>
                  </select>
               </div>
               <p class="comment-form-comment"><label for="comment">A sua avaliação sobre o produto&nbsp;<span class="required">*</span></label><textarea id="comment" name="comment" cols="45" rows="8" required=""></textarea></p>
               <p class="comment-form-author"><label for="author">Nome&nbsp;<span class="required">*</span></label><input id="author" name="author" type="text" value="" size="30" required=""></p>
               <p class="comment-form-email"><label for="email">Email&nbsp;<span class="required">*</span></label><input id="email" name="email" type="email" value="" size="30" required=""></p>
               <p class="comment-form-cookies-consent"><input id="wp-comment-cookies-consent" name="wp-comment-cookies-consent" type="checkbox" value="yes"> <label for="wp-comment-cookies-consent">Guardar o meu nome, email e site neste navegador para a próxima vez que eu comentar.</label></p>
               <p class="form-submit">
               		<input name="submit" type="submit" id="submit" class="submit" value="Enviar">
               		<input type="hidden" name="comment_post_ID" value="<?php echo get_query_var( 'productId' )?>" id="comment_post_ID">
                  <input type="hidden" name="comment_parent" id="comment_parent" value="0">
               </p>
            </form>
         </div>
         <!-- #respond -->
      </div>
   </div>
   <div class="clear"></div>
</div>


<script type='text/javascript' id='wc-single-product-js-extra'>
/* <![CDATA[ */
var wc_single_product_params = {"i18n_required_rating_text":"Seleccione uma classifica\u00e7\u00e3o","review_rating_required":"yes","flexslider":{"rtl":false,"animation":"slide","smoothHeight":true,"directionNav":false,"controlNav":"thumbnails","slideshow":false,"animationSpeed":500,"animationLoop":false,"allowOneSlide":false},"zoom_enabled":"","zoom_options":[],"photoswipe_enabled":"","photoswipe_options":{"shareEl":false,"closeOnScroll":false,"history":false,"hideAnimationDuration":0,"showAnimationDuration":0},"flexslider_enabled":""};
/* ]]> */
</script>
<script type='text/javascript' src='<?php echo get_home_url();?>/wp-content/plugins/woocommerce/assets/js/frontend/single-product.min.js?ver=4.7.1' id='wc-single-product-js'></script>