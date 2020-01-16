<?php

//echo '<pre>';
//print_r($tournament);
//echo '</pre>';
//exit;

?>

<div class="row">
    <div class="col-md-8 mx-auto">
        <?= $this->Form->create($tournament, [
            'class' => 'form'
        ]) ?>
        <h1 class="page-title">Turniere</h1>
        <h3 class="page-subtitle">Vorhandenes Turnier bearbeiten</h3>
        <div class="wrapper">
            <div class="row">
                <div class="col">
                    <p class="h5 form-label">Startdatum</p>
<!--                    <input type="text" class="form-control mb-2 datepicker" id="start" name="start" autocomplete="off" placeholder="Bitte auswählen" data-date="--><!--" required>-->
                    <?= $this->Form->control('start', [
                        'class' => 'form-control mb-2 datepicker',
                        'id' => 'start',
                        'autocomplete' => 'off',
                        'placeholder' => 'Bitte auswählen',
                        'type' => 'text',
                        'data-date' => $tournament->start,
                        'label' => false
                    ]) ?>
                    <p class="h5 form-label">Enddatum</p>
<!--                    <input type="text" class="form-control mb-2 datepicker" id="end" name="end" autocomplete="off" placeholder="Bitte auswählen" data-date="--><!--" required>-->
                    <?= $this->Form->control('end', [
                        'class' => 'form-control mb-2 datepicker',
                        'id' => 'end',
                        'autocomplete' => 'off',
                        'placeholder' => 'Bitte auswählen',
                        'type' => 'text',
                        'data-date' => $tournament->end,
                        'label' => false
                    ]) ?>
                    <p class="h5 form-label">Nennfrist</p>
<!--                    <input type="text" class="form-control mb-2 datepicker" id="deadline" name="deadline" autocomplete="off" placeholder="Bitte auswählen" data-date="--><!--" required>-->
                    <?= $this->Form->control('deadline', [
                        'class' => 'form-control mb-2 datepicker',
                        'id' => 'deadline',
                        'autocomplete' => 'off',
                        'placeholder' => 'Bitte auswählen',
                        'type' => 'text',
                        'data-date' => $tournament->deadline,
                        'label' => false
                    ]) ?>
                </div>
                <div class="col">
                    <p class="h5 form-label">Veranstalter</p>
                    <select class="form-control mb-2" name="host_id" id="tour-host-input">
                        <?php foreach($hosts as $key => $host): ?>
                            <option value="<?= $host->id ?>" <?= ($host->id == $tournament->host_id)?'selected':'' ?> ><?= $host->name ?></option>
                        <?php endforeach; ?>
                    </select>
                    <p class="h5 form-label">Ausschreibung<br /> <small style="font-size: 0.7em">(Datei auswählen oder hochladen)</small>
                        <select class="form-control mb-2" name="file_id" id="tour-file-input">
                            <option value="keine" selected>keine</option>
                            <?php foreach($files as $key => $file): ?>
                                <option value="<?= $file->id ?>" <?= ($file->id == $tournament->file_id)?'selected':'' ?> ><?= $file->name ?></option>
                            <?php endforeach; ?>
                        </select>
                        <button type="button" id="tour-file-upload" class="btn btn-lg btn-primary" data-toggle="modal" data-target="#fileModal"><i class="fas fa-upload"></i></button>
                </div>
                <div class="col">
                    <p class="h5 form-label">URL-Zeiteinteilung</p>
                    <?= $this->Form->control('info_url', [
                        'class' => 'form-control mb-2',
                        'autocomplete' => 'off',
                        'placeholder' => 'beginnend mit http:// bzw. https://',
                        'value' => $tournament->info_url,
                        'label' => false,
                        'required' => false
                    ]) ?>
                    <p class="h5 form-label">URL-Ergebnisse</p>
                    <?= $this->Form->control('results_url', [
                        'class' => 'form-control mb-2',
                        'autocomplete' => 'off',
                        'placeholder' => 'beginnend mit http:// bzw. https://',
                        'value' => $tournament->results_url,
                        'label' => false,
                        'required' => false
                    ]) ?>
                    <div class="form-check mx-2">
                        <input class="form-check-input" type="checkbox" value="Springen" id="defaultCheck1" name="disciplines[]" <?= (strpos($tournament->disciplines, 'Springen') !== false)?'checked':'' ?> >
                        <label class="form-check-label" for="defaultCheck1">
                            Springen
                        </label>
                    </div>
                    <div class="form-check mx-2">
                        <input class="form-check-input" type="checkbox" value="Dressur" id="defaultCheck2" name="disciplines[]" <?= (strpos($tournament->disciplines, 'Dressur') !== false)?'checked':'' ?>>
                        <label class="form-check-label" for="defaultCheck2">
                            Dressur
                        </label>
                    </div>
                    <div class="form-check mx-2">
                        <input class="form-check-input" type="checkbox" value="Vielseitigkeit" id="defaultCheck3" name="disciplines[]" <?= (strpos($tournament->disciplines, 'Vielseitigkeit') !== false)?'checked':'' ?>>
                        <label class="form-check-label" for="defaultCheck3">
                            Vielseitigkeit
                        </label>
                    </div>
                    <div class="form-check mx-2">
                        <input class="form-check-input" type="checkbox" value="Halle" id="defaultCheck4" name="indoor" <?= (strpos($tournament->disciplines, 'Halle') !== false)?'checked':'' ?>>
                        <label class="form-check-label" for="defaultCheck4">
                            Halle
                        </label>
                    </div>
                </div>
            </div>
            <hr />
            <a class="btn btn-lg btn-danger" href="/admin/tournaments">Zurück</a>
            <input type="submit" class="btn btn-lg btn-primary submit" value="Speichern">
        </div>
        <?= $this->Form->end() ?>
    </div>
</div>


<!-- Modal -->
<div class="modal fade" id="fileModal" tabindex="-1" role="dialog" aria-labelledby="fileModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <?= $this->Form->create($files, [
            'class' => 'form',
            'id' => 'fileUploadForm',
            'name' => 'uploadformular',
            'type' => 'file',
            'url' => [
                'controller' => 'Files',
                'action' => 'uploadFile'
            ]
        ]) ?>
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="fileModalLabel">PDF Datei hochladen</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col">
                            <input type="file" id="file-input" name="uploadFile">
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" id="close-modal" class="btn btn-secondary" data-dismiss="modal">Abbrechen</button>
                <button type="submit" id="form-submit" class="btn btn-primary">Speichern</button>
            </div>
        </div>
        <?= $this->Form->end() ?>
    </div>
</div>

<script>
    $(function () {
        var start = $('#start').data('date').split("/");
        var end = $('#end').data('date').split("/");
        var deadline = $('#deadline').data('date').split("/");


        if(start.length == 3){
            var sday, smonth, syear;
            if(start[0].length == 1){
                smonth="0"+start[0];
            } else{
                smonth=start[0];
            }
            if(start[1].length == 1){
                sday="0"+start[1];
            } else{
                sday=start[1];
            }
            syear = "20"+start[2];
            start = sday+"."+smonth+"."+syear;
            $('#start').datepicker("setDate", start);
        }

        if(end.length == 3){
            var eday, emonth, eyear;
            if(end[0].length == 1){
                emonth="0"+end[0];
            } else{
                emonth=end[0];
            }
            if(end[1].length == 1){
                eday="0"+end[1];
            } else{
                eday=end[1];
            }
            eyear = "20"+end[2];
            end = eday+"."+emonth+"."+eyear;
            $('#end').datepicker("setDate", end);
        }

        if(deadline.length == 3){
            var dday, dmonth, dyear;
            if(deadline[0].length == 1){
                dmonth="0"+deadline[0];
            } else{
                dmonth=deadline[0];
            }
            if(deadline[1].length == 1){
                dday="0"+deadline[1];
            } else{
                dday=deadline[1];
            }
            dyear = "20"+deadline[2];
            deadline = dday+"."+dmonth+"."+dyear;
            console.log(deadline);
            $('#deadline').datepicker("setDate", deadline);
        }


        $('#fileUploadForm').on('submit', function(event){
            event.preventDefault();
            $.ajax({
                url: '/admin/files/uploadFile',
                type: 'post',
                data: new FormData(this),
                contentType: false,
                cache: false,
                processData: false,
                success: function (data)
                {
                    $('#close-modal').click();
                    var result = JSON.parse(data);
                    console.log(result);
                    $('#tour-file-input').html(
                        '<option value="' + result['id'] + '" selected>' + result['name'] + '</option>'
                    );
                }
            });
        });
    });
</script>
