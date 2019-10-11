<?php

namespace backend\controllers;

use Yii;
use backend\models\Article;
use yii\data\ActiveDataProvider;
use backend\controllers\Base\BaseController;
use yii\web\NotFoundHttpException;
use common\models\Cats;
use common\models\Common;

/**
 * ArticleController implements the CRUD actions for Article model.
 */
class ArticleController extends BaseController
{

    /**
     * Lists all Article models.
     * @return mixed
     */
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => Article::find()->select(['article.*','admin.username'])->leftJoin('admin','article.user_id=admin.id'),
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Article model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => Article::find()
                ->select(['article.*','admin.username','cats.cat_name'])
                ->leftJoin('admin','article.user_id=admin.id')
                ->leftJoin('cats','article.cat_id=cats.id')
                ->where(['=','article.id',$id])
                ->one(),
        ]);
    }

    /**
     * Creates a new Article model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Article();

        if ($model->load(Yii::$app->request->post())) {
            $model->updated_at = time();
            $model->created_at = time();
            $file = Common::get_img($_FILES['Article'],'label_img');

            if ($file['size'] > 0) {
                $path = Common::set_UploadFile_img($file,'article');
                $model->label_img = $path;
            }
            
            if ($model->save()) {
                return $this->redirect(['view', 'id' => $model->id]);
            } else {
                return $this->render('create', [
                    'model' => $model,
                    'cats' => Cats::getAll(),
                ]);
            }
        } else {
            return $this->render('create', [
                'model' => $model,
                'cats' => Cats::getAll(),
            ]);
        }
    }

    /**
     * Updates an existing Article model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $label_img = $model->label_img;

        if ($model->load(Yii::$app->request->post())) {
            $file = Common::get_img($_FILES['Article'],'label_img');

            if ($file['size'] > 0) {
                $path = Common::set_UploadFile_img($file,'article');
                $model->label_img = $path;
            } else {
                //如果没有上传图片保存原来的图片
                $model->label_img = $label_img;
            }
            $res = $model->save();
            if ($res) {
                return $this->redirect(['view', 'id' => $model->id]);
            }
        } else {
            return $this->render('update', [
                'model' => $model,
                'cats' => Cats::getAll(),
            ]);
        }
    }

    /**
     * Deletes an existing Article model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Article model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Article the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Article::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
