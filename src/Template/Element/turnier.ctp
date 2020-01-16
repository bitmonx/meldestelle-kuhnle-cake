<style>
    .rahmen {
        display: flex;
        justify-content: center;
        flex: 1;
        width: 100%;
        padding: 10px 20px;
    }

    .zeile {
        display: flex;
        flex-direction: row;
        flex-wrap: wrap;
        justify-content: space-between;
        flex-grow: 1;
    }

    .spalte {
        display: flex;
        flex-direction: column;
        flex: 1;
        flex-wrap: wrap;
        flex-shrink: ;
    }

    .turnier-button {
        display: flex;
        justify-content: center;
        align-items: center;
        flex-grow: 1;
    }

    #bild {
        align-self: center;
        height: 225px;
        width: 225px;
        box-shadow: 0px 0px 30px #B7B7B7;
        margin-right: 30px;
    }

    .textleisten {
        justify-content: space-between;
        align-items: center;
        padding-left: 30px;
    }

    #buttonleiste {
        justify-content: space-evenly;
    }

    #datum, #disziplin {
        color: #3C4858;
        font-size: 18px;
        font-weight: bold;
    }

    #nennschluss {
        color: #999999;
        font-size: 14px;
    }

    .abled {
        background-color: #68aaa6 !important;
    }

    .disabled {
        background-color: grey !important;
    }

    @media screen and (max-width: 803px) {
        #aussen {
            flex-direction: column;
            justify-content: space-between;
        }

        #buttonleiste {
            /*flex-direction: column;*/
            /*align-items: center;*/
            flex: 33%;
        }

        .turnier-button {
            margin: 10px;
            width: 250px;
        }

        .textleisten  {
            flex-direction: column;
            padding: 0;
        }

        .zeile {
            margin: 15px 0;
        }

        #bild {
            margin: 0;
        }

        .rahmen {
            margin: 20px 0;
        }
    }

    @media screen and (min-width: 804px) and (max-width: 856px) {
        .turnier-button {
            margin: 5px 0;
        }
    }
</style>

<div class="rahmen">
    <div class="zeile" id="aussen">
        <div id="bild">
            <img src="/img/hosts/<?= $tournament->host->file->name ?>">
        </div>
        <div class="spalte">
            <div class="zeile textleisten">
                <div id="datum">
                    <?php
                        if($tournament->start != $tournament->end){
                            echo $tournament->start->i18nFormat('dd.MM.yyyy') . ' - ' . $tournament->end->i18nFormat('dd.MM.yyyy');
                        } else {
                            echo $tournament->start->i18nFormat('dd.MM.yyyy');
                        }
                    ?>
                </div>
                <div id="disziplin">
                    <?= $tournament->disciplines ?>
                </div>
            </div>
            <div class="zeile textleisten">
                <div id="Link">
                    <a class="reitverein" href="<?= $tournament->host->website_url ?>" target="_blank"><?= $tournament->host->name ?></a>
                </div>
                <div id="nennschluss">
                    Nennschluss: <?= (isset($tournament->deadline) AND !empty($tournament->deadline))?$tournament->deadline->i18nFormat('dd.MM.yyyy'):'folgt in Kürze' ?>
                </div>
            </div>
            <div class="zeile" id="buttonleiste">
                <div class="turnier-button">
<!--                    <a class="btn btn-primary button abled" href="/admin/files/download/--><?//= $tournament->file->id ?><!--" target="_blank">Ausschreibung</a>-->
                    <a class="btn btn-primary button
                        <?php if(isset($tournament->file) AND !empty($tournament->file)){
                        echo ' abled" href="/admin/files/download/'  . $tournament->file->id . '"  target="_blank"';
                    } else {
                        echo ' disabled"';
                    }
                    ?>
                  >Ausschreibung</a>
                </div>
                <div class="turnier-button">
                    <a class="btn btn-primary button
                        <?php if(isset($tournament->info_url) AND !empty($tournament->info_url)){
                            echo ' abled" href="'  . $tournament->info_url . '"  target="_blank"';
                        } else {
                            echo ' disabled"';
                        }
                        ?>
                  >Zeiteinteilung<br /><small>Pferde/Teilnehmer/Infos</small></a>
                </div>
                <div class="turnier-button">
                    <a class="btn btn-primary button
                        <?php if(isset($tournament->results_url) AND !empty($tournament->results_url)){
                            echo ' abled" href="'  . $tournament->results_url . '"  target="_blank"';
                        } else {
                            echo ' disabled"';
                        }
                        ?>
                    >Ergebnisse</a>
                </div>
            </div>
        </div>
    </div>
</div>
