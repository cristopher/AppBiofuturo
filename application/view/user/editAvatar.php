<section>
    <header class="multicolor text-white">
        <div class="container">
            <h1>Modificar avatar</h1>
        </div>
    </header>
    <main class="multicolor minimo">
        <div class="container">
            <?php $this->renderFeedbackMessages(); ?>
            <div class="d-flex justify-content-center">
                <div class="card shadow">
                    <div class="card-body">
                        <h5 class="card-title">Subir nuevo avatar</h5>
                        <form action="<?php echo Config::get('URL'); ?>user/uploadAvatar_action" method="post" enctype="multipart/form-data">
                            <div class="form-group">
                                <label for="exampleFormControlFile1">Elija una imágen jpg (Max. 5MB):</label>
                                <input type="file" class="form-control-file" name="avatar_file" required >
                                <!-- max size 5 MB (as many people directly upload high res pictures from their digital cameras) -->
                                <input type="hidden" name="MAX_FILE_SIZE" value="5000000" />
                                <button type="submit" class="btn btn-primary shadow-lg">Subir imagen</button>
                            </div>
                        </form>
                        <h5 class="card-title">Eliminar avatar</h5>
                        <a href="<?php echo Config::get('URL'); ?>user/deleteAvatar_action" class="btn btn-primary  shadow-lg">Eliminar actual avatar</a>
                    </div>
                </div>
            </div>
        </div>
    </main>
</section>