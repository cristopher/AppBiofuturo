<header class="pb-4 sticky-top">
    <div class="container">
        <div class="d-flex justify-content-start align-items-center">
            <a class="h1 mr-2" href="<?= Config::get('URL'); ?>admin/usuarios"><svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-arrow-left-square" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M14 1H2a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z"/><path fill-rule="evenodd" d="M12 8a.5.5 0 0 1-.5.5H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H11.5a.5.5 0 0 1 .5.5z"/></svg></a>
            <h1 class="mb-0">Cambiar tipo de cuenta</h1>
        </div>
    </div>
</header>
<main class="py-4 minimo">
    <div class="container">
        <?php $this->renderFeedbackMessages(); ?>
        <dl class="row">
            <dt class="col-sm-3">Nombre de usuario:</dt>
            <dd class="col-sm-9"><?= $this->user->user_name; ?></dd>
            <dt class="col-sm-3">Tipo de cuenta:</dt>
            <dd class="col-sm-9"><?= $this->user->user_account_type; ?></dd>
        </dl>
        <div class="d-flex justify-content-center">
            <div class="card shadow">
                <div class="card-body">
                    <form action="<?= Config::get('URL'); ?>admin/changeUserRole_action" method="post">
                        <div class="form-group">
                            <label>Seleccionar nivel:</label>
                            <select class="form-control" name="user_account" required>
                            <?php foreach ($this->roles as $key => $value) { ?>
                                <option value="<?= $value; ?>" <?= ($this->user->user_account_type == $value) ? 'selected': ''?>><?= $key; ?></option>
                            <?php } ?>
                            </select>
                            <input type="hidden" name="user_id" value="<?= $this->user->user_id; ?>" >
                        </div>
                        <button type="submit" class="btn my-4 mx-auto d-block">Guardar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</main>