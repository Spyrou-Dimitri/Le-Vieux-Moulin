<?php /* Template Name: Page "Contact" */
?>
<?php
get_header();
?>
<?php if (have_posts()): while (have_posts()): the_post();
$email = get_option('options_email');
$phone = get_option('options_phone');
?>
<div class="bgContact">
    <section class="homeContact">
        <h2 class="homeContact__title">
            <?= get_the_title() ?>
        </h2>
    </section>
</div>
<section class="content">
    <h2 class="content__title sro">
        Contact
    </h2>

    <article class="content__coord">
        <h3 class="content__coord__title">
            <?= get_field('coord-title') ?>
        </h3>
        <p class="content__coord__paragraph">
            <?= get_field('coord-desc') ?>
        </p>
        <dl class="content__coord__list">
            <dt class="content__coord__list__title">
                Email
            </dt>
            <dd class="content__coord__list__link">
                <a href="<?= $email['url'] ?>"><?= $email['title'] ?></a>
            </dd>
            <dt class="content__coord__list__title">
                Téléphone
            </dt>
            <dd class="content__coord__list__link">
                <a href="<?= $phone['url'] ?>"><?= $phone['title'] ?></a>
            </dd>
        </dl>
    </article>
    <article class="content__contact">
        <h3 class="content__contact__title">
            <?= get_field('form-title') ?>
        </h3>
        <p class="content__contact__paragraph">
            <?= get_field('form-desc') ?>
        </p>
        <form action="#" method="post" class="content__contact__form">
            <div class="content__contact__form__container lastName-FirstName">
                <div class="lastName">
                    <label for="lastName">Nom (*)</label>
                    <input type="text" name="lastName" id="lastName" placeholder="Copeau">
                </div>
                <div class="firstName">
                    <label for="firstName">Prénom (*)</label>
                    <input type="text" id="firstName" name="firstName" placeholder="Anthony">
                </div>
            </div>
            <div class="content__contact__form__container email-tel">
                <div class="email">
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" placeholder="anthony.copeau@hotmail.com">
                </div>
                <div class="tel">
                    <label for="phone">Téléphone</label>
                    <input type="tel" id="phone" name="phone" placeholder="45678765">
                </div>
            </div>
            <div class="content__contact__form__container">
                <label for="object">Objet (*)</label>
                <input type="text" id="object" name="object">
            </div>
            <div class="content__contact__form__container">
                <label for="message">Message (*)</label>
                <textarea name="message" id="message" rows="10" placeholder="Ex. Bonjour je souhaite vous parler d'un projet"></textarea>
            </div>
            <button class="button" type="submit" name="submit"><span>Envoyer !</span></button>
        </form>

    </article>
</section>




<?php endwhile; endif; ?>
<?php
get_footer();
?>
