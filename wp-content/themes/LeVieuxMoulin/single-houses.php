<?php
get_header()
?>

<section>
    <div>
        <h2>
            <?= get_field('houses-title', false, false) ?>
        </h2>
        <p>
            <?= get_field('houses-desc', false, false) ?>
        </p>
    </div>
    <div>
        <?= get_the_post_thumbnail() ?>
    </div>
</section>
<section>
    <h2>
        <?= get_field('stats-title', false, false) ?>
    </h2>
    <?php if (have_rows('stats-list', false)): while (have_rows('stats-list', false)) : the_row(); ?>


        <ul>
        <li>
            <p>
                <?= get_sub_field('stats-list-content', false, false) ?>
            </p>
        </li>
    </ul>
    <?php endwhile; endif; ?>
</section>
<section>
    <h2>
        <?= get_field('daily-title', false, false) ?>
    </h2>
    <div>
        <?php if (have_rows('daily-list', false)): while (have_rows('daily-list')) : the_row(); ?>
        <dl>
            <dt>
              <?= get_sub_field('daily-list-title', false, false) ?>
            </dt>
            <dd>
                <?= get_sub_field('daily-list-content', false, false) ?>
            </dd>
        </dl>
        <?php
            $daily_img = get_sub_field('daily-list-img');
            ?>
        <div>
            <img src="<?= $daily_img['url'] ?>" alt="<?= $daily_img['alt'] ?>">
        </div>
        <?php endwhile; endif; ?>

    </div>
</section>
<section>
    <h2>
        <?= get_field('room-title', false, false) ?>
    </h2>
</section>


