<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */
?>

<?php //TODO: Formular zum hinzufügen ?>

<nav class="large-2 medium-3 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li><?= $this->Html->link(__('Zurück zur Übersicht'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="users form large-10 medium-9 columns content">
    <h3>Benutzer bearbeiten</h3>
    <?= $this->Form->create($user, [
        'class' => 'form'
    ]) ?>
    <div class="wrapper-input pt-5">
        <div class="row">
            <div class="form-group w-100">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="users-username-input-addon">Username</span>
                    </div>
                    <input type="text" name="username" class="form-control" id="users-username-input" aria-label="Users's username" aria-describedby="users-username-input-addon">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="form-group w-100">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="users-name-input-addon">Name</span>
                    </div>
                    <input type="text" name="name" class="form-control" id="users-name-input" aria-label="User's name" aria-describedby="users-name-input-addon">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="form-group w-100">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="users-password-input-addon">Password</span>
                    </div>
                    <input type="password" name="password" class="form-control" id="users-password-input" aria-label="User's password" aria-describedby="users-password-input-addon">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="form-group w-100">
                <div class="input-group">
                    <label for="users-userrole-input">Benutzerrolle</label>
                    <select name="userrole_id" id="users-userrole-input">
                        <?php foreach($userroles as $key => $role): ?>
                            <option value="<?= $role->id ?>" ><?= $role->role ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>
        </div>
        <div class="row">
            <?= $this->Form->button(__('Speichern', [
                'class' => 'btn btn-primary'
            ])) ?>
        </div>
    </div>
    <?= $this->Form->end() ?>
</div>
