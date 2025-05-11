<?php
get_header() ?>

<section>
    <h2>
        <?= get_the_title() ?>
    </h2>
    <?php if (have_rows('news-list')):

        while (have_rows('news-list')): the_row(); ?>

        <article>
            <h3>
                <?= get_sub_field('news-list-title') ?>
            </h3>
            <p>
                <?= get_sub_field('news-list-paragraph') ?>
            </p>
            <?php
            $img = get_sub_field('news-list-img');
            ?>
            <img src="<?= $img['url'] ?>" alt="<?= $img['alt'] ?>">

        </article>
    <?php endwhile; endif; ?>
</section>
<section>
    <h2>
        <?= get_field('news-gallery-title') ?>
    </h2>

    <?php
    $images = get_field('news-gallery');
    $size = 'full';
    if( $images ): ?>
        <ul>
            <?php foreach( $images as $image_id ): ?>
                <li>
                    <img src="<?= $image_id['url'] ?>" alt="<?= $image_id['alt'] ?>">
                </li>
            <?php endforeach; ?>
        </ul>
    <?php endif; ?>
</section>
<section>
    <h2>
<?= get_field('other-news-title') ?>
    </h2>
    <?php
    $other_news = new WP_Query([
            'post_type' => 'actualites',
            'orderby' => 'rand',
        'posts_per_page' => 3,
    ])
    ?>
    <?php
    if ($other_news->have_posts()) :
            while ($other_news->have_posts()) : $other_news->the_post();

                $thumbnail_id = get_post_thumbnail_id();
                $alt_text = get_post_meta($thumbnail_id, '_wp_attachment_image_alt', true);
                ?>
                <article>
                    <a href="<?= get_the_permalink() ?>" title="En savoir plus sur cette actualité">Test</a>
                    <h3><?= get_the_title(); ?></h3>
                    <time><?= get_the_date('d/m/Y') ?></time>
                    <div>
                        <?= get_the_post_thumbnail(null, 'small', [ 'alt' => $alt_text]); ?>
                    </div>
                    <p><?= get_the_excerpt(); ?></p>
                </article>
            <?php endwhile;
        endif;
        wp_reset_postdata();
        ?>


</section>



<?php get_footer() ?>
