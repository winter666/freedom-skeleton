<?php
/**
 * @var string $title
 * @var string $content
 * @var string $description
 * @var array $menu
 */
?>
<div>
    <div class="article-part">
        <h2><?= $title; ?></h2>
        <?php if (count($menu)): ?>
        <div>
            <ul class="article-content">
                <?php foreach ($menu as $item): ?>
                    <li class="item"><a href="<?= $item['link']; ?>"><?= $item['name']; ?></a></li>
                <?php endforeach; ?>
            </ul>
        </div>
        <?php endif; ?>
        <?= $description; ?>
    </div>
    <?= $content; ?>
</div>

