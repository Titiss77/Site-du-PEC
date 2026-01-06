<?= $this->extend('l_global') ?>
<?= $this->section('contenu') ?>

<div class="site-container">
    <h2 class="title-section">Contact & Inscriptions</h2>

    <div class="grid-2">
        <!-- Section pour le formulaire de contact -->
        <section class="card-item">
            <h3><i class="bi bi-envelope"></i> Posez votre question</h3>

            <!-- Le message de succès -->
            <?php if (session()->getFlashdata('success')): ?>
            <div class="alert-success-popup">
                <i class="bi bi-check-all"></i> <?= session()->getFlashdata('success') ?>
            </div>
            <?php endif; ?>
            <!-- Fin de code -->


            <!-- Le formulaire de contact -->
            <form action="<?= base_url('contact/envoyer') ?>" method="post">
                <?= csrf_field() ?>
                <div class="form-group" style="display:none;">
                    <input type="text" name="honeypot" value="">
                </div>
                <form action="<?= base_url('contact/envoyer') ?>" method="post">
                    <?= csrf_field() ?> <div class="form-group">
                        <label>Votre demande s'adresse au :</label>
                        <select name="destinataire" class="form-input">
                            <option value="president">Président (Général)</option>
                            <option value="tresorier">Trésorier (Facturation/Tarifs)</option>
                            <option value="secretaire">Secrétaire (Licences/Dossiers)</option>
                            <option value="coach">Entraîneur (Sportif)</option>
                        </select>
                    </div>
                    <div class="form-group" style="display:none;">
                        <input type="text" name="honeypot" value="">
                    </div>
                    <div class="form-group">
                        <input type="email" name="email" placeholder="Votre email" class="form-input" required>
                    </div>
                    <div class="form-group">
                        <textarea name="message" placeholder="Votre message..." rows="5" class="form-input"
                            required></textarea>
                    </div>
                    <button type="submit" class="btn-home" style="width:100%">Envoyer mon message</button>
                </form>
        </section>
        <!-- Fin de la section pour le formulaire de contact -->

        <!-- Section pour les conditions d'inscription et les tarifs -->
        <section>
            <div class="card-item mb-4 border-blue">
                <h3><i class="bi bi-info-circle"></i> Conditions d'inscription</h3>
                <ul class="list-check">
                    <li>Être âgé de 6 ans minimum.</li>
                    <li>Savoir nager 25 mètres sans aide.</li>
                    <li>Certificat médical de non contre-indication à la nage avec palmes (indispensable).</li>
                </ul>
            </div>

            <div class="card-item">
                <h3><i class="bi bi-cash-stack"></i> Tarifs 2026</h3>
                <table class="custom-table small">
                    <?php foreach ($tarifs as $t): ?>
                    <tr>
                        <td><?= esc($t['categorie']) ?></td>
                        <td class="text-right"><strong><?= $t['prix'] ?>€</strong></td>
                    </tr>
                    <?php endforeach; ?>
                </table>
            </div>
        </section>
        <!-- Fin de la section pour les conditions d'inscription et les tarifs -->
    </div>

    <!-- Section pour l'affichage du matériel nécessaire -->
    <h3 class="title-section">Matériel nécessaire</h3>
    <div class="grid-3">
        <?php foreach ($materiel as $m): ?>
        <div class="card-item text-center">
            <h5><?= esc($m['nom']) ?></h5>
            <p class="txt-small"><?= esc($m['description']) ?></p>
            <div class="mt-2">
                <?php if ($m['pret']): ?>
                <span class="tag-status is-lent">
                    <i class="bi bi-check-circle"></i> Prêté dans un 1er temps
                </span>
                <?php else: ?>
                <span class="tag-status is-personal">
                    <i class="bi bi-cart"></i> À votre charge
                </span>
                <?php endif; ?>
            </div>
        </div>
        <?php endforeach; ?>
    </div>
    <!-- Fin de la section pour l'affichage du matériel nécessaire -->
</div>

<?= $this->endSection() ?>