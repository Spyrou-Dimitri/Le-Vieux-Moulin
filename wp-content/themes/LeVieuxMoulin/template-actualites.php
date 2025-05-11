<?php /* Template Name: Page "Actualites" */
get_header();
?>
<section class="news">
    <h2 class="news__tite">
        <?= get_field('news-title') ?>
    </h2>
    <div class="news__wrapper">
        <?php
        $lastNews = new WP_Query([
            'post_type' => 'actualites',
            'orderby' => 'date',
            'order' => 'DESC',
        ]);
        if ($lastNews->have_posts()) :
            while ($lastNews->have_posts()) : $lastNews->the_post();

                $thumbnail_id = get_post_thumbnail_id();
                $alt_text = get_post_meta($thumbnail_id, '_wp_attachment_image_alt', true);
                ?>
                <article class="newsCard" data-animation="showUp">
                    <div class="newsCard__img">
                        <?= get_the_post_thumbnail(null, 'small', ['class' => 'resizeImg', 'alt' => $alt_text]); ?>
                    </div>

                    <div class="newsCard__content">
                        <h3 class="newsCard__content__title"><?= get_the_title(); ?></h3>
                        <time class="newsCard__content__time"><?= get_the_date('d/m/Y') ?></time>
                    </div>

                    <a class="newsCard__link" href="<?= get_the_permalink() ?>"
                       title="En savoir plus sur cette actualité">
                        <span class="sro">En savoir plus sur l'actualité <?= get_the_title() ?></span>
                    </a>
                </article>


            <?php endwhile;
        endif;
        wp_reset_postdata();
        ?>
    </div>
    </div>
</section>


<?php wp_reset_postdata(); ?>
<?php get_footer(); ?>

