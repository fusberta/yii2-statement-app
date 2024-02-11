<?php

use app\models\Statement;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\StatementSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Мои заявления';
$this->params['breadcrumbs'][] = $this->title;
$this->registerLinkTag(['rel' => 'stylesheet', 'href' => 'https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css']);
?>
<div class="statement-index">

    <h1>
        <?= Html::encode($this->title) ?>
    </h1>

    <p>
        <?= Html::a('Добавить заявление', ['create'], ['class' => 'btn btn-success', 'style' => 'background-color: #530FAD; border:none;' ]) ?>
    </p>

    <div class="row">
        <?php foreach ($statements as $statement): ?>
            <div class="col-md-4 mb-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Номер автомобиля:
                            <?= Html::encode($statement->car_number) ?>
                        </h5>
                        <p class="card-text">
                            <?= Html::encode($statement->violation_description) ?>
                        </p>
                        <p class="card-text">
                            <?php
                            $status = Html::encode($statement->status);
                            $statusIcon = '';
                            switch ($status) {
                                case 'Подтверждено':
                                    $statusIcon = '<i class="bi bi-info-circle-fill text-success"></i>';
                                    break;
                                case 'Отклонено':
                                    $statusIcon = '<i class="bi bi-info-circle-fill text-danger"></i>';
                                    break;
                                case 'Новое':
                                    $statusIcon = '<i class="bi bi-info-circle-fill text-warning"></i>';
                                    break;
                                default:
                                    $statusIcon = '';
                                    break;
                            }
                            ?>
                            <?= $statusIcon . ' ' . $status ?>
                        </p>
                        <a href="<?= Url::to(['view', 'statement_id' => $statement->statement_id]) ?>"
                            class="btn btn-primary" style="background-color: #530FAD; border:none;">Подробнее</a>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>