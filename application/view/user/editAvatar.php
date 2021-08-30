<header class="pb-4 sticky-top">
    <div class="container">
        <div class="d-flex justify-content-start align-items-center">
            <a class="h1 mr-2" href="<?= Config::get('URL'); ?>user"><svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-arrow-left-square" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M14 1H2a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z"/><path fill-rule="evenodd" d="M12 8a.5.5 0 0 1-.5.5H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H11.5a.5.5 0 0 1 .5.5z"/></svg></a>
            <h1 class="mb-0">Modificar avatar</h1>
        </div>
    </div>
</header>
<main class="py-4 minimo">
    <div class="container">
        <?php $this->renderFeedbackMessages(); ?>
        <div class="d-flex justify-content-center">
            <div class="card shadow">
                <div class="card-body">
                    <h5 class="card-title">Subir nuevo avatar</h5>
                    <form action="<?= Config::get('URL'); ?>user/uploadAvatar_action" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="exampleFormControlFile1" class="mb-4">Elija una imágen jpg (Max. 5MB):</label>
                            <input type="file" class="form-control-file" name="avatar_file" required >
                            <!-- max size 5 MB (as many people directly upload high res pictures from their digital cameras) -->
                            <input type="hidden" name="MAX_FILE_SIZE" value="5000000" />
                            <button type="submit" class="btn my-4 mx-auto d-block">Subir imagen</button>
                        </div>
                    </form>
                    <hr>
                    <h5 class="card-title">Eliminar avatar</h5>
                    <a href="<?= Config::get('URL'); ?>user/deleteAvatar_action" class="btn my-4 mx-auto d-block">Eliminar actual avatar</a>
                </div>
            </div>
        </div>
    </div>
</main>