<?= $this->extend('l_global') ?>

<?= $this->section('contenu') ?>

<?php if(is_file(APPPATH . 'Views/admin/retour.php')): ?>
<?= $this->include('admin/retour') ?>
<?php else: ?>
<div class="site-container mt-3">
    <a href="<?= base_url('admin') ?>" class="btn-home btn-sm"><i class="bi bi-arrow-left"></i> Tableau de bord</a>
</div>
<?php endif; ?>

<div class="site-container">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h3 class="title-section mb-0">Gestion des Actualités</h3>
        <a href="<?= base_url('admin/actualites/new') ?>" class="btn-home">
            <i class="bi bi-plus-circle"></i> Créer une actualité
        </a>
    </div>

    <?php if (session()->getFlashdata('success')): ?>
    <div class="alert alert-success text-center mb-4"
        style="background: #d4edda; color: #155724; padding: 10px; border-radius: 5px;">
        <?= session()->getFlashdata('success') ?>
    </div>
    <?php endif; ?>

    <div class="card-item p-0 overflow-hidden">
        <table class="table-admin" style="width: 100%; border-collapse: collapse;">
            <thead style="background-color: #f8f9fa; border-bottom: 2px solid #eee;">
                <tr>
                    <th style="padding: 15px;">Aperçu</th>
                    <th style="padding: 15px;">Infos</th>
                    <th style="padding: 15px;">Statut</th>
                    <th style="padding: 15px; text-align: right;">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($actualites)): ?>
                <?php foreach ($actualites as $actu): ?>
                <tr style="border-bottom: 1px solid #eee;">
                    <td style="padding: 15px; width: 80px;">
                        <?php if (!empty($actu['image_path'])): ?>
                        <img src="<?= base_url($actu['image_path']) ?>" alt="Img"
                            style="width: 60px; height: 60px; object-fit: cover; border-radius: 6px;">
                        <?php else: ?>
                        <div
                            style="width: 60px; height: 60px; background: #eee; border-radius: 6px; display: flex; align-items: center; justify-content: center;">
                            <i class="bi bi-image text-muted"></i>
                        </div>
                        <?php endif; ?>
                    </td>
                    <td style="padding: 15px;">
                        <strong style="font-size: 1.1em; display: block;"><?= esc($actu['titre']) ?></strong>
                        <small class="text-muted">
                            <?php if($actu['date_evenement']): ?>
                            <i class="bi bi-calendar-event"></i> Événement :
                            <?= date('d/m/Y', strtotime($actu['date_evenement'])) ?>
                            <?php else: ?>
                            <i class="bi bi-clock"></i> Créé le <?= date('d/m/Y', strtotime($actu['created_at'])) ?>
                            <?php endif; ?>
                        </small>
                    </td>
                    <td style="padding: 15px;">
                        <?php 
                                    $colors = ['publie' => '#28a745', 'brouillon' => '#ffc107', 'archive' => '#6c757d'];
                                    $color = $colors[$actu['statut']] ?? '#ccc';
                                ?>
                        <span
                            style="color: white; background-color: <?= $color ?>; padding: 5px 10px; border-radius: 15px; font-size: 0.85em;">
                            <?= ucfirst($actu['statut']) ?>
                        </span>
                    </td>
                    <td style="padding: 15px; text-align: right;">
                        <a href="<?= base_url('admin/actualites/' . $actu['id'] . '/edit') ?>"
                            class="btn-icon text-primary me-2" title="Modifier">
                            <i class="bi bi-pencil-square" style="font-size: 1.2rem;"></i>
                        </a>
                        <a href="<?= base_url('admin/actualites/' . $actu['id'] . '/delete') ?>"
                            class="btn-icon text-danger"
                            onclick="return confirm('Êtes-vous sûr de vouloir supprimer cet article ?');"
                            title="Supprimer">
                            <i class="bi bi-trash" style="font-size: 1.2rem;"></i>
                        </a>
                    </td>
                </tr>
                <?php endforeach; ?>
                <?php else: ?>
                <tr>
                    <td colspan="4" class="text-center p-5 text-muted">Aucune actualité pour le moment.</td>
                </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>
<?= $this->endSection() ?>