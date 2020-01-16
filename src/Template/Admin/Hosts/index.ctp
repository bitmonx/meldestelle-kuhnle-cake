<div class="row">
    <div class="col-md-8 mx-auto">
        <h1 class="page-title"><?= 'Veranstalter' ?></h1>
        <a class="btn btn-primary ml-5 mb-3" href="/admin/hosts/add">Hinzufügen</a>
        <table class="table table-striped table-light" cellpadding="0" cellspacing="0">
            <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id', 'ID') ?></th>
                <th scope="col"><?= $this->Paginator->sort('name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('website_url', 'Webseite') ?></th>
                <th scope="col" class="actions"><?= __('Aktionen') ?></th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($hosts as $host): ?>
                <tr>
                    <th scope="row"><?= $this->Number->format($host->id) ?></th>
                    <td><?= h($host->name) ?></td>
                    <td><a href="<?= h($host->website_url) ?>"><?= h($host->website_url) ?></a></td>
                    <td class="actions">
                        <a href="/admin/hosts/view/<?= $host->id ?>" class="btn btn-sm btn-primary"><i class="far fa-eye"></i></a>
                        <a href="/admin/hosts/edit/<?= $host->id ?>" class="btn btn-sm btn-primary"><i class="fas fa-edit"></i></a>
                        <a href="/admin/hosts/delete/<?= $host->id ?>" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></a>
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
