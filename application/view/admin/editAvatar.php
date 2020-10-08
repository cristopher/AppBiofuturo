<section>
    <header class="py-4 wetrust">
        <div class="container">
            <h1>Modificar avatar</h1>
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
                        <h5 class="card-title">Subir nuevo avatar</h5>
                        <form action="<?php echo Config::get('URL'); ?>admin/uploadAvatar_action" method="post" enctype="multipart/form-data">
                            <div class="form-group">
                                <label for="exampleFormControlFile1" class="mb-4">Elija una imágen jpg (Max. 5MB):</label>
                                <input type="file" class="form-control-file" name="avatar_file" required >
                                <!-- max size 5 MB (as many people directly upload high res pictures from their digital cameras) -->
                                <input type="hidden" name="MAX_FILE_SIZE" value="5000000" />
                                <input type="hidden" name="user_id" value="<?= $this->user->user_id; ?>" >
                                <button type="submit" class="btn btn-outline-danger my-4 shadow-lg mx-auto d-block">Subir imagen</button>
                            </div>
                        </form>
                        <hr>
                        <h5 class="card-title">Eliminar avatar</h5>
                        <a href="<?php echo Config::get('URL'); ?>admin/deleteAvatar_action/<?= $this->user->user_id; ?>" class="btn btn-outline-danger my-4 shadow-lg mx-auto d-block">Eliminar actual avatar</a>
                    </div>
                </div>
            </div>
        </div>
    </main>
</section>