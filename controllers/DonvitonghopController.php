<?php

namespace app\controllers;

use Yii;
use app\models\Donvitonghop;
use app\models\DonvitonghopSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * DonvitonghopController implements the CRUD actions for Donvitonghop model.
 */
class DonvitonghopController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Donvitonghop models.
     * @return mixed
     */
    public function actionIndex()
    {
		if (Yii::$app->user->isGuest) {
            $this->redirect(Yii::$app->urlManager->createUrl('site/login'));
        }
		if(Yii::$app->user->identity->rules != 0){
			return 'Bạn không có quyền vào mục này';
		}
		
        $searchModel = new DonvitonghopSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Donvitonghop model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
		if (Yii::$app->user->isGuest) {
            $this->redirect(Yii::$app->urlManager->createUrl('site/login'));
        }
		
		if(Yii::$app->user->identity->rules != 0){
			return 'Bạn không có quyền vào mục này';
		}
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Donvitonghop model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
		if (Yii::$app->user->isGuest) {
            $this->redirect(Yii::$app->urlManager->createUrl('site/login'));
        }
		
		if(Yii::$app->user->identity->rules != 0){
			return 'Bạn không có quyền vào mục này';
		}
        $model = new Donvitonghop();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id_dvth]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Donvitonghop model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
		if (Yii::$app->user->isGuest) {
            $this->redirect(Yii::$app->urlManager->createUrl('site/login'));
        }
		
		if(Yii::$app->user->identity->rules != 0){
			return 'Bạn không có quyền vào mục này';
		}
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id_dvth]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Donvitonghop model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
		if (Yii::$app->user->isGuest) {
            $this->redirect(Yii::$app->urlManager->createUrl('site/login'));
        }
		
		if(Yii::$app->user->identity->rules != 0){
			return 'Bạn không có quyền vào mục này';
		}
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Donvitonghop model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Donvitonghop the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Donvitonghop::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
