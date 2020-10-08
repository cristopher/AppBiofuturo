<section>
    <header class="py-4 wetrust">
        <div class="container">
            <h1>Cambiar nombre de usuario</h1>
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
                        <form action="<?php echo Config::get('URL'); ?>admin/editUserName_action" method="post">
                            <div class="form-group">
                                <label>Nuevo nombre de usuario:</label>
                                <input type="text" class="form-control" name="user_name" pattern="[a-zA-Z á-úÁ-ÚüÜ]{2,64}" placeholder="Escriba un nombre" value="<?= $this->user->user_name; ?>" required>
                            </div>
                            <!-- set CSRF token at the end of the form -->
                            <input type="hidden" name="csrf_token" value="<?= Csrf::makeToken(); ?>" />
                            <input type="hidden" name="user_id" value="<?= $this->user->user_id; ?>" >
                            <button type="submit" class="btn btn-outline-danger my-4 shadow-lg mx-auto d-block">Guardar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </main>
</section>