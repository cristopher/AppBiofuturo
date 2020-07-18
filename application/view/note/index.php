<header class="multicolor text-white">
    <div class="container">
        <h1>Notas personales</h1>
    </div>
</header>
<main class="minimo">
    <div class="container py-3">
        <?php $this->renderFeedbackMessages(); ?>
        <div class="card shadow mb-3">
            <div class="card-body">
                <h5 class="card-title">Nueva nota</h5>
                <form method="post" action="<?php echo Config::get('URL');?>note/create">
                    <div class="form-group">
                        <label>Texto de nueva nota:</label>
                        <input type="text" class="form-control" name="note_text" autocomplete="off">
                    </div>
                    <button type="submit" class="btn btn-primary shadow-lg">Crear</button>
                </form>
            </div>
        </div>
        <?php if ($this->notes) { ?>
        <table class="table table-hover shadow">
            <thead class="thead-dark">
                <tr>
                    <th>Id</th>
                    <th>Nota</th>
                    <th>Modificar</th>
                    <th>Eliminar</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($this->notes as $key => $value) { ?>
                <tr>
                    <td><?= $value->note_id; ?></td>
                    <td><?= htmlentities($value->note_text); ?></td>
                    <td><a href="<?= Config::get('URL') . 'note/edit/' . $value->note_id; ?>">Modificar</a></td>
                    <td><a href="<?= Config::get('URL') . 'note/delete/' . $value->note_id; ?>">Eliminar</a></td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
        <?php } else { ?>
        <div class="alert alert-info mt-2" role="alert">No hay notas todavía. ¡Crea una!</div>
        <?php } ?>
    </div>
</main>