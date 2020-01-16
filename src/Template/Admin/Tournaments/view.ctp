<?php

//echo '<pre>';
//print_r($tournament);
//echo '</pre>';
//exit;

?>

<div class="row">
    <div class="col-md-8 mx-auto">
        <div class="row">
            <div class="col">
                <div class="card">
                    <?= $this->Html->image('/img/hosts/' . $tournament->host->file->name, [
                        'class' => 'card-img-top'
                    ]) ?>
                    <div class="card-header">
                        <h3 class="card-title">
                            <?php
                            if($tournament->start != $tournament->end){
                                echo $tournament->start->i18nFormat('dd.MM.yyyy') . ' - ' . $tournament->end->i18nFormat('dd.MM.yyyy') . ' (' . $tournament->host->name . ')';
                            } else {
                                echo $tournament->start->i18nFormat('dd.MM.yyyy'). ' (' . $tournament->host->name . ')';
                            }
                            ?>
                        </h3>
                        <h4 class="card-subtitle">
                            <small><?= $tournament->disciplines ?></small>
                        </h4>
                    </div>
                    <div class="card-body">
                        <table class="table table-view">
                            <tr>
                                <th scope="row">Nennschluss:</th>
                                <td><?= (isset($tournament->deadline) AND !empty($tournament->deadline))?$tournament->deadline->i18nFormat('dd.MM.yyyy'):'' ?></td>
                            </tr>
                            <tr>
                                <th scope="row">Ausschreibung (PDF):</th>
                                <td>
                                    <?php if(isset($tournament->file) AND !empty($tournament->file)){
                                            echo '<a href="/admin/files/download/' . $tournament->file->id . '" target="_blank">' . $tournament->file->name . '</a>';
                                        }
                                    ?>
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">Zeiteinteilung:</th>
                                <td>
                                    <?php if(isset($tournament->info_url) AND !empty($tournament->info_url)){
                                        echo '<a href="' . $tournament->info_url . '">' . $tournament->info_url . '</a>';
                                        }
                                    ?>
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">Ergebnisse:</th>
                                <td>
                                    <?php if(isset($tournament->result_url) AND !empty($tournament->result_url)){
                                            echo '<a href="' . $tournament->results_url . '">' . $tournament->results_url . '</a>';
                                        }
                                    ?>
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">Hinzugefügt am:</th>
                                <td><?= h($tournament->created->i18nFormat('dd.MM.yy')) ?></td>
                            </tr>
                            <tr>
                                <th scope="row">Zuletzt bearbeitet am:</th>
                                <td><?= h($tournament->modified->i18nFormat('dd.MM.yy')) ?></td>
                            </tr>
                        </table>
                    </div>
                    <div class="card-footer">
                        <div class="d-flex flex-row justify-content-around flex-wrap">
                            <div class="flex-grow-1">
                                <a class="btn btn-secondary ml-5 mb-3" href="/admin/tournaments">Zurück</a>
                            </div>
                            <div flex-grow-1>
                                <a class="btn btn-primary ml-5 mb-3" href="/admin/tournaments/edit/<?= $tournament->id ?>">Bearbeiten</a>
                            </div>
                            <div flex-grow-1>
                                <a class="btn btn-danger ml-5 mb-3" href="/admin/tournaments/delete/<?= $tournament->id ?>">Löschen</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
