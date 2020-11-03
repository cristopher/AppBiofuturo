<header class="py-4 wetrust">
    <div class="container">
        <div class="d-flex justify-content-start align-items-center">
            <a class="h1 mr-2" href="<?= Config::get('URL'); ?>"><svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-arrow-left-square" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M14 1H2a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z"/><path fill-rule="evenodd" d="M12 8a.5.5 0 0 1-.5.5H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H11.5a.5.5 0 0 1 .5.5z"/></svg></a>
            <h1 class="mb-0">Notas personales</h1>
        </div>
    </div>
</header>
<main class="minimo">
    <div class="container py-3">
        <?php $this->renderFeedbackMessages(); ?>
        <div class="accordion" id="accordion">
            <div class="card shadow mb-3">
                <div class="card-header wetrust" id="accordionTitle">
                    <h5 class="mb-0" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">Nueva nota</h5>
                </div>
                <div id="collapseOne" class="collapse" aria-labelledby="accordionTitle" data-parent="#accordion">
                    <div class="card-body">
                        <form method="post" action="<?php echo Config::get('URL');?>note/create">
                            <div class="form-group">
                                <label>Texto de nueva nota:</label>
                                <input type="text" class="form-control" name="note_text" autocomplete="off">
                            </div>
                            <button type="submit" class="btn btn-outline-danger shadow-lg">Crear</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <?php if ($this->notes) { ?>
        <table class="table table-hover shadow">
            <thead class="thead-dark">
                <tr>
                    <th>Id</th>
                    <th>Nota</th>
                    <th>Opciones</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($this->notes as $key => $value) { ?>
                <tr>
                    <td><?= $value->note_id; ?></td>
                    <td><?= htmlentities($value->note_text); ?></td>
                    <td>
                        <div class="btn-group dropleft" role="group">
                            <button id="<?= $value->note_id; ?>" type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-tools" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" d="M0 1l1-1 3.081 2.2a1 1 0 0 1 .419.815v.07a1 1 0 0 0 .293.708L10.5 9.5l.914-.305a1 1 0 0 1 1.023.242l3.356 3.356a1 1 0 0 1 0 1.414l-1.586 1.586a1 1 0 0 1-1.414 0l-3.356-3.356a1 1 0 0 1-.242-1.023L9.5 10.5 3.793 4.793a1 1 0 0 0-.707-.293h-.071a1 1 0 0 1-.814-.419L0 1zm11.354 9.646a.5.5 0 0 0-.708.708l3 3a.5.5 0 0 0 .708-.708l-3-3z"/>
                                    <path fill-rule="evenodd" d="M15.898 2.223a3.003 3.003 0 0 1-3.679 3.674L5.878 12.15a3 3 0 1 1-2.027-2.027l6.252-6.341A3 3 0 0 1 13.778.1l-2.142 2.142L12 4l1.757.364 2.141-2.141zm-13.37 9.019L3.001 11l.471.242.529.026.287.445.445.287.026.529L5 13l-.242.471-.026.529-.445.287-.287.445-.529.026L3 15l-.471-.242L2 14.732l-.287-.445L1.268 14l-.026-.529L1 13l.242-.471.026-.529.445-.287.287-.445.529-.026z"/>
                                </svg>
                            </button>
                            <div class="dropdown-menu" aria-labelledby="<?= $value->note_id; ?>">
                                <a class="dropdown-item" href="note/edit/<?= $value->note_id; ?>">Modificar</a>
                                <a class="dropdown-item" href="note/delete/<?= $value->note_id; ?>">Eliminar</a>
                            </div>
                        </div>
                    </td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
        <?php } else { ?>
        <div class="alert alert-info mt-2" role="alert">No hay notas todavía. ¡Crea una!</div>
        <?php } ?>
    </div>
</main>