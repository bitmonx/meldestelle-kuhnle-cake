<div class="row">
    <div class="col-md-8 mx-auto">
        <?= $this->Form->create($tournament, [
            'class' => 'form'
        ]) ?>
        <h1 class="page-title">Turniere</h1>
        <h3 class="page-subtitle">Ein neues Turnier hinzufügen</h3>
        <div class="wrapper">
            <div class="row">
                <div class="col">
                    <input class="form-check-input" type="checkbox" value="oneday" id="oneday" name="oneday" style="margin-left: 20px">
                    <label class="form-check-label" for="defaultCheck1" style="margin-left: 40px">
                        Eintägig
                    </label>
                    <p class="h5 form-label" id="startdatelabel">Startdatum</p>
<!--                    <input type="text" class="form-control mb-2 datepicker" name="start" autocomplete="off" placeholder="Bitte auswählen" required>-->
                    <?= $this->Form->control('start', [
                        'class' => 'form-control mb-2 datepicker',
                        'id' => 'startdate',
                        'autocomplete' => 'off',
                        'placeholder' => 'Bitte auswählen',
                        'type' => 'text',
                        'label' => false
                    ]) ?>
                    <p class="h5 form-label" id="enddatelabel">Enddatum</p>
<!--                    <input type="text" class="form-control mb-2 datepicker" name="end" autocomplete="off" placeholder="Bitte auswählen" required>-->
                    <?= $this->Form->control('end', [
                        'class' => 'form-control mb-2 datepicker',
                        'id' => 'enddate',
                        'autocomplete' => 'off',
                        'placeholder' => 'Bitte auswählen',
                        'type' => 'text',
                        'label' => false,
                        'required' => false
                    ]) ?>
                    <p class="h5 form-label">Nennschluss</p>
<!--                    <input type="text" class="form-control mb-2 datepicker" name="deadline" autocomplete="off" placeholder="Bitte auswählen" required>-->
                    <?= $this->Form->control('deadline', [
                        'class' => 'form-control mb-2 datepicker',
                        'autocomplete' => 'off',
                        'placeholder' => 'Bitte auswählen',
                        'type' => 'text',
                        'label' => false
                    ]) ?>
                </div>
                <div class="col">
                    <p class="h5 form-label">Veranstalter</p>
                    <select class="form-control mb-2" name="host_id" id="tour-host-input">
                        <?php foreach($hosts as $key => $host): ?>
                            <option value="<?= $host->id ?>" ><?= $host->name ?></option>
                        <?php endforeach; ?>
                    </select>
                    <p class="h5 form-label">Ausschreibung<br /> <small style="font-size: 0.7em">(Datei auswählen oder hochladen)</small>
                    <select class="form-control mb-2" name="file_id" id="tour-file-input">
                            <option value="keine" selected>keine</option>
                        <?php foreach($files as $key => $file): ?>
                            <option value="<?= $file->id ?>" ><?= $file->name ?></option>
                        <?php endforeach; ?>
                    </select>
                    <button type="button" id="tour-file-upload" class="btn btn-lg btn-primary" data-toggle="modal" data-target="#fileModal"><i class="fas fa-upload"></i></button>
                </div>
                <div class="col">
                    <p class="h5 form-label">URL-Zeiteinteilung</p>
<!--                    <input name="info_url" type="text" class="form-control mb-2" autocomplete="off" placeholder="beginnend mit http:// bzw. https://" required>-->
                    <?= $this->Form->control('info_url', [
                        'class' => 'form-control mb-2',
                        'autocomplete' => 'off',
                        'placeholder' => 'beginnend mit http:// bzw. https://',
                        'label' => false,
                        'required' => false
                    ]) ?>
                    <p class="h5 form-label">URL-Ergebnisse</p>
<!--                    <input name="results_url" type="text" class="form-control mb-2" autocomplete="off" placeholder="beginnend mit http:// bzw. https://" required>-->
                    <?= $this->Form->control('results_url', [
                        'class' => 'form-control mb-2',
                        'autocomplete' => 'off',
                        'placeholder' => 'beginnend mit http:// bzw. https://',
                        'label' => false,
                        'required' => false
                    ]) ?>
                    <div class="form-check mx-2">
                        <input class="form-check-input" type="checkbox" value="Springen" id="defaultCheck1" name="disciplines[]">
                        <label class="form-check-label" for="defaultCheck1">
                            Springen
                        </label>
                    </div>
                    <div class="form-check mx-2">
                        <input class="form-check-input" type="checkbox" value="Dressur" id="defaultCheck2" name="disciplines[]">
                        <label class="form-check-label" for="defaultCheck2">
                            Dressur
                        </label>
                    </div>
                    <div class="form-check mx-2">
                        <input class="form-check-input" type="checkbox" value="Vielseitigkeit" id="defaultCheck3" name="disciplines[]">
                        <label class="form-check-label" for="defaultCheck3">
                            Vielseitigkeit
                        </label>
                    </div>
                    <div class="form-check mx-2">
                        <input class="form-check-input" type="checkbox" value="Halle" id="defaultCheck4" name="indoor">
                        <label class="form-check-label" for="defaultCheck4">
                            Halle
                        </label>
                    </div>
                </div>
            </div>
            <hr />
            <a class="btn btn-lg btn-danger" href="/admin/tournaments">Abbrechen</a>
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
                                <input type="file" id="file-input" name="uploadFile" accept="application/pdf">
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
        $('#oneday').on('change', function (event) {
            var checked = $(this).prop('checked');
            if(checked) {
                $('#enddate').hide();
                $('#enddatelabel').hide();
                $('#startdatelabel').text('Datum');
            } else {
                $('#enddate').show();
                $('#enddatelabel').show();
                $('#startdatelabel').text('Startdatum');
            }
        });

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
