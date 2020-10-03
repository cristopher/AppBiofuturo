<section>
    <header class="py-4 wetrust">
        <div class="container">
            <h1>Administración</h1>
        </div>
    </header>
    <main class="minimo">
        <div class="container py-3">
            <?php $this->renderFeedbackMessages(); ?>
            <div class="accordion shadow mb-3" id="accordionNuevo">
                <div class="card">
                    <div class="card-header wetrust" id="headingNuevo">
                        <h5 class="mb-0 card-title" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">Nuevo usuario</h5>
                    </div>
                    <div id="collapseOne" class="collapse" aria-labelledby="headingNuevo" data-parent="#accordionNuevo">
                        <div class="card-body">
                            <form class="row" method="post" action="<?php echo Config::get('URL');?>admin/register_action">
                                <div class="form-group col-12 col-lg-6">
                                    <label>Nombre de usuario:</label>
                                    <input type="text" class="form-control" id="user_name" name="user_name" pattern="[a-zA-ZñÑá-úÁ-Ú0-9 ]{2,64}" placeholder="Escriba un nombre" autocomplete="off" required>
                                </div>
                                <div class="form-group col-12 col-lg-6">
                                    <label>Email (real):</label>
                                    <input type="email" class="form-control" id="user_email" name="user_email" autocomplete="off" required>
                                </div>
                                <div class="form-group col-12 col-lg-6">
                                    <label>Contraseña:</label>
                                    <input type="password" class="form-control" id="user_password_new" name="user_password_new" autocomplete="off" required>
                                </div>
                                <div class="form-group col-12 col-lg-6">
                                    <label>Repetir contraseña:</label>
                                    <input type="password" class="form-control" id="user_password_repeat" name="user_password_repeat" autocomplete="off" required>
                                </div>
                                <div class="col-12">
                                    <button type="submit" class="btn btn-outline-danger shadow-lg">Crear</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <table class="table table-bordered">
                <thead class="thead-dark">
                    <tr>
                        <th>Id</th>
                        <th>Avatar</th>
                        <th>Username</th>
                        <th>Email</th>
                        <th>Activo</th>
                        <th>Perfil</th>
                        <th>Suspender dias</th>
                        <th>Desactivar</th>
                        <th>Enviar</th>
                    </tr>
                </thead>
                <tbody>
                <?php foreach ($this->users as $user) { ?>
                    <tr>
                        <td><?= $user->user_id; ?></td>
                        <td class="avatar">
                        <?php if (isset($user->user_avatar_link)) { ?>
                            <img width="40" height="40" src="<?= $user->user_avatar_link; ?>" loading="lazy"/>
                        <?php } ?>
                        </td>
                        <td><?= $user->user_name; ?></td>
                        <td><?= $user->user_email; ?></td>
                        <td><?= ($user->user_active == 0 ? 'No' : 'Si'); ?></td>
                        <td>
                            <a href="<?= Config::get('URL') . 'profile/showProfile/' . $user->user_id; ?>">Ver</a>
                        </td>
                        <form action="<?= config::get("URL"); ?>admin/actionAccountSettings" method="post">
                            <td><input class="form-control" type="number" name="suspension" /></td>
                            <td><input type="checkbox" name="softDelete" <?php if ($user->user_deleted) { ?> checked <?php } ?> /></td>
                            <td>
                                <input type="hidden" name="user_id" value="<?= $user->user_id; ?>" />
                                <button type="submit" class="btn btn-primary shadow-lg">Aplicar</button>
                            </td>
                        </form>
                    </tr>
                <?php } ?>
                </tbody>
            </table>
        </div>
    </main>
</section>
<script>
    $("document").ready(function(){
        $("form").submit(function(e){
            e.preventDefault();
            var form = this;

            var name = document.getElementById("user_name").value;
            document.getElementById("user_name").classList.remove("is-invalid");
            var email = document.getElementById("user_email").value;
            document.getElementById("user_email").classList.remove("is-invalid");

            var p1 = document.getElementById("user_password_new").value;
            var p2 = document.getElementById("user_password_repeat").value;
            document.getElementById("user_password_new").classList.remove("is-invalid");
            document.getElementById("user_password_repeat").classList.remove("is-invalid");

            if (name.length == 0 ) {
                alert ("Nombre de usuario vacio");
                document.getElementById("user_name").classList.add("is-invalid");
                return false;
            }

            if (validateUsername(name) == false) {
                alert ("Nombre de usuario inválido");
                document.getElementById("user_name").classList.add("is-invalid");
                return false;
            }

            //eliminar los espacios
            email = email.replace(/\s+/g, '');

            if (email.length == 0 ) {
                alert ("Falta email");
                document.getElementById("user_email").classList.add("is-invalid");
                return false;
            }

            if (validateEmail(email) == false) {
                alert ("Email inválido");
                document.getElementById("user_email").classList.add("is-invalid");
                return false;
            }

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

    function validateUsername(name) {
        return /^[a-zA-ZñÑá-úÁ-Ú0-9 ]{2,64}$/.test(name)
    }

    function validateEmail(email) {
        return /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email)
    }
</script>