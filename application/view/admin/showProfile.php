<section>
    <header class="py-4 wetrust">
        <div class="container">
            <h1>Perfil de <?= $this->user->user_name; ?></h1>
        </div>
    </header>
    <main class="minimo">
        <div class="container py-3">
            <?php $this->renderFeedbackMessages(); ?>
            <dl class="row">
                <dt class="col-sm-3">Avatar:</dt>
                <dd class="col-sm-9">
                    <img src='<?= $this->user->user_avatar_link; ?>' />
                </dd>
                <dt class="col-sm-3">Nombre de usuario:</dt>
                <dd class="col-sm-9"><?= $this->user->user_name; ?></dd>
                <dt class="col-sm-3">Email:</dt>
                <dd class="col-sm-9"><?= $this->user->user_email; ?></dd>
                <dt class="col-sm-3">Alta:</dt>
                <dd class="col-sm-9"><?= ($this->user->user_active == 1) ? 'Si' : 'No'; ?></dd>
                <dt class="col-sm-3">Desactivado:</dt>
                <dd class="col-sm-9"><?= ($this->user->user_deleted == 1) ? 'Si' : 'No'; ?></dd>
                <dt class="col-sm-3">Suspendido:</dt>
                <dd class="col-sm-9"><?= ($this->user->user_suspension_timestamp > 0) ? 'Hasta el '. date("d-m-yy H:m", $this->user->user_suspension_timestamp) . ' hrs UTC': 'No';?></dd>
                <dt class="col-sm-3">Tipo de cuenta:</dt>
                <dd class="col-sm-9"><?= $this->user->user_account_type; ?></dd>
            </dl>
        </div>
    </main>
</section>