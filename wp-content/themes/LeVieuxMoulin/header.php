<?php
?>
<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="<?= pf_asset('css/main.css') ?>">
    <title><?= get_bloginfo('title') ?></title>
    <script defer type="module" src="<?= pf_asset("js/main.js") ?>" ></script>
</head>
<body>
<header>
    <h1 class="sro">
        <?= get_the_title() ?>
    </h1>
    <nav class="nav">
        <h2 class="nav__title sro">
            <?= wp_get_nav_menu_name("header_menu") ?>
        </h2>
        <a class="nav__logo" href="<?= home_url() ?>" title="Vers la page d`accueil"><img
                    src="<?= pf_asset('img/logo.svg') ?>"
                    alt="Logo du S.R.G Le Vieux Moulin"
                    width="136px"
                    height="90px"></a>
        <input type="checkbox" name="burger" id="burger__button">
        <label for="burger__button" class="sro">Menu dépliant</label>
        <div class="burger__wrapper">
            <span class="burger__wrapper__lines up"></span>
            <span class="burger__wrapper__lines middle"></span>
            <span class="burger__wrapper__lines down"></span>
        </div>
        <div class="nav__lists">
            <ul class="main">
                <?php foreach (pf_get_navigation_links('header_menu') as $link):
                    ?>
                    <?php if ($link->label !== "Contact" && $link->label !== "Dons"): ?>
                    <li class="main__items <?= !empty($link->children) ? 'has-children' : '' ?>">
                        <a href="<?= !empty($link->children) ? '#' : $link->url ?>"
                           class="main__items__link"
                           title="Vers la page <?= $link->label ?>">
                            <?= $link->label ?>
                        </a>

                        <?php if (!empty($link->children)): ?>
                            <ul class="dropdown">
                                <?php foreach ($link->children as $child): ?>
                                    <li class="dropdown__items">
                                        <a href="<?= $child->url ?>" title="<?= $child->label ?>">
                                            <?= $child->label ?>
                                        </a>
                                    </li>
                                <?php endforeach; ?>
                            </ul>
                        <?php endif; ?>
                    </li>
                <?php endif ?>
                <?php endforeach; ?>
            </ul>

            <ul class="secondary">
                <?php foreach (pf_get_navigation_links('header_menu') as $link):
                    ?>
                    <?php if ($link->label === "Contact" || $link->label === "Dons"): ?>
                    <li class="secondary__items">
                        <a class="secondary__items__link" href="<?= $link->url ?>" title="Vers la page de <?= $link->label ?>"><?= $link->label ?></a>
                    </li>
                <?php endif; ?>
                <?php endforeach; ?>

            </ul>

        </div>


    </nav>

</header>
<main>



