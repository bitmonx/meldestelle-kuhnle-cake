<?php

//echo '<pre>';
//print_r($host);
//echo '</pre>';
//exit;

?>

<div class="row">
    <div class="col-md-8 mx-auto">
        <div class="row">
            <div class="col">
                <div class="card">
                    <?= $this->Html->image('hosts/' . $host->file->name, [
                        'class' => 'card-img-top'
                    ]) ?>
                    <div class="card-header">
                        <h3 class="card-title">
                            <?= $host->name ?>
                        </h3>
                    </div>
                    <div class="card-body">
                        <table class="table table-view">
                            <tr>
                                <th scope="row">Website:</th>
                                <td><a href="<?= $host->website_url ?>"><?= $host->website_url ?></a></td>
                            </tr>
                            <tr>
                                <th scope="row">Hinzugefügt am:</th>
                                <td><?= h($host->created->i18nFormat('dd.MM.yy')) ?></td>
                            </tr>
                            <tr>
                                <th scope="row">Zuletzt bearbeitet am:</th>
                                <td><?= h($host->modified->i18nFormat('dd.MM.yy')) ?></td>
                            </tr>
                        </table>
                    </div>
                    <div class="card-footer">
                        <div class="d-flex flex-row justify-content-around">
                            <div class="flex-grow-1">
                                <a class="btn btn-secondary ml-5 mb-3" href="/admin/hosts">Zurück</a>
                            </div>
                            <div flex-grow-1>
                                <a class="btn btn-primary ml-5 mb-3" href="/admin/hosts/edit/<?= $host->id ?>">Bearbeiten</a>
                            </div>
                            <div flex-grow-1>
                                <a class="btn btn-danger ml-5 mb-3" href="/admin/hosts/delete/<?= $host->id ?>">Löschen</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
