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
    <?= $this->Html->css('admin') ?>

    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script>
        $( function() {
            $( ".datepicker" ).datepicker({
                dateFormat: "dd.mm.yy"
            });
        } );
    </script>

    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
</head>
<body>
    <nav class="navbar navbar-expand-md navbar-light bg-light">
        <a class="navbar-brand" href="/">
            <?= $this->Html->image('mk_logo_weiss_quer.png') ?>
        </a>
        <button class="navbar-toggler mr-5" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse ml-5" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="/admin/tournaments">Turniere</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link"href="/admin/hosts">Veranstalter</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/admin/disciplines">Disziplinen</a>
                </li>
                <?php if($this->Session->read('Auth.User.userrole.role') === 'superadmin'): ?>
                    <li class="nav-item">
                        <a class="nav-link" href="/admin/users">Benutzer</a>
                    </li>
                <?php endif; ?>
            </ul>
            <ul class="navbar-nav navbar-nav-right ml-auto">
                <li class="nav-item">
                    <a class="nav-link " href="/admin/users/editUserData/<?= $this->Session->read('Auth.User.id') ?>"><i class="fas fa-user-edit fa-2x"></i></a>
                </li>
                <li class="nav-item mx-5">
                    <a class="nav-link btn btn-outline-primary" href="/admin/users/logout">Logout</a>
                </li>
            </ul>
        </div>
    </nav>
    <header class="flash-header">
        <?= $this->Flash->render() ?>
    </header>
    <div class="container-fluid clearfix">
        <?= $this->fetch('content') ?>
    </div>
    <footer>
    </footer>
</body>
</html>
