<main class="py-4 completo">
    <div class="container">
        <?php $this->renderFeedbackMessages(); ?>
        <div class="d-flex p-2 justify-content-center">
            <div class="card rounded shadow">
                <div class="card-body">
                    <h5 class="card-title">Iniciar sesión</h5>
                    <form action="<?= Config::get('URL'); ?>login/login" method="post">
                        <div class="form-group">
                            <label>Email</label>
                            <input class="form-control" type="email" name="user_email" required />
                        </div>
                        <div class="form-group">
                            <label>Contraseña</label>
                            <input class="form-control" type="password" name="user_password" required />
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="set_remember_me_cookie"  />
                            <label class="form-check-label">
                                Recordarme
                            </label>
                        </div>
                        <?php if (!empty($this->redirect)) { ?>
                            <input type="hidden" name="redirect" value="<?= $this->encodeHTML($this->redirect); ?>" />
                        <?php } ?>
                        <input type="hidden" name="csrf_token" value="<?= Csrf::makeToken(); ?>" />
                        <button type="submit" class="btn my-4 mx-auto d-block">Ingresar</button>
                    </form>
                    <a href="<?= Config::get('URL'); ?>login/requestPasswordReset">¿Olvido contraseña?</a>
                </div>
            </div>
        </div>
    </div>
</main>