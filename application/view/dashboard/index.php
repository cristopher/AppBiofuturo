<header class="py-4">
    <div class="container">
        <div class="d-flex justify-content-start align-items-center">
            <a class="h1 mr-2" href="<?= Config::get('URL'); ?>"><svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-arrow-left-square" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M14 1H2a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z"/><path fill-rule="evenodd" d="M12 8a.5.5 0 0 1-.5.5H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H11.5a.5.5 0 0 1 .5.5z"/></svg></a>
            <h1 class="mb-0"><?= $this->saludo . Session::get('user_name');?></h1>
        </div>
    </div>
</header>
<main class="minimo">
    <div class="container">
    <?php if ($this->modulos) { ?>
        <div class="row row-cols-2 row-cols-md-6 m-0 justify-content-center">
        <?php foreach($this->modulos as $key => $value) { ?>
            <div class="col text-center">
                <p class="mb-0"><a href="<?= $value->module_url; ?>" class="btn btn-large p-3 m-3"><svg width="4em" height="4em" viewBox="0 0 16 16" class="bi" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><?= $value->module_icon; ?></svg></a></p>
                <p><a href="<?= $value->module_url; ?>" class="text-dark text-decoration-none text-center">
                    <?= $value->module_menu; ?>
                </a></p>
            </div>
        <?php } ?>
        </div>
    <?php } ?>
    </div>
</main>