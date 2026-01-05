<?= $this->extend('l-charte') ?>
<?= $this->Section('contenu') ?>

<div id="contenu">
    <div class="admin-container">
        <header class="admin-header">
            <h1>🛠️ Panneau de Gestion</h1>
            <p>Gérez vos contenus, catégories et préférences système.</p>
        </header>

        <div class="admin-grid">
            <div class="admin-card action-card">
                <div class="card-icon">➕</div>
                <h3>Contenu</h3>
                <p>Ajouter un nouveau film, une série ou un manga à votre liste.</p>
                <a href="<?= base_url('amfs/add') ?>" class="btn-admin">Ajouter une carte</a>
            </div>

            <div class="admin-card action-card">
                <div class="card-icon">📂</div>
                <h3>Catégories</h3>
                <p>Créer ou modifier les catégories de vos sections.</p>
                <a href="<?= base_url('categories/gestion') ?>" class="btn-admin secondary">Gérer les catégories</a>
            </div>

            <div class="admin-card action-card">
                <div class="card-icon">📊</div>
                <h3>Statistiques</h3>
                <p>Voir l'état global de votre base de données AMFS.</p>
                <a href="#stats" class="btn-admin outline">Voir les stats</a>
            </div>
        </div>

        <section class="admin-section" id="stats">
            <h2>Résumé de votre AMFS</h2>
            <div class="table-container">
                <table class="admin-table">
                    <thead>
                        <tr>
                            <th>Section (Header)</th>
                            <th>Nombre de catégories</th>
                            <th>Total éléments (Cartes)</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($lesHeaders as $header): ?>
                        <?php
                    // Récupère le compte de cartes pour ce Header, ou 0 si aucune
                    $totalElements = $statsCartes[$header['id']] ?? 0;
                ?>
                        <tr>
                            <td><strong><?= esc($header['libelle']) ?></strong></td>
                            <td><span class="badge secondary">Toutes</span></td>

                            <td><span class="badge success"><?= $totalElements ?></span></td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </section>
    </div>
</div>

<?= $this->endSection() ?>