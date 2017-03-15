<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Donvitonghop */

$this->title = 'Cập nhật đơn vị tổng hợp: ' . $model->ten_dvth;
$this->params['breadcrumbs'][] = ['label' => 'Donvitonghops', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_dvth, 'url' => ['view', 'id' => $model->ten_dvth]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="donvitonghop-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
