<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Donvitonghop */

$this->title = 'Thêm đơn vị tông hợp';
$this->params['breadcrumbs'][] = ['label' => 'Đơn vị tổng hợp', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="donvitonghop-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
