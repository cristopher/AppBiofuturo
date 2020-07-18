<section>
    <header class="multicolor text-white">
        <div class="container">
            <h1>Perfiles</h1>
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
                            <th>Activado</th>
                            <th>Link a perfil</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($this->users as $user) { ?>
                        <tr>
                            <td><?= $user->user_id; ?></td>
                            <td class="avatar">
                            <?php if (isset($user->user_avatar_link)) { ?>
                                <img src="<?= $user->user_avatar_link; ?>" />
                            <?php } ?>
                            </td>
                            <td><?= $user->user_name; ?></td>
                            <td><?= $user->user_email; ?></td>
                            <td><?= ($user->user_active == 0 ? 'No' : 'Si'); ?></td>
                            <td>
                                <a href="<?= Config::get('URL') . 'profile/showProfile/' . $user->user_id; ?>">Ver</a>
                            </td>
                        </tr>
                    <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </main>
</section>