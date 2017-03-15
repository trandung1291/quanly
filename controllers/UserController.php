<?php

namespace app\controllers;

use Yii;
use app\models\User;
use app\models\UserSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * UserController implements the CRUD actions for User model.
 */
class UserController extends Controller
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
     * Lists all User models.
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
        $searchModel = new UserSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single User model.
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
     * Creates a new User model.
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
        $model = new User();
		
        if ($model->load(Yii::$app->request->post()) ) {
		$model->password = sha1(trim(Yii::$app->request->post()['User']['password']));
		$model->rules = 1;
		$model->auth_key  ='';
		$model->password_reset_token ='';
		$model->save();
            return $this->redirect(['view', 'id' => $model->id_user]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing User model.
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
		$olapass = $model->password;
        if ($model->load(Yii::$app->request->post())) {
			if($olapass != sha1(trim(Yii::$app->request->post()['User']['password']))){
				$model->password = sha1(trim(Yii::$app->request->post()['User']['password']));
			}
			$model->save();
            return $this->redirect(['view', 'id' => $model->id_user]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing User model.
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
     * Finds the User model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return User the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = User::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
