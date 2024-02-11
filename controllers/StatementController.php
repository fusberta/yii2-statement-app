<?php

namespace app\controllers;

use app\models\Statement;
use app\models\StatementSearch;
use Yii;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\ForbiddenHttpException;

/**
 * StatementController implements the CRUD actions for Statement model.
 */
class StatementController extends Controller
{
    /**
     * @inheritDoc
     */
    public function behaviors()
    {
        return array_merge(
            parent::behaviors(),
            [
                'verbs' => [
                    'class' => VerbFilter::className(),
                    'actions' => [
                        'delete' => ['POST'],
                    ],
                ],
            ]
        );
    }

    public function beforeAction($action)
    {
        if (parent::beforeAction($action)) {
            $user = Yii::$app->user->identity; // Получаем текущего пользователя

            if (!$user) { // Если пользователь не авторизован
                throw new ForbiddenHttpException('У вас нет доступа к этой странице'); // Выбрасываем исключение
            }
            return true;
        } else {
            return false;
        }
    }

    /**
     * Lists all Statement models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new StatementSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }
    public function actionReport()
    {

        $statements = Statement::find()->where(['user_id' => Yii::$app->user->identity->user_id])->all();

        return $this->render('report', [
            'statements' => $statements,
        ]);
    }

    /**
     * Displays a single Statement model.
     * @param int $statement_id Statement ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($statement_id)
    {
        $model = $this->findModel($statement_id);

        if ($model->user_id !== Yii::$app->user->id) {

            throw new \yii\web\ForbiddenHttpException('Вы не можете просматривать эту страницу.');
        }
        return $this->render('view', [
            'model' => $this->findModel($statement_id),
        ]);
    }

    /**
     * Creates a new Statement model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Statement();

        if ($this->request->isPost) {
            $model->user_id = Yii::$app->user->identity->user_id;
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'statement_id' => $model->statement_id]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Statement model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $statement_id Statement ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($statement_id)
    {
        $model = $this->findModel($statement_id);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'statement_id' => $model->statement_id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Statement model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $statement_id Statement ID
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($statement_id)
    {
        $this->findModel($statement_id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Statement model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $statement_id Statement ID
     * @return Statement the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($statement_id)
    {
        if (($model = Statement::findOne(['statement_id' => $statement_id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
