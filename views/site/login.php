<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Login';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="login-box">
  <div class="login-logo">
   <h1><?= Html::encode($this->title) ?></h1>
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">
    <p class="login-box-msg">Sign in to start your session</p>
    

    

    <?php $form = ActiveForm::begin([
        'id' => 'login-form',
        'layout' => 'horizontal',
        'fieldConfig' => [
            'template' => "{label}\n<div class=\"col-lg-3\">{input}</div>\n<div class=\"col-lg-8\">{error}</div>",
            'labelOptions' => ['class' => 'col-lg-1 control-label'],
        ],
    ]); ?>

        <?= $form->field($model, 'username',['options' =>[
				'tag'=>'div',
				'class'=>'form-group has-feedback field-loginform-username required',
				],
				'template' => '{input}<span class="glyphicon glyphicon-user form-control-feedback"></span>{error}{hint}',
				
			])->textInput(['autofocus' => true ,'placeholder'=>' Tên đăng nhập']) ?>

        <?= $form->field($model, 'password',['options' =>[
				'tag'=>'div',
				'class'=>'form-group has-feedback form-group field-loginform-password required',
				],
				'template' => '{input}<span class="glyphicon glyphicon-lock form-control-feedback"></span>{error}{hint}',
				
			])->passwordInput(['placeholder'=>' Mật khẩu']) ?>

        <?= $form->field($model, 'rememberMe')->checkbox([
            'template' => "<div class=\" col-lg-8\">{input} {label}</div>\n<div class=\"col-lg-3\">{error}</div>",
        ]) ?>

        <div class="form-group">
            <div class=" col-lg-11">
                <?= Html::submitButton('Login', ['class' => 'btn btn-primary', 'name' => 'login-button']) ?>
            </div>
        </div>

    <?php ActiveForm::end(); ?>
	</div>
</div>
