<main class="py-4 minimo">
    <div class="container">
        <?php $this->renderFeedbackMessages(); ?>
        <div class="d-flex p-2 justify-content-center">
            <div class="card rounded shadow">
                <div class="card-body">
                    <h5 class="card-title text-center">Nueva contraseña</h5>
                    <form action="<?php echo Config::get('URL'); ?>login/setNewPassword" method="post">
                        <input type='hidden' name='user_id' value='<?php echo $this->user_id; ?>' />
                        <input type='hidden' name='user_password_reset_hash' value='<?php echo $this->user_password_reset_hash; ?>' />
                        <div class="form-group">
                            <label>Escribir contraseña (min. 6 carácteres)</label>
                            <input class="form-control" type="password" name="user_password_new" pattern=".{6,}" required />
                        </div>
                        <div class="form-group">
                            <label>Repetir contraseña</label>
                            <input class="form-control" type="password" name="user_password_repeat" pattern=".{6,}" required />
                        </div>
                        <button type="submit" class="btn my-4 mx-auto d-block">Guardar</button>
                    </form>
                    <a href="<?php echo Config::get('URL'); ?>login">Volver</a>
                </div>
            </div>
        </div>
    </div>
</main>