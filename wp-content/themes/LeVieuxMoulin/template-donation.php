<?php /* Template Name: Page "Donation" */
get_header() ?>
<section class="donation">
    <div class="donation__content">
        <h2 class="donation__content__title">
            <?= get_field('dons-title', false, false); ?>
        </h2>
        <p class="donation__content__paragraph">
            <?= get_field('don-slogan', false, false); ?>
        </p>

        <ul class="helpers">
            <?php
            if (have_rows('helpers-list')): while (have_rows('helpers-list')) :
                the_row();
                ?>
                <li class="helpers__items">
                <span class="helpers__items__value">
                <?= get_sub_field('helpers-list-value', false, false); ?>
                </span>
                    <p class="helpers__items__name">
                        <?= get_sub_field('helpers-list-title', false, false); ?>
                    </p>
                </li>

            <?php endwhile;
            endif ?>

        </ul>

    </div>


    <?php
    $don_image = get_field('dons-image');
    ?>
    <div class="donation__img">
        <img class="resizeImg" class="resizeImg" src="<?= $don_image['url'] ?>" alt="<?= $don_image['alt'] ?>">
    </div>
</section>
<section class="typeOfDonations">
    <h2 class="sro">Les différents types de dons</h2>
    <article class="money don">
        <div class="money don__content">
            <h2 class="money don__content__title">
                <?= get_field('money-title', false, false); ?>
            </h2>
            <p class="money don__content__paragraph">
                <?= get_field('money-desc', false, false); ?>
            </p>
            <small class="money don__content__alert">
                <?= get_field('money-alert', false, false); ?>
            </small>
        </div>
        <div class="money don__img">
            <?php
            $money_img = get_field('money-img');
            ?>
            <img class="resizeImg" src="<?= $money_img['url'] ?>" alt="<?= $money_img['alt'] ?>">
        </div>
    </article>
    <article class="materials don">
        <div class="don__content">
            <h2 class="don__content__title">
                <?= get_field('material-title', false, false); ?>
            </h2>
            <p class="don__content__paragraph">
                <?= get_field('material-desc', false, false); ?>
            </p>
            <a class="ctaPrimary" href="#" title="Vers la page de formulaire de contact"><?= get_field('material-button') ?></a>
        </div>
        <div class="don__img">
            <?php
            $material_img = get_field('material-img');
            ?>
            <img class="resizeImg" src="<?= $material_img['url'] ?>" alt="<?= $material_img['alt'] ?>">
        </div>
    </article>
    <article class="collaborators don">
        <div class="don__content">
            <h2 class="don__content__title">
                <?= get_field('collaborator-title', false, false); ?>
            </h2>
            <p class="don__content__paragraph">
                <?= get_field('collaborator-desc', false, false); ?>
            </p>
            <a class="ctaPrimary" href="#" title="Vers la page de formulaire de contact"><?= get_field('collaborator-button') ?></a>
        </div>
        <div class="don__img">
            <?php
            $collaborator_img = get_field('collaborator-img');
            ?>
            <img class="resizeImg" src="<?= $collaborator_img['url'] ?>" alt="<?= $collaborator_img['alt'] ?>">
        </div>
    </article>
</section>

