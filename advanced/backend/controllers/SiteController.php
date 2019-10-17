<?php
namespace backend\controllers;

use Yii;
use yii\filters\AccessControl;
use backend\controllers\Base\BaseController;
use backend\models\LoginForm;
use backend\models\Admin;
use yii\filters\VerbFilter;

/**
 * Site controller
 */
class SiteController extends BaseController
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'actions' => ['login', 'error'],
                        'allow' => true,
                    ],
                    [
                        'actions' => ['logout', 'index'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
        ];
    }

    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionLogin()
    {
        if (!\Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            $username = Yii::$app->request->post('LoginForm')['username'];
            $admin = Admin::find()
                ->where(['username'=>$username])
                ->asArray()
                ->one();
            $session = Yii::$app->session;
            $session->set('userid', $admin['id']);
            $session->set('role_id', $admin['role']);
            $session->set('username', $admin['username']);
            return $this->goBack();
        } else {
            return $this->render('login', [
                'model' => $model,
            ]);
        }
    }

    public function actionLogout()
    {
        Yii::$app->user->logout();
        $session = Yii::$app->session;
        $session->set('userid', '');
        $session->set('role_id', '');
        $session->set('username', '');
        return $this->goHome();
    }
}
