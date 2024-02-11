<?php

use yii\helpers\Html;
// use yii\widgets\ActiveForm;
use yii\bootstrap5\ActiveForm;
use yii\widgets\Pjax;

/** @var yii\web\View $this */
/** @var app\models\RegForm $model */
/** @var yii\bootstrap5\ActiveForm $form */
?>

<?php
$this->registerLinkTag(['rel' => 'stylesheet', 'href' => 'https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css']);
?>

<div class="user-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'username', ['enableAjaxValidation' => true])->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'full_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'phone')->widget(\yii\widgets\MaskedInput::class, [
        'mask' => '+7(999)-999-99-99',
        'options' => ['class' => 'form-control']
    ]) ?>

    <?= $form->field($model, 'email', ['enableAjaxValidation' => true])->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'password')->passwordInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'confirm_password')->passwordInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Подтвердить', ['class' => 'btn btn-success', 'style' => 'background-color: #530FAD; border:none;']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>