<header class="py-4">
    <div class="container">
        <div class="d-flex justify-content-start align-items-center">
            <a class="h1 mr-2" href="<?= Config::get('URL'); ?>"><svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-arrow-left-square" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M14 1H2a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z"/><path fill-rule="evenodd" d="M12 8a.5.5 0 0 1-.5.5H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H11.5a.5.5 0 0 1 .5.5z"/></svg></a>
            <h1 class="mb-0">Administración</h1>
        </div>
    </div> 
</header>
<main class="minimo">
    <div class="container">
        <div class="d-none d-lg-block">
        <?php if ($this->administrator) { ?>
            <div class="row row-cols-2 row-cols-md-6 m-0 justify-content-center">
            <?php foreach($this->administrator as $key => $value) { ?>
                <div class="col text-center">
                    <p class="mb-0"><a href="<?= $value->admin_url; ?>" class="btn btn-large p-3 m-3"><svg width="4em" height="4em" viewBox="0 0 16 16" class="bi" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><?= $value->admin_icon; ?></svg></a></p>
                    <p><a href="<?= $value->admin_url; ?>" class="text-center">
                        <?= $value->admin_menu; ?>
                    </a></p>
                </div>
            <?php } ?>
            </div>
        <?php } ?>
        </div>
    </div>
<?php if ($this->administrator) { ?>
    <div class="d-block d-lg-none">
        <div class="d-flex flex-column border-top border-bottom">
        <?php foreach($this->administrator as $key => $value) { ?>
            <div>
                <a href="<?= $value->admin_url; ?>" class="d-flex flex-row pl-3">
                    <div class="mr-3 py-3"><svg width="1.5em" height="1.5em" viewBox="0 0 16 16" class="bi" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><?= $value->admin_icon; ?></svg></div>
                    <div class="border-bottom flex-grow-1 py-3"><?= $value->admin_menu; ?></div>
                    <div class="border-bottom p-3"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chevron-right" viewBox="0 0 16 16"><path fill-rule="evenodd" d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708z"/></svg></div>
                </a>    
            </div>
        <?php } ?>
        </div>
    </div>
<?php } ?>
</main>