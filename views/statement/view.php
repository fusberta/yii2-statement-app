<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\Statement $model */

$this->title = 'Заявление ' . $model->statement_id;
$this->params['breadcrumbs'][] = ['label' => 'Мои заявления', 'url' => ['report']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="statement-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Редактировать', ['update', 'statement_id' => $model->statement_id], ['class' => 'btn btn-primary', 'style' => 'background-color: #530FAD; border:none;']) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'statement_id',
            [
                'label' => 'Пользователь',
                'value' => $model->user->username,
            ],
            'car_number',
            'violation_description:ntext',
            'status',
        ],
    ]) ?>

</div>
