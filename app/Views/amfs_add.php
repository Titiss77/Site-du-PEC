<?= $this->extend('l-charte') ?>
<?= $this->Section('contenu') ?>

<div id="contenu">
    <div class="form-container">
        <h1>Ajouter un nouvel élément</h1>

        <form action="<?= base_url('create') ?>" method="post" class="dark-form">
            <?= csrf_field() ?>

            <input type="hidden" name="idHeader" value="<?= esc($pageHeader['id']) ?>">

            <div class="form-grid">
                <div class="form-group">
                    <label for="libelle">Nom de l'élément</label>
                    <input type="text" name="libelle" id="libelle" value="<?= old('libelle') ?>" required>
                </div>

                <div class="form-group">
                    <label for="idCategorie">Catégorie</label>
                    <select name="idCategorie" id="idCategorie">
                        <?php foreach ($categories as $cat): ?>
                        <option value="<?= $cat['id'] ?>"
                            <?= ($cat['id'] == ($idCategoriePreselectionnee ?? old('idCategorie'))) ? 'selected' : '' ?>>
                            <?= esc($cat['libelle']) ?>
                        </option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <div class="form-group">
                    <label for="image">URL de l'image (16:9)</label>
                    <input type="text" name="image" id="image" value="<?= old('image') ?>">
                </div>

                <div class="form-group">
                    <label for="lien">Lien (Streaming / Scan / Info)</label>
                    <input type="text" name="lien" id="lien" value="<?= old('lien') ?>">
                </div>

                <div class="form-group">
                    <label for="saison">Saison (ex: 1/1 ou Tome 1)</label>
                    <input type="text" name="saison" id="saison" value="<?= old('saison') ?>">
                </div>

                <div class="form-group">
                    <label for="episode">Épisode (ex: 12/24 ou Chap. 150)</label>
                    <input type="text" name="episode" id="episode" value="<?= old('episode') ?>">
                </div>
            </div>

            <div class="form-group full-width">
                <label for="description">Description / Notes</label>
                <textarea name="description" id="description" rows="4"><?= old('description') ?></textarea>
            </div>

            <div class="form-actions">
                <a href="<?= base_url($pageHeader['id']) ?>" class="btn-cancel">Annuler</a>
                <button type="submit" class="btn-submit">Ajouter l'élément</button>
            </div>
        </form>
    </div>
</div>

<?= $this->endSection() ?>