<?php
namespace backend\controllers\Base;

use yii\web\Controller;

/**
 * BaseController implements the CRUD actions .
 */
class BaseController extends Controller {
    public function beforeAction($action){
    	if (!parent::beforeAction($action)) {
    		return false;
    	}
    	return true;
    }
}