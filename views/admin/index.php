<?php

use yii\helpers\Html;
use yii\grid\GridView;

/** @var $this yii\web\View */
/** @var $searchModel app\models\StatementSearch */
/** @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Управление заявлениями';
$this->params['breadcrumbs'][] = 'Панель администратора';
?>
<div class="statement-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'user.full_name',
            'violation_description:ntext',
            'car_number',
            'status',

            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{confirm} {reject}',
                'buttons' => [
                    'confirm' => function ($url, $model, $key) {
                        if ($model->status === 'Новое') {
                            return Html::a('Подтвердить', ['confirm', 'id' => $model->statement_id], ['class' => 'btn btn-success mb-1 w-100']);
                        } else {
                            return '';
                        }
                    },
                    'reject' => function ($url, $model, $key) {
                        if ($model->status === 'Новое') {
                            return Html::a('Отклонить', ['reject', 'id' => $model->statement_id], ['class' => 'btn btn-danger w-100']);
                        } else {
                            return '';
                        }
                    },
                ],
            ],
        ],
    ]); ?>

</div>
