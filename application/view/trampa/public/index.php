<header class="py-4 wetrust">
    <div class="container">
        <div class="d-flex justify-content-start align-items-center">
            <a class="h1 mr-2" href="<?= Config::get('URL'); ?>Dashboard"><svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-arrow-left-square" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M14 1H2a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z"/><path fill-rule="evenodd" d="M12 8a.5.5 0 0 1-.5.5H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H11.5a.5.5 0 0 1 .5.5z"/></svg></a>
            <h1 class="mb-0 d-none d-lg-block mr-auto">Trampas</h1>
            <h4 class="mb-0 d-lg-none mr-auto">Trampas</h4>
            <button id="filtro" class="btn text-white border-white"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-funnel" viewBox="0 0 16 16"><path d="M1.5 1.5A.5.5 0 0 1 2 1h12a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-.128.334L10 8.692V13.5a.5.5 0 0 1-.342.474l-3 1A.5.5 0 0 1 6 14.5V8.692L1.628 3.834A.5.5 0 0 1 1.5 3.5v-2zm1 .5v1.308l4.372 4.858A.5.5 0 0 1 7 8.5v5.306l2-.666V8.5a.5.5 0 0 1 .128-.334L13.5 3.308V2h-11z"/></svg></button>
        </div>
    </div>
</header>
<main class="minimo">
    <div class="container py-3">
        <?php $this->renderFeedbackMessages(); ?>
        <div class="d-none flex-row mb-3" id="cFiltro">
            <p class="mb-0 mr-2 align-self-center"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-funnel" viewBox="0 0 16 16"><path d="M1.5 1.5A.5.5 0 0 1 2 1h12a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-.128.334L10 8.692V13.5a.5.5 0 0 1-.342.474l-3 1A.5.5 0 0 1 6 14.5V8.692L1.628 3.834A.5.5 0 0 1 1.5 3.5v-2zm1 .5v1.308l4.372 4.858A.5.5 0 0 1 7 8.5v5.306l2-.666V8.5a.5.5 0 0 1 .128-.334L13.5 3.308V2h-11z"/></svg> Filtro:</p>
            <div class="form-group mb-0">
                <input type="text" class="form-control" name="trampa_text_search" data-dato="trampa_text" autocomplete="off" placeholder="trampa">
            </div>
            <p class="mb-0 mx-2 align-self-center">Predeterminado:</p>
            <div class="form-group form-check mb-0 align-self-center">
                <input type="checkbox" class="form-check-input" name="trampa_default_search" data-dato="trampa_default">
                <label class="form-check-label" for="default">No</label>
            </div>
        </div>
        <table class="table table-hover border rounded shadow">
            <thead class="thead-light">
                <tr>
                    <th class="rounded">Cliente</th>
                    <th class="rounded">Campo</th>
                    <th class="rounded">Trampa</th>
                    <th class="rounded">Activa</th>
                    <th class="rounded w-10">Opciones</th>
                </tr>
            </thead>
            <tbody id="tabla">
            <?php if ($this->trampas) { ?>
                <?php $contador = 0; 
                foreach($this->trampas as $key => $value) {
                    $contador++;?>
                <tr>
                    <td class="cliente-dinamic" data-cliente="<?= htmlentities($value->cliente_id); ?>"></td>
                    <td class="campo-dinamic" data-campo="<?= htmlentities($value->campos_id); ?>"></td>
                    <td><?= htmlentities($value->trampa_codigo); ?></td>
                    <td><?= ($value->trampa_activa == "1") ? "Si": "No"; ?></td>
                    <td>
                        <div class="btn-group dropleft <?= ($contador == count($this->trampas)) ? "dropup": ""; ?>" role="group">
                            <button id="btnGroupDrop<?= $value->trampa_id; ?>" type="button" class="btn dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-tools" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" d="M0 1l1-1 3.081 2.2a1 1 0 0 1 .419.815v.07a1 1 0 0 0 .293.708L10.5 9.5l.914-.305a1 1 0 0 1 1.023.242l3.356 3.356a1 1 0 0 1 0 1.414l-1.586 1.586a1 1 0 0 1-1.414 0l-3.356-3.356a1 1 0 0 1-.242-1.023L9.5 10.5 3.793 4.793a1 1 0 0 0-.707-.293h-.071a1 1 0 0 1-.814-.419L0 1zm11.354 9.646a.5.5 0 0 0-.708.708l3 3a.5.5 0 0 0 .708-.708l-3-3z"/>
                                    <path fill-rule="evenodd" d="M15.898 2.223a3.003 3.003 0 0 1-3.679 3.674L5.878 12.15a3 3 0 1 1-2.027-2.027l6.252-6.341A3 3 0 0 1 13.778.1l-2.142 2.142L12 4l1.757.364 2.141-2.141zm-13.37 9.019L3.001 11l.471.242.529.026.287.445.445.287.026.529L5 13l-.242.471-.026.529-.445.287-.287.445-.529.026L3 15l-.471-.242L2 14.732l-.287-.445L1.268 14l-.026-.529L1 13l.242-.471.026-.529.445-.287.287-.445.529-.026z"/>
                                </svg>
                            </button>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="btnGroupDrop<?= $value->trampa_id; ?>">
                                <a class="dropdown-item" href="trampa/edit/<?= $value->trampa_id; ?>">
                                    <div class="d-flex justify-content-between align-items-center">
                                        Modificar
                                        <svg width="1.5em" height="1.5em" viewBox="0 0 16 16" class="bi bi-pen" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M13.498.795l.149-.149a1.207 1.207 0 1 1 1.707 1.708l-.149.148a1.5 1.5 0 0 1-.059 2.059L4.854 14.854a.5.5 0 0 1-.233.131l-4 1a.5.5 0 0 1-.606-.606l1-4a.5.5 0 0 1 .131-.232l9.642-9.642a.5.5 0 0 0-.642.056L6.854 4.854a.5.5 0 1 1-.708-.708L9.44.854A1.5 1.5 0 0 1 11.5.796a1.5 1.5 0 0 1 1.998-.001zm-.644.766a.5.5 0 0 0-.707 0L1.95 11.756l-.764 3.057 3.057-.764L14.44 3.854a.5.5 0 0 0 0-.708l-1.585-1.585z"/></svg>
                                    </div>
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item delete" data-id="<?= $value->trampa_id; ?>">
                                    <div class="d-flex justify-content-between align-items-center">
                                        Eliminar
                                        <svg width="1.5em" height="1.5em" viewBox="0 0 16 16" class="bi bi-trash" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/><path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4L4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/></svg>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </td>
                </tr>
                <?php }
                } else { ?>
                <tr>
                    <td colspan="3">No hay trampas todavía. ¡Crea una!</td>
                </tr>
            <?php } ?>
            </tbody>
        </table>
    </div>
</main>
<nav class="navbar fixed-bottom px-3 py-2">
    <button type="button" class="ml-auto btn" data-toggle="modal" data-target="#trampaModal"><svg width="1.5em" height="1.5em" viewBox="0 0 16 16" class="bi bi-plus" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/></svg> Nueva trampa</button>
</nav>
<div class="modal" tabindex="-1" id="trampaModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Nueva Trampa</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post" action="<?= Config::get('URL');?>trampa/create">
                    <div class="form-group">
                        <label>Región:</label>
                        <select class="form-control" name="region_id"></select>
                    </div>
                    <div class="form-group">
                        <label>Cliente:</label>
                        <select class="form-control" name="cliente_id"></select>
                    </div>
                    <div class="form-group">
                        <label>Campo:</label>
                        <select class="form-control" name="campos_id"></select>
                    </div>
                    <div class="form-group">
                        <label>Trampa:</label>
                        <input type="text" class="form-control" name="trampa_codigo" autocomplete="off">
                    </div>
                    <div class="form-group">
                        <label>Ubicación:</label>
                        <input type="hidden" class="form-control" name="trampa_x" value="0">
                        <input type="hidden" class="form-control" name="trampa_y" value="0">
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn" data-dismiss="modal" id="closeTrampa">Cancelar</button>
                <button type="button" class="btn" id="saveTrampa">Crear</button>
            </div>
        </div>
    </div>
</div>
<script>
    var datos = <?= json_encode($this->trampas); ?>
</script>
<script type="module" src="js/trampa/index.js"></script>