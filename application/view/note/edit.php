<header class="py-4 wetrust">
    <div class="container">
        <div class="d-flex justify-content-start align-items-center">
            <a class="h1 mr-2" href="<?= Config::get('URL'); ?>note"><svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-arrow-left-square" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M14 1H2a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z"/><path fill-rule="evenodd" d="M12 8a.5.5 0 0 1-.5.5H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H11.5a.5.5 0 0 1 .5.5z"/></svg></a>
            <h1 class="mb-0">Modificar nota</h1>
        </div>
    </div>
</header>
<main class="minimo">
    <div class="container py-3">
        <?php $this->renderFeedbackMessages(); ?>
        <div class="card shadow mb-3">
            <div class="card-body">
                <?php if ($this->note) { ?>
                <form method="post" action="<?php echo Config::get('URL'); ?>note/editSave">
                    <!-- we use htmlentities() here to prevent user input with " etc. break the HTML -->
                    <input type="hidden" name="note_id" value="<?php echo htmlentities($this->note->note_id); ?>" />
                    <div class="form-group">
                        <label>Cambiar texto de nota:</label>
                        <input type="text" class="form-control" name="note_text" value="<?php echo htmlentities($this->note->note_text); ?>">
                    </div>
                    <button type="submit" class="btn btn-outline-danger shadow-lg">Guardar</button>
                </form>
                <?php } else { ?>
                <div class="alert alert-danger" role="alert">Esta nota no existe.</div>
                <?php } ?>
            </div>
        </div>
    </div>
</main>