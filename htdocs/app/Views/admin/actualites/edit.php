<?= $this->extend('l_global') ?>

<?= $this->section('contenu') ?>

<div class="site-container">
    <div class="d-flex align-items-center mb-4">
        <a href="<?= base_url('admin/actualites') ?>" class="text-decoration-none me-3 text-dark">
            <i class="bi bi-arrow-left-circle" style="font-size: 1.5rem;"></i>
        </a>
        <h3 class="title-section mb-0">Modifier : <?= esc($item['titre']) ?></h3>
    </div>

    <?php if (session()->getFlashdata('errors')): ?>
    <div class="alert alert-danger mb-4 p-3" style="background: #f8d7da; border-radius: 5px;">
        <ul class="mb-0 ps-3">
            <?php foreach (session()->getFlashdata('errors') as $error): ?>
            <li><?= esc($error) ?></li>
            <?php endforeach; ?>
        </ul>
    </div>
    <?php endif; ?>

    <div class="card-item p-4">
        <form action="<?= base_url('admin/actualites/' . $item['id']) ?>" method="post" enctype="multipart/form-data">
            <?= csrf_field() ?>
            <input type="hidden" name="_method" value="PUT">

            <div class="form-group mb-3">
                <label class="fw-bold mb-1">Titre</label>
                <input type="text" name="titre" class="form-input w-100 p-2" value="<?= old('titre', $item['titre']) ?>"
                    required>
            </div>

            <div class="grid-2 gap-4">
                <div class="form-group mb-3">
                    <label class="fw-bold mb-1">Date événement</label>
                    <input type="date" name="date_evenement" class="form-input w-100 p-2"
                        value="<?= old('date_evenement', $item['date_evenement']) ?>">
                </div>

                <div class="form-group mb-3">
                    <label class="fw-bold mb-1">Statut</label>
                    <select name="statut" class="form-input w-100 p-2">
                        <option value="brouillon" <?= $item['statut'] == 'brouillon' ? 'selected' : '' ?>>Brouillon
                        </option>
                        <option value="publie" <?= $item['statut'] == 'publie' ? 'selected' : '' ?>>Publié</option>
                        <option value="archive" <?= $item['statut'] == 'archive' ? 'selected' : '' ?>>Archivé</option>
                    </select>
                </div>
            </div>

            <div class="form-group mb-3">
                <label class="fw-bold mb-1">Contenu</label>
                <textarea name="description" rows="6" class="form-input w-100 p-2"
                    required><?= old('description', $item['description']) ?></textarea>
            </div>

            <div class="form-group mb-4">
                <label class="fw-bold mb-1">Image</label>

                <?php if (!empty($item['image_path'])): ?>
                <div class="d-flex align-items-center gap-3 p-2 border rounded bg-light mb-2">
                    <img src="<?= base_url($item['image_path']) ?>" style="height: 50px; border-radius: 4px;">
                    <span class="text-muted small">Actuelle</span>
                </div>
                <?php endif; ?>

                <input type="file" name="image" class="form-input w-100 p-2" accept="image/*">
            </div>

            <div class="text-end">
                <button type="submit" class="btn-home">
                    <i class="bi bi-check-lg"></i> Mettre à jour
                </button>
            </div>
        </form>
    </div>
</div>
<?= $this->endSection() ?>