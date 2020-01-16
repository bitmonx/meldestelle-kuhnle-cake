<?= $this->Form->create() ?>
    <div class="row mb-4" style="background-color: #68aaa6">
      <div class="col offset-1">
        <h1 style="color: #fff">Login</h1>
      </div>
    </div>
    <div class="row">
        <div class="col">
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1"><i class="fas fa-user"></i></span>
                </div>
                <input type="text" name="username" class="form-control" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1">
            </div>

            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon2"><i class="fas fa-key"></i></span>
                </div>
                <input type="password" name="password" placeholder="Passwort" class="form-control" aria-label="Password" aria-describedby="basic-addon2">
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <?= $this->Form->button('Login', [
                'class' => 'btn btn-primary'
            ]) ?>
        </div>
    </div>
<?= $this->Form->end() ?>
