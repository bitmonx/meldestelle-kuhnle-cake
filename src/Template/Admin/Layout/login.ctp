<?php
$cakeDescription = 'CakePHP: the rapid development php framework';
?>
<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?= $cakeDescription ?>:
        <?= $this->fetch('title') ?>
    </title>
    <meta name="msapplication-TileImage" content="img/cropped-mk_logo_4c_bildmarke-270x270.png">
    <link rel="icon" href="img/cropped-mk_logo_4c_bildmarke-32x32.png" sizes="32x32">
    <link rel="icon" href="img/cropped-mk_logo_4c_bildmarke-192x192.png" sizes="192x192">
    <link rel="apple-touch-icon-precomposed" href="img/cropped-mk_logo_4c_bildmarke-180x180.png">

    <?= $this->Html->css('/node_modules/bootstrap/dist/css/bootstrap.min.css') ?>
    <?= $this->Html->css('/node_modules/fortawesome/fontawesome-free/css/all.min.css') ?>
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <?= $this->Html->css('base.css') ?>
    <?= $this->Html->css('style.css') ?>
    <?= $this->Html->css('admin') ?>

    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
</head>
<body style="background-color: #e5e5e5">
<?= $this->Flash->render() ?>
    <div class="container clearfix login" style="height: 100%">
        <div id="content">
            <?= $this->fetch('content') ?>
        </div>
    </div>
    <footer>
    </footer>
</body>
</html>

