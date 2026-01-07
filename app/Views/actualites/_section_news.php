<h2 class="title-section"><?= $title ?></h2>

<?php if (empty($items)): ?>
<p class="text-muted italic"><?= $empty_msg ?></p>
<?php else: ?>
<div class="grid-dynamic"
    style="display: grid; grid-template-columns: repeat(auto-fit, minmax(320px, 1fr)); gap: 30px; margin-bottom: 50px;">
    <?php foreach ($items as $item): ?>
    <?= view('actualites/_card', ['item' => $item]) ?>
    <?php endforeach; ?>
</div>
<?php endif; ?>