<?php

namespace app\controllers;

use app\models\Statement;
use app\models\StatementSearch;
use Yii;
use yii\filters\VerbFilter;
use yii\web\ForbiddenHttpException;
use yii\web\NotFoundHttpException;

class AdminController extends \yii\web\Controller
{
    public function beforeAction($action)
    {
        if (parent::beforeAction($action)) {
            $user = Yii::$app->user->identity; // Получаем текущего пользователя

            if (!$user || !$user->is_admin) {
                throw new ForbiddenHttpException('У вас нет доступа к этой странице');
            }
            return true;
        } else {
            return false;
        }
    }
    
    public function actionIndex()
    {
        $searchModel = new StatementSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionConfirm($id)
    {
        $statement = Statement::findOne($id);
        if ($statement) {
            $statement->status = 'Подтверждено';
            $statement->save();
        }
        return $this->redirect(['index']);
    }

    public function actionReject($id)
    {
        $statement = Statement::findOne($id);
        if ($statement) {
            $statement->status = 'Отклонено';
            $statement->save();
        }
        return $this->redirect(['index']);
    }

    protected function findModel($id)
    {
        if (($model = Statement::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

}
