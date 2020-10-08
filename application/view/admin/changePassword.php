<section>
    <header class="py-4 wetrust">
        <div class="container">
            <h1>Cambiar contraseña de <?= $this->user->user_name; ?></h1>
        </div>
    </header>
    <main class="py-4 minimo">
        <div class="container py-3">
            <?php $this->renderFeedbackMessages(); ?>
            <dl class="row">
                <dt class="col-sm-3">Nombre de usuario:</dt>
                <dd class="col-sm-9"><?= $this->user->user_name; ?></dd>
                <dt class="col-sm-3">Tipo de cuenta:</dt>
                <dd class="col-sm-9"><?= $this->user->user_account_type; ?></dd>
            </dl>
            <div class="d-flex justify-content-center">
                <div class="card shadow">
                    <div class="card-body">
                        <form method="post" action="<?php echo Config::get('URL'); ?>admin/changePassword_action" name="new_password_form">
                            <div class="form-group">
                                <label>Nueva clave:</label>
                                <input type="password" class="form-control" id="user_password_new" name='user_password_new' pattern=".{6,}" required autocomplete="off">
                            </div>
                            <div class="form-group">
                                <label>Repita la nueva clave:</label>
                                <input type="password" class="form-control" id="user_password_repeat" name='user_password_repeat' pattern=".{6,}" required autocomplete="off">
                            </div>
                            <input type="hidden" name="user_id" value="<?= $this->user->user_id; ?>" >
                            <button type="submit" name="submit_new_password" class="btn btn-outline-danger my-4 shadow-lg mx-auto d-block">Guardar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </main>
</section>
<script>
    $("document").ready(function(){
        $("form").submit(function(e){
            e.preventDefault();
            var form = this;

            var p1 = document.getElementById("user_password_new").value;
            var p2 = document.getElementById("user_password_repeat").value;
            document.getElementById("user_password_new").classList.remove("is-invalid");
            document.getElementById("user_password_repeat").classList.remove("is-invalid");

            var espacios = false;

            if (p1.indexOf(' ') >= 0) {
                espacios = true;
            }

            if (espacios) {
                alert ("La contraseña no puede contener espacios en blanco");
                document.getElementById("user_password_new").classList.add("is-invalid");
                document.getElementById("user_password_repeat").classList.add("is-invalid");
                return false;
            }

            if (p1.length == 0 || p2.length == 0) {
                alert("Los campos de la password no pueden quedar vacios");
                document.getElementById("user_password_new").classList.add("is-invalid");
                document.getElementById("user_password_repeat").classList.add("is-invalid");
                return false;
            }

            if (p1 != p2) {
                alert("Las passwords deben de coincidir");
                document.getElementById("user_password_new").classList.add("is-invalid");
                document.getElementById("user_password_repeat").classList.add("is-invalid");

                return false;
            }

            form.submit();
        });
    })
</script>