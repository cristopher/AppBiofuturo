<main class="py-4 completo">
    <div class="container">
        <?php $this->renderFeedbackMessages(); ?>
        <div class="d-flex p-2 justify-content-center">
            <div class="card rounded shadow">
                <div class="card-body">
                    <h5 class="card-title text-center">Solicitar contraseña</h5>
                    <form action="<?= Config::get('URL'); ?>login/requestPasswordReset_action" method="post">
                        <div class="form-group">
                            <label>Email</label>
                            <input class="form-control" type="email" name="user_email" required />
                        </div>
                        <img class="img-fluid img-thumbnail mx-auto d-block" id="captcha" src="<?= Config::get('URL'); ?>register/showCaptcha" />
                        <div class="form-group mt-2">
                            <label>Escribir captcha</label>
                            <input class="form-control" type="text" name="captcha" required />
                            <a href="#" onclick="document.getElementById('captcha').src = '<?= Config::get('URL'); ?>register/showCaptcha?' + Math.random(); return false">Recargar Captcha</a>
                        </div>
                        <button type="submit" class="btn my-4 mx-auto d-block">Solicitar contraseña</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</main>
