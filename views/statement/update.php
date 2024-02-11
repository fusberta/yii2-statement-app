<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Statement $model */

$this->title = 'Редактировать заявление ' . $model->statement_id;
$this->params['breadcrumbs'][] = ['label' => 'Заявления', 'url' => ['report']];
$this->params['breadcrumbs'][] = ['label' => 'Заявление ' . $model->statement_id, 'url' => ['view', 'statement_id' => $model->statement_id]];
$this->params['breadcrumbs'][] = 'Редактировать';
?>
<div class="statement-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
