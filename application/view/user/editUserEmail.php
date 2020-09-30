<section>
    <header class="py-4 wetrust">
        <div class="container">
            <h1>Cambiar E-Mail</h1>
        </div>
    </header>
    <main class="py-4 minimo">
        <div class="container">
            <?php $this->renderFeedbackMessages(); ?>
            <div class="d-flex justify-content-center">
                <div class="card shadow">
                    <div class="card-body">
                        <form action="<?php echo Config::get('URL'); ?>user/editUserEmail_action" method="post">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Nuevo E-Mail:</label>
                                <input type="email" class="form-control" name="user_email" aria-describedby="emailHelp" placeholder="email" value="<?= $this->user_email; ?>" required>
                                <small id="emailHelp" class="form-text text-muted">Nunca compartimos su E-Mail.</small>
                            </div>
                            <button type="submit" class="btn btn-outline-danger my-4 shadow-lg mx-auto d-block">Guardar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </main>
</section>