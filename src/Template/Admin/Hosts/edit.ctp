<div class="row">
    <div class="col-md-5 mx-auto">
        <?= $this->Form->create($host, [
            'class' => 'form'
        ]) ?>
        <h1 class="page-title">Veranstalter</h1>
        <h3 class="page-subtitle">Vorhandenen Veranstalter bearbeiten</h3>
        <div class="wrapper">
            <div class="d-flex flex-column justify-content-end" id="host-image" style="background-image: url('/img/hosts/<?= $host->file->name ?>')">
                <button type="button" class="btn btn-sm btn-primary text-white" id="image-chooser" data-toggle="modal" data-target="#imageModal"><i class="fas fa-edit"></i></button>
                <input id="hostImageId" type="hidden" name="logo_id" value="<?= $host->file->id ?>">
            </div>
            <p class="h5 form-label">Name</p>
            <?= $this->Form->control('name', [
                'class' => 'form-control mb-2',
                'autocomplete' => 'off',
                'value' => $host->name,
                'required',
                'label' => false
            ]) ?>
            <p class="h5 form-label">Webseite</p>
            <?= $this->Form->control('website_url', [
                'class' => 'form-control mb-2',
                'autocomplete' => 'off',
                'value' => $host->website_url,
                'required',
                'label' => false
            ]) ?>
            <hr />
            <a class="btn btn-lg btn-danger" href="/admin/hosts">Abbrechen</a>
            <input type="submit" class="btn btn-lg btn-primary submit" value="Speichern">
        </div>
        <?= $this->Form->end() ?>
    </div>
</div>


<!-- Modal -->
<div class="modal fade bd-example-modal-xl" id="imageModal" tabindex="-1" role="dialog" aria-labelledby="imageModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <?= $this->Form->create($images, [
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
                <h5 class="modal-title" id="imageModalLabel">Bild auswählen</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col">
                            <?php foreach($images as $key => $image): ?>
                                <?= $this->Html->image('hosts/' . $image->name, [
                                    'class' => 'host-image',
                                    'data-id' => $image->id
                                ]) ?>
                            <?php endforeach; ?>
                        </div>
                    </div>
                    <div class="row mt-5">
                        <div class="col">
                            <hr />
                            <p class="h5">oder ein neues Bild hochladen</p>
                            <input type="file" id="file-input" name="uploadFile" accept="image/*">
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" id="close-modal" class="btn btn-secondary" data-dismiss="modal">Abbrechen</button>
                <button type="submit" id="form-submit" class="btn btn-primary">Hochladen</button>
            </div>
        </div>
        <?= $this->Form->end() ?>
    </div>
</div>

<script>
    $(function () {
        $('.host-image').on('click', function (event) {
            var target = $(event.target);
            var src = target.attr('src');
            var id = target.data('id');
            $('#hostImageId').attr('value', id);
            $('#host-image').css('background-image', 'url(\'' + src + '\')');
            $('#close-modal').click();
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
                success: function (data) {
                    var result = JSON.parse(data);
                    console.log(result);
                    $('#hostImageId').attr('value', result['id']);
                    $('#host-image').css('background-image', 'url(\'/img/hosts/' + result["name"] + '\')');
                    $('#close-modal').click();
                }
            });
        });
    });
</script>
