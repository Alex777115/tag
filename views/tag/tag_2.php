<?php
use yii\helpers\Url;
use app\assets\AppAsset;
$this->title = 'Облако тегов Highcharts';
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
                <strong>Облако тегов (Highcharts)</strong>
            </li>
        </ol>
    </div>
</div>

<div class="cloud-tag" id="container" ></div>

<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/wordcloud.js"></script>


<script>
    var tags = <?php echo json_encode($tags_2); ?>;

</script>



