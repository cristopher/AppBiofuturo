<section>
    <header class="py-4 wetrust">
        <div class="container">
            <h1>Cambiar E-Mail de <?= $this->user->user_name; ?></h1>
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
                        <form action="<?php echo Config::get('URL'); ?>admin/editUserEmail_action" method="post">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Nuevo E-Mail:</label>
                                <input type="email" class="form-control" name="user_email" aria-describedby="emailHelp" placeholder="email" value="<?= $this->user->user_email; ?>" required>
                                <small id="emailHelp" class="form-text text-muted">Nunca compartimos su E-Mail.</small>
                            </div>
                            <input type="hidden" name="user_id" value="<?= $this->user->user_id; ?>" >
                            <button type="submit" class="btn btn-outline-danger my-4 shadow-lg mx-auto d-block">Guardar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </main>
</section>