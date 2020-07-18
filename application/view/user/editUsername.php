<section>
    <header class="multicolor text-white">
        <div class="container">
            <h1>Cambiar nombre de usuario</h1>
        </div>
    </header>
    <main class="multicolor minimo">
        <div class="container">
            <?php $this->renderFeedbackMessages(); ?>
            <div class="d-flex justify-content-center">
                <div class="card shadow">
                    <div class="card-body">
                        <form action="<?php echo Config::get('URL'); ?>user/editUserName_action" method="post">
                            <div class="form-group">
                                <label>Nuevo nombre de usuario:</label>
                                <input type="text" class="form-control" name="user_name" pattern="[a-zA-Z á-úÁ-ÚüÜ]{2,64}" placeholder="Escriba un nombre" required>
                            </div>
                            <!-- set CSRF token at the end of the form -->
                            <input type="hidden" name="csrf_token" value="<?= Csrf::makeToken(); ?>" />
                            <button type="submit" class="btn btn-primary shadow-lg">Guardar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </main>
</section>