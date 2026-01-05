<?= $this->extend('l-charte') ?>
<?= $this->Section('contenu') ?>

<div id="contenu">
    <div class="legal-container">
        <h1>Conditions & Mentions Légales</h1>

        <p class="intro-text">Dernière mise à jour : <?= date('d/m/Y') ?></p>

        <section class="legal-section">
            <h2>1. Mentions Légales</h2>
            <div class="legal-content">
                <p><strong>Éditeur du site :</strong> Ce site est un projet personnel réalisé dans un but pédagogique et
                    de gestion privée par <strong>Titiss_</strong>.</p>
                <p><strong>Hébergement :</strong> Le site est actuellement hébergé en environnement local (Serveur
                    Apache/XAMPP) ou sur <strong>Vista Panel</strong>.</p>
                <p><strong>Contact :</strong> Pour toute question, vous pouvez me contacter à l'adresse suivante :
                    <strong>mathisfrances11@gmail.com</strong>.
                </p>
            </div>
        </section>

        <section class="legal-section">
            <h2>2. Propriété Intellectuelle</h2>
            <div class="legal-content">
                <p>L'architecture du site, le code source (PHP/CodeIgniter) et le design CSS sont la propriété de
                    l'éditeur.</p>
                <p><strong>Contenus tiers :</strong> Les images, affiches de films, logos ou titres de séries affichés
                    sur le site sont la propriété de leurs auteurs respectifs. Ce site utilise ces visuels à titre
                    purement illustratif dans le cadre d'un usage privé de référencement personnel.</p>
            </div>
        </section>

        <section class="legal-section">
            <h2>3. Gestion des Données Personnelles</h2>
            <div class="legal-content">
                <p>Conformément au RGPD, nous vous informons que :</p>
                <ul>
                    <li>Les données stockées (listes de visionnage, progressions) sont destinées uniquement à l'usage de
                        l'utilisateur.</li>
                    <li>Aucune donnée n'est cédée ou vendue à des tiers.</li>
                    <li>Vous disposez d'un droit d'accès, de modification et de suppression de vos données via
                        l'interface d'administration du blog.</li>
                </ul>
            </div>
        </section>

        <section class="legal-section">
            <h2>4. Responsabilité</h2>
            <div class="legal-content">
                <p>L'éditeur ne peut être tenu responsable :</p>
                <ul>
                    <li>Du contenu des sites tiers accessibles via les liens externes (plateformes de streaming, sites
                        de scans, etc.).</li>
                    <li>Des éventuels bugs ou pertes de données liés à l'utilisation du serveur local.</li>
                </ul>
            </div>
        </section>

        <div class="form-actions" style="margin-top: 30px;">
            <a href="<?= base_url() ?>" class="btn-primary">Retour à l'accueil</a>
        </div>
    </div>
</div>

<?= $this->endSection() ?>