<section>
    <header class="py-4 wetrust">
        <div class="container">
            <div class="d-flex justify-content-start align-items-center">
                <a class="h1 mr-2" href="<?= Config::get('URL'); ?>"><svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-arrow-left-square" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M14 1H2a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z"/><path fill-rule="evenodd" d="M12 8a.5.5 0 0 1-.5.5H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H11.5a.5.5 0 0 1 .5.5z"/></svg></a>
                <h1 class="mb-0">Cambiar contraseña</h1>
            </div>
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