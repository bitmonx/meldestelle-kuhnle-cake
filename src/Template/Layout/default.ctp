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
        <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
        <script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.3.1.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
        <script type="text/javascript" src="js/headerscripts.js"></script>
        <script>
            $(function(){
                // console.log($(".navbar-brand img").attr("src"));

                var width = $(window).innerWidth();
                var num = 0;

                $(window).resize(function () {
                    width = $(this).innerWidth();
                    if(width < 769) {
                        $('.navbar-brand img').attr("src","img/cropped-mk_logo_4c_quer-3.png");
                    } else {
                        $('.navbar-brand img').attr("src","img/mk_logo_weiss_quer.png");
                    }

                });

                $(window).scroll(function () {
                    console.log($(window).scrollTop());
                    num = $(window).scrollTop();

                    if(num < 80){
                        $('.navbar-brand img').attr("src","img/mk_logo_weiss_quer.png");
                    }

                    if(num >= 80){
                        $('.navbar-brand img').attr("src","img/cropped-mk_logo_4c_quer-3.png");
                    }
                });
            });
        </script>

        <?= $this->fetch('meta') ?>
        <?= $this->fetch('css') ?>
        <?= $this->fetch('script') ?>
    </head>
    <body class="home page-template-default page page-id-18 wp-custom-logo blog-post header-layout-default elementor-default">
        <div class="wrapper">
            <header class="header">
                <?= $this->element('Navigation/default') ?>
                <div style="display: none"></div>
            </header>
            <div id="carousel-hestia-generic" class="carousel slide" data-ride="carousel">
                <div class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner">
                        <div class="item active">
                            <div class="page-header" style="min-height: 402.3px;">
                                <div class="container" style="padding-top: 135px;">
                                    <div class="row hestia-big-title-content">
                                        <div class="big-title-slider-content text-center col-sm-8 col-sm-offset-2">
                                            <h1 class="hestia-title">EDV TURNIERSERVICE MARKUS KUHNLE</h1>
                                            <div class="buttons">
                                                <a href="#kontakt" title="Direkt kontaktieren" class="btn btn-primary">Direkt kontaktieren</a>
                                            </div>
                                        </div>
                                    </div>
                                </div><!-- /.container -->
                                <div class="header-filter" style="background-image: url(img/mk_webseite_bild-7.jpg)">
                                </div><!-- /.header-filter -->
                            </div><!-- /.page-header -->
                        </div>
                    </div>
                </div>
            </div>
            <div class="main main-raised">
                <?= $this->element('Sections/services') ?>
                <?= $this->element('Sections/nennungen') ?>
                <?= $this->fetch('content') ?>
                <?= $this->element('Sections/kontakt', [
                    'user' => $user,
                    'contact' => $contact
                ]) ?>
                <footer class="footer footer-black footer-big">
                    <?= $this->element('footer') ?>
                </footer>
            </div>
        </div>
        <button class="hestia-scroll-to-top">
            <i class="fa fa-angle-double-up" aria-hidden="true"></i>
        </button>
        <script type="text/javascript" src="js/footerscripts.js"></script>
        <!-- <div style="background-color: rgb(255, 255, 255); border: 1px solid rgb(204, 204, 204); box-shadow: rgba(0, 0, 0, 0.2) 2px 2px 3px; position: absolute; transition: visibility 0s linear 0.3s, opacity 0.3s linear 0s; opacity: 0; visibility: hidden; z-index: 2000000000; left: 0px; top: -10000px;">
            <div style="width: 100%; height: 100%; position: fixed; top: 0px; left: 0px; z-index: 2000000000; background-color: rgb(255, 255, 255); opacity: 0.05;">
            </div>
            <div class="g-recaptcha-bubble-arrow" style="border: 11px solid transparent; width: 0px; height: 0px; position: absolute; pointer-events: none; margin-top: -11px; z-index: 2000000000;">
            </div>
            <div class="g-recaptcha-bubble-arrow" style="border: 10px solid transparent; width: 0px; height: 0px; position: absolute; pointer-events: none; margin-top: -10px; z-index: 2000000000;">
            </div>
            <div style="z-index: 2000000000; position: relative;">
                <iframe title="reCAPTCHA-Aufgabe" src="https://www.google.com/recaptcha/api2/bframe?hl=de&amp;v=v1543213962382&amp;k=6Lcb13YUAAAAAJA26s4R6X5NzDZTI5bMMwBlEsEG&amp;cb=hjx4et6dwyyp" name="c-2zakwnaw551b" frameborder="0" scrolling="no" sandbox="allow-forms allow-popups allow-same-origin allow-scripts allow-top-navigation allow-modals allow-popups-to-escape-sandbox" style="width: 100%; height: 100%;"></iframe>
            </div>
        </div> -->
    </body>
</html>
