<main class="py-4 completo">
    <div class="container">
        <?php $this->renderFeedbackMessages(); ?>
        <div class="d-flex p-2 justify-content-center">
            <div class="card rounded shadow">
                <div class="card-body">
                    <h5 class="card-title text-center">Nueva cuenta</h5>
                    <form action="<?php echo Config::get('URL'); ?>register/register_action" method="post">
                        <div class="form-group">
                            <label>Nombre <small>(sin carácteres especiales ä)</small></label>
                            <input class="form-control" type="text" name="user_name" pattern="[a-zA-Z á-úÁ-ÚüÜ]{2,64}" required />
                        </div>
                        <div class="row">
                            <div class="col-12 col-md-6 form-group">
                                <label>Email (real)</label>
                                <input class="form-control" type="email" name="user_email" required />
                            </div>
                            <div class="col-12 col-md-6 form-group">
                                <label>Repetir email</label>
                                <input class="form-control" type="email" name="user_email_repeat" required />
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 col-md-6 form-group">
                                <label>Contraseña (6+ caracteres)</label>
                                <input class="form-control" type="password" name="user_password_new" pattern=".{6,}" required />
                            </div>
                            <div class="col-12 col-md-6 form-group">
                                <label>Repetir contraseña</label>
                                <input class="form-control" type="password" name="user_password_repeat" pattern=".{6,}" required />
                            </div>
                        </div>
                        <img class="img-fluid img-thumbnail mx-auto d-block" id="captcha" src="<?php echo Config::get('URL'); ?>register/showCaptcha" />
                        <div class="form-group">
                            <label>Escribir captcha</label>
                            <input class="form-control" type="text" name="captcha" required />
                            <a href="#" onclick="document.getElementById('captcha').src = '<?php echo Config::get('URL'); ?>register/showCaptcha?' + Math.random(); return false">Recargar Captcha</a>
                        </div>
                        <input type="submit" class="btn btn-outline-light my-4 mx-auto d-block" value="Registrar"/>
                    </form>
                </div>
            </div>
        </div>
    </div>
</main>