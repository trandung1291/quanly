<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\DonvitonghopSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Đơn vị tổng hợp';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="donvitonghop-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Thêm đơn vị tổng hợp', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_dvth',
            'ten_dvth',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
