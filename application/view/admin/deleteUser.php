<section>
    <header class="py-4 wetrust">
        <div class="container">
            <h1>Eliminar a <?= $this->user->user_name; ?></h1>
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
                        <h5 class="card-title">Eliminar cuenta de usuario</h5>
                        <form action="<?php echo Config::get('URL'); ?>admin/delete_action" method="post" enctype="multipart/form-data">
                            <div class="form-group">
                                <input type="hidden" name="user_id" value="<?= $this->user->user_id; ?>" >
                                <input type="hidden" name="csrf_token" value="<?= Csrf::makeToken(); ?>" />
                                <button type="submit" class="btn btn-outline-danger my-4 shadow-lg mx-auto d-block">Eliminar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </main>
</section>