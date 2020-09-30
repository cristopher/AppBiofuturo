<section>
    <header class="py-4 wetrust">
        <div class="container">
            <h1>Cambiar contraseña</h1>
        </div>
    </header>
    <main class="py-4 minimo">
        <div class="container py-3">
            <?php $this->renderFeedbackMessages(); ?>
            <div class="d-flex justify-content-center">
                <div class="card shadow">
                    <div class="card-body">
                        <form method="post" action="<?php echo Config::get('URL'); ?>user/changePassword_action" name="new_password_form">
                            <div class="form-group">
                                <label>Ingrese Clave actual:</label>
                                <input type="password" class="form-control" name='user_password_current' pattern=".{6,}" required autocomplete="off">
                            </div>
                            <div class="form-group">
                                <label>Nueva clave:</label>
                                <input type="password" class="form-control" name='user_password_new' pattern=".{6,}" required autocomplete="off">
                            </div>
                            <div class="form-group">
                                <label>Repita la nueva clave:</label>
                                <input type="password" class="form-control" name='user_password_repeat' pattern=".{6,}" required autocomplete="off">
                            </div>
                            <button type="submit" name="submit_new_password" class="btn btn-outline-danger my-4 shadow-lg mx-auto d-block">Guardar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </main>
</section>