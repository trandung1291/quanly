<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\Donvitonghop;
use app\models\Donvi
/* @var $this yii\web\View */
/* @var $model app\models\User */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="user-form">

    <?php $form = ActiveForm::begin(); ?>
<div class="row">
  <div class="col-md-6">
    <?= $form->field($model, 'username')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'password')->passwordInput(['maxlength' => true]) ?>

</div>
<div class="col-md-6">
	<?= $form->field($model, 'id_donvi')->dropDownList(ArrayHelper::map(Donvi::find()->all(), 'id_donvi','ten_donvi'))?>

    <?= $form->field($model, 'ngay_tao')->widget(\yii\jui\DatePicker::classname(), [
    //'language' => 'ru',
    'dateFormat' => 'yyyy-MM-dd',
])  ?>
</div>
</div>
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
