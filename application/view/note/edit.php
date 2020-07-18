<header class="multicolor text-white">
    <div class="container">
        <h1>Modificar nota</h1>
    </div>
</header>
<main class="minimo">
    <div class="container py-3">
        <?php $this->renderFeedbackMessages(); ?>
        <div class="card shadow mb-3">
            <div class="card-body">
                <h5 class="card-title">Modificar nota</h5>
                <?php if ($this->note) { ?>
                <form method="post" action="<?php echo Config::get('URL'); ?>note/editSave">
                    <!-- we use htmlentities() here to prevent user input with " etc. break the HTML -->
                    <input type="hidden" name="note_id" value="<?php echo htmlentities($this->note->note_id); ?>" />
                    <div class="form-group">
                        <label>Cambiar texto de nota:</label>
                        <input type="text" class="form-control" name="note_text" value="<?php echo htmlentities($this->note->note_text); ?>">
                    </div>
                    <button type="submit" class="btn btn-primary shadow-lg">Modificar</button>
                </form>
                <?php } else { ?>
                <div class="alert alert-danger" role="alert">Esta nota no existe.</div>
                <?php } ?>
            </div>
        </div>
    </div>
</main>