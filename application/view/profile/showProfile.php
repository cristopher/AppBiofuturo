<section>
    <header class="multicolor text-white">
        <div class="container">
            <h1>Perfil</h1>
        </div>
    </header>
    <main class="minimo">
        <div class="container py-3">
            <?php $this->renderFeedbackMessages(); ?>
            <div class="d-flex justify-content-center">
                <?php if ($this->user) { ?>
                <table class="table table-bordered">
                    <thead class="thead-dark">
                        <tr>
                            <th>Id</th>
                            <th>Avatar</th>
                            <th>Username</th>
                            <th>Email</th>
                            <th>Activado</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><?= $this->user->user_id; ?></td>
                            <td class="avatar">
                            <?php if (isset($this->user->user_avatar_link)) { ?>
                                <img src="<?= $this->user->user_avatar_link; ?>" />
                            <?php } ?>
                            </td>
                            <td><?= $this->user->user_name; ?></td>
                            <td><?= $this->user->user_email; ?></td>
                            <td><?= ($this->user->user_active == 0 ? 'No' : 'Yes'); ?></td>
                        </tr>
                    </tbody>
                </table>
                <?php } ?>
            </div>
        </div>
    </main>
</section>