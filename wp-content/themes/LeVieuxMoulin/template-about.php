<?php /* Template Name: Page "À propos" */
get_header();

?>
<section class="explication">
    <div class="explication__content">
        <h2 class="explication__content__title">
            <?= get_field('explication-title') ?>
        </h2>
        <p class="explication__content__paragraph">
            <?= get_field('explication-content') ?>
        </p>
    </div>
    <div class="explication__img">
        <img class="squirel" src="/wp-content/themes/LeVieuxMoulin/resources/img/animals/squirel.svg"
             alt="Un dessin d'écureuil intrigué">
    </div>

</section>
<section class="asideFeatures">
    <h2 class="asideFeatures__title">
        <?= get_field('aside-title') ?>
    </h2>

    <ul class="asideFeatures__list">
        <?php if (have_rows('aside-list')) : while (have_rows('aside-list')) : the_row(); ?>
            <li class="asideFeatures__list__items">
      <span class="asideFeatures__list__items__number">
        <?= get_sub_field('aside-list-number'); ?>
      </span>
                <p class="asideFeatures__list__items__paragraph">
                    <?= get_sub_field('aside-list-title'); ?>
                </p>
            </li>

        <?php endwhile; endif; ?>
    </ul>

</section>
<section class="timeline">
    <h2 class="timeline__title">
        <?= get_field('timeline-title') ?>
    </h2>
    <div class="timeline__wrapper">
        <?php
        $index = 0;
        if (have_rows('timeline-list')) : while (have_rows('timeline-list')) : the_row();
        $index++;?>
        <article class="moment">
            <?php
            $repeteur = get_field("timeline-list")
            ?>
            <div class="moment__content">
                <h3 class="moment__title">
                    <?= get_sub_field('timeline-list-title') ?>
                </h3>
                <p class="moment__paragraph">
                    <?= get_sub_field('timeline-list-desc') ?>
                </p>
            </div>
            <?php
            $momentImg = get_sub_field('timeline-list-img');
            ?>
            <div class="moment__img">
                <?php if ($index === 1) : ?>
                    <img class="dino" src="/wp-content/themes/LeVieuxMoulin/resources/img/animals/Dino.svg" alt="Un dessin de dinosaure">
                <?php elseif ($index === 2) : ?>
                    <img class="turtle" src="/wp-content/themes/LeVieuxMoulin/resources/img/animals/Tortue.svg" alt="Un dessin de tortue">
                <?php else: ?>
                    <img class="guepard" src="/wp-content/themes/LeVieuxMoulin/resources/img/animals/guepard.svg" alt="Un dessin de guépard">
                    <?php $index = 3 ?>
                <?php endif;?>
                <img class="resizeImg" src="<?= $momentImg['url'] ?>" alt="<?= $momentImg['alt'] ?>">
            </div>
        </article>
        <?php endwhile; endif; ?>

    </div>
</section>


<?php
get_footer()
?>
