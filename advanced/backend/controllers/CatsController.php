<?php

namespace backend\controllers;

use Yii;
use common\models\Cats;
use yii\data\ActiveDataProvider;
use backend\controllers\Base\BaseController;
use yii\web\NotFoundHttpException;
use common\models\Common;

/**
 * CatsController implements the CRUD actions for Cats model.
    文章分类
 */
class CatsController extends BaseController
{
    /**
     * Lists all Cats models.
     * @return mixed
     */
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => Cats::find()->orderBy('status desc'),
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Cats model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Cats model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Cats();

        if ($model->load(Yii::$app->request->post())) {
            $file = Common::get_img($_FILES['Cats'],'img');
            if ($file['size'] > 0) {
                $path = Common::set_UploadFile_img($file,'cats');
                $model->img = $path;
            }
            if ($model->save()) {
                Yii::$app->getSession()->setFlash('success', "添加成功！");
                return $this->redirect(['view', 'id' => $model->id]);
            } else {
                Yii::$app->getSession()->setFlash('error', "添加失败！");
                return $this->render('update', [
                    'model' => $model,
                ]);
            }
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Cats model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $img = $model->img;
        if ($model->load(Yii::$app->request->post())) {
            $file = Common::get_img($_FILES['Cats'],'img');
            if ($file['size'] > 0) {
                $path = Common::set_UploadFile_img($file,'cats');
                $model->img = $path;
            } else {
                //如果没有上传图片保存原来的图片
                $model->img = $img;
            }
            if ($model->save()) {
                Yii::$app->getSession()->setFlash('success', "编辑成功！");
                return $this->redirect(['view', 'id' => $model->id]);
            } else {
                Yii::$app->getSession()->setFlash('error', "编辑失败！");
                return $this->render('update', [
                    'model' => $model,
                ]);
            }
            
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Cats model.
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
     * 设置无效 an existing Cats model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionVoid()
    {
        $id = $_POST['id'];
        $model = $this->findModel($id);
        $model->status = 0;
        $res = $model->save();
        if ($res) {
            $data = [
                'status' => 200,
                'msg' => '操作成功！'
            ];
        } else {
            $data = [
                'status' => 400,
                'msg' => '操作失败！'
            ];
        }
        echo json_encode($data);die;
    }    

    /**
     * 设置有效 an existing Cats model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionValid()
    {
        $id = $_POST['id'];
        $model = $this->findModel($id);
        $model->status = 1;
        $res = $model->save();
        if ($res) {
            $data = [
                'status' => 200,
                'msg' => '操作成功！'
            ];
        } else {
            $data = [
                'status' => 400,
                'msg' => '操作失败！'
            ];
        }
        echo json_encode($data);die;
    }

    /**
     * Finds the Cats model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Cats the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Cats::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
