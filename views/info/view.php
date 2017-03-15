<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
/* @var $this yii\web\View */
/* @var $model app\models\Info */

$this->title = $model->IP;
$this->params['breadcrumbs'][] = ['label' => 'Thông tin', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="info-view">
    <h1><?= Html::encode($this->title) ?></h1>
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'IP',
            'MAC',
            'Domain',
            'SL',
			'Info',
            'idDonvis.ten_donvi',
            'NgayTongHop',
            'idDonviths.ten_donvi',
        ],
    ]) ?>

</div>
