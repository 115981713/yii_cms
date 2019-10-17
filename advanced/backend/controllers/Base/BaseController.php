<?php
namespace backend\controllers\Base;

use Yii;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\filters\VerbFilter;

/**
 * BaseController implements the CRUD actions .
 */
class BaseController extends Controller
{

    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
        ];
    }

    // 白名单// 登陆控制器的白名单
    public $allowAllAction = [
        'site/login',
        'site/logout',
    ]; 

    public function beforeAction($action){
        // 检验登陆状态合法性
        if(in_array($action->getUniqueId(), $this->allowAllAction )){
            return true;
        }
        $session = Yii::$app->session;
        $user_id = $session->get('userid');
        // 判断是否登录,未登录跳转到登录页
        if (!$user_id) {
            // 非法跳转
            $this->redirect('/site/login');
            return false;
        }
        return true;
    }
}