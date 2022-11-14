<!DOCTYPE html>
<!--[if IE 8]>
<html lang="pt" class="ie8">
<![endif]-->
<!--[if !IE]><!-->
<html lang="pt">
<!--<![endif]-->
<head>
    <meta charset="utf-8" />
    <title><?php echo get_bloginfo( 'name' );?></title>
    <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport" />
    <meta content="<?php echo get_bloginfo( 'description' ); ?>" name="description" />
    <!-- ================== BEGIN BASE CSS STYLE ================== -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,700;1,400&display=swap" rel="stylesheet">
<!--    <link href="--><?php //echo get_template_directory_uri(); ?><!--/assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" />-->
    <link href="<?php echo get_template_directory_uri(); ?>/assets/plugins/wow/animate.css" rel="stylesheet" />
    <link href="<?php echo get_template_directory_uri(); ?>/assets/plugins/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet" />
    <link href="<?php echo get_template_directory_uri(); ?>/assets/plugins/fontawesome/css/fontawesome-all.min.css" rel="stylesheet" />
    <link href="<?php echo get_template_directory_uri(); ?>/assets/dist/css/style.css" rel="stylesheet" />
    <!-- ================== END BASE CSS STYLE ================== -->

    <!-- ================== FAVICON END ================== -->
    <?php wp_head();?>
    <script type="text/javascript">
      var ajaxurl = "<?php echo admin_url('admin-ajax.php'); ?>";
      var themeurl = "<?php echo get_template_directory_uri(); ?>";
    </script>

    <!-- ================== OGIMAGE ================== -->
    <?php if (has_post_thumbnail($post->ID)): ?>
        <meta property="og:image" content="<?= get_the_post_thumbnail_url($post->ID, 'full'); ?>"/>
    <?php endif; ?>

    <?php if (!has_post_thumbnail($post->ID)): ?>
        <meta property="og:image" content="<?= get_template_directory_uri(); ?>/assets/img/og-image.jpg"/>
    <?php endif; ?>
</head>
<body <?php body_class(); ?>>
<header>
    <div class="logo container">
        <div>
            <a href="<?php echo get_home_url();?>"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/new-logo-header.png"/></a>
        </div>
    </div>
    <div class="menu-container container">
        <?= wp_nav_menu( array('theme_location' => 'header-menu')); ?>
    </div>
</header>
