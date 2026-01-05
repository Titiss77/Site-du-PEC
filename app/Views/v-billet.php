<?= $this->extend('v-charte') ?>
<?= $this->Section('contenu') ?>
<div id="contenu">
    <div id="billet">
        <h2><?= $billet['titre']; ?></h2>
        <p><?= $billet['contenu']; ?></p>
        <time><?= $billet['date']; ?></time>
    </div>
    <div id="commentaires">
        <h2>Commentaires (<?= count($commentaires) ?>)</h2>
        <?php if (!empty($commentaires)) : ?>
        <?php foreach ($commentaires as $commentaire) : ?>
        <div id="commentaire">
            <h3><?= $commentaire['auteurCommentaire']; ?></h3>
            <p>
                <?= $commentaire['contenuCommentaire']; ?>
            </p>
            <time><?= $commentaire['dateCommentaire']; ?></time>
        </div>
        <?php endforeach; ?>
        <?php else : ?>
        <p>Aucun commentaire pour ce billet.</p>
        <?php endif; ?>
    </div>
    <div id="ajoutCommentaire">
        <h2>Ajouter un commentaire</h2>

        <!-- Formulaire -->
        <form action="<?= site_url('ajoutCommentaire'); ?>" method="post">
            <input type="text" id="idBillet" name="idBillet" value="<?=$billet['id']; ?>" hidden>
            <div class="form-group">
                <label for="auteurCommentaire">Votre nom :</label>
                <input type="text" id="auteurCommentaire" name="auteurCommentaire" placeholder="Entrez votre nom"
                    required>
            </div>

            <div class="form-group">
                <label for="contenuCommentaire">Votre commentaire :</label>
                <textarea id="contenuCommentaire" name="contenuCommentaire" rows="4"
                    placeholder="Écrivez votre commentaire..." required></textarea>
            </div>

            <div class="form-actions">
                <button type="submit">Envoyer</button>
                <button type="reset" class="btn-reset">Effacer</button>
            </div>
        </form>
    </div>
</div>

<?= $this->endSection() ?>