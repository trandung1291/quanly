<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Donvitonghop */

$this->title = $model->ten_dvth;
$this->params['breadcrumbs'][] = ['label' => 'Đơn vị tổng hợp', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="donvitonghop-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id_dvth], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id_dvth], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Bạn có chắc chắn muốn xóa đơn vị này?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id_dvth',
            'ten_dvth',
        ],
    ]) ?>

</div>
