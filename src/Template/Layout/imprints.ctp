<?php
$cakeDescription = 'EDV Turnierservice – Markus Kuhnle';
?>
<!DOCTYPE html>
<html lang="de">
    <head>
        <?= $this->Html->charset() ?>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="msapplication-TileImage" content="img/cropped-mk_logo_4c_bildmarke-270x270.png">
        <link rel="icon" href="img/cropped-mk_logo_4c_bildmarke-32x32.png" sizes="32x32">
        <link rel="icon" href="img/cropped-mk_logo_4c_bildmarke-192x192.png" sizes="192x192">
        <link rel="apple-touch-icon-precomposed" href="img/cropped-mk_logo_4c_bildmarke-180x180.png">
        <title>
            <?= $cakeDescription ?>:
            <?= $this->fetch('title') ?>
        </title>
        <link rel="profile" href="http://gmpg.org/xfn/11">
        <link rel="dns-prefetch" href="//maxcdn.bootstrapcdn.com">
        <link rel="dns-prefetch" href="//fonts.googleapis.com">
        <link rel="dns-prefetch" href="//s.w.org">
        <?= $this->Html->css('stylesheet') ?>
        <link rel="stylesheet" href="http://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
        <script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.3.1.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
        <script type="text/javascript" src="js/headerscripts.js"></script>

        <?= $this->fetch('meta') ?>
        <?= $this->fetch('css') ?>
        <?= $this->fetch('script') ?>
    </head>
    <body class="page-template-default page page-id-3 wp-custom-logo blog-post header-layout-default elementor-default">
    <div class="wrapper  default ">
        <header class="header">
            <nav class="navbar navbar-default navbar-fixed-top  hestia_left navbar-not-transparent">
                <div class="container">
                    <div class="navbar-header">
                        <div class="title-logo-wrapper">
                            <a class="navbar-brand" href="/"
                               title="EDV Turnierservice">
                                <img src="img/cropped-mk_logo_4c_quer-3.png" alt="EDV Turnierservice"></a>
                        </div>
                        <div class="navbar-toggle-wrapper">
                            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#main-navigation">
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="sr-only">Navigation umschalten</span>
                            </button>
                        </div>
                    </div>
                    <div id="main-navigation" class="collapse navbar-collapse">
                        <ul id="menu-head" class="nav navbar-nav">
                            <li id="menu-item-140" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-home menu-item-140">
                                <a title="Service" href="/#service">Service</a>
                            </li>
                            <li id="menu-item-141" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-home menu-item-141">
                                <a title="Nennungen" href="/#nennungen">Nennungen</a>
                            </li>
                            <li id="menu-item-142" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-home menu-item-142">
                                <a title="Turniere" href="/#turniere">Turniere</a>
                            </li>
                            <li id="menu-item-143" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-home menu-item-143">
                                <a title="Kontakt" href="/#kontakt">Kontakt</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
            <div style="display: none"></div>
        </header>
        <div id="primary" class="boxed-layout-header page-header header-small" data-parallax="active" >
            <div class="container">
                <div class="row">
                    <div class="col-md-10 col-md-offset-1 text-center">
                        <h1 class="hestia-title "><?= $title ?></h1>
                    </div>
                </div>
            </div>
            <div class="header-filter" style="background-image: url(img/cropped-mk_webseite_bild-5.jpg);">

            </div>
        </div>
        <div class="main  main-raised ">
            <div class="blog-post">
                <div class="container">
                    <?= $this->fetch('content') ?>
                </div>
            </div>
            <footer class="footer footer-black footer-big">
                <?= $this->element('footer') ?>
            </footer>
        </div>
    </div>
    <button class="hestia-scroll-to-top">
        <i class="fa fa-angle-double-up" aria-hidden="true"></i>
    </button>
    <script type="text/javascript" src="js/footerscripts.js"></script>
    </body>
</html>
