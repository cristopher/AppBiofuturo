<section>
    <header class="multicolor text-white">
        <div class="container">
            <h1>Mi cuenta</h1>
        </div>
    </header>
    <main class="minimo">
        <div class="container py-3">
            <?php $this->renderFeedbackMessages(); ?>
            <dl class="row">
                <dt class="col-sm-3">Nombre de usuario:</dt>
                <dd class="col-sm-9"><?= $this->user_name; ?></dd>
                <dt class="col-sm-3">Email:</dt>
                <dd class="col-sm-9"><?= $this->user_email; ?></dd>
                <dt class="col-sm-3">Avatar:</dt>
                <dd class="col-sm-9">
                    <?php if (Config::get('USE_GRAVATAR')) { ?>
                        <img src='<?= $this->user_gravatar_image_url; ?>' />
                    <?php } else { ?>
                        <img src='<?= $this->user_avatar_file; ?>' />
                    <?php } ?>
                </dd>
                <dt class="col-sm-3">Tipo de cuenta:</dt>
                <dd class="col-sm-9"><?= $this->user_account_type; ?></dd>
            </dl>
        </div>
    </main>
</section>