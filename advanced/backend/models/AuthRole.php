<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "auth_role".
 *角色表
 * @property integer $id
 * @property string $name
 */
class AuthRole extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'auth_role';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name'], 'string', 'max' => 25],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
        ];
    }

    /*
    *所有角色
    */
    public static function getAll(){
        $roles = ['0' => '暂无角色'];
        $res = self::find()->asArray()->all();
        $res_roles = [];
        if ($res) {
            foreach ($res as $v) {
                $res_roles[$v['id']] = $v['name'];
            }
        }
        return $res_roles ? $res_roles : $roles;
    }
}
