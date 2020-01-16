<div class="row">
    <div class="col-md-8 mx-auto">
        <?= $this->Form->create($user, [
            'class' => 'form'
        ]) ?>
        <h1 class="page-title">Benutzerdaten</h1>
        <h3 class="page-subtitle">Persönliche Daten bearbeiten</h3>
        <div class="wrapper">
            <div class="row">
                <?= $this->Form->hidden('userrole_id') ?>
                <div class="col">
                    <div class="form-row my-3">
                        <div class="col">
                            Name
                            <?= $this->Form->control('name', [
                                'class' => 'form-control',
                                'maxlength' => 50,
                                'size' => '100%',
                                'label' => false
                            ]) ?>
                        </div>
                    </div>
                    <div class="form-row my-3">
                        <div class="col">
                            Benutzername
                            <?= $this->Form->control('username', [
                                'class' => 'form-control',
                                'maxlength' => 50,
                                'size' => 50,
                                'label' => false
                            ]) ?>
                        </div>
                        <div class="col">
                            E-Mail
                            <?= $this->Form->control('email', [
                                'class' => 'form-control',
                                'maxlength' => 50,
                                'size' => 50,
                                'label' => false
                            ]) ?>
                        </div>
                    </div>
                    <div class="form-row my-3">
                        <div class="col">
                            Straße
                            <?= $this->Form->control('street', [
                                'class' => 'form-control',
                                'label' => false
                            ]) ?>
                        </div>
                        <div class="col">
                            Hausnummer
                            <?= $this->Form->control('house_number', [
                                'class' => 'form-control',
                                'type' => 'text',
                                'maxlength' => 3,
                                'label' => false
                            ]) ?>
                        </div>
                    </div>
                    <div class="form-row my-3">
                        <div class="col">
                            PLZ
                            <?= $this->Form->control('plz', [
                                'class' => 'form-control',
                                'type' => 'text',
                                'maxlength' => 5,
                                'label' => false
                            ]) ?>
                        </div>
                        <div class="col">
                            Stadt
                            <?= $this->Form->control('city', [
                                'class' => 'form-control',
                                'maxlength' => 50,
                                'size' => 50,
                                'label' => false
                            ]) ?>
                        </div>
                    </div>
                    <div class="form-row my-3">
                        <div class="col">
                            Vorwahl
                            <?= $this->Form->control('prefix', [
                                'class' => 'form-control',
                                'maxlength' => 5,
                                'size' => 6,
                                'label' => false
                            ]) ?>
                        </div>
                        <div class="col">
                            Telefonnummer
                            <?= $this->Form->control('mobile', [
                                'class' => 'form-control',
                                'maxlength' => 50,
                                'size' => 50,
                                'label' => false
                            ]) ?>
                        </div>
                    </div>
                    <div class="form-row my-3">
                        Neues Passwort
                        <?= $this->Form->password('newPassword', [
                            'class' => 'form-control',
                            'label' => false,
                            'size' => '100%',
                            'required' => false,
                        ]) ?>
                    </div>
                    <div class="form-row my-3">
                        Passwort wiederholen
                        <?= $this->Form->password('passwordCheck', [
                            'class' => 'form-control',
                            'label' => false,
                            'size' => '100%',
                            'required' => false
                        ]) ?>
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
