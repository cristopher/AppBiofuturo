<header class="py-4 wetrust">
    <div class="container">
        <div class="d-flex justify-content-start align-items-center">
            <a class="h1 mr-2" href="<?= Config::get('URL'); ?>trampa/admin"><svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-arrow-left-square" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M14 1H2a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z"/><path fill-rule="evenodd" d="M12 8a.5.5 0 0 1-.5.5H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H11.5a.5.5 0 0 1 .5.5z"/></svg></a>
            <h1 class="mb-0 d-none d-lg-block mr-auto">Modificar trampa Admin</h1>
            <h4 class="mb-0 d-lg-none mr-auto">Modificar trampa Admin</h4>
        </div>
    </div>
</header>
<main class="minimo">
    <div class="container py-3">
        <?php $this->renderFeedbackMessages(); ?>
        <div class="card shadow mb-3">
            <div class="card-body">
                <?php if ($this->trampa) { ?>
                <form method="post" action="<?= Config::get('URL'); ?>trampa/editSaveAdmin">
                    <!-- we use htmlentities() here to prevent user input with " etc. break the HTML -->
                    <input type="hidden" name="trampa_id" value="<?= htmlentities($this->trampa->trampa_id); ?>" />
                    <div class="form-group">
                        <label>Cambiar texto de trampa:</label>
                        <input type="text" class="form-control" name="trampa_text" value="<?= htmlentities($this->trampa->trampa_text); ?>"  autocomplete="off">
                    </div>
                    <div class="form-group form-check">
                        <input type="checkbox" class="form-check-input" id="default" name="trampa_default" <?= ($this->trampa->trampa_default == 1) ? "checked": ""; ?>>
                        <label class="form-check-label" for="default">Predeterminado: No</label>
                    </div>
                    <button type="submit" class="btn">Guardar</button>
                </form>
                <?php } else { ?>
                <div class="alert alert-danger" role="alert">Esta trampa no existe.</div>
                <?php } ?>
            </div>
        </div>
    </div>
</main>
<script type="module" src="js/trampa/edit.js"></script>