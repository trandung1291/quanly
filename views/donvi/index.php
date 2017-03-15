<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\DonviSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Đơn vị';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="donvi-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Thêm đơn vị', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_donvi',
            'ten_donvi',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
