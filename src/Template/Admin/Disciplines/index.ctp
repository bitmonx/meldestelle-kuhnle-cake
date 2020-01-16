<div class="row">
    <div class="col-md-8 mx-auto">
        <h1 class="page-title"><?= 'Disziplinen' ?></h1>
        <?= $this->Form->create($disciplines, [
            'action' => '/add',
            'class' => 'form',
            'id' => 'add-form'
        ]) ?>
            <div class="input-group mb-3">
                <input type="text" name="name" class="form-control" placeholder="Neue Disziplin" aria-label="Neue Disziplin" aria-describedby="newDis">
                <div class="input-group-append">
                    <button class="btn btn-outline-secondary" type="submit" id="newDis"><i class="fas fa-plus"></i></button>
                </div>
            </div>
        <?= $this->Form->end() ?>
        <table class="table table-striped table-light" cellpadding="0" cellspacing="0">
            <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id', 'ID') ?></th>
                <th scope="col"><?= $this->Paginator->sort('name') ?></th>
                <th scope="col" class="actions"><?= __('Aktionen') ?></th>
            </tr>
            </thead>
            <tbody>
                <?php foreach ($disciplines as $discipline): ?>
                    <tr>
                        <th scope="row"><?= $this->Number->format($discipline->id) ?></th>
                        <td><?= $discipline->name ?></td>
                        <td class="actions">
                            <a class="btn btn-sm btn-danger" href="/admin/disciplines/delete/<?= $discipline->id ?>"><i class="fas fa-trash"></i></a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <nav aria-label="paginator">
            <ul class="pagination">
                <?= $this->Paginator->first('<< ' . __('Anfang')) ?>
                <?= $this->Paginator->prev('< ' . __('zurück')) ?>
                <?= $this->Paginator->numbers() ?>
                <?= $this->Paginator->next(__('weiter') . ' >') ?>
                <?= $this->Paginator->last(__('Ende') . ' >>') ?>
            </ul>
            <p><?= $this->Paginator->counter(['format' => __('Seite {{page}} von {{pages}}, zeigt {{current}} Einträge von insgesamt {{count}}')]) ?></p>
        </nav>
    </div>
</div>

<script>
    $(function () {
        // $('#edit-form').on('submit', function(event){
        //     event.preventDefault();
        //     console.log(event.target);
        //     $.ajax({
        //         url: '/admin/disciplines/edit/',
        //         type: 'post',
        //         data: new FormData(this),
        //         contentType: false,
        //         cache: false,
        //         processData: false,
        //         success: function (data) {
        //             console.log('Test');
        //         }
        //     });
        // });
    });
</script>
