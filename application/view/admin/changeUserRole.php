<section>
    <header class="py-4 wetrust">
        <div class="container">
            <h1>Tipo de cuenta</h1>
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
                        <form action="<?php echo Config::get('URL'); ?>admin/changeUserRole_action" method="post">
                            <div class="form-group">
                                <label>Seleccionar nivel:</label>
                                <select class="form-control" name="user_account" required>
                                <?php foreach ($this->roles as $key => $value) { ?>
                                    <option value="<?= $value; ?>" <?= ($this->user->user_account_type == $value) ? 'selected': ''?>><?= $key; ?></option>
                                <?php } ?>
                                </select>
                                <input type="hidden" name="user_id" value="<?= $this->user->user_id; ?>" >
                            </div>
                            <button type="submit" class="btn btn-outline-danger my-4 shadow-lg mx-auto d-block">Guardar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </main>
</section>