<?php

namespace backend\controllers;

use Yii;
use yii\data\ActiveDataProvider;
use backend\controllers\Base\BaseController;
use yii\web\NotFoundHttpException;
use common\models\Common;
use common\models\Test;

/**
 * ArticleController implements the CRUD actions for Article model.
 */
class TestController extends BaseController
{   
    // 事务
    public function actionTransaction(){
        $transaction = Yii::$app->db->beginTransaction();
            try {
                throw new \Exception('失败！');
                echo 2;
                $transaction->commit();
            } catch (\Exception $e) {
                print_r($e);
                $transaction->rollBack();
                
               
            }
    }
    
}
