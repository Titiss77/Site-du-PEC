<section class="trombi-container">
    <h1 class="text-center">Le Bureau</h1>

    <div class="trombi-grid">
        <?php if (!empty($membres)): ?>
        <?php foreach ($membres as $m): ?>
        <div class="trombi-card">
            <div class="photo-container">
                <img src="<?= base_url('uploads/bureau/' . esc($m['photo'])); ?>" alt="<?= esc($m['nom']); ?>">
            </div>
            <div class="info">
                <h3><?= esc($m['nom']); ?></h3>
                <p class="badge-fonction"><?= esc($m['fonctions']); ?></p>

                <div class="contact-links">
                    <a href="tel:<?= $m['numTel']; ?>"><i class="bi bi-telephone"></i></a>
                    <a href="mailto:<?= $m['mail']; ?>"><i class="bi bi-envelope"></i></a>
                </div>
            </div>
        </div>
        <?php endforeach; ?>
        <?php else: ?>
        <p>Aucun membre n'est enregistré pour le moment.</p>
        <?php endif; ?>
    </div>
</section>

<style>
.trombi-grid {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
    gap: 30px;
    padding: 20px;
}

.trombi-card {
    background: white;
    border-radius: 15px;
    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
    overflow: hidden;
    text-align: center;
    transition: transform 0.3s ease;
}

.trombi-card:hover {
    transform: translateY(-10px);
}

.photo-container img {
    width: 100%;
    height: 300px;
    object-fit: cover;
}

.badge-fonction {
    background-color: #CA258B;
    color: white;
    padding: 5px 15px;
    border-radius: 50px;
    font-size: 0.85rem;
    display: inline-block;
    margin-bottom: 10px;
}

.contact-links a {
    font-size: 1.5rem;
    margin: 0 10px;
    color: #002d5a;
}
</style>