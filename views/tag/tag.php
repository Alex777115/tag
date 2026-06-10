<?php
use app\assets\AppAsset;
$this->title = 'Облако тегов map';
AppAsset::register($this);
?>
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>Управление привелегиями</h2>
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="<?= yii\helpers\Url::to(['default/index']); ?>">Дом</a>
            </li>
            <li class="breadcrumb-item active">
                <strong>Облако тегов (сфера)</strong>
            </li>
        </ol>
    </div>
</div>

<ul class="tags-cloud">
    <?php foreach ($tags as $item): ?>
        <?php
        // Определяем максимальное значение count для нормализации
        $maxCount = max(array_column($tags, 'count'));
        $size = 1 + ($item->count / $maxCount) * 15; // Размер будет зависеть от count
        ?>
        <li class='tag' style="font-size: <?= $size ?>vmin;">
            <span class='wrap'>
                <!-- Изменения: ссылка на страницу tag-posts с передачей тега -->
                <a class="tag_a" href="<?= yii\helpers\Url::to(['tag/tag-posts', 'tag' => $item->tag]) ?>" style="text-decoration: none"><?= $item->tag ?></a>
            </span>
        </li>
    <?php endforeach ?>

</ul>



<!-- jkhdsflhgas -->


