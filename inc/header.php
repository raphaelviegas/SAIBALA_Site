<?php $id = intval($_GET['header']); ?>
<section class="headers">
    <?php
        $imagem = get_field('imagem', $id);
        $subtitulo = get_field('subtitulo', $id);
        $titulo = get_field('titulo', $id);
        $conteudo = get_field('conteudo', $id);
        $chamada = get_field('chamada', $id);
        $video_url = get_field('video', $id);
        if ($video_url) $video = (int) substr(parse_url($video_url, PHP_URL_PATH), 1);
        $texto_cta = get_field('texto_cta', $id);
        $link_cta = get_field('link_cta', $id);
    ?>
    <div class="left">
        <?php if ($imagem): ?><img src="<?= $imagem; ?>" alt="<?= $titulo; ?>"><?php endif; ?>
        <?php if (!$imagem && $video): ?><iframe src="https://player.vimeo.com/video/<?= $video ?>" width="100%" height="650" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe><?php endif; ?>
    </div>
    <div class="right">
        <div class="content">

            <?php if ($subtitulo): ?>
                <h3><?= $subtitulo; ?></h3>
            <?php endif; ?>

            <h2><?= $titulo; ?></h2>

             <?php if ($conteudo): echo $conteudo; endif; ?>
           
            <?php if ($chamada): ?>
                <div class="chamada">
                    <?= $chamada; ?>
                </div>
            <?php endif; ?>
            
            <?php if ($link_cta): ?>
                <a href="<?= $link_cta ?>"><?= $texto_cta; ?></a>
            <?php endif; ?>

        </div>
    </div>
</section>