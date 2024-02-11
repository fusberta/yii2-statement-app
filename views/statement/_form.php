<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\Statement $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="statement-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'car_number')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'violation_description')->textarea(['rows' => 6]) ?>

    <div class="form-group">
        <?= Html::submitButton('Подтвердить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
