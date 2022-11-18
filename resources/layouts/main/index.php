<?php
/**
 * @var string $title
 */
?>
<html lang="en">
<head>
    <title><?= $title ?></title>
    <?= $this->yieldCss('head'); ?>
</head>
<body>
    <?= $this->renderTemplate('page') ?>
</body>
</html>
