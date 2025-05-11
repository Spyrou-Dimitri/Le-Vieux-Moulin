<?php /* Template Name: Page "Accueil" */
get_header()

?>

<section class="hero" data-animation="showUp">
    <div class="hero__content">
        <h2 class="hero__content__title">
            <?= get_field('hero-title', false, false) ?>
            <span>
            <?= get_field('hero-institut') ?>
    </span>
        </h2>
        <p class="hero__content__paragraph">
            <?= get_field('hero-slogan') ?>
        </p>
    </div>

    <?php
    $img = get_field('hero-img');
    ?>
    <div class="hero__img">
        <img class="frog" src="/wp-content/themes/LeVieuxMoulin/resources/img/animals/grenouille.svg"
             alt="Une grenouille qui salue les arrivants">
        <img class="resizeImg" src="<?= $img['url'] ?>" alt="<?= $img['alt'] ?>">
    </div>
</section>
<section class="missions">
    <h2 class="missions__title">
        <?= get_field('missions-title', false, false) ?>
    </h2>


    <ul class="missions__list">
        <li class="wolf__container">
            <img class="wolf" src="/wp-content/themes/LeVieuxMoulin/resources/img/animals/loup.svg"
                 alt="Un dessin de loup">
        </li>

        <?php
        if (have_rows('missions-list')):
            while (have_rows('missions-list')) : the_row(); ?>
                <li class="missions__list__items" data-animation="showUp">
                    <article>
                        <h3>
                            <?= get_sub_field('missions-list-title', false) ?>
                        </h3>
                        <p>
                            <?= get_sub_field('missions-list-desc') ?>
                        </p>
                    </article>
                </li>
            <?php endwhile; endif; ?>

    </ul>


</section>
<section class="houses">
    <h2 class="houses__title">
        <?= get_field('home-houses-title', false, false) ?>
    </h2>

    <div class="houses__list" data-animation="showUp">
        <?php
        $houses = new WP_Query([
            'post_type' => 'houses',
        ]);

        if ($houses->have_posts()) :
            while ($houses->have_posts()) : $houses->the_post();
                $thumbnail_id = get_post_thumbnail_id();
                $alt_text = get_post_meta($thumbnail_id, '_wp_attachment_image_alt', true);
                ?>
                <article class="house" data-animation="showUp">
                    <div class="house__image">
                        <?php if ($houses->current_post % 2 === 0): ?>
                            <img class="dog" src="/wp-content/themes/LeVieuxMoulin/resources/img/animals/chien.svg"
                                 alt="Un dessin de chien">
                        <?php else: ?>
                            <img class="cat" src="/wp-content/themes/LeVieuxMoulin/resources/img/animals/chat.svg"
                                 alt="Un dessin de chat">
                        <?php endif; ?>
                        <?= get_the_post_thumbnail(null, 'large', ['class' => 'resizeImg', 'alt' => $alt_text]); ?>
                    </div>

                    <div class="house__content">
                        <h3 class="house__title">
                            <?= get_the_title(); ?>
                        </h3>

                        <ul class="house__features">
                            <?php if (have_rows('stats-list')) :
                                while (have_rows('stats-list')) : the_row(); ?>
                                    <li class="house__feature">
                                        <p class="house__feature-text">
                                            <?= get_sub_field('stats-list-content') ?>
                                        </p>
                                    </li>
                                <?php endwhile; endif; ?>
                        </ul>

                        <a class="house__link ctaPrimary" href="<?= get_the_permalink() ?>"
                           title="Vers la page <?= get_the_title() ?>">
                            Visiter <?= get_the_title() ?>
                        </a>
                    </div>
                </article>
            <?php
            endwhile;
        endif;
        ?>
    </div>
</section>

<?php wp_reset_postdata(); ?>
<section class="newsHome" data-animation="showUp">
    <h2 class="newsHome__title">
        <?= get_field('lastNews-title') ?>
    </h2>
    <div class="newsHome__wrapper">
        <?php
        $lastNews = new WP_Query([
            'post_type' => 'actualites',
            'orderby' => 'date',
            'order' => 'DESC',
            'posts_per_page' => 3,
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
    <a class="newsHome__cta ctaPrimary" href="#">Voir toutes nos actualités</a>
</section>

<section class="homeDonation" data-animation="showUp">
    <?php if (have_posts()): while (have_posts()): the_post();
        $email = get_option('options_email');
        $bank = get_option('options_bank');
        $qrcode = get_field('home-donation-qrcode');
        ?>
        <h2 class="homeDonation__title">
            <?= get_field('home-donation-title') ?>
        </h2>

        <div class="homeDonation__wrapper">
            <div class="homeDonation__wrapper__text">
                <p class="">
                    <?= get_field('home-donation-content') ?>
                </p>
                <p class="homeDonation__bank">
                    <?= $bank ?>
                </p>
            </div>
            <div class="homeDonation__wrapper__qrcode">
                <img class="homeDonation__image resizeImg" src="<?= $qrcode['url'] ?>" alt="<?= $qrcode['alt'] ?>">
            </div>
        </div>
    <?php endwhile; endif; ?>
</section>





