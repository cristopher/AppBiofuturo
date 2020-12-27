<header class="py-4">
    <div class="container">
        <div class="d-flex justify-content-start align-items-center">
            <a class="h1 mr-2" href="<?= Config::get('URL'); ?>admin"><svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-arrow-left-square" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M14 1H2a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z"/><path fill-rule="evenodd" d="M12 8a.5.5 0 0 1-.5.5H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H11.5a.5.5 0 0 1 .5.5z"/></svg></a>
            <h1 class="mb-0">Usuarios</h1>
        </div>
    </div>
</header>
<main class="minimo">
    <div class="container py-3">
        <?php $this->renderFeedbackMessages(); ?>
        <div class="accordion shadow mb-3" id="accordionNuevo">
            <div class="card">
                <div class="card-header" id="headingNuevo">
                    <h5 class="mb-0 card-title" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne"><svg width="1.5em" height="1.5em" viewBox="0 0 16 16" class="bi bi-plus" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/></svg> Nuevo usuario</h5>
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
                                <button type="submit" class="btn">Crear</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <table class="table table-hover border rounded shadow">
            <thead class="thead-light">
                <tr>
                    <th class="rounded">Avatar</th>
                    <th class="rounded">Username</th>
                    <th class="rounded">Email</th>
                    <th class="rounded">Alta</th>
                    <th class="rounded">Opciones</th>
                </tr>
            </thead>
            <tbody>
            <?php foreach ($this->users as $user) { ?>
                <tr>
                    <td class="text-center py-1">
                    <?php if (isset($user->user_avatar_link)) { ?>
                        <img class="rounded" width="40" height="40" src="<?= $user->user_avatar_link; ?>" loading="lazy"/>
                    <?php } ?>
                    </td>
                    <td><?= $user->user_name; ?></td>
                    <td><?= $user->user_email; ?></td>
                    <td><?= ($user->user_active == 0 ? 'No' : 'Si'); ?></td>
                    <td class="py-1 text-center">
                        <div class="btn-group dropleft" role="group">
                            <button id="<?= $user->user_name; ?>" type="button" class="btn dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-tools" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" d="M0 1l1-1 3.081 2.2a1 1 0 0 1 .419.815v.07a1 1 0 0 0 .293.708L10.5 9.5l.914-.305a1 1 0 0 1 1.023.242l3.356 3.356a1 1 0 0 1 0 1.414l-1.586 1.586a1 1 0 0 1-1.414 0l-3.356-3.356a1 1 0 0 1-.242-1.023L9.5 10.5 3.793 4.793a1 1 0 0 0-.707-.293h-.071a1 1 0 0 1-.814-.419L0 1zm11.354 9.646a.5.5 0 0 0-.708.708l3 3a.5.5 0 0 0 .708-.708l-3-3z"/>
                                    <path fill-rule="evenodd" d="M15.898 2.223a3.003 3.003 0 0 1-3.679 3.674L5.878 12.15a3 3 0 1 1-2.027-2.027l6.252-6.341A3 3 0 0 1 13.778.1l-2.142 2.142L12 4l1.757.364 2.141-2.141zm-13.37 9.019L3.001 11l.471.242.529.026.287.445.445.287.026.529L5 13l-.242.471-.026.529-.445.287-.287.445-.529.026L3 15l-.471-.242L2 14.732l-.287-.445L1.268 14l-.026-.529L1 13l.242-.471.026-.529.445-.287.287-.445.529-.026z"/>
                                </svg>
                            </button>
                            <div class="dropdown-menu" aria-labelledby="<?= $user->user_name; ?>">
                                <a class="dropdown-item" href="admin/profile/<?= $user->user_id; ?>">Información</a>
                                <a class="dropdown-item" href="admin/changeUserRole/<?= $user->user_id; ?>">Cambiar tipo de cuenta</a>
                                <a class="dropdown-item" href="admin/editAvatar/<?= $user->user_id; ?>">Modificar avatar</a>
                                <a class="dropdown-item" href="admin/editusername/<?= $user->user_id; ?>">Cambiar nombre de usuario</a>
                                <a class="dropdown-item" href="admin/edituseremail/<?= $user->user_id; ?>">Cambiar correo</a>
                                <a class="dropdown-item" href="admin/changePassword/<?= $user->user_id; ?>">Cambiar contraseña</a>
                                <?php if ($user->user_active == 0) { ?>
                                <a class="dropdown-item" href="admin/activate/<?= $user->user_id; ?>">Dar de alta</a>
                                <?php } ?>
                                <?php if ($user->user_deleted == 0) { ?>
                                <a class="dropdown-item" href="admin/softDelete/<?= $user->user_id; ?>/1">Desactivar</a>
                                <?php } else { ?>
                                <a class="dropdown-item" href="admin/softDelete/<?= $user->user_id; ?>/0">Activar</a>
                                <?php } ?>
                                <a class="dropdown-item" href="admin/suspension/<?= $user->user_id; ?>">Suspender</a>
                                <a class="dropdown-item" href="admin/delete/<?= $user->user_id; ?>">Eliminar</a>
                            </div>
                        </div>
                    </td>
                </tr>
            <?php } ?>
            </tbody>
        </table>
    </div>
</main>
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