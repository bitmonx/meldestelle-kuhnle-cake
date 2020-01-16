<div class="row">
    <div class="col-8 mx-auto">
        <h1 class="page-title"><?= 'Benutzer' ?></h1>
        <a class="btn btn-primary ml-5 mb-3" href="/admin/users/add">Hinzufügen</a>
        <table class="table table-striped table-light" cellpadding="0" cellspacing="0">
            <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id', 'ID') ?></th>
                <th scope="col"><?= $this->Paginator->sort('username') ?></th>
                <th scope="col"><?= $this->Paginator->sort('name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('userrole', 'Benutzerrolle') ?></th>
                <th scope="col" class="actions"><?= __('Aktionen') ?></th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($users as $user): ?>
                <tr>
                    <th scope="row"><?= $this->Number->format($user->id) ?></th>
                    <td><?= h($user->username) ?></td>
                    <td><?= h($user->name) ?></td>
                    <td><?= $userroles[$user->userrole_id] ?></td>
                    <td class="actions">
                        <div class="btn-group">
                            <a href="/admin/users/view/<?= $user->id ?>" class="btn btn-sm btn-primary"><i class="far fa-eye"></i></a>
                            <a href="/admin/users/edit/<?= $user->id ?>" class="btn btn-sm btn-primary"><i class="fas fa-edit"></i></a>
                            <a href="/admin/users/delete/<?= $user->id ?>" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></a>
                        </div>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
        <nav aria-label="page navigation">
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
