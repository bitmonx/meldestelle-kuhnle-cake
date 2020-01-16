<div class="row">
    <div class="col-md-8 mx-auto">
        <h1 class="page-title"><?= 'Turniere' ?></h1>
        <a class="btn btn-primary ml-5 mb-3" href="/admin/tournaments/add">Hinzufügen</a>
        <table class="table table-striped table-light" cellpadding="0" cellspacing="0">
            <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id', 'ID') ?></th>
                <th scope="col"><?= $this->Paginator->sort('start', 'Start') ?></th>
                <th scope="col"><?= $this->Paginator->sort('end', 'Ende') ?></th>
                <th scope="col"><?= $this->Paginator->sort('deadline', 'Nennschluss') ?></th>
                <th scope="col"><?= $this->Paginator->sort('host', 'Veranstalter') ?></th>
                <th scope="col" class="actions"><?= __('Aktionen') ?></th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($tournaments as $tournament): ?>
                <tr>
                    <th scope="row"><?= $this->Number->format($tournament->id) ?></th>
                    <td><?= (isset($tournament->start) AND !empty($tournament->start))?$tournament->start->i18nFormat('dd.MM.yyyy'):'' ?></td>
                    <td><?= (isset($tournament->end) AND !empty($tournament->end))?$tournament->end->i18nFormat('dd.MM.yyyy'):'' ?></td>
                    <td><?= (isset($tournament->deadline) AND !empty($tournament->deadline))?$tournament->deadline->i18nFormat('dd.MM.yyyy'):'' ?></td>
                    <td><?= h($tournament->host->name) ?></td>
                    <td class="actions">
                        <a href="/admin/tournaments/view/<?= $tournament->id ?>" class="btn btn-sm btn-primary"><i class="far fa-eye"></i></a>
                        <a href="/admin/tournaments/edit/<?= $tournament->id ?>" class="btn btn-sm btn-primary"><i class="fas fa-edit"></i></a>
                        <a href="/admin/tournaments/delete/<?= $tournament->id ?>" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></a>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
        <nav aria-label="Page navigation">
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
