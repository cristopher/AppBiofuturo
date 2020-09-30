<section>
    <header class="py-4 wetrust">
        <div class="container">
            <h1>Tipo de cuenta</h1>
        </div>
    </header>
    <main class="py-4 minimo">
        <div class="container">
            <?php $this->renderFeedbackMessages(); ?>
            <h2>Actualmente tu cuenta es de tipo: <?php echo Session::get('user_account_type'); ?></h2>
            <!-- basic implementation for two account types: type 1 and type 2 -->
            <form action="<?php echo Config::get('URL'); ?>user/changeUserRole_action" method="post">
                <?php if (Session::get('user_account_type') == 1) { ?>
                    <button type="submit" name="user_account_upgrade" value="2" class="btn btn-outline-danger shadow-lg">Subir nivel</button>
                <?php } else if (Session::get('user_account_type') == 2) { ?>
                    <button type="submit" name="user_account_downgrade" value="1" class="btn btn-outline-danger shadow-lg">Bajar nivel</button>
                <?php } ?>
            </form>
        </div>
    </main>
</section>