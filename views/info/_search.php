<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\InfoSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="info-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'IP') ?>

    <?= $form->field($model, 'MAC') ?>

    <?= $form->field($model, 'Domain') ?>

    <?= $form->field($model, 'SL') ?>

    <?php // echo $form->field($model, 'Id_Donvi') ?>

    <?php // echo $form->field($model, 'NgayTongHop') ?>

    <?php // echo $form->field($model, 'Id_Dvth') ?>



    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
