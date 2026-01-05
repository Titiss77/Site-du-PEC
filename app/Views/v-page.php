<?= $this->extend('l-charte') ?>
<?= $this->Section('contenu') ?>
<div id="contenu">
    <h1><?= $pageHeader['libelle']; ?></h1>

    <?php if (empty($cartesParCategorie)): ?>
    <div class="alert alert-info">
        Aucune catégorie n'est définie pour cette section.
    </div>
    <?php else: ?>
    <div class="articles-container">

        <?php
        foreach ($cartesParCategorie as $idCat => $categorie):
            $categoryLibelle = $categorie['libelle'];
            $items = $categorie['items'];
            $idCategorie = $categorie['id'];
            ?>
        <h2 class="category-title"><?= esc($categoryLibelle) ?></h2>
        <div class="articles">

            <?php

            /*
             * * ANCIEN CODE SUPPRIMÉ :
             * if (empty($items)):
             * <div class="alert alert-empty-category">
             * Aucun élément dans cette catégorie pour l'instant. Ajoutez-en un !
             * </div>
             * endif;
             */
            ?>

            <?php foreach ($items as $carte): ?>
            <article class='article' id="div-<?= $carte['id'] ?>">
                <a href='<?= $carte['lien'] ?>' target='_blank'>
                    <img class='image' src='<?= $carte['image'] ?>' alt='<?= $carte['libelle'] ?>' />
                    <div class='texte'>
                        <h1 class='name'><?= esc($carte['libelle']) ?></h1>
                        <p class='progression-text'>
                            Saison <?= esc($carte['saison']) ?>, Épisode <?= esc($carte['episode']) ?>
                        </p>
                    </div>
                </a>

                <div class="card-footer">
                    <div class="button_anime">
                        <?= esc($categoryLibelle) ?>
                    </div>

                    <div class="action-buttons">
                        <a href="<?= base_url('edit/' . $carte['id']) ?>" class="btnModif" title="Modifier">
                            ✏️
                        </a>
                        <a href="<?= base_url('delete/' . $carte['id'] . '/' . $pageHeader['id']) ?>" class="btnSuppr"
                            onclick="return confirm('Voulez-vous vraiment supprimer « <?= addslashes($carte['libelle']) ?> » ?');">
                            🗑️
                        </a>
                    </div>
                </div>
            </article>
            <?php endforeach; ?>

            <article class='article add-new-card'>
                <a href='<?= base_url('add/' . $idHeader . '/' . $idCategorie) ?>' class="add-new-link"
                    title="Ajouter un nouvel élément à la catégorie <?= esc($categoryLibelle) ?>">
                    <div class="add-new-icon"></div>
                </a>
            </article>

        </div> <?php endforeach; ?>

    </div> <?php endif; ?>
</div>
<script>
// Récupérer les extensions PHP dans une variable JavaScript
const extensions = <?= json_encode($extensions); ?>;
const placeholder = '{ext}';

// Créer une map pour un accès rapide (ex: {Nightflix: '.world'})
const extensionMap = {};
extensions.forEach(item => {
    // Normaliser le nom du site pour la vérification (minuscules, sans espace)
    const siteKey = item.site.toLowerCase().replace(/\s/g, '');
    extensionMap[siteKey] = item.ext;
});

document.addEventListener('DOMContentLoaded', () => {
    // Cibler tous les liens qui pourraient être modifiés (ceux des cartes)
    const links = document.querySelectorAll('.article a:not(.btnModif):not(.btnSuppr)');

    links.forEach(link => {
        link.addEventListener('click', function(e) {
            let originalUrl = this.href;

            // Vérifier si l'URL contient la balise de substitution
            if (originalUrl.includes(placeholder)) {

                // Empêcher la navigation par défaut
                e.preventDefault();

                let foundMatch = false;

                // Parcourir la map pour trouver un match
                for (const siteName in extensionMap) {

                    // Si l'URL contient le nom du site (normalisé), effectuer la substitution
                    if (originalUrl.toLowerCase().includes(siteName)) {
                        const newExtension = extensionMap[siteName];

                        // Remplacer {ext} par l'extension
                        let newUrl = originalUrl.replace(placeholder, newExtension);

                        // Forcer la redirection vers l'URL corrigée
                        window.open(newUrl, '_blank');

                        foundMatch = true;
                        break;
                    }
                }

                // Si la balise {ext} est présente mais aucun site n'a été trouvé, 
                // on peut soit rediriger vers l'originale, soit afficher une erreur.
                // Ici, on laisse la navigation par défaut bloquée si substitution nécessaire mais manquant.
            }
            // Sinon (si pas de {ext}), le lien s'ouvre normalement.
        });
    });
});
</script>

<?= $this->endSection() ?>