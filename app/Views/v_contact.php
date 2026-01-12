<?= $this->extend('l_global') ?>
<?= $this->section('contenu') ?>

<div class="site-container">
    <h2 class="title-section">Inscriptions & Contact</h2>

    <div class="grid-2 mb-5">
        <section class="card-item border-blue">
            <h3><i class="bi bi-info-circle"></i> Conditions d'inscription</h3>
            <ul class="list-check">
                <li>Être âgé de 6 ans minimum.</li>
                <li>Savoir nager 25 mètres sans aide.</li>
                <li>Certificat médical de non contre-indication indispensable.</li>
            </ul>
        </section>

        <section class="card-item">
            <h3><i class="bi bi-cash-stack"></i> Tarifs 2026</h3>
            <table class="custom-table small">
                <?php foreach ($tarifs as $t): ?>
                <tr>
                    <td><?= esc($t['categorie']) ?></td>
                    <td class="text-right"><strong><?= $t['prix'] ?>€</strong></td>
                </tr>
                <?php endforeach; ?>
            </table>
        </section>
    </div>

    <div class="grid-1 mb-5">
        <section class="card-item highlight-section">
            <h3 class="text-center"><i class="bi bi-envelope"></i> Une question ? Contactez-nous</h3>

            <?php if (session()->getFlashdata('success')): ?>
            <div class="alert-success-popup">
                <i class="bi bi-check-all"></i> <?= session()->getFlashdata('success') ?>
            </div>
            <?php endif; ?>

            <form action="<?= base_url('contact/envoyer') ?>" method="post" class="mt-3">
                <?= csrf_field() ?>

                <div style="display:none;">
                    <input type="text" name="honeypot" value="">
                </div>

                <div class="grid-2">
                    <div class="form-group">
                        <label>Votre demande s'adresse au :</label>
                        <select name="destinataire" class="form-input">
                            <option value="president">Président (Général)</option>
                            <option value="tresorier">Trésorier (Facturation/Tarifs)</option>
                            <option value="secretaire">Secrétaire (Licences/Dossiers)</option>
                            <option value="coach">Entraîneur (Sportif)</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Votre adresse email :</label>
                        <input type="email" name="email" placeholder="exemple@mail.com" class="form-input" required>
                    </div>
                </div>

                <div class="form-group">
                    <label>Votre message :</label>
                    <textarea name="message" placeholder="Détaillez votre demande ici..." rows="4" class="form-input"
                        required></textarea>
                </div>

                <div class="text-center">
                    <button type="submit" class="btn-home" style="max-width: 300px; width:100%">Envoyer mon
                        message</button>
                </div>
            </form>
        </section>
    </div>

    <h3 class="title-section">Matériel nécessaire</h3>
    <div class="grid-3 mb-5">
        <?php foreach ($materiel as $m): ?>
        <div class="materiel-card"> <?php if (!empty($m['image'])): ?>
            <div class="materiel-photo-container">
                <img src="<?= base_url('uploads/materiel/' . esc($m['image'])); ?>" alt="<?= esc($m['nom']) ?>"
                    class="materiel-img">
            </div>
            <?php endif; ?>

            <div class="info">
                <h3><?= esc($m['nom']) ?></h3>
                <p class="txt-small text-muted"><?= esc($m['description']) ?></p>

                <div class="mt-2">
                    <?php if ($m['pret']): ?>
                    <span class="badge-status is-lent">
                        <i class="bi bi-arrow-repeat"></i> Prêté par le club
                    </span>
                    <?php else: ?>
                    <span class="badge-status is-personal">
                        <i class="bi bi-cart"></i> À votre charge
                    </span>
                    <?php endif; ?>
                </div>
            </div>
        </div>
        <?php endforeach; ?>
    </div>

    <section class="trombi-container mt-5">
        <h2 class="title-section text-center">L'équipe du Bureau</h2>
        <div class="trombi-grid">
            <?php if (!empty($membres)): ?>
            <?php foreach ($membres as $m): ?>
            <div class="trombi-card">
                <div class="photo-container">
                    <img src="<?= base_url('uploads/personnel/' . esc($m['photo'])); ?>" alt="<?= esc($m['nom']); ?>">
                </div>
                <div class="info">
                    <h3><?= esc($m['nom']); ?></h3>
                    <p class="badge-fonction"><?= esc($m['fonctions']); ?></p>
                </div>
            </div>
            <?php endforeach; ?>
            <?php else: ?>
            <p class="text-center">Aucun membre n'est enregistré pour le moment.</p>
            <?php endif; ?>
        </div>
    </section>
</div>

<?= $this->endSection() ?>