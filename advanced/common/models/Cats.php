<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "cats".
 *文章分类
 * @property integer $id
 * @property string $cat_name
 */
class Cats extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'cats';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['cat_name','img'], 'string', 'max' => 255],
            [['cat_name'], 'unique'],
            [['cat_name'], 'required'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'cat_name' => '文章分类名称',
            'img' => '图标',
            'status' => '状态',
        ];
    }
    /*
    *所有分类
    */
    public static function getAll(){
        $cats = ['0' => '暂无分类'];
        $res = self::find()->orderBy('id desc')->asArray()->all();
        $res_cats = [];
        if ($res) {
            foreach ($res as $v) {
                $res_cats[$v['id']] = $v['cat_name'];
            }
        }
        return $res_cats ? $res_cats : $cats;
    }
}
