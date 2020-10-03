<section>
    <header class="py-4 wetrust">
        <div class="container">
            <h1>Administración</h1>
        </div>
    </header>
    <main class="minimo">
        <div class="container py-3">
            <?php $this->renderFeedbackMessages(); ?>
            <div class="d-flex justify-content-center">
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
        </div>
    </main>
</section>